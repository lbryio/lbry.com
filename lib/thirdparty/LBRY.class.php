<?php


class LBRY
{
    public static function getApiUrl($endpoint)
    {
        if (!strlen(Config::get(Config::LBRY_API_SERVER)) > 0) {
            throw new Exception("API server URL is missing from configuration");
        }

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

    public static function editEmailSettings($token, $email, $isPrimary =null, $isEnabled = null)
    {
        return Curl::post(static::getApiUrl('/user_email/edit'), ['auth_token' => $token], ['email' => $email], ['is_primary' => $isPrimary], ['is_enabled' => $isEnabled]);
    }

    public static function emailStatus($token)
    {
        list($status, $headers, $body) = Curl::doCurl(Curl::POST, static::getApiUrl('/user_email/status'), ['auth_token' => $token], ['json_response' => true]);
        return array($status,$headers,$body);
    }

    public static function applyTags($type, $token, $tags)
    {
        return Curl::post(static::getApiUrl('/user_tag/edit'), ['auth_token' => $token], [$type => $tags]);
    }

    public static function unsubscribe($email)
    {
        return Curl::post(static::getApiUrl('/user/unsubscribe'), ['email' => $email], ['json_response' => true]);
    }

    public static function connectYoutube($channel_name, $immediateSync = false)
    {
        // Uncomment next line for production and comment other return
        return Curl::post(static::getApiUrl('/yt/new'), [ 'desired_lbry_channel_name' => $channel_name, 'immediate_sync' => $immediateSync, 'type' => 'sync' ], [ 'json_response' => true ]);

        // Uncomment next line for development and comment other return (this also requires the testnet API)
        // return Curl::post(static::getApiUrl('/yt/new'), [
        //     'desired_lbry_channel_name' => $channel_name,
        //     'immediate_sync' => $immediateSync,
        //     'return_url' => 'http://localhost:8000/youtube/status/',
        //     'type' => 'sync'
        // ], [
        //     'json_response' => true
        // ]);
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
        $postParams = array('status_token' => $status_token);

        if ($email) {
            $postParams['new_email'] = $email;
        }

        if ($sync_consent) {
            if ($sync_consent === 0) {
                $sync_consent = null;
            }

            $postParams['sync_consent'] = $sync_consent;
        }

        if ($channel_name) {
            $postParams['new_preferred_channel'] = $channel_name;
        }

        return Curl::post(static::getApiUrl("/yt/update"), $postParams, ['json_response' => true]);
    }

    public static function logWebVisitor($site, $visitorID, $IPAddress)
    {
        if (IS_PRODUCTION) {
            return Curl::post(static::getApiUrl("/visitor/new"), ['site' => $site, 'visitor_id' => $visitorID, 'ip_address' => $IPAddress], ['json_response' => true]);
        }
    }
}
