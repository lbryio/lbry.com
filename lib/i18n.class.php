<?php

/**
 * i18n dummy we'll be happy to have later
 */
function __($msg, $args = [])
{
    return strtr(i18n::translate($msg), $args);
}

class i18n
{
    protected static $language = null;
    protected static $translations = [];
    protected static $country = null;
    protected static $cultures = ['pt_PT', 'en_US'];

    public static function register() /*needed to trigger class include, presumably setup would happen here*/
    {
        $culture = static::deduceCulture();

        list($language, $country) = explode('_', $culture);
        static::$language = $language;
        static::$country  = $country;

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
        return '<span class="formatted-credits">' . (is_numeric($amount) ? number_format($amount, 1) : $amount) . ' LBC</span>';
    }

    public static function translate($token, $language = null)
    {
        $language = $language === null ? static::$language : $language;
        if (!isset(static::$translations[$language])) {
            $path = ROOT_DIR . '/data/i18n/' . $language . '.yaml';

            static::$translations[$language] = file_exists($path) ? Spyc::YAMLLoadString(file_get_contents($path)) : [];
        }
        $scope = static::$translations[$language];
        foreach (explode('.', $token) as $level) {
            if (isset($scope[$level])) {
                $scope = $scope[$level];
            } else {
                $scope = [];
            }
        }
        if (!$scope && $language != 'en') {
            return static::translate($token, 'en');
        }
        return $scope ?: $token;
    }

    protected static function deduceCulture()
    {
        $candidates = [];

        //url trumps everything
        $urlTokens = Request::getHost() ? explode('.', Request::getHost()) : [];
        $code      = $urlTokens ? reset($urlTokens) : null;
        if ($code !== 'www') {
            $candidates[] = $code;
        }

        //then session
        $candidates[] = Session::get(Session::KEY_USER_CULTURE);

        // then headers
        // http://www.thefutureoftheweb.com/blog/use-accept-language-header
        if (Request::getHttpHeader('Accept-Language')) {
            // break up string into pieces (languages and q factors)
            preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i', Request::getHttpHeader('Accept-Language'), $languages);

            if (isset($languages[1]) && count($languages[1])) {
                // create a list like "en" => 0.8
                $langs = array_combine($languages[1], $languages[4]);

                // set default to 1 for any without q factor
                foreach ($langs as $lang => $val) {
                    if ($val === '') {
                        $langs[$lang] = 1;
                    }
                }

                arsort($langs, SORT_NUMERIC);

                $candidates = array_merge($candidates, array_keys($langs));
            }
        }

        foreach ($candidates as $candidate) {
            foreach (static::getAllCultures() as $culture) {
                if ($candidate === $culture || substr($culture, 0, 2) === $candidate) {
                    return $culture;
                }
            }
        }

        return 'en_US';
    }
}
