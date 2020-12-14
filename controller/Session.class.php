<?php

class Session
{
    const KEY_LIST_SUB_ERROR = 'list_error',
        KEY_USER_CULTURE = 'user_culture';

    const NAMESPACE_DEFAULT = 'default',
        NAMESPACE_FLASH = 'flash',
        NAMESPACE_FLASH_REMOVE = 'flash_remove',
        USER_ID = 'user_id',
        SITE_ID = 'lbry.com';

    public static function init()
    {
        ini_set('session.cookie_secure', IS_PRODUCTION); // send cookie over ssl only
        ini_set('session.cookie_httponly', true); // no js access to cookies

        session_start();

        /*
         * session_start automatically adds headers because lolphp, let's remove them and handle it ourselves
         */
        header_remove('cache-control');
        header_remove('pragma');
        header_remove('expires');

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

        Response::addPostRenderCallback(function () {
            $ga_cid = filter_input(INPUT_COOKIE, 'ga_cid');
            if (isset($ga_cid)) {
                $site_visitor_id = key_exists(static::USER_ID, $_SESSION) ? $_SESSION[static::USER_ID] : $ga_cid;
                $site_visitor_id = isset($ga_cid) ? $ga_cid : $site_visitor_id;
                $response = LBRY::logWebVisitor(static::SITE_ID, $site_visitor_id, static::getClientIP());
                if (!is_null($response)
                    && key_exists('data', $response)
                    && key_exists('visitor_id', $response['data'])) {
                    $_SESSION[static::USER_ID] = $response['data']['visitor_id'];
                } else {
                    $_SESSION[static::USER_ID] = '';
                }
            }
        });

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

    public static function getClientIP()
    {
        // Nothing to do without any reliable information
        if (!isset($_SERVER['REMOTE_ADDR'])) {
            return null;
        }

        // Header that is used by the trusted proxy to refer to
        // the original IP
        $proxyHeader = "HTTP_X_FORWARDED_FOR";

        // List of all the proxies that are known to handle 'proxy_header'
        // in known, safe manner
        $trustedProxies = array("127.0.0.1");

        if (in_array($_SERVER['REMOTE_ADDR'], $trustedProxies)) {

            // Get IP of the client behind trusted proxy
            if (array_key_exists($proxyHeader, $_SERVER)) {

                // Header can contain multiple IP-s of proxies that are passed through.
                // Only the IP added by the last proxy (last IP in the list) can be trusted.
                $clientIP = trim(end(explode(",", $_SERVER[$proxyHeader])));

                // Validate just in case
                if (filter_var($clientIP, FILTER_VALIDATE_IP)) {
                    return $clientIP;
                } else {
                    // Validation failed - beat the guy who configured the proxy or
                    // the guy who created the trusted proxy list?
                    // TODO: some error handling to notify about the need of punishment
                }
            }
        }

        // In all other cases, REMOTE_ADDR is the ONLY IP we can trust.
        return $_SERVER['REMOTE_ADDR'];
    }
}
