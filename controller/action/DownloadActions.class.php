<?php

/**
 * Description of DownloadActions
 *
 * @author jeremy
 */
class DownloadActions extends Actions
{
  const OS_LINUX = 'linux',
        OS_WINDOWS = 'windows',
        OS_OSX = 'osx',
        OS_ANDROID = 'android',
        OS_IOS = 'ios';

  public static function getOses()
  {
    return [
      static::OS_LINUX => ['/linux', 'Linux', 'icon-linux', '_linux'],
      static::OS_ANDROID => ['/android', 'Android', 'icon-android', '_android'],
      static::OS_OSX => ['/osx', 'OS X', 'icon-apple', '_osx'],
      static::OS_WINDOWS => ['/windows', 'Windows', 'icon-windows', '_windows'],
      static::OS_IOS => ['/ios', 'iOS', 'icon-ios', '_ios']
    ];
  }

  public static function executeGet()
  {
    $osChoices = static::getOses();
    $os = static::guessOs();
    if (isset($osChoices[$os]))
    {
      list($uri, $osTitle, $osIcon, $partial) = $osChoices[$os];
      return ['download/get2', [
        'os' => $os,
        'osTitle' => $osTitle,
        'osIcon' => $osIcon,
        'downloadHtml' => View::exists('download/' . $partial) ?
            View::render('download/' . $partial) :
            false
      ]];
    }
    return ['download/get', [
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

  //implement me!
  protected static function guessOs()
  {
    $uri = strtok($_SERVER['REQUEST_URI'], '?');
    foreach(static::getOses() as $os => $osChoice)
    {
      if ($osChoice[0] == $uri)
      {
        return $os;
      }
    }
//    $oses = ['linux', 'windows', 'osx', 'ios', 'android'];
    $oses = ['linux', 'windows', 'osx'];
    return $oses[rand(0, count($oses) - 1)];
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
