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
          ($os == Os::OS_OSX && in_array($asset['content_type'], ['application/x-diskcopy', 'application/x-apple-diskimage'])) ||
          ($os == Os::OS_WINDOWS && substr($asset['name'], -4) == '.msi')
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

  public static function get($endpoint, $cache = true)
  {
    return Curl::get('https://api.github.com' . $endpoint, [], ['user_agent' => 'LBRY', 'json_response' => true, 'cache' => $cache]);
  }

  public static function listRoadmapChangesets($cache = true)
  {
    $sets = [];
    $allReleases = [];

    $projects = [
      'lbry' => ''
    ];

    foreach($projects as $project => $label)
    {
      $page = 1;
      do
      {
        $releases = static::get('/repos/lbryio/' . $project . '/releases?page=' . $page, $cache);
        $page++;
        $allReleases = array_merge($allReleases, array_map(function($release) use($label, $project) {
          return $release + ['project_label' => $label, 'project' => $project];
        }, array_filter($releases, function ($release) {
          return isset($release['tag_name']) && isset($release['published_at']) && $release['published_at'] && $release['tag_name'] != 'v0.4.0';
        })));
      } while (count($releases) >= 30);
    }

    foreach($allReleases as $release)
    {
      $group = null;
      $matches = null;
      if (isset($release['tag_name']) && preg_match('/v(\d+)\.(\d+).?(\d+)?/', $release['tag_name'], $matches))
      {
        $group = $release['project_label'] . ' v' . $matches[1] . '.' . $matches[2];
      }
      if ($group)
      {
        $sets[$group][] = array_intersect_key($release, ['prerelease' => null, 'tag_name' => null, 'published_at' => null, 'project' => null, 'project_label' => null]) + [
            'date' => date('Y-m-d', strtotime($release['created_at'])), //I thought published_at, but GitHub displays created_at and published_at is out of sync sometimes (0.3.2, 0.3.3)
            'name' => $release['name'] ?: $release['tag_name'],
            'github_url' => $release['url'],
            'major_version' => $matches[1],
            'minor_version' => $matches[2],
            'patch_version' => isset($matches[3]) ? $matches[3] : null,
            'version' => $matches[1] . '.' . $matches[2] . '.' . (isset($matches[3]) ? $matches[3] : ''),
            'body' => ParsedownExtra::instance()->text($release['body'])
        ];
      }
    }

    uasort($sets, function($sA, $sB) {
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