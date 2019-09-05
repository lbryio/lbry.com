<?php

class i18nActions extends Actions
{
    public static function setCulture()
    {
        $culture = Request::getPostParam('culture');

        // Validate
        if ($culture && !in_array($culture, i18n::getAllCultures())) {
            $culture = null;
        }

        if ($culture) {
            Session::set(Session::KEY_USER_CULTURE, $culture);
        } else {
            Session::unsetKey(Session::KEY_USER_CULTURE);
        }

        //if session changes update domain
        //english language = www

        return Controller::redirect(Request::getReferrer());
    }

    public static function executeServeTranslationFile(string $project, string $resource, string $language)
    {
        if (!Transifex::isConfigured()) {
          throw new Exception('Please set Config::TRANSIFEX_API_KEY in your configuration.');
        }

        return View::renderJson(Transifex::getTranslationResourceFile($project, $resource, $language));
    }
}
