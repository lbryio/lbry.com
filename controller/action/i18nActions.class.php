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
        $culture = isset($_POST['culture']) ? $_POST['culture'] : null;

        // Validate
        if ($culture && !($culture == 'en_US' || $culture == 'pt_PT'))
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

        return [null, null];
    }
}
