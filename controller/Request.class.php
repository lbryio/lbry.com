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

  public static function getHost(): string
  {
    // apparently trailing period is legal: http://www.dns-sd.org/TrailingDotsInDomainNames.html
    return static::getHttpHeader('Host') ? rtrim(static::getHttpHeader('Host'), '.') : '';
  }

  public static function getServerName(): string
  {
    return static::getHeader('SERVER_NAME');
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
}