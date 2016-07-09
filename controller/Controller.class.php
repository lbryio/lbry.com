<?php

class Controller
{
  const HEADER_STATUS = 'Status';

  public static function dispatch($uri)
  {
    try
    {
      $viewAndParams = static::execute($uri);
      $viewTemplate = $viewAndParams[0];
      $viewParameters = isset($viewAndParams[1]) ? $viewAndParams[1] : [];
      $headers = isset($viewAndParams[2]) ? $viewAndParams[2] : [];

      static::sendHeaders($headers);

      if ($viewTemplate === null)
      {
        return '';
      }

      if (!$viewTemplate)
      {
        throw new LogicException('All execute methods must return a template.');
      }

      $layout = !(isset($viewParameters['_no_layout']) && $viewParameters['_no_layout']);
      unset($viewParameters['_no_layout']);

      $layoutParams = isset($viewParameters[View::LAYOUT_PARAMS]) ? $viewParameters[View::LAYOUT_PARAMS] : [];
      unset($viewParameters[View::LAYOUT_PARAMS]);

      $content = View::render($viewTemplate, $viewParameters + ['fullPage' => true]);

      echo $layout ? View::render('layout/basic', ['content' => $content] + $layoutParams) : $content;
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
      case '/fund':
        return CreditActions::executeFund();
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
        return static::redirect('https://s3.amazonaws.com/files.lbry.io/LBRY-deck.pdf', 307);
      case '/dl/lbry_setup.sh':
        return ['internal/dl-not-supported', ['_no_layout' => true]];
      case '/lbry-osx-latest.dmg':
        // THIS ROUTE IS DEPRECATED. IT WILL BE REMOVED SOON.
        return static::redirect('https://github.com/lbryio/lbry/releases/download/v0.2.5/lbry.0.2.5.dmg', 307);
      case '/lbry-linux-latest.deb':
        // THIS ROUTE IS DEPRECATED. IT WILL BE REMOVED SOON.
        return static::redirect('https://github.com/lbryio/lbry/releases/download/v0.2.5/lbry_0.2.5_amd64.deb', 307);
      case '/art':
        return static::redirect('/what', 301);
      case '/why':
      case '/feedback':
        return static::redirect('/learn', 301);
    }

    $newsPattern = '#^' . ContentActions::URL_NEWS . '(/|$)#';
    if (preg_match($newsPattern, $uri))
    {
      $slug = preg_replace($newsPattern, '', $uri);
      if ($slug == ContentActions::RSS_SLUG)
      {
        return ContentActions::executeRss();
      }
      return $slug ? ContentActions::executePost($uri) : ContentActions::executeNews();
    }

    $faqPattern = '#^' . ContentActions::URL_FAQ . '(/|$)#';
    if (preg_match($faqPattern, $uri))
    {
      $slug = preg_replace($faqPattern, '', $uri);
      return $slug ? ContentActions::executePost($uri) : ContentActions::executeFaq();
    }
    $noSlashUri = ltrim($uri, '/');

    $accessPattern = '#^/signup#';
    if (preg_match($accessPattern, $uri))
    {
      return DownloadActions::executeSignup();
    }

    if (View::exists('page/' . $noSlashUri))
    {
      return ['page/' . $noSlashUri, []];
    }
    else
    {
      return ['page/404', [], [static::HEADER_STATUS => 404]];
    }
  }

  public static function redirect($url, $statusCode = 302)
  {
    if (!$url)
    {
      throw new InvalidArgumentException('Cannot redirect to an empty URL.');
    }

    $url = str_replace('&amp;', '&', $url);

    $headers = [static::HEADER_STATUS => $statusCode];


    if ($statusCode == 201 || ($statusCode >= 300 && $statusCode < 400))
    {
      $headers['Location'] = $url;
    }

    return ['internal/redirect', ['url' => $url], $headers];
  }

  protected static function sendHeaders(array $headers)
  {
    if (isset($headers[static::HEADER_STATUS]))
    {
      $status = 'HTTP/1.0 ' . $headers[static::HEADER_STATUS] . ' ' . static::getStatusTextForCode($headers[static::HEADER_STATUS]);
      header($status);

      if (substr(php_sapi_name(), 0, 3) == 'cgi')
      {
        // fastcgi servers cannot send this status information because it was sent by them already due to the HTT/1.0 line
        // so we can safely unset them. see ticket #3191
        unset($headers[static::HEADER_STATUS]);
      }
    }

    foreach($headers as $name => $value)
    {
      header($name . ': ' . $value);
    }
  }

  public static function getStatusTextForCode($code)
  {
    $statusTexts = [
      '100' => 'Continue',
      '101' => 'Switching Protocols',
      '200' => 'OK',
      '201' => 'Created',
      '202' => 'Accepted',
      '203' => 'Non-Authoritative Information',
      '204' => 'No Content',
      '205' => 'Reset Content',
      '206' => 'Partial Content',
      '300' => 'Multiple Choices',
      '301' => 'Moved Permanently',
      '302' => 'Found',
      '303' => 'See Other',
      '304' => 'Not Modified',
      '305' => 'Use Proxy',
      '306' => '(Unused)',
      '307' => 'Temporary Redirect',
      '400' => 'Bad Request',
      '401' => 'Unauthorized',
      '402' => 'Payment Required',
      '403' => 'Forbidden',
      '404' => 'Not Found',
      '405' => 'Method Not Allowed',
      '406' => 'Not Acceptable',
      '407' => 'Proxy Authentication Required',
      '408' => 'Request Timeout',
      '409' => 'Conflict',
      '410' => 'Gone',
      '411' => 'Length Required',
      '412' => 'Precondition Failed',
      '413' => 'Request Entity Too Large',
      '414' => 'Request-URI Too Long',
      '415' => 'Unsupported Media Type',
      '416' => 'Requested Range Not Satisfiable',
      '417' => 'Expectation Failed',
      '419' => 'Authentication Timeout',
      '422' => 'Unprocessable Entity',
      '426' => 'Upgrade Required',
      '429' => 'Too Many Requests',
      '500' => 'Internal Server Error',
      '501' => 'Not Implemented',
      '502' => 'Bad Gateway',
      '503' => 'Service Unavailable',
      '504' => 'Gateway Timeout',
      '505' => 'HTTP Version Not Supported',
    ];

    return isset($statusTexts[$code]) ? $statusTexts[$code] : null;
  }
}
