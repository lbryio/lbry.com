<?php

class Session
{
    const KEY_DOWNLOAD_ACCESS_ERROR = 'download_error2',
        KEY_DOWNLOAD_ALLOWED = 'beta_download_allowed2',
        KEY_GITHUB_ACCESS_TOKEN = 'github_access_token',
        KEY_LIST_SUB_ERROR = 'list_error',
        KEY_USER_CULTURE = 'user_culture',
        KEY_YOUTUBE_TEMPLATE = 'youtube_landing_template';

    const NAMESPACE_DEFAULT = 'default',
        NAMESPACE_FLASH = 'flash',
        NAMESPACE_FLASH_REMOVE = 'flash_remove',
        USER_ID = 'user_id',
        SITE_ID = 'lbry.io';

    public static function init()
    {
        ini_set('session.cookie_secure', IS_PRODUCTION); // send cookie over ssl only
        ini_set('session.cookie_httponly', true); // no js access to cookies
        session_start();


        if (!static::get('secure_and_httponly_set')) {
            session_regenerate_id(); // ensure that old cookies get new settings
        }
        static::set('secure_and_httponly_set', true);

        // migrate existing session data into namespaced session
        if (!static::getNamespace(static::NAMESPACE_DEFAULT)) {
            $oldSession = deserialize(serialize($_SESSION)) ?: [];
            session_unset();
            static::setNamespace(static::NAMESPACE_DEFAULT, $oldSession);
        }

        $site_visitor_id = key_exists(static::USER_ID, $_SESSION) ? $_SESSION[static::USER_ID] : '';
        $response = LBRY::logWebVisitor(static::SITE_ID, $site_visitor_id, $_SERVER['REMOTE_ADDR']);
        if (!is_null($response)
                && key_exists('data', $response)
                && key_exists('visitor_id', $response['data'])) {
            $_SESSION[static::USER_ID] = $response['data']['visitor_id'];
        } else {
            $_SESSION[static::USER_ID] = '';
        }


        static::initFlashes();
    }

    public static function get($key, $default = null, $ns = self::NAMESPACE_DEFAULT)
    {
        return $_SESSION[$ns][$key] ?? $default;
    }

    public static function set($key, $value, $ns = self::NAMESPACE_DEFAULT)
    {
        $_SESSION[$ns][$key] = $value;
    }

    public static function unsetKey($key, $ns = self::NAMESPACE_DEFAULT)
    {
        unset($_SESSION[$ns][$key]);
    }

    protected static function getNamespace($ns)
    {
        return $_SESSION[$ns] ?? [];
    }

    protected static function setNamespace($ns, $value)
    {
        $_SESSION[$ns] = $value;
    }

    protected static function unsetNamespace($ns)
    {
        unset($_SESSION[$ns]);
    }

    protected static function initFlashes()
    {
        foreach (static::getNamespace(static::NAMESPACE_FLASH) as $key => $val) {
            static::set($key, true, static::NAMESPACE_FLASH_REMOVE);
        }

        Controller::queueToRunAfterResponse([__CLASS__, 'cleanupFlashes']);
    }

    public static function cleanupFlashes()
    {
        foreach (array_keys(static::getNamespace(static::NAMESPACE_FLASH_REMOVE)) as $flashName) {
            static::unsetKey($flashName, static::NAMESPACE_FLASH);
            static::unsetKey($flashName, static::NAMESPACE_FLASH_REMOVE);
        }
    }

    public static function getFlash($name, $default = null)
    {
        return static::get($name, $default, static::NAMESPACE_FLASH);
    }

    public static function setFlash($name, $value)
    {
        static::set($name, $value, static::NAMESPACE_FLASH);
        static::unsetKey($name, static::NAMESPACE_FLASH_REMOVE);
    }

    public function persistFlashes()
    {
        static::unsetNamespace(static::NAMESPACE_FLASH_REMOVE);
    }
}
