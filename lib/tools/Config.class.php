<?php

class Config
{
    public const HELP_CONTACT_EMAIL = 'hello@lbry.com';

    //Constant to help with managing strings
    public const IS_PROD = "is_prod";
    public const CHAINQUERY_DSN = 'chainquery_dsn';
    public const CHAINQUERY_USERNAME = 'chainquery_username';
    public const CHAINQUERY_PASSWORD = 'chainquery_password';
    public const GITHUB_KEY = "github_key";
    public const GITHUB_APP_CLIENT_ID = "github_app_client_id";
    public const GITHUB_APP_CLIENT_SECRET = "github_app_client_secret";
    public const GITHUB_PERSONAL_AUTH_TOKEN = 'github_personal_auth_token';
    public const LBRY_API_SERVER = "lbry_api_server";
    public const MAILCHIMP_KEY = "mailchimp_key";
    public const TRANSIFEX_API_KEY = 'transifex_api_key';
    public const AWS_LOG_ACCESS_KEY = "aws_log_access_key";
    public const AWS_LOG_SECRET_KEY = "aws_log_secret_key";
    public const MAILGUN_API_KEY = "mailgun_api_key";
    public const SALESFORCE_KEY = "salesforce_key";
    public const SALESFORCE_SECRET = "salesforce_secret";
    public const SLACK_ERROR_NOTIFICATION_URL = "slack_error_notification_url";


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
