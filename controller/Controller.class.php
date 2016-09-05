<?php

class Controller
{
  protected static $queuedFunctions = [];

  public static function dispatch($uri)
  {
    try
    {
      $viewAndParams  = static::execute(Request::getMethod(), $uri);
      $viewTemplate   = $viewAndParams[0];
      $viewParameters = $viewAndParams[1] ?? [];
      if (!IS_PRODUCTION && isset($viewAndParams[2]))
      {
        throw new Exception('use response::setheader instead of returning headers');
      }

      if ($viewTemplate === null)
      {
        return;
      }

      if (!$viewTemplate)
      {
        throw new LogicException('All execute methods must return a template or NULL.');
      }

      $layout = !(isset($viewParameters['_no_layout']) && $viewParameters['_no_layout']);
      unset($viewParameters['_no_layout']);

      $layoutParams = $viewParameters[View::LAYOUT_PARAMS] ?? [];
      unset($viewParameters[View::LAYOUT_PARAMS]);

      $content = View::render($viewTemplate, $viewParameters + ['fullPage' => true]);

      Response::setContent($layout ? View::render('layout/basic', ['content' => $content] + $layoutParams) : $content);
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
    try
    {
      $dispatcher = new Routing\Dispatcher($router->getData());
      return $dispatcher->dispatch($method, $uri);
    }
    catch (\Routing\HttpRouteNotFoundException $e)
    {
      return NavActions::execute404();
    }
  }

  protected static function getRouterWithRoutes(): \Routing\RouteCollector
  {
    $router = new Routing\RouteCollector();

    $router->get(['/', 'home'], 'ContentActions::executeHome');

    $router->get(['/get', 'get'], 'DownloadActions::executeGet');
    $router->get(['/windows', 'get-windows'], 'DownloadActions::executeGet');
    $router->get(['/linux', 'get-linux'], 'DownloadActions::executeGet');
    $router->get(['/osx', 'get-osx'], 'DownloadActions::executeGet');
    $router->get(['/android', 'get-android'], 'DownloadActions::executeGet');
    $router->get(['/ios', 'get-ios'], 'DownloadActions::executeGet');

    $router->get(['/press-kit.zip', 'press-kit'], 'ContentActions::executePressKit');

    $router->post('/postcommit', 'OpsActions::executePostCommit');
    $router->post('/log-upload', 'OpsActions::executeLogUpload');
    $router->post(['/list-subscribe', 'list-subscribe'], 'MailActions::executeListSubscribe');

    $permanentRedirects = [
      '/lbry-osx-latest.dmg'       => '/get',
      '/lbry-linux-latest.deb'     => '/get',
      '/dl/lbry_setup.sh'          => '/get',
      '/art'                       => '/what',
      '/why'                       => '/learn',
      '/feedback'                  => '/learn',
      '/faq/when-referral-payouts' => '/faq/referrals',
    ];

    $tempRedirects = [
      '/LBRY-deck.pdf' => 'https://www.dropbox.com/s/0xj4vgucsbi8rtv/lbry-deck.pdf?dl=1',
      '/deck.pdf'      => 'https://www.dropbox.com/s/0xj4vgucsbi8rtv/lbry-deck.pdf?dl=1',
      '/pln.pdf'       => 'https://www.dropbox.com/s/uevjrwnyr672clj/lbry-pln.pdf?dl=1',
      '/plan.pdf'      => 'https://www.dropbox.com/s/uevjrwnyr672clj/lbry-pln.pdf?dl=1',
      '/get/lbry.dmg'  => DownloadActions::getDownloadUrl(DownloadActions::OS_OSX) ?: '/get',
      '/get/lbry.deb'  => DownloadActions::getDownloadUrl(DownloadActions::OS_LINUX) ?: '/get',
    ];

    foreach ([302 => $tempRedirects, 301 => $permanentRedirects] as $code => $redirects)
    {
      foreach ($redirects as $src => $target)
      {
        $router->any($src, function () use ($target, $code) { return static::redirect($target, $code); });
      }
    }

    $router->get([ContentActions::URL_NEWS . '/{slug:c}?', 'news'], 'ContentActions::executeNews');
    $router->get([ContentActions::URL_FAQ . '/{slug:c}?', 'faq'], 'ContentActions::executeFaq');
    $router->get([BountyActions::URL_BOUNTY . '/{slug:c}?', 'bounty'], 'BountyActions::executeShow');

    $router->any(['/signup{whatever}?', 'signup'], 'DownloadActions::executeSignup');

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
    foreach(static::$queuedFunctions as $fn)
    {
      call_user_func($fn);
    }
  }
}
