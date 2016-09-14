<?php

class Session
{
  const KEY_DOWNLOAD_ACCESS_ERROR = 'download_error2',
        KEY_DOWNLOAD_ALLOWED = 'beta_download_allowed2',
        KEY_PREFINERY_USER_ID = 'prefinery_user_id',
        KEY_PREFINER_USED_CUSTOM_CODE = 'prefinery_used_custom_code',
        KEY_LIST_SUB_ERROR = 'list_error',
        KEY_LIST_SUB_SIGNATURE = 'list_sub_sig',
        KEY_LIST_SUB_SUCCESS = 'list_success',
        KEY_LIST_SUB_FB_EVENT = 'list_sub_fb_event',
        KEY_USER_CULTURE = 'user_culture';

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
  }

  public static function get($key, $default = null)
  {
    return $_SESSION[$key] ?? $default;
  }

  public static function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public static function unsetKey($key)
  {
    unset($_SESSION[$key]);
  }
}
