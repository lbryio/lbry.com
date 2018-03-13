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

  public static function connectYoutube($channel_name)
  {
    $type = 'sync';
    return Curl::post(static::getApiUrl('/yt/new'), ['desired_lbry_channel_name' => $channel_name, 'type' => $type], ['json_response' => true]);
  }

  // Check the sync status
  public static function statusYoutube($status_token)
  {
    return Curl::get(static::getApiUrl('/yt/status'), ['status_token' => $status_token], ['json_response' => true]);
  }

  public static function youtubeReward()
  {
    return CurlWithCache::post(static::getApiUrl('/yt/rewards'), [], ['cache' => 3600, 'json_response' => true]);
  }

  public static function editYouTube($status_token, $channel_name, $email, $sync_consent)
  {
    if ($email == null){
      return Curl::post(static::getApiUrl("/yt/update"),['status_token' => $status_token, 'new_preferred_channel' => $channel_name, 'sync_consent' => $sync_consent],['json_response' => true]);
    }
    else{

      return Curl::post(static::getApiUrl("/yt/update"), ['status_token' => $status_token, 'new_email' => $email, 'new_preferred_channel' => $channel_name, 'sync_consent' => $sync_consent], ['json_response' => true]);
    }
  }
}
