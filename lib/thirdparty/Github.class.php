<?php

class Github
{
    const REPO_LBRY_DESKTOP = 'lbry-desktop';

    public static function isAssetForOs(array $asset, string $os)
    {
        $ext = pathinfo($asset['name'], PATHINFO_EXTENSION);
        switch ($os) {
            case OS::OS_LINUX:
                return
                    in_array($ext, ['deb', 'AppImage']) ||
                    in_array($asset['content_type'], ['application/x-debian-package', 'application/x-deb']) ||
                    stripos($asset['name'], 'linux') !== false;
            case OS::OS_OSX:
                return
                    in_array($ext, ['dmg', 'pkg']) ||
                    in_array($asset['content_type'], ['application/x-diskcopy', 'application/x-apple-diskimage']) ||
                    stripos($asset['name'], 'darwin') !== false ||
                    stripos($asset['name'], 'mac') !== false;
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

    protected static function findReleaseAsset(array $release, string $os, string $preferredExt = '')
    {
        if (!in_array($os, array_keys(OS::getAll()))) {
            throw new DomainException('Unknown OS');
        }

        if (!isset($release['assets'])) {
            throw new Exception('Release array missing assets - possible GitHub auth failure, auth limit, and/or inspect releases array');
        }

        $bestAsset = null;
        foreach ($release['assets'] as $asset) {
            if (static::isAssetForOs($asset, $os)) {
              if (!$bestAsset) {
                $bestAsset = $asset;
              } else if ($os === Os::OS_LINUX) {
                $ext = pathinfo($asset['name'], PATHINFO_EXTENSION);
                if ($ext === $preferredExt || (!$preferredExt && $ext === 'AppImage')) {
                  $bestAsset = $asset;
                }
              }
            }
        }

        return $bestAsset;
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

    public static function getRepoAsset($repo, $os, $preferredExt = '', $prerelease = false, $cache = true)
    {
        $release = static::getRepoRelease($repo, $prerelease, $cache);
        return $release ? static::findReleaseAsset($release, $os, $preferredExt) : null;
    }


    public static function getRepoReleaseUrl($repo, $ext, bool $prerelease = false, $cache = true)
    {
        $os = OS::getOsForExtension($ext);
        $asset = static::getRepoAsset($repo, $os, $ext, $prerelease, $cache);
        return $asset ? $asset['browser_download_url'] : null;
    }

    public static function get($endpoint, array $params = [], $cache = true)
    {
        // return null; # for local development, this line allows for iterative development without hitting the GitHub API
        # disable above line for production

        $twoHoursInSeconds = 7200;
        $headers = ['Accept: application/vnd.github.v3.html+json'];
        if (Config::get(Config::GITHUB_PERSONAL_AUTH_TOKEN)) {
            $headers[] =  'Authorization: token ' . Config::get(Config::GITHUB_PERSONAL_AUTH_TOKEN);
        }

        return CurlWithCache::get(
        'https://api.github.com' . $endpoint . '?' . http_build_query($params),
        [],
      ['headers' => $headers, 'user_agent' => 'LBRY', 'json_response' => true, 'cache' => $cache === true ? $twoHoursInSeconds : $cache]
    );
    }

    public static function listRoadmapItems($year, $cache = true)
    {
        $year = $year ?: date('Y');
        $apiResponse = Config::get(Config::GITHUB_PERSONAL_AUTH_TOKEN) ?
            static::get('/repos/lbryio/internal-issues/issues?labels=' . $year . '&filter=all') :
            include ROOT_DIR . '/data/dummy/githubroadmap.php';

        $issues = array_reduce($apiResponse, function ($issues, $issue) {
            return array_merge($issues, [[
                'name' => $issue['title'],
                'quarter_date' => array_reduce($issue['labels'], function ($carry, $label) {
                    if ($carry) {
                        return $carry;
                    }
                    return $label['name'][0] === 'Q' ? $label['name'] . ' 2019' : '';
                }, ''),
                'body' => $issue['body_html']
            ]]);
        }, []);
        usort($issues, function ($a, $b) {
            if ($a['quarter_date'] === $b['quarter_date']) {
                return $a['name'] < $b['name'] ? -1 : 1;
            }
            return $a['quarter_date'] < $b['quarter_date'] ? -1 : 1;
        });
        return $issues;
    }
}
