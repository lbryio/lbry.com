<?php

class Curl
{
  const GET = 'GET';
  const POST = 'POST';

  public static function get($url, $params = [], $options = [])
  {
    list ($status, $headers, $body) = static::doCurl(static::GET, $url, $params, $options);
    return $body;
  }

  public static function post($url, $params = [], $options = [])
  {
    list ($status, $headers, $body) = static::doCurl(static::POST, $url, $params, $options);
    return $body;
  }

  public static function doCurl($method, $url, $params = [], $options = [])
  {
    $defaults = [
      'headers'          => [],
      'verify'           => true,
      'timeout'          => 5,
      'follow_redirects' => true,
      'user_agent'       => null,
      'proxy'            => null,
      'password'         => null,
      'cookie'           => null,
      'json_post'        => false,
    ];

    $invalid = array_diff_key($options, $defaults);
    if ($invalid)
    {
      throw new DomainException('Invalid curl options: ' . join(', ', array_keys($invalid)));
    }

    $options = array_merge($defaults, $options);

    if (!in_array($method, [static::GET, static::POST]))
    {
      throw new DomainException('Invalid method: ' . $method);
    }

    if ($options['headers'] && $options['headers'] !== array_values($options['headers'])) // associative array
    {
      throw new DomainException('Headers must not be an associative array. Its a simple array with values of the form "Header: value"');
    }

    $ch = curl_init();

    if ($method == static::GET && $params)
    {
      $url .= (strpos($url, '?') === false ? '?' : '&') . http_build_query($params);
    }

    curl_setopt_array($ch, [
      CURLOPT_URL            => $url,
      CURLOPT_HTTPHEADER     => $options['headers'],
      CURLOPT_RETURNTRANSFER => true,
      //      CURLOPT_FAILONERROR    => true,
      CURLOPT_FOLLOWLOCATION => $options['follow_redirects'],
      CURLOPT_MAXREDIRS      => 10,
      CURLOPT_TIMEOUT        => $options['timeout'],
      CURLOPT_SSL_VERIFYPEER => $options['verify'],
      //      CURLOPT_SSL_VERIFYHOST => $options['verify'] ? 2 : 0, // php doc says to always keep this at 2 in production environments
      CURLOPT_USERAGENT      => $options['user_agent'],
    ]);

    if ($method == static::POST)
    {
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $options['json_post'] ? json_encode($params) : http_build_query($params));
    }

    if ($options['proxy'])
    {
      curl_setopt($ch, CURLOPT_PROXY, $options['proxy']);
      curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
    }

    if ($options['password'])
    {
      curl_setopt($ch, CURLOPT_USERPWD, $options['password']);
    }

    if ($options['cookie'])
    {
      curl_setopt($ch, CURLOPT_COOKIE, $options['cookie']);
    }

    $startingResponse = false;
    $headers          = [];
    curl_setopt($ch, CURLOPT_HEADERFUNCTION, function ($ch, $h) use (&$headers, &$startingResponse)
    {
      $value = trim($h);
      if ($value === '')
      {
        $startingResponse = true;
      }
      elseif ($startingResponse)
      {
        $startingResponse = false;
        $headers          = [$value];
      }
      else
      {
        $headers[] = $value;
      }
      return strlen($h);
    });


    $responseContent = curl_exec($ch);

    $statusCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if (curl_errno($ch))
    {
      throw new CurlException($ch);
    }

    curl_close($ch);

    return [$statusCode, $headers, $responseContent];
  }
}

class CurlException extends Exception
{
  protected $errno, $error, $info, $handle;

  public function __construct($curlHandle, Exception $previous = null)
  {
    $this->handle = $curlHandle;
    $this->errno  = curl_errno($curlHandle);
    $this->error  = curl_error($curlHandle);
    $this->info   = curl_getinfo($curlHandle);

    parent::__construct($this->error, $this->errno, $previous);
  }
}