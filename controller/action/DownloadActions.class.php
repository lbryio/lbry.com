<?php

/**
 * Description of DownloadActions
 *
 * @author jeremy
 */

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
      static::OS_OSX => ['/osx', 'OS X', 'icon-apple', '_osx'],
      static::OS_LINUX => ['/linux', 'Linux', 'icon-linux', '_linux'],
      static::OS_ANDROID => ['/android', 'Android', 'icon-android', '_android'],
      static::OS_IOS => ['/ios', 'iOS', 'icon-mobile', '_ios']
    ];
  }

  public static function executeGet()
  {
    if (static::param('e'))
    {
      if (!filter_var(static::param('e'), FILTER_VALIDATE_EMAIL) || !static::findInPrefinery(static::param('e')))
      {
        Session::unsetKey(Session::KEY_PREFINERY_USER_ID);
        Session::unsetKey(Session::KEY_DOWNLOAD_ALLOWED);
      }
    }

    if (Session::get(Session::KEY_DOWNLOAD_ALLOWED))
    {
      return static::executeGetAccepted();
    }

    $os = static::guessOs();
    return ['download/get', [
      'os' => $os
    ]];
  }


  public static function executeGetAccepted()
  {
    $osChoices = static::getOses();
    $os = static::guessOs();

    if ($os && isset($osChoices[$os]))
    {
      list($uri, $osTitle, $osIcon, $partial) = $osChoices[$os];
      return ['download/getAllowed', [
        'os' => $os,
        'osTitle' => $osTitle,
        'osIcon' => $osIcon,
        'prefineryUser' => Session::get(Session::KEY_PREFINERY_USER_ID) ? Prefinery::findTesterById(Session::get(Session::KEY_PREFINERY_USER_ID)) : [],
        'downloadHtml' => View::exists('download/' . $partial) ?
          View::render('download/' . $partial, ['downloadUrl' => static::getDownloadUrl($os)]) :
          false
      ]];
    }

    return ['download/get-no-os'];
  }

  public static function executeSignup()
  {
    $email = static::param('email');
    $code = static::param('code');

    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      Session::set(Session::KEY_DOWNLOAD_ACCESS_ERROR, 'Please provide a valid email. You provided: ' . $email);
    }
    else
    {
      $referrerId = isset($_GET['referrer_id']) ? $_GET['referrer_id'] : (isset($_POST['referrer_id']) ? $_POST['referrer_id'] : null);
      $failure = false;
      try
      {
        MailActions::subscribeToMailchimp($email, Mailchimp::LIST_GENERAL_ID);
      }
      catch (MailchimpSubscribeException $e)
      {
      }
      try
      {
        static::subscribeToPrefinery($email, $code, $referrerId);
      }
      catch (PrefineryException $e)
      {
        $failure = true;
      }

      if ($failure)
      {
        Session::set(Session::KEY_DOWNLOAD_ALLOWED, false);
        Session::set(Session::KEY_DOWNLOAD_ACCESS_ERROR,
          'We were unable to add you to the wait list. Received error "' . $e->getMessage() . '". Please contact ' . Config::HELP_CONTACT_EMAIL . ' if you think this is a mistake.' );
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
      'defaultEmail' => static::param('e'),
      'allowInviteCode' => true,
      'referralCode' => static::param('r', '')
    ];
  }

  protected static function registerPrefineryUser($userData, $checkin = true)
  {
    Session::set(Session::KEY_DOWNLOAD_ALLOWED, in_array($userData['status'], ['active', 'invited']));
    Session::set(Session::KEY_PREFINERY_USER_ID, $userData['id']);

    if ($checkin)
    {
//check-in changes status and should not be used
//      Prefinery::checkIn($userData['id']);
    }
  }

  public static function findInPrefinery($emailOrId)
  {
    $userData = is_numeric($emailOrId) ? Prefinery::findTesterById($emailOrId) : Prefinery::findTesterByEmail($emailOrId);

    if ($userData)
    {
      static::registerPrefineryUser($userData);
    }

    return (boolean)$userData;
  }

  public static function subscribeToPrefinery($email, $inviteCode = null, $referrerId = null)
  {
    if (!static::findInPrefinery($email))
    {
      $userData = Prefinery::createTester(array_filter([
        'email'           => $email,
        'status'          => $inviteCode ? 'invited' : 'applied',
        'invitation_code' => $inviteCode,
        'referrer_id'     => $referrerId,
        'profile'         => ['ip' => $_SERVER['REMOTE_ADDR'], 'user_agent' => $_SERVER['HTTP_USER_AGENT']]
      ]));

      static::registerPrefineryUser($userData, false);
    }
  }

  public static function prepareReferPartial(array $vars)
  {
    if (!Session::get(Session::KEY_PREFINERY_USER_ID))
    {
      return null;
    }

    $prefineryUser = Prefinery::findTesterById(Session::get(Session::KEY_PREFINERY_USER_ID));

    preg_match('/\?r\=(\w+)/', $prefineryUser['share_link'], $matches);

    return $vars + [
      'prefineryUser' => $prefineryUser,
      'referralCode' => $matches[1] ?: 'unknown'
    ];
  }

  protected static function guessOs()
  {
    //if exact OS is requested, use that
    $uri = strtok($_SERVER['REQUEST_URI'], '?');
    foreach(static::getOses() as $os => $osChoice)
    {
      if ($osChoice[0] == $uri)
      {
        return $os;
      }
    }

    if (static::isForRobot())
    {
      return null;
    }

    //otherwise guess from UA
    $ua = $_SERVER['HTTP_USER_AGENT'];
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

  protected static function getDownloadUrl($os, $useCache = true)
  {
    if (!in_array($os, array_keys(static::getOses())))
    {
      throw new DomainException('Unknown OS');
    }

    $apc = $useCache && extension_loaded('apc') && ini_get('apc.enabled');
    $key = 'lbry_release_data';
    $releaseData = null;

    if ($apc)
    {
      $releaseData = apc_fetch($key);
    }

    if (!$releaseData)
    {
      try
      {
        $releaseData = json_decode(Curl::get('https://api.github.com/repos/lbryio/lbry/releases/latest', [], ['user_agent' => 'LBRY']), true);
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

    foreach($releaseData['assets'] as $asset)
    {
      if ($os == static::OS_LINUX && in_array($asset['content_type'], ['application/x-debian-package', 'application/x-deb']) ||
          $os == static::OS_OSX && $asset['content_type'] == 'application/x-diskcopy')
      {
        return $asset['browser_download_url'];
      }
    }

    return null;
  }
}
