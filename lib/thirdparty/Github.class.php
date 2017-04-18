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
        ($os == OS::OS_LINUX && ($ext == '.deb' || in_array($asset['content_type'], ['application/x-debian-package', 'application/x-deb']))) ||
        ($os == OS::OS_OSX && ($ext == '.dmg' || in_array($asset['content_type'], ['application/x-diskcopy', 'application/x-apple-diskimage']))) ||
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
    $page = 1;

    do
    {
      $releases = static::get('/repos/lbryio/' . $project . '/releases?page=' . $page, $cache);
      $page++;
      $allReleases = array_merge($allReleases, array_map(function ($release) use ($project)
      {
        return $release + ['project' => $project];
      }, array_filter($releases, function ($release)
      {
        return isset($release['tag_name']) && isset($release['published_at']) && $release['published_at'];
      })));
    } while (count($releases) >= 30);

    foreach ($allReleases as $release)
    {
      $group   = null;
      $matches = null;
      if (isset($release['tag_name']) && preg_match('/v(\d+)\.(\d+).?(\d+)?/', $release['tag_name'], $matches))
      {
        $group = 'v' . $matches[1] . '.' . $matches[2];
      }
      if ($group)
      {
        $sets[$group][] = array_intersect_key($release, [
            'prerelease' => null, 'tag_name' => null, 'published_at' => null, 'project' => null
          ]) + [
            'date'          => date('Y-m-d', strtotime($release['created_at'])),
            //I thought published_at, but GitHub displays created_at and published_at is out of sync sometimes (0.3.2, 0.3.3)
            'name'          => $release['name'] ?: $release['tag_name'],
          'url'             => $release['html_url'],
            'major_version' => $matches[1],
            'minor_version' => $matches[2],
            'patch_version' => isset($matches[3]) ? $matches[3] : null,
            'version'       => $matches[1] . '.' . $matches[2] . '.' . (isset($matches[3]) ? $matches[3] : ''),
            'body'          => ParsedownExtra::instance()->text($release['body'])
          ];
      }
    }

    uasort($sets, function ($sA, $sB)
    {
      if ($sA[0]['project'] != $sB[0]['project'])
      {
        return $sA[0]['project'] < $sB[0]['project'] ? -1 : 1;
      }
      if ($sA[0]['major_version'] != $sB[0]['major_version'])
      {
        return $sA[0]['major_version'] < $sB[0]['major_version'] ? -1 : 1;
      }
      if ($sA[0]['minor_version'] != $sB[0]['minor_version'])
      {
        return $sA[0]['minor_version'] < $sB[0]['minor_version'] ? -1 : 1;
      }
      return $sA[0]['patch_version'] < $sB[0]['patch_version'] ? -1 : 1;
    });

    foreach ($sets as $group => &$groupSet)
    {
      usort($groupSet, function ($rA, $rB) {
        if ($rA['major_version'] != $rB['major_version'])
        {
          return $rA['major_version'] < $rB['major_version'] ? -1 : 1;
        }
        if ($rA['minor_version'] != $rB['minor_version'])
        {
          return $rA['minor_version'] < $rB['minor_version'] ? -1 : 1;
        }
        return $rA['patch_version'] < $rB['patch_version'] ? -1 : 1;
      });
    }

    return $sets;
  }
}