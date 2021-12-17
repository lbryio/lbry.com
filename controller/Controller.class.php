<?php

class Controller
{
    public const CACHE_CLEAR_PATH = '/clear-cache';

    protected static $queuedFunctions = [];

    public static function dispatch($uri)
    {
        try {
            if (IS_PRODUCTION && function_exists('newrelic_name_transaction')) {
                newrelic_name_transaction(Request::getMethod() . ' ' . strtolower($uri));
            }

            $viewAndParams  = static::execute(Request::getMethod(), $uri);
            $viewTemplate   = $viewAndParams[0];
            $viewParameters = $viewAndParams[1] ?? [];
            if (!IS_PRODUCTION && isset($viewAndParams[2])) {
                throw new Exception('use response::setheader instead of returning headers');
            }

            if (!$viewTemplate) {
                if ($viewTemplate !== null) {
                    throw new LogicException('All execute methods must return a template or NULL.');
                }
            } else {
                $layout = !(isset($viewParameters['_no_layout']) && $viewParameters['_no_layout']);
                unset($viewParameters['_no_layout']);

                $layoutParams = $viewParameters[View::LAYOUT_PARAMS] ?? [];
                unset($viewParameters[View::LAYOUT_PARAMS]);

                $content = View::render($viewTemplate, $viewParameters + ['fullPage' => true]);
                if ($layout) {
                    $content = View::render('layout/basic', ['content' => $content] + $layoutParams);
                    $content = View::safeExternalLinks($content, Request::getHost());
                }
                Response::setContent($content);
            }

            Response::setDefaultSecurityHeaders();
            if (Request::isGzipAccepted()) {
                Response::gzipContentIfNotDisabled();
            }

            Response::send();
        } catch (StopException $e) {
        }
    }

    public static function execute($method, $uri)
    {
        $router = static::getRouterWithRoutes();

        $domainResult = static::performDomainRouting($uri);
        if ($domainResult) {
            return $domainResult;
        }

        $dispatcher = new Routing\Dispatcher($router->getData());

        try {
            return $dispatcher->dispatch($method, $uri);
        } catch (\Routing\HttpRouteNotFoundException $e) {
            $lowerUri = strtolower($uri);
            if ($lowerUri !== $uri && $dispatcher->hasMatchingRouteForUri($method, $lowerUri)) {
                static::redirect($lowerUri, 301);
            } else {
                return NavActions::execute404();
            }
        } catch (\Routing\HttpMethodNotAllowedException $e) {
            Response::setStatus(405);
            Response::setHeader('Allow', implode(', ', $e->getAllowedMethods()));
            return ['page/405'];
        }
    }

    protected static function performDomainRouting($uri)
    {
        $subDomain = Request::getSubDomain();

        switch ($subDomain) {
          case 'chat':
          case 'slack':
            return static::redirect('https://discord.gg/SJMUq8EjXB');
          case 'verify-chat':
            return static::redirect('https://discord.gg/C3ZFqV3btX'); 
        }

        /*
         * this is kind of a hack? unsure, so it probably is
         */
        $hostName = $_SERVER['HTTP_HOST'];
        if ($hostName && in_array($hostName, ['lbry.org', 'lbry.tv'])) {
            if ($uri === '/') {
                switch ($hostName) {
                    case 'lbry.org':
                        return ContentActions::executeOrg();
                    case 'lbry.tv':
                        return ContentActions::executeTv();
                }
            } else {
                return static::redirect('/');
            }
        }
    }

