<?php

/**
 * Description of DownloadActions
 *
 * @author jeremy
 */

class PrefinerySubscribeException extends Exception {}

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
      $inviteCode = Session::get(Session::KEY_DOWNLOAD_REFERRAL_CODE);
      return ['download/getAllowed', [
        'inviteCode' => $inviteCode,
        'os' => $os,
        'osTitle' => $osTitle,
        'osIcon' => $osIcon,
        'downloadHtml' => View::exists('download/' . $partial) ?
          View::render('download/' . $partial, ['downloadUrl' => static::getDownloadUrl($os)]) :
          false
      ]];
    }

    return ['download/get-no-os'];
  }

  public static function executeSignup()
  {
    $email = isset($_GET['email']) ? $_GET['email'] : (isset($_POST['email']) ? $_POST['email'] : null);
    $code = isset($_GET['code']) ? $_GET['code'] : (isset($_POST['code']) ? $_POST['code'] : null);

    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      Session::set(Session::KEY_DOWNLOAD_ACCESS_ERROR, 'Please provide a valid email. You provided: ' . $email);
    }
    elseif ($code)
    {
      try
      {
        static::subscribeToPrefinery($email, $code);
        Session::set(Session::KEY_DOWNLOAD_ALLOWED, true);
      }
      catch (PrefinerySubscribeException $e)
      {
        Session::set(Session::KEY_DOWNLOAD_ACCESS_ERROR, 'Your code is not valid. If you believe this is an error, please contact ' . Config::HELP_CONTACT_EMAIL);
      }
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
        static::subscribeToPrefinery($email, null, $referrerId);
      }
      catch (PrefinerySubscribeException $e)
      {
        $failure = true;
      }

      if ($failure)
      {
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

  public static function subscribeToPrefinery($email, $inviteCode = null, $referrerId = null)
  {
    $apiKey = Config::get('prefinery_key');
    $options = [
      'headers' => [
        'Accept: application/json',
        'Content-type: application/json'
      ],
      'json_post' => true
    ];

    $listUrl = 'https://lbry.prefinery.com/api/v2/betas/8679/testers.json?api_key=' . $apiKey;

    $body = Curl::get($listUrl, ['email' => $email], $options);

    if (!$body)
    {
      throw new PrefinerySubscribeException('Empty cURL response.');
    }

    $data = json_decode($body, true);

    if ($data && is_array($data) && count($data) && isset($data[0]['share_link']))
    {
      $shareLink = $data[0]['share_link'];
    }
    else
    {
      $createUrl = 'https://lbry.prefinery.com/api/v2/betas/8679/testers.json?api_key=' . $apiKey;

      $params = [
        'tester' => array_filter([
          'email'           => $email,
          'status'          => $inviteCode ? 'active' : 'applied',
          'invitation_code' => $inviteCode,
          'referrer_id'     => $referrerId,
          'profile' => ['ip' => $_SERVER['REMOTE_ADDR']]
        ])
      ];

      $body = Curl::post($createUrl, $params, $options);

      if (!$body)
      {
        throw new PrefinerySubscribeException('Empty cURL response.');
      }

      $data = json_decode($body, true);

      if (!$data)
      {
        throw new PrefinerySubscribeException('Received empty response.');
      }
      else if (isset($data['errors']))
      {
        throw new PrefinerySubscribeException(implode("\n", array_map(function($error) {
          return $error['message'];
        }, (array)$data['errors'])));
      }
      else if (!isset($data['share_link']))
      {
        throw new PrefinerySubscribeException('Missing share_link');
      }

      $shareLink = $data['share_link'];
    }

    preg_match('/\?r\=(\w+)/', $shareLink, $matches);
    Session::set(Session::KEY_DOWNLOAD_REFERRAL_CODE, $matches[1] ?: 'unknown');

    return true;
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
