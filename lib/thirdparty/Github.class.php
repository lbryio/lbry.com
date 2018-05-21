<?php

class Github
{
    protected static function findReleaseAssetForOs(array $release, string $os)
    {
        if (!in_array($os, array_keys(OS::getAll()))) {
            throw new DomainException('Unknown OS');
        }

        foreach ($release['assets'] as $asset) {
            $ext = substr($asset['name'], -4);
            if (
        ($os == OS::OS_LINUX &&
          ($ext == '.deb' || in_array($asset['content_type'], ['application/x-debian-package', 'application/x-deb']))) ||
        ($os == OS::OS_OSX &&
          ($ext == '.dmg' || in_array($asset['content_type'], ['application/x-diskcopy', 'application/x-apple-diskimage']))) ||
        ($os == OS::OS_WINDOWS && $ext == '.exe')
      ) {
                return $asset;
            }
        }
    }

    public static function getAppRelease($cache = true)
    {
        try {
            return static::get('/repos/lbryio/lbry-app/releases/latest', [], $cache);
        } catch (Exception $e) {
        }

        return null;
    }

    public static function getAppAsset($os, $cache = true)
    {
        $release = static::getAppRelease($cache);
        return $release ? static::findReleaseAssetForOs($release, $os) : null;
    }


    public static function getAppDownloadUrl($os, $cache = true)
    {
        $asset = static::getAppAsset($os, $cache);
        return $asset ? $asset['browser_download_url'] : null;
    }

    public static function getAppPrereleaseDownloadUrl($os, $cache = true)
    {
        try {
            $releases = static::get('/repos/lbryio/lbry-app/releases', [], $cache);
            if (count($releases)) {
                $asset = static::findReleaseAssetForOs($releases[0], $os);
                return $asset ? $asset['browser_download_url'] : null;
            }
        } catch (Exception $e) {
        }

        return null;
    }


    public static function getDaemonReleaseProperty($os, $property, $isAssetProperty = false, $cache = true)
    {
        if (!in_array($os, array_keys(OS::getAll()))) {
            throw new DomainException('Unknown OS');
        }

        try {
            $releaseData = static::get('/repos/lbryio/lbry/releases/latest', [], $cache);
            foreach ($releaseData['assets'] as $asset) {
                if (
          ($os == OS::OS_LINUX && stripos($asset['browser_download_url'], 'linux') !== false) ||
          ($os == OS::OS_OSX && stripos($asset['browser_download_url'], 'macos') !== false) ||
          ($os == OS::OS_WINDOWS && strpos($asset['browser_download_url'], 'windows') !== false)
        ) {
                    return $isAssetProperty ? $asset[$property] : $releaseData[$property];
                }
            }
        } catch (Exception $e) {
        }

        return null;
    }

    public static function getDaemonDownloadUrl($os, $cache = true)
    {
        return static::getDaemonReleaseProperty($os, 'browser_download_url', true);
    }

    public static function get($endpoint, array $params = [], $cache = true)
    {
        $twoHoursInSeconds = 7200;
        return CurlWithCache::get(
        'https://api.github.com' . $endpoint . '?' . http_build_query($params),
        [],
      ['headers' => ['Accept: application/vnd.github.v3.html+json'],'user_agent' => 'LBRY', 'json_response' => true, 'cache' => $cache === true ? $twoHoursInSeconds : $cache]
    );
    }

    public static function listRoadmapChangesets($cache = true)
    {
        $sets        = [];
        $allReleases = [];

        $projects = ['lbry' => 'LBRY Protocol', 'lbry-app' => 'LBRY App'];

        foreach ($projects as $project => $projectLabel) {
            $page = 1;
            do {
                $releases = static::get('/repos/lbryio/' . $project . '/releases', ['page' => $page], $cache);
                $page++;
                $allReleases = array_merge($allReleases, array_map(function ($release) use ($project, $projectLabel) {
                    return $release + ['project' => $projectLabel];
                }, array_filter($releases, function ($release) {
                    return isset($release['tag_name']) && isset($release['published_at']) && $release['published_at'];
                })));
            } while (count($releases) >= 30);
        }

        /**
         * This logic is likely overly convoluted at this point. It used to group releases by project before going
         * to strictly by time. - Jeremy
         */

        foreach ($allReleases as $release) {
            $group   = null;
            $matches = null;
            if (preg_match('/^v(\d+)\.(\d+)\./', $release['tag_name'] ?? '', $matches)) {
                $group = $release['project'] . ' v' . $matches[1] . '.' . $matches[2];
            }
            if ($group) {
                $sets[$group][] = array_intersect_key($release, [
            'prerelease' => null, 'tag_name' => null, 'published_at' => null, 'project' => null
          ]) + [
            'created_at'    => strtotime($release['created_at']),
            'date'          => date('Y-m-d', strtotime($release['created_at'])),
            //I thought published_at, but GitHub displays created_at and published_at is out of sync sometimes (0.3.2, 0.3.3)
            'name'          => $release['name'] ?: $release['tag_name'],
            'url'           => $release['html_url'],
            'major_version' => (int)$matches[1],
            'minor_version' => (int)$matches[2],
            'patch_version' => (int)isset($matches[3]) ? $matches[3] : 0,
            'sort_key'      => (int)$matches[1] * 1000000 + (int)$matches[2] * 1000 + (int)($matches[3] ?? 0),
            'version'       => $matches[1] . '.' . $matches[2] . '.' . (isset($matches[3]) ? $matches[3] : ''),
            'body'          => $release['body_html']
          ];
            }
        }

        uasort($sets, function ($sA, $sB) {
            if ($sA[0]['project'] != $sB[0]['project']) {
                return $sA[0]['project'] < $sB[0]['project'] ? -1 : 1;
            }
            return $sB[0]['sort_key'] <=> $sA[0]['sort_key'];
        });

        foreach ($sets as $group => &$groupSet) {
            usort($groupSet, function ($rA, $rB) {
                return $rB['created_at'] <=> $rA['created_at'];
            });
        }

        return $sets;
    }
}
