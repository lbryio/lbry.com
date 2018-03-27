<?php

class Request
{
  const GET     = 'GET';
  const POST    = 'POST';
  const HEAD    = 'HEAD';
  const OPTIONS = 'OPTIONS';

  protected static $method;

  public static function getParam(string $key, $default = null)
  {
    return $_POST[$key] ?? $_GET[$key] ?? $default;
  }

  public static function getPostParam(string $key, $default = null)
  {
    return $_POST[$key] ?? $default;
  }

  public static function getMethod(): string
  {
    if (!static::$method)
    {
      $method = static::getHeader('REQUEST_METHOD') ? strtoupper(static::getHeader('REQUEST_METHOD')) : null;

      static::$method = in_array($method, [static::GET, static::POST, static::HEAD, static::OPTIONS]) ? $method : static::GET;
    }
    return static::$method;
  }

  protected static function getHeader(string $name, $default = null)
  {
    return $_SERVER[strtoupper($name)] ?? $default;
  }

  public static function getHttpHeader(string $name, $default = null)
  {
    $header = 'HTTP_' . strtoupper(strtr($name, '-', '_'));
    return isset($_SERVER[$header]) ? static::stripSlashes($_SERVER[$header]) : $default;
  }

  protected static function stripSlashes($value)
  {
    return is_array($value) ? array_map(get_called_class() . '::stripSlashes', $value) : stripslashes($value);
  }


  public static function isGet(): bool
  {
    return static::getMethod() == static::GET;
  }

  public static function isPost(): bool
  {
    return static::getMethod() == static::POST;
  }

  public static function isCacheableMethod(): bool
  {
    return in_array(static::getMethod(), [static::GET, static::HEAD]);
  }

  public static function getOriginalIp(): string
  {
    return static::getHttpHeader('X-Real-Ip') ??
           (static::getHttpHeader('X-Forwarded-For') ? trim(explode(',', static::getHttpHeader('X-Forwarded-For'))[0]) :
             static::getHeader('REMOTE_ADDR', ''));
  }

  public static function getUserAgent(): string
  {
    return static::getHttpHeader('User-Agent') ?? '';
  }

  public static function getRoutingUri()
  {
    $host = preg_replace('/^www\./', '', static::getHost());
    switch($host)
    {
      case 'betteryoutube.com':
      case 'lbrycreators.com':
        return '/youtube';
    }
    return static::getRelativeUri();
  }

  public static function getHost(): string
  {
    // apparently trailing period is legal: http://www.dns-sd.org/TrailingDotsInDomainNames.html
    return static::getHttpHeader('Host') ? rtrim(static::getHttpHeader('Host'), '.') : '';
  }

  public static function getSubDomain(): string
  {
    $host = static::getHost();
    $domainParts = explode('.', $host);
    $domainPartCount = count($domainParts);

    if (count($domainParts) < 1)
    {
      return '';
    }

    $isLocalhost = $domainParts[$domainPartCount - 1] === 'localhost';

    if (count($domainParts) < ($isLocalhost ? 2 : 3))
    {
      return '';
    }

    return $isLocalhost ?
      $domainParts[$domainPartCount - 2] :
      $domainParts[$domainPartCount - 3];
  }

  public static function getHostAndProto(): string
  {
    return (static::isSSL() ? 'https' : 'http') . '://' . static::getHost();
  }

  public static function isSSL(): bool
  {
    return static::getHeader('HTTPS') || strtolower(static::getHttpHeader('X_FORWARDED_PROTO')) == 'https';
  }

  public static function getServerName(): string
  {
    return static::getHeader('SERVER_NAME');
  }

  public static function getReferrer(string $fallback = '/')
  {
    return Request::getHttpHeader('Referer', $fallback);
  }

  public static function getRelativeUri(): string
  {
    return static::getHeader('REQUEST_URI') ? parse_url(static::getHeader('REQUEST_URI'), PHP_URL_PATH) : '';
  }

  public static function isGzipAccepted(): bool
  {
    return static::getHttpHeader('Accept-Encoding') && strpos(strtolower(static::getHttpHeader('Accept-Encoding')), 'gzip') !== false;
  }

  public static function isRobot()
  {
    $bots = [
      'bot', 'spider', 'crawler', 'siteexplorer', 'yahoo', 'slurp', 'dataaccessd', 'facebook', 'twitter', 'coccoc',
      'calendar', 'curl', 'wget', 'panopta', 'blogtrottr', 'zapier', 'newrelic', 'luasocket',
      'okhttp', 'python'
    ];

    return preg_match('/(' . join('|', $bots) . ')/i', static::getUserAgent());
  }
  //Method that encode html tags to special character
  public static function encodeStringFromUser($string){
      return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
  }
}
