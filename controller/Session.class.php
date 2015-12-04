<?php

/**
 * Very basic wrapper since replacing $_SESSION might happen at scale + convenience methods
 *
 * @author jeremy
 */
class Session
{
  const KEY_MAILCHIMP_LIST_IDS = 'mailchimp_list_ids',
        KEY_LIST_SUB_SUCCESS = 'list_success';
  
  public static function init()
  {
    session_start();
  }

  public static function get($key, $default = null)
  {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
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
