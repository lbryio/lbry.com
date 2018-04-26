<?php

class Controller
{
  const CACHE_CLEAR_PATH = '/clear-cache';

  protected static $queuedFunctions = [];

  public static function dispatch($uri)
  {
    try
    {
      if (IS_PRODUCTION && function_exists('newrelic_name_transaction'))
      {
        newrelic_name_transaction(Request::getMethod() . ' ' . strtolower($uri));
      }

      $viewAndParams  = static::execute(Request::getMethod(), $uri);
      $viewTemplate   = $viewAndParams[0];
      $viewParameters = $viewAndParams[1] ?? [];
      if (!IS_PRODUCTION && isset($viewAndParams[2]))
      {
        throw new Exception('use response::setheader instead of returning headers');
      }

      if (!$viewTemplate)
      {
        if ($viewTemplate !== null)
        {
          throw new LogicException('All execute methods must return a template or NULL.');
        }
      }
      else
      {
        $layout = !(isset($viewParameters['_no_layout']) && $viewParameters['_no_layout']);
        unset($viewParameters['_no_layout']);

        $layoutParams = $viewParameters[View::LAYOUT_PARAMS] ?? [];
        unset($viewParameters[View::LAYOUT_PARAMS]);

        $content = View::render($viewTemplate, $viewParameters + ['fullPage' => true]);

        Response::setContent($layout ? View::render('layout/basic', ['content' => $content] + $layoutParams) : $content);
      }

      Response::setDefaultSecurityHeaders();
      if (Request::isGzipAccepted())
      {
        Response::gzipContentIfNotDisabled();
      }

      Response::send();
    }
    catch (StopException $e)
    {

    }
  }

  public static function execute($method, $uri)
  {
    $router = static::getRouterWithRoutes();
    static::performSubdomainRedirects();
    try
    {
      $dispatcher = new Routing\Dispatcher($router->getData());
      return $dispatcher->dispatch($method, $uri);
    }
    catch (\Routing\HttpRouteNotFoundException $e)
    {
      return NavActions::execute404();
    }
    catch (\Routing\HttpMethodNotAllowedException $e)
    {
      Response::setStatus(405);
      Response::setHeader('Allow', implode(', ', $e->getAllowedMethods()));
      return ['page/405'];
    }
  }

  protected static function performSubdomainRedirects()
  {
    $subDomain = Request::getSubDomain();

    switch($subDomain) {
      case 'chat':
      case 'slack':
        return static::redirect('https://discord.gg/Z3bERWA');
    }
  }

