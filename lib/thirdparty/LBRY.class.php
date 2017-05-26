<?php


class LBRY
{
  public static function getApiUrl($endpoint)
  {
    return Config::get('lbry_api_server') . $endpoint;
  }

  public static function getLBCtoUSDRate()
  {
    $response = CurlWithCache::get(static::getApiUrl('/lbc/exchange_rate'), [], [
      'cache' => 3600, //one hour
      'json_response' => true
    ]);
    return $response['data']['lbc_usd'] ?? 0;
  }

  public static function unsubscribe($email)
  {
    return Curl::post(static::getApiUrl('/user_unsubscribe/new'), ['email' => $email], ['json_response' => true]);
  }
}