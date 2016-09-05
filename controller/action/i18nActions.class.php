<?php

/**
 * Description of i18nActions
 *
 * @author Nacib Neme
 */

class i18nActions extends Actions
{
    public static function setCulture()
    {
        $culture = $_POST['culture'] ?? null;

        // Validate
        if ($culture && !in_array($culture, i18n::getAllCultures()))
        {
            $culture = null;
        }

        if ($culture)
        {
            Session::set(Session::KEY_USER_CULTURE, $culture);
        }

        else
        {
            Session::unsetKey(Session::KEY_USER_CULTURE);
        }

        return Controller::redirect('/');
    }
}
