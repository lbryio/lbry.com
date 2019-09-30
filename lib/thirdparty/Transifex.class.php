<?php


class Transifex
{
    public static function isConfigured() {
      return (boolean)Config::get(Config::TRANSIFEX_API_KEY);
    }

    public static function getTranslationResourceFile($project, $resource, $language, $cache = true)
    {
      $url = "https://www.transifex.com/api/2/project/$project/resource/$resource/translation/$language?file=1";
      return json_decode(CurlWithCache::get($url, [], [
        'password' => 'api:' . Config::get(Config::TRANSIFEX_API_KEY),
        'cache' => $cache ? 1000 * 60 * 60 * 8 : false
      ]), true);
    }
}