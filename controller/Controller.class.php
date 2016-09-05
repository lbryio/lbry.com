<?php

class Controller
{
  public static function dispatch($uri)
  {
    try
    {
      $viewAndParams = static::execute($uri);
      $viewTemplate = $viewAndParams[0];
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

  public static function execute($uri)
  {
    switch($uri)
    {
      case '/':
        return ContentActions::executeHome();
      case '/get':
      case '/windows':
      case '/ios':
      case '/android':
      case '/linux':
      case '/osx':
        return DownloadActions::executeGet();
      case '/postcommit':
        return OpsActions::executePostCommit();
      case '/log-upload':
        return OpsActions::executeLogUpload();
      case '/list-subscribe':
        return MailActions::executeListSubscribe();
      case '/press-kit.zip':
        return ContentActions::executePressKit();
      case '/LBRY-deck.pdf':
      case '/deck.pdf':
        return static::redirect('https://www.dropbox.com/s/0xj4vgucsbi8rtv/lbry-deck.pdf?dl=1');
      case '/pln.pdf':
      case '/plan.pdf':
        return static::redirect('https://www.dropbox.com/s/uevjrwnyr672clj/lbry-pln.pdf?dl=1');
      case '/lbry-osx-latest.dmg':
      case '/lbry-linux-latest.deb':
      case '/dl/lbry_setup.sh':
        return static::redirect('/get', 301);
      case '/get/lbry.dmg':
        return static::redirect(DownloadActions::getDownloadUrl(DownloadActions::OS_OSX) ?: '/get');
      case '/get/lbry.deb':
        return static::redirect(DownloadActions::getDownloadUrl(DownloadActions::OS_LINUX) ?: '/get');
      case '/art':
        return static::redirect('/what', 301);
      case '/why':
      case '/feedback':
        return static::redirect('/learn', 301);
      case '/faq/when-referral-payouts':
        return static::redirect('/faq/referrals', 301);
    }

    $newsPattern = '#^' . ContentActions::URL_NEWS . '(/|$)#';
    if (preg_match($newsPattern, $uri))
    {
      Response::enableHttpCache();
      $slug = preg_replace($newsPattern, '', $uri);
      if ($slug == ContentActions::RSS_SLUG)
      {
        return ContentActions::executeRss();
      }
      return $slug ? ContentActions::executeNewsPost($uri) : ContentActions::executeNews();
    }

    $faqPattern = '#^' . ContentActions::URL_FAQ . '(/|$)#';
    if (preg_match($faqPattern, $uri))
    {
      Response::enableHttpCache();
      $slug = preg_replace($faqPattern, '', $uri);
      return $slug ? ContentActions::executeFaqPost($uri) : ContentActions::executeFaq();
    }

    $bountyPattern = '#^' . BountyActions::URL_BOUNTY_LIST . '(/|$)#';
    if (preg_match($bountyPattern, $uri))
    {
      Response::enableHttpCache();
      $slug = preg_replace($bountyPattern, '', $uri);
      return $slug ? BountyActions::executeShow($uri) : BountyActions::executeList($uri);
    }

    $accessPattern = '#^/signup#';
    if (preg_match($accessPattern, $uri))
    {
      return DownloadActions::executeSignup();
    }


    $noSlashUri = ltrim($uri, '/');
    if (View::exists('page/' . $noSlashUri))
    {
      Response::enableHttpCache();
      return ['page/' . $noSlashUri, []];
    }
    else
    {
      Response::setStatus(404);
      return ['page/404', []];
    }
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
}
