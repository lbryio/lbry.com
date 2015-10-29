<?php

/**
 * Description of NavActions
 *
 * @author jeremy
 */
class NavActions extends Actions
{
  protected static $navUri;

  public static function setNavUri($uri)
  {
    static::$navUri = $uri;
  }

  public static function getNavUri()
  {
    return static::$navUri ?: $_SERVER['REQUEST_URI'];
  }

  public static function prepareGlobalItems(array $vars)
  {
    $vars += ['selectedItem' => static::getNavUri()];
    return $vars;
  }
}