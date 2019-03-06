<?php

class Controller
{
    const CACHE_CLEAR_PATH = '/clear-cache';

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

                Response::setContent($layout ? View::render('layout/basic', ['content' => $content] + $layoutParams) : $content);
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

        try {
            $dispatcher = new Routing\Dispatcher($router->getData());
            return $dispatcher->dispatch($method, $uri);
        } catch (\Routing\HttpRouteNotFoundException $e) {
            return NavActions::execute404();
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
            return static::redirect('https://discord.gg/Z3bERWA');
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
        $router->get(['/getrubin', 'getrubin'], 'DownloadActions::executeGet');
        foreach (array_keys(OS::getAll()) as $os) {
            $router->get(['/' . $os, 'get-' . $os], 'DownloadActions::executeGet');
        }
        $router->get('/roadmap', 'ContentActions::executeRoadmap');

        $router->post('/postcommit', 'OpsActions::executePostCommit');
        $router->post('/log-upload', 'OpsActions::executeLogUpload');
        $router->get(static::CACHE_CLEAR_PATH, 'OpsActions::executeClearCache');

        $router->any('/list/subscribe', 'MailActions::executeSubscribe');
        $router->any('/list/subscribed', 'MailActions::executeSubscribed');
        $router->get('/list/unsubscribe/{email}', 'MailActions::executeUnsubscribe');
        $router->any('/list/edit/{token}', 'MailActions::editEmailSettings');

        $router->any('/dmca', 'ReportActions::executeDmca');

        $router->any('/youtube/sub', 'AcquisitionActions::executeYouTubeSub');
        $router->post('/youtube/edit', 'AcquisitionActions::executeYoutubeEdit');
        $router->post('/youtube/token', 'AcquisitionActions::executeYoutubeToken');
        $router->any('/youtube/status/{token}', 'AcquisitionActions::executeYoutubeStatus');
        $router->any('/youtube/status', 'AcquisitionActions::executeRedirectYoutube');
        $router->any('/youtube', 'AcquisitionActions::executeYouTube');
        $router->get('/youtube/{version}', 'AcquisitionActions::executeYouTube');

        $router->get('/verify/{token}', 'AcquisitionActions::executeVerify');
        $router->get('/verify', 'AcquisitionActions::executeAutoVerify');


        $router->get('/news/category/{category}', 'ContentActions::executePostCategoryFilter');

        $router->post('/set-culture', 'i18nActions::setCulture');

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
        $router->get([ContentActions::URL_BOUNTY . '/{slug:c}?', 'bounty'], 'ContentActions::executeBounty');
        $router->get(ContentActions::URL_CREDIT_REPORTS, 'ContentActions::executeCreditReports');
        $router->get([ContentActions::URL_CREDIT_REPORTS . '/{year:c}-q{quarter:c}', ContentActions::URL_CREDIT_REPORTS . '/{year:c}-Q{quarter:c}'], 'ContentActions::executeCreditReport');

        $router->get('/{slug}', function (string $slug) {
            if (View::exists('page/' . $slug)) {
                Response::enableHttpCache();
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
