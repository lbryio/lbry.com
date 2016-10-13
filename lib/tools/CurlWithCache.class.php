<?php

class CurlWithCache extends Curl
{
  const DEFAULT_CACHE = 600000;

  public static function doCurl($method, $url, $params = [], $options = [])
  {
    $useCache = ($options['cache'] ?? true) && Apc::isEnabled();
    $cacheTimeout = is_numeric($options['cache'] ?? null) ? $options['cache'] : static::DEFAULT_CACHE;
    unset($options['cache']);

    if ($useCache)
    {
      $cacheKey = md5('x' . $url . $method . serialize($options) . serialize($params));
      $cachedData = apc_fetch($cacheKey);
      if ($cachedData)
      {
        return $cachedData;
      }
    }

    $response = parent::doCurl($method, $url, $params, $options);

    if ($useCache)
    {
      apc_store($cacheKey, $response, $cacheTimeout);
    }

    return $response;
  }
}