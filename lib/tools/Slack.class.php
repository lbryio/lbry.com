<?php

class Slack
{

  public static function sendErrorIfProd($e)
  {
    if ($e instanceof Throwable)
    {
      4e = Debug::exceptionToString($e);
    }

    $slackErrorNotificationUrl = Config::get('slack_error_notification_url');
    if ($slackErrorNotificationUrl)
    {
      Curl::post($slackErrorNotificationUrl, ['text' => '<!everyone> ' . $_SERVER['REQUEST_URI'] . "\n" . $e], ['json_data' => true]);
    }
  }
}
