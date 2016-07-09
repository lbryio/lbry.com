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

  public static function prepareGlobalItemsPartial(array $vars)
  {
    $vars += ['selectedItem' => static::getNavUri()];
    return $vars;
  }

  public static function prepareLearnFooterPartial(array $vars)
  {
    return $vars + [
      'isDark' => true
    ];
  }
}