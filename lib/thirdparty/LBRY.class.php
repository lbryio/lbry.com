<?php


class LBRY
{
  public static function getApiUrl($endpoint)
  {
    return Config::get(Config::LBRY_API_SERVER) . $endpoint;
  }

  public static function getLBCtoUSDRate()
  {
    $response = CurlWithCache::get(static::getApiUrl('/lbc/exchange_rate'), [], [
      'cache' => 3600, //one hour
      'json_response' => true
    ]);
    return $response['data']['lbc_usd'] ?? 0;
  }

  public static function subscribe($email, $tag = null)
  {
    return Curl::post(static::getApiUrl('/list/subscribe'), array_filter([
      'email' => $email,
      'tag' => $tag,
    ]), ['json_response' => true]);
  }

  public static function unsubscribe($email)
  {
    return Curl::post(static::getApiUrl('/list/unsubscribe'), ['email' => $email], ['json_response' => true]);
  }
}
