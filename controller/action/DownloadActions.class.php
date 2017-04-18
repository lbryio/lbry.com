<?php

class DownloadActions extends Actions
{
  public static function executeGetAppRedirect(string $ext)
  {
    return Controller::redirect(GitHub::getAppDownloadUrl(OS::getOsForExtension($ext)) ?: '/get', 302);
  }

  public static function executeGetAppPrereleaseRedirect(string $ext)
  {
    return Controller::redirect(GitHub::getAppPrereleaseDownloadUrl(OS::getOsForExtension($ext)) ?: '/get', 302);
  }


  public static function executeGetDaemonRedirect(string $os)
  {
    $uri  = null;
    $oses = Os::getAll();

    if (isset($oses[$os]))
    {
      $uri = GitHub::getDaemonDownloadUrl($os);
    }

    return Controller::redirect($uri ?: '/quickstart', 302);
  }

  public static function executeGet()
  {
    $email = static::getEmailParam();
    $user  = [];

    if ($email)
    {
      if (filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        $user = Prefinery::findUser($email);
      }

      if (!$user)
      {
        Session::unsetKey(Session::KEY_PREFINERY_USER_ID);
        Session::unsetKey(Session::KEY_DOWNLOAD_ALLOWED);
      }
    }
    elseif (Session::get(Session::KEY_PREFINERY_USER_ID))
    {
      try
      {
        $user = Prefinery::findUser(Session::get(Session::KEY_PREFINERY_USER_ID));
      }
      catch (PrefineryException $e)
      {
        if (stripos($e->getMessage(), 'Tester is hidden.') === false)
        {
          throw $e;
        }
      }
    }

    if ($user)
    {
      static::setSessionVarsForPrefineryUser($user);
    }

    if (!Session::get(Session::KEY_DOWNLOAD_ALLOWED))
    {
      return ['download/get'];
    }

    $osChoices = OS::getAll();
    $os        = static::guessOs();

    if ($os && isset($osChoices[$os]))
    {
      list($uri, $osTitle, $osIcon, $partial) = $osChoices[$os];
      return ['download/getAllowed', [
        'os'            => $os,
        'osTitle'       => $osTitle,
        'osIcon'        => $osIcon,
        'prefineryUser' => $user ?: [],
        'downloadHtml'  => View::exists('download/' . $partial) ?
          View::render('download/' . $partial, ['downloadUrl' => Github::getAppDownloadUrl($os)]) :
          false
      ]];
    }

    return ['download/get-no-os'];
  }


  public static function executeSignup()
  {
    $email = Request::getParam('email');
    $code  = Request::getParam('code');

    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      Session::set(Session::KEY_DOWNLOAD_ACCESS_ERROR, 'Please provide a valid email. You provided: ' . htmlspecialchars($email));
    }
    else
    {
      $referrerId = Request::getParam('referrer_id');
      $failure    = false;
      Mailgun::sendSubscriptionConfirmation($email);

      try
      {
        $user = Prefinery::findOrCreateUser($email, $code, $referrerId);
        static::setSessionVarsForPrefineryUser($user);
        if ($code && strlen($code) > 2 && in_array(substr($code, 0, 2), ['my', 'pf', 'sl']))
        {
          Session::set(Session::KEY_PREFINER_USED_CUSTOM_CODE, true);
        }
      }
      catch (CurlException $e)
      {
        $failure = true;
        Slack::sendErrorIfProd($e);
      }
      catch (PrefineryException $e)
      {
        $failure = true;
      }

      if ($failure)
      {
        Session::set(Session::KEY_DOWNLOAD_ALLOWED, false);
        Session::set(Session::KEY_DOWNLOAD_ACCESS_ERROR,
          'We were unable to add you to the wait list. Received error "' . $e->getMessage() . '". Please contact ' .
          Config::HELP_CONTACT_EMAIL . ' if you think this is a mistake.');
      }
    }

    return Controller::redirect('/get');
  }

  public static function prepareListPartial(array $vars)
  {
    return $vars + ['osChoices' => isset($vars['excludeOs']) ?
      array_diff_key(OS::getAll(), [$vars['excludeOs'] => null]) :
      OS::getAll()
    ];
  }

  public static function prepareSignupPartial(array $vars)
  {
    return $vars + [
      'defaultEmail'    => static::getEmailParam(),
      'allowInviteCode' => true,
      'referralCode'    => Request::getParam('r', '')
    ];
  }

  protected static function setSessionVarsForPrefineryUser($userData)
  {
    Session::set(Session::KEY_DOWNLOAD_ALLOWED, in_array($userData['status'], [Prefinery::STATE_ACTIVE, Prefinery::STATE_INVITED]));
    Session::set(Session::KEY_PREFINERY_USER_ID, (int)$userData['id']);
  }

  public static function prepareReferPartial(array $vars)
  {
    $userId = (int)Session::get(Session::KEY_PREFINERY_USER_ID);
    if (!$userId)
    {
      return null;
    }

    $prefineryUser = Prefinery::findUser($userId);

    if ($prefineryUser)
    {
      preg_match('/\?r\=(\w+)/', $prefineryUser['share_link'], $matches);
    }
    else
    {
      $matches = null;
    }

    return $vars + [
      'prefineryUser' => $prefineryUser,
      'referralCode'  => $matches[1] ?? 'unknown'
    ];
  }

  protected static function guessOs()
  {
    //if exact OS is requested, use that
    $uri = Request::getRelativeUri();
    foreach (OS::getAll() as $os => $osChoice)
    {
      if ($osChoice[0] == $uri)
      {
        return $os;
      }
    }

    if (Request::isRobot())
    {
      return null;
    }

    //otherwise guess from UA
    $ua = Request::getUserAgent();
    if (stripos($ua, 'OS X') !== false)
    {
      return strpos($ua, 'iPhone') !== false || stripos($ua, 'iPad') !== false ? OS::OS_IOS : OS::OS_OSX;
    }
    if (stripos($ua, 'Linux') !== false || strpos($ua, 'X11') !== false)
    {
      return strpos($ua, 'Android') !== false ? OS::OS_ANDROID : OS::OS_LINUX;
    }
    if (stripos($ua, 'Windows') !== false)
    {
      return OS::OS_WINDOWS;
    }
  }

  protected static function getEmailParam()
  {
    $email = Request::getParam('e');

    if (!$email)
    {
      $encoded = Request::getParam('ec');
      if ($encoded)
      {
        $email = Smaz::decode(Encoding::base64DecodeUrlsafe($encoded), Smaz::CODEBOOK_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
          $email = null;
        }
      }
    }

    return $email;
  }
}