  protected static function getRouterWithRoutes(): \Routing\RouteCollector
  {
    $router = new Routing\RouteCollector();

    $router->get(['/', 'home'], 'ContentActions::executeHome');

    $router->get(['/get', 'get'], 'DownloadActions::executeGet');
    $router->get(['/getrubin', 'getrubin'], 'DownloadActions::executeGet');
    foreach(array_keys(OS::getAll()) as $os)
    {
      $router->get(['/' . $os, 'get-' . $os], 'DownloadActions::executeGet');
    }
    $router->get('/roadmap', 'ContentActions::executeRoadmap');

    $router->post('/quickstart/auth', 'DeveloperActions::executeQuickstartAuth');
    $router->get('/quickstart/{step}?', 'DeveloperActions::executeQuickstart');
    $router->get('/quickstart/github/callback', 'DeveloperActions::executeQuickstartGithubCallback');

    $router->get(['/press-kit.zip', 'press-kit'], 'ContentActions::executePressKit');

    $router->get('/join-us', 'ContentActions::executeJobs');
    $router->post('/postcommit', 'OpsActions::executePostCommit');
    $router->post('/log-upload', 'OpsActions::executeLogUpload');
    $router->get(static::CACHE_CLEAR_PATH, 'OpsActions::executeClearCache');

    $router->any('/list/subscribe', 'MailActions::executeSubscribe');
    $router->any('/list/subscribed', 'MailActions::executeSubscribed');
    $router->get('/list/unsubscribe/{email}', 'MailActions::executeUnsubscribe');

    $router->any('/dmca', 'ReportActions::executeDmca');

    $router->any('/youtube/sub', 'AcquisitionActions::executeYouTubeSub');
    $router->post('/youtube/edit', 'AcquisitionActions::executeYoutubeEdit');
    $router->post('/youtube/token', 'AcquisitionActions::executeYoutubeToken');
    $router->any('/youtube/status/{token}', 'AcquisitionActions::executeYoutubeStatus');
    $router->any('/youtube', 'AcquisitionActions::executeYouTube');
    $router->any('/youtube/status', 'AcquisitionActions::executeRedirectYoutube');

    $router->get('/verify/{token}', 'AcquisitionActions::executeVerify');


    $router->get('/news/category/{category}', 'ContentActions::executePostCategoryFilter');

    $router->post('/set-culture', 'i18nActions::setCulture');

    $permanentRedirects = [
      '/lbry-osx-latest.dmg'                => '/get',
      '/lbry-linux-latest.deb'              => '/get',
      '/dl/lbry_setup.sh'                   => '/get',
      '/art'                                => '/what',
      '/why'                                => '/learn',
      '/feedback'                           => '/learn',
      '/joinus'                             => '/join-us',
      '/faq/when-referral-payouts'          => '/faq/referrals',
      '/faq/why-care-about-lbry'            => '/get',
      '/news/meet-the-lbry-founders'        => '/team',
      '/faq/no-auction-options'             => '/faq/naming',
      '/join-list'                          => '/list/subscribe',
      '/publish'                            => '/faq/how-to-publish',
      '/faq/quarterly-report-july-2016'     => '/credit-reports/2016-Q2',
      '/faq/quarterly-report-3q-2016'       => '/credit-reports/2016-Q3',
      '/faq/Q4-credit-report'               => '/credit-reports/2016-Q4',
      '/faq/Q1-17-CreditReport'             => '/credit-reports/2017-Q1',
      '/faq/how-to-report-bugs'             => '/faq/support',
      '/faq/make-money'                     => '/faq/earn-income',
    ];

    $tempRedirects = [
      '/apple-touch-icon.png' => '/img/fav/apple-touch-icon.png',
      '/LBRY-deck.pdf'        => 'https://www.dropbox.com/s/0xj4vgucsbi8rtv/lbry-deck.pdf?dl=1',
      '/deck.pdf'             => 'https://www.dropbox.com/s/0xj4vgucsbi8rtv/lbry-deck.pdf?dl=1',
      '/pln.pdf'              => 'https://www.dropbox.com/s/uevjrwnyr672clj/lbry-pln.pdf?dl=1',
      '/plan.pdf'             => 'https://www.dropbox.com/s/uevjrwnyr672clj/lbry-pln.pdf?dl=1',
      '/api'                  => 'https://lbryio.github.io/lbry',
      '/api-help'             => 'https://lbryio.github.io/lbry',
      '/security'             => '/faq/security',
      '/live'                 => 'https://www.youtube.com/watch?v=WM60vLOCRps', //'https://www.youtube.com/channel/UCXAcp3dJuPqeUekOacsuyaQ',
    ];


    foreach ([307 => $tempRedirects, 301 => $permanentRedirects] as $code => $redirects)
    {
      foreach ($redirects as $src => $target)
      {
        $router->any($src, function () use ($target, $code) { return static::redirect($target, $code); });
      }
    }

    $router->any('/get/lbry.pre.{ext:c}', 'DownloadActions::executeGetAppPrereleaseRedirect');
    $router->any('/get/lbry.{ext:c}', 'DownloadActions::executeGetAppRedirect');
    $router->any('/get/lbrynet.{os:c}.zip', 'DownloadActions::executeGetDaemonRedirect');

    $router->get([ContentActions::URL_NEWS . '/{slug:c}?', 'news'], 'ContentActions::executeNews');
    $router->get([ContentActions::URL_FAQ . '/{slug:c}?', 'faq'], 'ContentActions::executeFaq');
    $router->get([ContentActions::URL_BOUNTY . '/{slug:c}?', 'bounty'], 'ContentActions::executeBounty');
    $router->get([ContentActions::URL_PRESS . '/{slug:c}', 'press'], 'ContentActions::executePress');
//    $router->get([ContentActions::URL_CREDIT_REPORTS . '/{slug:c}?', 'faq'], 'ContentActions::executeFaq');
    $router->get(ContentActions::URL_CREDIT_REPORTS, 'ContentActions::executeCreditReports');
    $router->get([ContentActions::URL_CREDIT_REPORTS . '/{year:c}-q{quarter:c}', ContentActions::URL_CREDIT_REPORTS . '/{year:c}-Q{quarter:c}'], 'ContentActions::executeCreditReport');

    $router->get('/{slug}', function (string $slug)
    {
      if (View::exists('page/' . $slug))
      {
        Response::enableHttpCache();
        return ['page/' . $slug, []];
      }
      else
      {
        return NavActions::execute404();
      }
    });

    return $router;
  }

  public static function redirect($url, $statusCode = 302)
  {
    if (!$url)
    {
      throw new InvalidArgumentException('Cannot redirect to an empty URL.');
    }

    $url = str_replace('&amp;', '&', $url);

    Response::setStatus($statusCode);

    if ($statusCode == 201 || ($statusCode >= 300 && $statusCode < 400))
    {
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
    while ($fn = array_shift(static::$queuedFunctions))
    {
      call_user_func($fn);
    }
  }
}
