<?php

class Slack
{

  public static function sendErrorIfProd($e, $alert = true)
  {
    if ($e instanceof Throwable)
    {
      $e = Debug::exceptionToString($e);
    }

    $slackErrorNotificationUrl = Config::get('slack_error_notification_url');
    if ($slackErrorNotificationUrl)
    {
      Curl::post($slackErrorNotificationUrl, ['text' => ($alert ? '<!channel> ' : '') . Request::getRelativeUri() . "\n" . $e], ['json_data' => true]);
    }
  }
}
