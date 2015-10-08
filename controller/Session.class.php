<?php

/**
 * Very basic wrapper since replacing $_SESSION might happen at scale + convenience methods
 *
 * @author jeremy
 */
class Session
{
  public function __construct()
  {
    session_start();
  }

  public function get($key, $default = null)
  {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
  }

  public function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public function unsetKey($key)
  {
    unset($_SESSION[$key]);
  }
}
