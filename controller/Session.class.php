<?php

/**
 * Very basic wrapper since replacing $_SESSION might happen at scale + convenience methods
 *
 * @author jeremy
 */
class Session
{
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
