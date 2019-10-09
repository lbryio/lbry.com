<?php

class Slack
{
    public static function sendErrorIfProd($e, $alert = true)
    {
        if ($e instanceof Throwable) {
            $e = Debug::exceptionToString($e);
        }

        $slackErrorNotificationUrl = Config::get(Config::SLACK_ERROR_NOTIFICATION_URL);
        if ($slackErrorNotificationUrl) {
            Curl::post($slackErrorNotificationUrl, ['text' => ($alert ? '<!channel> ' : '') . Request::getRelativeUri() . "\n" . $e], ['json_data' => true]);
        }
    }

    public static function slackGrin()
    {
        $slackErrorNotificationUrl = Config::get(Config::SLACK_ERROR_NOTIFICATION_URL);
        if ($slackErrorNotificationUrl) {
            Curl::post($slackErrorNotificationUrl, ['text' => '<@U1R0URBC1> Failed to parse html on ' . Request::getRelativeUri()], ['json_data' => true]);
        }
    }
}
