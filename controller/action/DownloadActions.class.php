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
    $osChoices = static::getOses();
    $os = static::guessOs();

    if ($os && isset($osChoices[$os]))
    {
      list($uri, $osTitle, $osIcon, $partial) = $osChoices[$os];
      return ['download/get', [
        'os' => $os,
        'osTitle' => $osTitle,
        'osIcon' => $osIcon,
        'downloadHtml' => View::exists('download/' . $partial) ?
            View::render('download/' . $partial, ['downloadUrl' => static::getDownloadUrl($os)]) :
            false
      ]];
    }

    return ['download/get-no-os', [
        'isSubscribed' => in_array(Mailchimp::LIST_GENERAL_ID, Session::get(Session::KEY_MAILCHIMP_LIST_IDS, []))
    ]];
  }

  public static function prepareListPartial(array $vars)
  {
    return $vars + ['osChoices' => isset($vars['excludeOs']) ?
      array_diff_key(static::getOses(), [$vars['excludeOs'] => null]) :
      static::getOses()
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
      if ($os == static::OS_LINUX && $asset['content_type'] == 'application/x-debian-package' ||
          $os == static::OS_OSX && $asset['content_type'] == 'application/x-diskcopy')
      {
        return $asset['browser_download_url'];
      }
    }

    return null;
  }

//  protected static function validateDownloadAccess()
//  {
//    $seshionKey = 'has-get-access';
//    if (Session::get($seshionKey))
//    {
//      return true;
//    }
//
//    if ($_SERVER['REQUEST_METHOD'] === 'POST')
//    {
//      $accessCodes = include ROOT_DIR . '/data/secret/access_list.php';
//      $today = date('Y-m-d H:i:s');
//      foreach($accessCodes as $code => $date)
//      {
//        if ($_POST['invite'] == $code && $today <= $date)
//        {
//          Session::set($seshionKey, true);
//          Controller::redirect('/get', 302);
//        }
//      }
//
//      if ($_POST['invite'])
//      {
//        Session::set('invite_error', 'Please provide a valid invite code.');
//      }
//      else
//      {
//        Session::set('invite_error', 'Please provide an invite code.');
//      }
//
//      Controller::redirect('/get', 401);
//    }
//
//    return false;
//  }
}
