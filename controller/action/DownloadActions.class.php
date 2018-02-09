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
    return ['download/get', static::prepareDownloadInformation()];
  }

  public static function prepareListPartial(array $vars)
  {
    return $vars + ['osChoices' => isset($vars['excludeOs']) ?
      array_diff_key(OS::getAll(), [$vars['excludeOs'] => null]) :
      OS::getAll()
    ];
  }

  public static function prepareButtonPartial() {
    if (static::prepareDownloadInformation()) {
      return static::prepareDownloadInformation();
    }
    return [];
  }

  public static function prepareDownloadInformation() {
    $osChoices = OS::getAll();
    $os        = static::guessOs();

    if ($os && isset($osChoices[$os]))
    {
      list($uri, $osTitle, $osIcon, $buttonLabel, $analyticsLabel) = $osChoices[$os];
      $release = GitHub::getAppRelease();
      $asset = GitHub::getAppAsset($os);
      return [
        'analyticsLabel' => $analyticsLabel,
        'buttonLabel' => $buttonLabel,
        'downloadUrl' => $asset ? $asset['browser_download_url'] : null,
        'isAuto'      => Request::getParam('auto'),
        'os'          => $os,
        'osTitle'     => $osTitle,
        'osIcon'      => $osIcon,
        'releaseTimestamp' => $release ? strtotime($release['created_at']) : null,
        'size'        => $asset ? $asset['size'] / ( 1024 * 1024 ) : 0, //bytes -> MB
        'version'     => $release ? $release['name'] : null,
      ];
    }

    return [
      'os' => $os
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
