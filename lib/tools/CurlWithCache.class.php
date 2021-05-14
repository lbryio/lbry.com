<?php

class CurlWithCache extends Curl
{
    public const DEFAULT_CACHE = 600000;

    public static function doCurl($method, $url, $params = [], $options = [])
    {
        $cacheAllowed = $options['cache'] ?? true;
        $cacheEnabled = Apc::isEnabled();

        $cacheTimeout = is_numeric($options['cache'] ?? null) ? $options['cache'] : static::DEFAULT_CACHE;
        unset($options['cache']);

        $cacheKey = $cacheEnabled ? md5($url . $method . serialize($options) . serialize($params)) : null;
        if ($cacheAllowed && $cacheKey) {
            $cachedData = apcu_fetch($cacheKey);
            if ($cachedData) {
                return $cachedData;
            }
        }

        $response = parent::doCurl($method, $url, $params, $options);

        if ($cacheEnabled) {
            if ($cacheAllowed) {
                apcu_store($cacheKey, $response, $cacheTimeout);
            } else {
                apcu_delete($cacheKey);
            }
        }

        return $response;
    }
}
