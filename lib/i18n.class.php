<?php

/**
 * i18n dummy we'll be happy to have later
 */
function __($msg, $args = [])
{
  return strtr(i18n::translate($msg), $args);
}

/**
 * Description of i18n
 *
 * @author jeremy
 */
class i18n
{
  protected static
    $language = null,
    $translations = [],
    $country = null;

  public static function register($culture = null) /*needed to trigger class include, presumably setup would happen here*/
  {
    if ($culture === null)
    {
      $urlTokens = Request::getHost() ? explode('.', Request::getHost()) : [];
      $code = $urlTokens ? reset($urlTokens) : 'en';
      switch($code)
      {
        case 'pt':
          $culture = 'pt_PT'; break;
        case 'en':
        case 'www':
        default:
          $culture = 'en_US';
      }
    }

    list($language, $country) = explode('_', $culture);
    static::$language = $language;
    static::$country = $country;

    setlocale(LC_MONETARY, $culture . '.UTF-8');
  }

  public static function getLanguage()
  {
    return static::$language;
  }

  public static function getCountry()
  {
    return static::$country;
  }

  public static function formatCurrency($amount, $currency = 'USD')
  {
    return '<span class="formatted-currency">' . money_format('%.2n', $amount) . '</span>';
  }

  public static function formatCredits($amount)
  {
    return '<span class="formatted-credits">' .  (is_numeric($amount) ? number_format($amount, 1) : $amount) . ' LBC</span>';
  }

  public static function translate($token, $language = null)
  {
    $language = $language === null ? static::$language : $language;
    if (!isset(static::$translations[$language]))
    {
      $path = ROOT_DIR . '/data/i18n/' . $language . '.yaml';
      static::$translations[$language] = file_exists($path) ? Spyc::YAMLLoadString(file_get_contents($path)) : [];
    }
    $scope = static::$translations[$language];
    foreach(explode('.', $token) as $level)
    {
      if (isset($scope[$level]))
      {
        $scope = $scope[$level];
      }
      else
      {
        $scope = [];
      }
    }
    if (!$scope && $language != 'en')
    {
      return static::translate($token, 'en');
    }
    return $scope ?: $token;
  }
}
