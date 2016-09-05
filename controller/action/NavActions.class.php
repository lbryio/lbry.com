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
    return static::$navUri ?: Request::getRelativeUri();
  }

  public static function prepareFooterPartial(array $vars)
  {
    return $vars + [
      'isDark' => false,
      'showLearnFooter' => false
    ];
  }

  public static function prepareGlobalItemsPartial(array $vars)
  {
    return $vars += [
      'selectedItem' => static::getNavUri(),
      'selectedCulture' => i18n::getLanguage() . '_' . i18n::getCountry(),
      'cultures' => i18n::getAllCultures()
    ];
  }

  public static function prepareLearnFooterPartial(array $vars)
  {
    return $vars + [
      'isDark' => true
    ];
  }
}