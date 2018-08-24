<?php

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
      'showLearnFooter' => false,
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

    public static function execute400(array $vars)
    {
        Response::setStatus(400);
        return ['page/400', ['error' => $vars['error'] ?? null]];
    }

    public static function execute404()
    {
//    $uri = Request::getRelativeUri();
//    Controller::queueToRunAfterResponse(function() use($uri) {
//      Slack::sendErrorIfProd('404 for url ' . $uri, false);
//    });
        Response::setStatus(404);
        return ['page/404'];
    }
}
