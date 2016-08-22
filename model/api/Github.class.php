<?php

class Github
{
  public static function getDownloadUrl($os, $useCache = true)
  {
    if (!in_array($os, array_keys(Os::getAll())))
    {
      throw new DomainException('Unknown OS');
    }

    try
    {
      $releaseData =  static::get('/repos/lbryio/lbry/releases/latest');
      foreach ($releaseData['assets'] as $asset)
      {
        if (
          ($os == Os::OS_LINUX && in_array($asset['content_type'], ['application/x-debian-package', 'application/x-deb'])) ||
          ($os == Os::OS_OSX && in_array($asset['content_type'], ['application/x-diskcopy', 'application/x-apple-diskimage']))
        )
        {
          return $asset['browser_download_url'];
        }
      }
    }
    catch (Exception $e)
    {
    }

    return null;
  }

  public static function get($endpoint)
  {
    return Curl::get('https://api.github.com' . $endpoint, [], ['user_agent' => 'LBRY', 'json_response' => true, 'cache' => true]);
  }

  public static function listRoadmapChangesets()
  {
    $sets = [];

    $page = 1;
    $allReleases = [];

    do
    {
      $releases = static::get('/repos/lbryio/lbry/releases?page=' . $page);
      $page++;
      $allReleases = array_merge($allReleases, array_filter($releases, function($release) {
        return isset($release['tag_name']) && isset($release['published_at']) && $release['published_at'];
      }));
    } while (count($releases) >= 30);

//    echo '<pre>';
//    print_r($allReleases);
//    echo '</pre>';
//    die();

    foreach($allReleases as $release)
    {
      $group = null;
      $matches = null;
      if (isset($release['tag_name']) && preg_match('/v(\d+)\.(\d+).?(\d+)?/', $release['tag_name'], $matches))
      {
        $group = $matches[1] . '.' . $matches[2];
      }
      if ($group)
      {
        $sets[$group][] = array_intersect_key($release, ['prerelease' => null, 'tag_name' => null, 'published_at' => null]) + [
            'date' => date('Y-m-d', strtotime($release['created_at'])), //I thought published_at, but GitHub displays created_at and published_at is out of sync sometimes (0.3.2, 0.3.3)
            'name' => $release['name'] ?: $release['tag_name'],
            'major_version' => $matches[1],
            'minor_version' => $matches[2],
            'patch_version' => isset($matches[3]) ? $matches[3] : null,
            'body'         => ParsedownExtra::instance()->text($release['body'])
        ];
      }
    }

    uasort($sets, function($sA, $sB) {
      if ($sA[0]['major_version'] != $sB[0]['major_version'])
      {
        return $sA[0]['major_version'] < $sB[0]['major_version'] ? -1 : 1;
      }
      return $sA[0]['minor_version'] < $sB[0]['minor_version'] ? -1 : 1;
    });

    foreach($sets as $group => &$groupSet)
    {
      usort($groupSet, function($rA, $rB) {
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