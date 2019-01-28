<?php

class Config
{
    const HELP_CONTACT_EMAIL = 'josh@lbry.io';

    //Constant to help with managing strings
    const IS_PROD = "is_prod";
    const GITHUB_KEY = "github_key";
    const GITHUB_APP_CLIENT_ID = "github_app_client_id";
    const GITHUB_APP_CLIENT_SECRET = "github_app_client_secret";
    const LBRY_API_SERVER = "lbry_api_server";
    const MAILCHIMP_KEY = "mailchimp_key";
    const AWS_LOG_ACCESS_KEY = "aws_log_access_key";
    const AWS_LOG_SECRET_KEY = "aws_log_secret_key";
    const MAILGUN_API_KEY = "mailgun_api_key";
    const SALESFORCE_KEY = "salesforce_key";
    const SALESFORCE_SECRET = "salesforce_secret";
    const SLACK_ERROR_NOTIFICATION_URL = "slack_error_notification_url";


    protected static $loaded = false;
    protected static $data = [];

    public static function get($name, $default = null)
    {
        static::load();
        return array_key_exists($name, static::$data) ? static::$data[$name] : $default;
    }


    protected static function load()
    {
        if (!static::$loaded) {
            $dataFile = ROOT_DIR.'/data/config.php';
            if (!is_readable($dataFile)) {
                throw new RuntimeException('config file is missing or not readable');
            }
            static::$data = require $dataFile;
            static::$loaded = true;
        }
    }
}