    protected static function getRouterWithRoutes(): \Routing\RouteCollector
    {
        $router = new Routing\RouteCollector();

        $router->get(['/', 'home'], 'ContentActions::executeHome');

        $router->get(['/get', 'get'], 'DownloadActions::executeGet');

        foreach (array_keys(OS::getAll()) as $os) {
            $router->get(['/' . $os, 'get-' . $os], 'DownloadActions::executeGet');
        }

        $router->get('/roadmap', 'ContentActions::executeRoadmap');
        $router->get('/roadmap/{year}', 'ContentActions::executeRoadmap');

        $router->post('/postcommit', 'OpsActions::executePostCommit');
        $router->post('/log-upload', 'OpsActions::executeLogUpload');
        $router->get(static::CACHE_CLEAR_PATH, 'OpsActions::executeClearCache');

        $router->any('/list/subscribe', 'MailActions::executeSubscribe');
        $router->any('/list/subscribed', 'MailActions::executeSubscribed');
        $router->get('/list/unsubscribe/{email}', 'MailActions::executeUnsubscribe');
        $router->any('/list/edit/{token}', 'MailActions::editEmailSettings');

        $router->any('/dmca', 'ReportActions::executeDmca');
        $router->any('/dmca/{claimid}', 'ReportActions::executeDmcaWithClaimId');

        $router->any('/team/{slug}', 'TeamActions::executeBio');

        $router->any('/youtube/status/{token}', 'AcquisitionActions::executeYoutubeStatus');
        $router->any('/youtube', 'AcquisitionActions::executeYouTube');

        $router->get('/i18n/get/{project}/{resource}/{language}.json', 'i18nActions::executeServeTranslationFile');

        $router->get('/news/category/{category}', 'ContentActions::executePostCategoryFilter');

        $router->post('/i18n/set-culture', 'i18nActions::setCulture');

        $router->get('/snapshot/{type}', 'DownloadActions::executeDownloadSnapshot');

        $permanentRedirectsPath = ROOT_DIR . '/data/redirect/permanent.yaml';
        $tempRedirectsPath = ROOT_DIR . '/data/redirect/temporary.yaml';

        $permanentRedirects = SpyC::YAMLLoadString(file_get_contents($permanentRedirectsPath));
        $tempRedirects = SpyC::YAMLLoadString(file_get_contents($tempRedirectsPath));

        foreach ([307 => $tempRedirects, 301 => $permanentRedirects] as $code => $redirects) {
            foreach ($redirects as $src => $target) {
                $router->any($src, function () use ($target, $code) {
                    return static::redirect($target, $code);
                });
            }
        }

        $router->get('/releases/{repo:c}.{ext:c}', 'DownloadActions::executeDownloadReleaseAsset');
        $router->get('/releases/pre/{repo:c}.{ext:c}', 'DownloadActions::executeDownloadPrereleaseAsset');

        $router->get([ContentActions::URL_NEWS . '/{slug:c}?', 'news'], 'ContentActions::executeNews');
        $router->get([ContentActions::URL_FAQ . '/{slug:c}?', 'faq'], 'ContentActions::executeFaq');
        $router->get(['/bounty/{slug:c}?', 'bounty'], 'ContentActions::executeBountyRedirect');
        $router->get(ContentActions::URL_CREDIT_REPORTS, 'ContentActions::executeCreditReports');
        $router->get([ContentActions::URL_CREDIT_REPORTS . '/{year:c}-q{quarter:c}', ContentActions::URL_CREDIT_REPORTS . '/{year:c}-Q{quarter:c}'], 'ContentActions::executeCreditReport');

        $router->get('/{slug}', function (string $slug) {
            if ($slug !== strtolower($slug)) {
                return static::redirect('/' . strtolower($slug), 301);
            }
            if (View::exists('page/' . $slug)) {
                Response::enablePublicImmutableCache();
                return ['page/' . $slug, []];
            } else {
                return NavActions::execute404();
            }
        });

        return $router;
    }

    public static function redirect($url, $statusCode = 302)
    {
        if (!$url) {
            throw new InvalidArgumentException('Cannot redirect to an empty URL.');
        }

        $url = str_replace('&amp;', '&', $url);

        Response::setStatus($statusCode);

        if ($statusCode == 201 || ($statusCode >= 300 && $statusCode < 400)) {
            Response::setHeader(Response::HEADER_LOCATION, $url);
        }

        return ['internal/redirect', ['url' => $url]];
    }

    public static function queueToRunAfterResponse(callable $fn)
    {
        static::$queuedFunctions[] = $fn;
    }

    public static function shutdown()
    {
        while ($fn = array_shift(static::$queuedFunctions)) {
            call_user_func($fn);
        }
    }
}
