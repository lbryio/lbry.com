<?php

class Request
{
  const GET     = 'GET';
  const POST    = 'POST';
  const HEAD    = 'HEAD';
  const OPTIONS = 'OPTIONS';

  protected static $method;

  public static function getMethod(): string
  {
    if (!static::$method)
    {
      $method         = isset($_SERVER['REQUEST_METHOD']) ? strtoupper($_SERVER['REQUEST_METHOD']) : null;
      static::$method = in_array($method, [static::GET, static::POST, static::HEAD, static::OPTIONS]) ? $method : static::GET;
    }
    return static::$method;
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
    return isset($_SERVER['HTTP_X_FORWARDED_FOR']) ?
      $_SERVER['HTTP_X_FORWARDED_FOR'] :
      (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
  }
  
  public static function getUserAgent(): string
  {
    return isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
  }

  public static function getHost(): string
  {
    // apparently trailing period is legal: http://www.dns-sd.org/TrailingDotsInDomainNames.html
    return isset($_SERVER['HTTP_HOST']) ? rtrim($_SERVER['HTTP_HOST'], '.') : '';
  }

  public static function getRelativeUri(): string
  {
    return isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
  }
}