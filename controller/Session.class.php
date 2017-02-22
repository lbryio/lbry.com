<?php

class   Session
{
  const KEY_DOWNLOAD_ACCESS_ERROR = 'download_error2',
        KEY_DOWNLOAD_ALLOWED = 'beta_download_allowed2',
        KEY_PREFINERY_USER_ID = 'prefinery_user_id',
        KEY_PREFINER_USED_CUSTOM_CODE = 'prefinery_used_custom_code',
        KEY_DEVELOPER_CREDITS_ERROR = 'developer_credits_error',
        KEY_DEVELOPER_CREDITS_SUCCESS = 'developer_credits_success',
        KEY_DEVELOPER_CREDITS_WALLET_ADDRESS = 'developer_credits_wallet_address',
        KEY_LIST_SUB_ERROR = 'list_error',
        KEY_USER_CULTURE = 'user_culture';

  const NAMESPACE_DEFAULT = 'default',
        NAMESPACE_FLASH = 'flash',
        NAMESPACE_FLASH_REMOVE = 'flash_remove';

  public static function init()
  {
    ini_set('session.cookie_secure', IS_PRODUCTION); // send cookie over ssl only
    ini_set('session.cookie_httponly', true); // no js access to cookies
    session_start();

    if (!static::get('secure_and_httponly_set'))
    {
      session_regenerate_id(); // ensure that old cookies get new settings
    }
    static::set('secure_and_httponly_set', true);

    // migrate existing session data into namespaced session
    if (!static::getNamespace(static::NAMESPACE_DEFAULT))
    {
      $oldSession = deserialize(serialize($_SESSION)) ?: [];
      session_unset();
      static::setNamespace(static::NAMESPACE_DEFAULT, $oldSession);
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
    foreach(static::getNamespace(static::NAMESPACE_FLASH) as $key => $val)
    {
      static::set($key, true, static::NAMESPACE_FLASH_REMOVE);
    }

    Controller::queueToRunAfterResponse([__CLASS__, 'cleanupFlashes']);
  }

  public static function cleanupFlashes()
  {
    foreach(array_keys(static::getNamespace(static::NAMESPACE_FLASH_REMOVE)) as $flashName)
    {
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
