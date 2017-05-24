<?php

class Github
{
  protected static function findReleaseDownloadUrl(array $release, string $os)
  {
    if (!in_array($os, array_keys(OS::getAll())))
    {
      throw new DomainException('Unknown OS');
    }

    foreach ($release['assets'] as $asset)
    {
      $ext = substr($asset['name'], -4);
      if (
        ($os == OS::OS_LINUX &&
         ($ext == '.deb' || in_array($asset['content_type'], ['application/x-debian-package', 'application/x-deb']))) ||
        ($os == OS::OS_OSX &&
         ($ext == '.dmg' || in_array($asset['content_type'], ['application/x-diskcopy', 'application/x-apple-diskimage']))) ||
        ($os == OS::OS_WINDOWS && $ext == '.exe')
      )
      {
        return $asset['browser_download_url'];
      }
    }
  }

  public static function getAppDownloadUrl($os, $cache = true)
  {
    try
    {
      $release = static::get('/repos/lbryio/lbry-app/releases/latest', $cache);
      if ($release)
      {
        return static::findReleaseDownloadUrl($release, $os);
      }
    }
    catch (Exception $e)
    {
    }

    return null;
  }

  public static function getAppPrereleaseDownloadUrl($os, $cache = true)
  {
    try
    {
      $releases = static::get('/repos/lbryio/lbry-app/releases', $cache);
      if (count($releases))
      {
        return static::findReleaseDownloadUrl($releases[0], $os);
      }
    }
    catch (Exception $e)
    {
    }

    return null;
  }


  public static function getDaemonReleaseProperty($os, $property, $isAssetProperty = false, $cache = true)
  {
    if (!in_array($os, array_keys(OS::getAll())))
    {
      throw new DomainException('Unknown OS');
    }

    try
    {
      $releaseData = static::get('/repos/lbryio/lbry/releases/latest', $cache);
      foreach ($releaseData['assets'] as $asset)
      {
        if (
          ($os == OS::OS_LINUX && stripos($asset['browser_download_url'], 'linux') !== false) ||
          ($os == OS::OS_OSX && stripos($asset['browser_download_url'], 'macos') !== false) ||
          ($os == OS::OS_WINDOWS && strpos($asset['browser_download_url'], 'windows') !== false)
        )
        {
          return $isAssetProperty ? $asset[$property] : $releaseData[$property];
        }
      }
    }
    catch (Exception $e)
    {
    }

    return null;
  }

  public static function getDaemonDownloadUrl($os, $cache = true)
  {
    return static::getDaemonReleaseProperty($os, 'browser_download_url', true);
  }

  public static function get($endpoint, $cache = true)
  {
    $twoHoursInSeconds = 7200;
    return CurlWithCache::get('https://api.github.com' . $endpoint, [],
      ['user_agent' => 'LBRY', 'json_response' => true, 'cache' => $cache === true ? $twoHoursInSeconds : $cache]);
  }

  public static function listRoadmapChangesets($cache = true)
  {
    $sets        = [];
    $allReleases = [];

    $project = 'lbry';
    $page    = 1;

    do
    {
      $releases = static::get('/repos/lbryio/' . $project . '/releases?page=' . $page, $cache);
      $page++;
      $allReleases = array_merge($allReleases, array_map(function ($release) use ($project)
      {
        return $release + ['project' => $project];
      }, array_filter($releases, function ($release)
      {
        return ($release['tag_name'] ?? null) && ($release['published_at'] ?? null) && !$release['prerelease'];
      })));
    } while (count($releases) >= 30);

    foreach ($allReleases as $release)
    {
      $group   = null;
      $matches = null;
      if (preg_match('/^v(\d+)\.(\d+)\./', $release['tag_name'] ?? '', $matches))
      {
        $group = 'v' . $matches[1] . '.' . $matches[2];
      }
      if ($group)
      {
        $sets[$group][] = [
          'project'    => $release['project'],
          'date'       => date('Y-m-d', strtotime($release['created_at'])),
          'created_at' => $release['created_at'],
          'name'       => $release['name'] ?: $release['tag_name'],
          'url'        => $release['html_url'],
          'version'    => $release['tag_name'],
          'body'       => ParsedownExtra::instance()->text($release['body'])
        ];
      }
    }

    uasort($sets, function ($sA, $sB) { return $sA[0]['created_at'] <=> $sB[0]['created_at']; });
    foreach ($sets as $group => &$groupSet)
    {
      usort($groupSet, function ($rA, $rB) { return $rA['created_at'] <=> $rB['created_at']; });
    }

    return $sets;
  }
}