<?php

class Github
{
    const REPO_LBRY_DESKTOP = 'lbry-desktop';

    public static function isAssetForOs(array $asset, string $os)
    {
        $ext = pathinfo($asset['name'], PATHINFO_EXTENSION);
        switch($os)
        {
            case OS::OS_LINUX:
                return
                    in_array($ext, ['deb']) ||
                    in_array($asset['content_type'], ['application/x-debian-package', 'application/x-deb']) ||
                    stripos($asset['name'], 'linux') !== false;
            case OS::OS_OSX:
                return
                    in_array($ext, ['dmg', 'pkg']) ||
                    in_array($asset['content_type'], ['application/x-diskcopy', 'application/x-apple-diskimage']) ||
                    stripos($asset['name'], 'darwin') !== false ||
                    stripos($asset['name'], 'macos') !== false;
            case OS::OS_WINDOWS:
                return
                    in_array($ext, ['exe', 'msi']) ||
                    stripos($asset['name'], 'windows') !== false;
            case OS::OS_ANDROID:
                return
                    in_array($ext, ['apk']) ||
                    stripos($asset['name'], 'android') !== false;
        }
    }

    protected static function findReleaseAssetForOs(array $release, string $os)
    {
        if (!in_array($os, array_keys(OS::getAll()))) {
            throw new DomainException('Unknown OS');
        }

        if (!isset($release['assets'])) {
            throw new Exception('Release array missing assets - possible GitHub auth failure, auth limit, and/or inspect releases array');
        }

        foreach ($release['assets'] as $asset) {
            if (static::isAssetForOs($asset, $os)) {
                return $asset;
            }
        }
    }

    public static function getRepoRelease($repo, $prerelease = false, $cache = true)
    {
        $endpoint = '/repos/lbryio/' . $repo . '/releases';
        if (!$prerelease) {
            $endpoint .= '/latest';
        }

        try {
            $releases = static::get($endpoint, [], $cache);
            return $prerelease ? $releases[0] : $releases;
        } catch (Exception $e) {
        }

        return null;
    }

    public static function getRepoAsset($repo, $os, $prerelease = false, $cache = true)
    {
        $release = static::getRepoRelease($repo, $prerelease, $cache);
        return $release ? static::findReleaseAssetForOs($release, $os) : null;
    }


    public static function getRepoReleaseUrl($repo, $os, bool $prerelease = false, $cache = true)
    {
        $asset = static::getRepoAsset($repo, $os, $prerelease, $cache);
        return $asset ? $asset['browser_download_url'] : null;
    }

    public static function get($endpoint, array $params = [], $cache = true)
    {
        $twoHoursInSeconds = 7200;
        if (Config::get(Config::GITHUB_APP_CLIENT_ID) && Config::get(Config::GITHUB_APP_CLIENT_SECRET))
        {
            $params['client_id'] = Config::get(Config::GITHUB_APP_CLIENT_ID);
            $params['client_secret'] = Config::Get(Config::GITHUB_APP_CLIENT_SECRET);
        }
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

        $projects = ['lbry' => 'LBRY Protocol', 'lbry-desktop' => 'LBRY App'];

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
