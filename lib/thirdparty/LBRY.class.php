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

  // Register new youtube sync
  public static function newYoutube($email, $channel_id, $channel_name)
  {
    return Curl::post(static::getApiUrl('/yt/new'), ['email' => $email, 'youtube_channel_id' => $channel_id,'desired_lbry_channel_name' => $channel_name], ['json_response' => true]);
  }

  // Check the sync status
  public static function statusYoutube($status_token)
  {
    return Curl::post(static::getApiUrl('/yt/status'), ['status_token' => $status_token], ['json_response' => true]);
  }

  public static function youtubeReward(){
    return CurlWithCache::post(static::getApiUrl('/yt/rewards'),[], ['cache' => 3600, 'json_response' => true ]);
  }
}
