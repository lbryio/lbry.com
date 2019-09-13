<?php

class DownloadActions extends Actions
{
    //bad, fix me!
    const ANDROID_STORE_URL = 'https://play.google.com/store/apps/details?id=io.lbry.browser';

    public static function executeDownloadPrereleaseAsset(string $repo, string $ext)
    {
        return static::executeDownloadReleaseAsset($repo, $ext, true);
    }

    public static function executeDownloadReleaseAsset(string $repo, string $ext, bool $allowPrerelease = false)
    {
        return Controller::redirect(GitHub::getRepoReleaseUrl($repo, OS::getOsForExtension($ext), $allowPrerelease) ?: '/get', 302);
    }

    public static function executeDownloadSnapshot(string $type)
    {
        if (!in_array($type, ['blockchain', 'wallet'])) {
          return ['page/404'];
        }

        $bucketName = "snapshots.lbry.com";
        $bucket = S3::getBucket($bucketName, "$type/");

        if (!count($bucket)) {
          return ['page/404'];
        }

        ksort($bucket);

        return Controller::redirect("http://$bucketName/" . array_keys($bucket)[0], 302);
    }
    /*
     * this is a quick fix to add android, prob not proper design
     */
    public static function getGetTemplateParams($os)
    {
      $osChoices = OS::getAll();
      list($uri, $osTitle, $osIcon) = $osChoices[$os];
      $params = [
        'osTitle' => $osTitle,
        'osIcon' => $osIcon,
        'osScreenshotSrc' => 'https://spee.ch/b/desktop-035-og.jpeg',
        'os' => $os
      ];

      if ($os === OS::OS_ANDROID)
      {
        $params['downloadUrl'] = static::ANDROID_STORE_URL;
        $params['osScreenshotSrc'] = 'https://spee.ch/@lbry:3f/android-08-homepage.gif';
      }
      else
      {
        $asset = Github::getRepoAsset(GitHub::REPO_LBRY_DESKTOP, $os);
        $params['downloadUrl'] = $asset ? $asset['browser_download_url'] : null;
      }

      return $params;
    }

    public static function executeGet()
    {
        $osChoices = OS::getAll();

        $os = static::guessOS();

        if (isset($os) && isset($osChoices[$os]) && !Request::getParam('showall')) {
            return ['download/get', static::getGetTemplateParams($os)];
        } else {
            return ['download/get-no-os'];
        }
    }

    public static function prepareListPartial(array $vars)
    {
        return $vars + ['osChoices' => isset($vars['excludeOs']) ?
      array_diff_key(OS::getAll(), [$vars['excludeOs'] => null]) :
      OS::getAll()
    ];
    }

    protected static function guessOs()
    {
        //if exact OS is requested, use that
        $uri = Request::getRelativeUri();
        foreach (OS::getAll() as $os => $osChoice) {
            if ($osChoice[0] == $uri) {
                return $os;
            }
        }

        if (Request::isRobot()) {
            return null;
        }

        //otherwise guess from UA
        $ua = Request::getUserAgent();
        if (stripos($ua, 'OS X') !== false) {
            return strpos($ua, 'iPhone') !== false || stripos($ua, 'iPad') !== false ? OS::OS_IOS : OS::OS_OSX;
        }
        if (stripos($ua, 'Linux') !== false || strpos($ua, 'X11') !== false) {
            return strpos($ua, 'Android') !== false ? OS::OS_ANDROID : OS::OS_LINUX;
        }
        if (stripos($ua, 'Windows') !== false) {
            return OS::OS_WINDOWS;
        }
    }

    protected static function getEmailParam()
    {
        $email = Request::getParam('e');

        if (!$email) {
            $encoded = Request::getParam('ec');
            if ($encoded) {
                $email = Smaz::decode(Encoding::base64DecodeUrlsafe($encoded), Smaz::CODEBOOK_EMAIL);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email = null;
                }
            }
        }

        return $email;
    }

    public static function prepareDownloadButtonPartial(array $vars)
    {
        $osChoices = OS::getAll();

        $os = static::guessOS();

        if ($os && isset($osChoices[$os])) {
            list($uri, $osTitle, $osIcon, $buttonLabel, $analyticsLabel) = $osChoices[$os];

            if ($os !== OS::OS_ANDROID) {
              $asset = Github::getRepoAsset(GitHub::REPO_LBRY_DESKTOP, $os);
            } else {
              $asset = ['browser_download_url' => static::ANDROID_STORE_URL];
            }

          $vars += [
            'analyticsLabel' => $analyticsLabel,
            'buttonLabel' => $buttonLabel,
            'downloadUrl' => $asset ? $asset['browser_download_url'] : null,
            'os' => $os,
            'isAuto' => Request::getParam('auto'),
          ];
        }

        return $vars;
    }


  public static function prepareMetaPartial(array $vars)
  {
    $osChoices = OS::getAll();

    $os = static::guessOS();

    if ($os && isset($osChoices[$os])) {
      list($uri, $osTitle, $osIcon, $buttonLabel, $analyticsLabel) = $osChoices[$os];

      if ($os !== OS::OS_ANDROID) {
        $release = Github::getRepoRelease(GitHub::REPO_LBRY_DESKTOP, false);
        $asset = Github::getRepoAsset(GitHub::REPO_LBRY_DESKTOP, $os);
      } else {
        $asset = ['browser_download_url' => static::ANDROID_STORE_URL, 'size' => 0];
        $release = [];
      }

      $vars += [
        'os' => $os,
        'osTitle' => $osTitle,
        'osIcon' => $osIcon,
        'releaseTimestamp' => $release ? strtotime($release['created_at']) : null,
        'size' => $asset ? $asset['size'] / (1024 * 1024) : 0, //bytes -> MB
        'sourceLink' => false,
        'version' => $release ? $release['name'] : null,
        'isAuto' => Request::getParam('auto'),
      ];
    }

    return $vars;
  }
}
