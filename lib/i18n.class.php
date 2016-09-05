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
    $country = null,
    $cultures = ['pt_PT', 'en_US'],
    $subdomainToCulture = array(
        'pt' => 'pt_PT',
        'en' => 'en_US'
    );

  public static function register($culture = null) /*needed to trigger class include, presumably setup would happen here*/
  {
    // Get user preference, if any
    if ($culture === null)
    {
      $culture = Session::get(Session::KEY_USER_CULTURE);
    }

    // Deduce from subdomain
    if ($culture === null)
    {
      $urlTokens = Request::getHost() ? explode('.', Request::getHost()) : [];
      $code = $urlTokens ? reset($urlTokens) : 'en';
      if (in_array($code, static::$subdomainToCulture))
      {
          $culture = static::$subdomainToCulture[$code];
      }
    }

    // Deduce from HTTP_ACCEPT_LANGUAGE
    if ($culture === null)
    {
        $code = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        if (in_array($code, static::$cultures))
        {
            $culture = $code;
        }
    }

    // Default to en_US
    if ($culture === null)
    {
        $culture = 'en_US';
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

  public static function getAllCultures()
  {
      return static::$cultures;
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
