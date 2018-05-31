<?php

class Mailgun
{
    const BASE_URL = 'https://api.mailgun.net/v3';

    const TOP_DOMAIN = 'lbry.io';
    const MAIL_DOMAIN = 'mail.lbry.io';

    const LIST_GENERAL = 'lbryians@lbry.io';

    public static function sendDmcaReport($data)
    {
        list($status, $headers, $body) = static::post('/' . static::MAIL_DOMAIN . '/messages', [
      'from'              => 'LBRY <mail@' . static::MAIL_DOMAIN . '>',
      'to'                => 'hello@lbry.io',
      'subject'           => 'DMCA Report #' . $data['report_id'],
      'html'              => '<pre>' . var_export($data, true) . '</pre>',
      'o:tracking-clicks' => 'no',
      'o:tracking-opens'  => 'no'
    ]);

        return $status == 200;
    }

    public static function sendYouTubeWarmLead($data)
    {
        list($status, $headers, $body) = static::post('/' . static::MAIL_DOMAIN . '/messages', [
      'from'              => 'LBRY <mail@' . static::MAIL_DOMAIN . '>',
      'to'                => 'reilly@lbry.io',
      'subject'           => 'Interested YouTuber',
      'html'              => '<pre>' . var_export($data, true) . '</pre>',
      'o:tracking-clicks' => 'no',
      'o:tracking-opens'  => 'no'
    ]);

        return $status == 200;
    }

    protected static function post($endpoint, $data)
    {
        return static::request(Curl::POST, $endpoint, $data);
    }

    protected static function put($endpoint, $data)
    {
        return static::request(Curl::PUT, $endpoint, $data);
    }

    protected static function request($method, $endpoint, $data)
    {
        return Curl::doCurl($method, self::BASE_URL . $endpoint, $data, [
      'headers' => [
        'Authorization: Basic ' . base64_encode('api:' . Config::get(Config::MAILGUN_API_KEY))
      ],
      'retry' => 3,
    ]);
    }

    protected static function inlineCss($html, $css = '')
    {
        $e = new \Pelago\Emogrifier($html, $css);
        return trim($e->emogrify());
    }
}
