<?php

class LBRY
{
    public const DEFAULT_TIMEOUT = 10;

    public static function getApiUrl($endpoint)
    {
        if (!strlen(Config::get(Config::LBRY_API_SERVER)) > 0) {
            throw new Exception("API server URL is missing from configuration");
        }

        return Config::get(Config::LBRY_API_SERVER) . $endpoint;
    }

    public static function listTags($authToken)
    {
        $response = Curl::get(static::getApiUrl('/tag/list'), ['auth_token' => $authToken], ['json_response' => true]);
        return $response['data'] ?? [];
    }

    public static function subscribe($email, $tag = null)
    {
        return Curl::post(static::getApiUrl('/list/subscribe'), array_filter([
            'email' => $email,
            'tag' => $tag,
        ]), ['json_response' => true, 'timeout' => static::DEFAULT_TIMEOUT]);
    }

    public static function emailStatus($token)
    {
        list($status, $headers, $body) = Curl::doCurl(
            Curl::POST,
            static::getApiUrl('/user_email/status'),
            ['auth_token' => $token],
            ['json_response' => true, 'timeout' => static::DEFAULT_TIMEOUT]
        );
        return array($status,$headers,$body);
    }

    public static function unsubscribe($email)
    {
        return Curl::post(static::getApiUrl('/user/unsubscribe'), ['email' => $email], ['json_response' => true, 'timeout' => static::DEFAULT_TIMEOUT]);
    }

    public static function logWebVisitor($site, $visitorID, $IPAddress)
    {
        if (IS_PRODUCTION) {
            return Curl::post(static::getApiUrl("/visitor/new"), ['site' => $site, 'visitor_id' => $visitorID, 'ip_address' => $IPAddress], ['json_response' => true, 'timeout' => static::DEFAULT_TIMEOUT]);
        }
    }
}
