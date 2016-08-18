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
    return Curl::get('https://api.github.com' . $endpoint, [], ['user_agent' => 'LBRY', 'json_response' => true, 'cache' => false]);
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
      $allReleases = array_merge($allReleases, $releases);
    } while (count($releases) >= 30);

    usort($allReleases, function($rA, $rB) {
      if ($rA['prerelease'] xor $rB['prerelease'])
      {
        return $rA['prerelease'] ? -1 : 1;
      }
      return $rA['tag_name'] < $rB['tag_name'];
    });

    foreach($allReleases as $release)
    {
//      static::get('/repos/lbryio/lbry/releases')
      $sets[$release['tag_name']] = array_intersect_key($release, ['prerelease' => null]) + [
        'published_at' => date('Y-m-d', strtotime($release['published_at'])),
        'body' =>  ParsedownExtra::instance()->text($release['body'])
      ];
    }

    return $sets;
  }
}