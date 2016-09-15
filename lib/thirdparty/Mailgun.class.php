<?php

class Mailgun
{
  const BASE_URL = 'https://api.mailgun.net/v3';

  const LIST_GENERAL = 'lbryians@lbry.io';

  public static function sendSubscriptionConfirmation($email)
  {
    $confirmHash = static::getConfirmHash($email);
    list($status, $headers, $body) = static::post('/lbry.io/messages', [
      'from'              => 'LBRY <mail@lbry.io>',
      'to'                => $email,
      'subject'           => __('email.confirm_email_subject'),
      'html'              => static::inlineCss(View::render('email_templates/_confirmHash', [
        'confirmHash' => $confirmHash
      ])),
      'o:tracking-clicks' => 'no',
      'o:tracking-opens'  => 'no'
    ]);

    return $status == 200;
  }

  public static function addToMailingList($listAddress, $email)
  {
    list($status, $headers, $body) = static::post('/lists/' . $listAddress . '/members', [
      'address' => $email,
//      'subscribed' => 'yes',
//      'upsert' => 'no', //https://documentation.mailgun.com/api-mailinglists.html#mailing-lists
    ]);

    if ($status != 200)
    {
      return json_decode($body, true)['message'];
    }

    return true;
  }

  protected static function getConfirmHash($email, $timestamp = null, $nonce = null)
  {
    $timestamp = $timestamp !== null ? $timestamp : time();
    $nonce     = $nonce !== null ? $nonce : bin2hex(random_bytes(8));
    $secret    = Config::get('mailing_list_hmac_secret', 'testing');

    return Encoding::base64EncodeUrlsafe(join('|', [
      $email, $timestamp, $nonce, hash_hmac('sha256', $email . $timestamp . $nonce, $secret)
    ]));
  }

  public static function checkConfirmHashAndGetEmail($hash)
  {
    $parts = explode('|', Encoding::base64DecodeUrlsafe($hash));
    if (count($parts) !== 4)
    {
      return null;
    }

    list($email, $timestamp, $nonce, $signature) = $parts;

    if (!hash_equals(static::getConfirmHash($email, $timestamp, $nonce), $hash))
    {
      return null;
    }

    if (!is_numeric($timestamp) || time() - $timestamp > 60 * 60 * 24 * 3)
    {
      return null;
    }

    return $email;
  }

  protected static function post($endpoint, $data)
  {
    return Curl::doCurl(Curl::POST, self::BASE_URL . $endpoint, $data, [
      'headers' => [
        'Authorization: Basic ' . base64_encode('api:' . Config::get('mailgun_api_key'))
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