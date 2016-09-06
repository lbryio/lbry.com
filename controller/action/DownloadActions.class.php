<?php

class DownloadActions extends Actions
{
  const OS_ANDROID = 'android',
    OS_IOS = 'ios',
    OS_LINUX = 'linux',
    OS_OSX = 'osx',
    OS_WINDOWS = 'windows';

  public static function getOses()
  {
    return [
      static::OS_WINDOWS => ['/windows', 'Windows', 'icon-windows', '_windows'],
      static::OS_OSX     => ['/osx', 'OS X', 'icon-apple', '_osx'],
      static::OS_LINUX   => ['/linux', 'Linux', 'icon-linux', '_linux'],
      static::OS_ANDROID => ['/android', 'Android', 'icon-android', '_android'],
      static::OS_IOS     => ['/ios', 'iOS', 'icon-mobile', '_ios']
    ];
  }

  public static function executeGet()
  {
    $email = Request::getParam('e');
    $user = [];

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
      $user = Prefinery::findUser(Session::get(Session::KEY_PREFINERY_USER_ID));
    }

    if ($user)
    {
      static::setSessionVarsForPrefineryUser($user);
    }

    if (!Session::get(Session::KEY_DOWNLOAD_ALLOWED))
    {
      return ['download/get'];
    }

    $osChoices = static::getOses();
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
          View::render('download/' . $partial, ['downloadUrl' => static::getDownloadUrl($os)]) :
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
      try
      {
        MailActions::subscribeToMailchimp($email, Mailchimp::LIST_GENERAL_ID);
      }
      catch (MailchimpSubscribeException $e)
      {
      }

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
      array_diff_key(static::getOses(), [$vars['excludeOs'] => null]) :
      static::getOses()
    ];
  }

  public static function prepareSignupPartial(array $vars)
  {
    return $vars + [
      'defaultEmail'    => Request::getParam('e'),
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

    preg_match('/\?r\=(\w+)/', $prefineryUser['share_link'], $matches);

    return $vars + [
      'prefineryUser' => $prefineryUser,
      'referralCode'  => $matches[1] ?: 'unknown'
    ];
  }

  protected static function guessOs()
  {
    //if exact OS is requested, use that
    $uri = Request::getRelativeUri();
    foreach (static::getOses() as $os => $osChoice)
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
      return strpos($ua, 'iPhone') !== false || stripos($ua, 'iPad') !== false ? static::OS_IOS : static::OS_OSX;
    }
    if (stripos($ua, 'Linux') !== false || strpos($ua, 'X11') !== false)
    {
      return strpos($ua, 'Android') !== false ? static::OS_ANDROID : static::OS_LINUX;
    }
    if (stripos($ua, 'Windows') !== false)
    {
      return static::OS_WINDOWS;
    }
    return null;
  }

  public static function getDownloadUrl($os, $useCache = true)
  {
    if (!in_array($os, array_keys(static::getOses())))
    {
      throw new DomainException('Unknown OS');
    }

    $apc         = $useCache && extension_loaded('apc') && ini_get('apc.enabled');
    $key         = 'lbry_release_data2';
    $releaseData = null;

    if ($apc)
    {
      $releaseData = apc_fetch($key);
    }

    if (!$releaseData)
    {
      try
      {
        $releaseData =
          json_decode(Curl::get('https://api.github.com/repos/lbryio/lbry/releases/latest', [], ['user_agent' => 'LBRY']), true);
        if ($apc)
        {
          apc_store($key, $releaseData, 600); // cache for 10 min
        }
      }
      catch (Exception $e)
      {
      }
    }

    if (!$releaseData)
    {
      return null;
    }

    foreach ($releaseData['assets'] as $asset)
    {
      if (
        ($os == static::OS_LINUX && in_array($asset['content_type'], ['application/x-debian-package', 'application/x-deb'])) ||
        ($os == static::OS_OSX && in_array($asset['content_type'], ['application/x-diskcopy', 'application/x-apple-diskimage']))
      )
      {
        return $asset['browser_download_url'];
      }
    }

    return null;
  }
}
