<?php

class Curl
{
    const
    GET = 'GET',
    POST = 'POST',
    PUT = 'PUT',
    DELETE = 'DELETE';


    public static function get($url, $params = [], $options = [])
    {
        list($status, $headers, $body) = static::doCurl(static::GET, $url, $params, $options);
        return $body;
    }

    public static function post($url, $params = [], $options = [])
    {
        list($status, $headers, $body) = static::doCurl(static::POST, $url, $params, $options);
        return $body;
    }

    public static function put($url, $params = [], $options = [])
    {
        list($status, $headers, $body) = static::doCurl(static::PUT, $url, $params, $options);
        return $body;
    }

    public static function delete($url, $params = [], $options = [])
    {
        list($status, $headers, $body) = static::doCurl(static::DELETE, $url, $params, $options);
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
      'json_data'        => false,
      'json_response'    => false,
      'retry'            => false,
    ];

        $invalid = array_diff_key($options, $defaults);
        if ($invalid) {
            throw new DomainException('Invalid curl options: ' . join(', ', array_keys($invalid)));
        }

        if (!in_array($method, [static::GET, static::POST, static::PUT])) {
            throw new DomainException('Invalid method: ' . $method);
        }

        $options = array_merge($defaults, $options);

        if ($options['headers'] && $options['headers'] !== array_values($options['headers'])) { // associative array
            throw new DomainException('Headers must not be an associative array. Its a simple array with values of the form "Header: value"');
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_STDERR, fopen(sys_get_temp_dir().'/curl-debug-'.date('Ymd-His'), 'w+'));

        if ($ch === false || $ch === null) {
            throw new LogicException('Unable to initialize cURL');
        }

        $urlWithParams = $url;
        if ($method == static::GET && $params) {
            $urlWithParams .= (strpos($urlWithParams, '?') === false ? '?' : '&') . http_build_query($params);
        }

        curl_setopt_array($ch, [
      CURLOPT_URL            => $urlWithParams,
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

        if ($method == static::POST) {
            curl_setopt($ch, CURLOPT_POST, true);
        } elseif ($method == static::PUT) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        }

        if (in_array($method, [static::PUT, static::POST])) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $options['json_data'] ? json_encode($params) : http_build_query($params));
        }

        if ($options['proxy']) {
            curl_setopt($ch, CURLOPT_PROXY, $options['proxy']);
            curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        }

        if ($options['password']) {
            curl_setopt($ch, CURLOPT_USERPWD, $options['password']);
        }

        if ($options['cookie']) {
            curl_setopt($ch, CURLOPT_COOKIE, $options['cookie']);
        }

        $startingResponse = false;
        $headers          = [];
        curl_setopt($ch, CURLOPT_HEADERFUNCTION, function ($ch, $h) use (&$headers, &$startingResponse) {
            $value = trim($h);
            if ($value === '') {
                $startingResponse = true;
            } elseif ($startingResponse) {
                $startingResponse = false;
                $headers          = [$value];
            } else {
                $headers[] = $value;
            }
            return strlen($h);
        });

        $rawResponse = curl_exec($ch);

        if ($options['json_response']) {
            $responseContent = $rawResponse ? json_decode($rawResponse, true) : [];
        } else {
            $responseContent = $rawResponse;
        }

        $statusCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            if ($options['retry'] && is_numeric($options['retry']) && $options['retry'] > 0) {
                $options['retry'] -= 1;
                return static::doCurl($method, $url, $params, $options);
            }
            throw new CurlException($ch);
        }

        curl_close($ch);

        return [$statusCode, $headers, $responseContent];
    }
}

class CurlException extends Exception
{
    protected $errno;
    protected $error;
    protected $info;
    protected $handle;

    public function __construct($curlHandle, Exception $previous = null)
    {
        $this->handle = $curlHandle;
        $this->errno  = curl_errno($curlHandle);
        $this->error  = curl_error($curlHandle);
        $this->info   = curl_getinfo($curlHandle);

        parent::__construct($this->error, $this->errno, $previous);
    }
}
