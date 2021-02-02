<?php

class Response
{
    const HEADER_STATUS   = 'Status';
    const HEADER_LOCATION = 'Location';

    const HEADER_CACHE_CONTROL = 'Cache-Control';
    const HEADER_ETAG          = 'Etag';

    const HEADER_CONTENT_TYPE         = 'Content-Type';
    const HEADER_CONTENT_LENGTH       = 'Content-Length';
    const HEADER_CONTENT_DISPOSITION  = 'Content-Disposition';
    const HEADER_CONTENT_TYPE_OPTIONS = 'X-Content-Type-Options';
    const HEADER_CONTENT_ENCODING     = 'Content-Encoding';
    const HEADER_CROSS_ORIGIN = 'Access-Control-Allow-Origin';

    protected static $metaDescription = '';
    protected static $metaTitle = '';
    protected static $jsCalls = [];
    protected static $assets = [
    'js'  => [
      '/js/jquery-3.4.1.min.js',
      '/js/global.js'
    ],
    'css' => ['/css/all.css']
  ];
    protected static $headers = [
      'Cache-Control' => 'private, no-cache'
    ];
    protected static $headersSent = false;
    protected static $content = '';
    protected static $contentSent = false;
    protected static $gzipResponseContent = true;
    protected static $metaImages = [];
    protected static $facebookAnalyticsType = "PageView";

    private static $PostRenderCallbacks = array();

    public static function setMetaDescription($description)
    {
        static::$metaDescription = $description;
    }

    public static function addMetaImage($url)
    {
        static::$metaImages[] = $url;
    }

    public static function addMetaImages(array $urls)
    {
        foreach ($urls as $url) {
            static::addMetaImage($url);
        }
    }

    public static function getMetaDescription()
    {
        return static::$metaDescription ?: 'A Content Revolution';
    }

    public static function getMetaImages()
    {
        return static::$metaImages ?: [Request::getHostAndProto() . '/img/og-image.png?_cache=' . date('Y-m-d')];
    }

    public static function setMetaTitle($title)
    {
        static::$metaTitle = $title;
    }

    public static function getMetaTitle()
    {
        return trim(static::$metaTitle);
    }

    public static function guessMetaTitle($content)
    {
        $title = '';
        preg_match_all('/<h(1|2)[^>]*>([^<]+)</', $content, $titleMatches);
        foreach ($titleMatches[1] as $matchIndex => $headerValue) {
            if ($headerValue == '1' || !$title) {
                $title = $titleMatches[2][$matchIndex];
                if ($headerValue == '1') {
                    return trim($title);
                }
            }
        }
        return trim($title);
    }

    public static function getJsCalls()
    {
        return static::$jsCalls;
    }

    public static function jsOutputCallback($js)
    {
        static::$jsCalls[] = $js;
        return '';
    }

    public static function addJsAsset($src)
    {
        static::$assets['js'][$src] = $src;
    }

    public static function addCssAsset($src)
    {
        static::$assets['css'][$src] = $src;
    }

    public static function getJsAssets()
    {
        return static::$assets['js'];
    }

    public static function getCssAssets()
    {
        return static::$assets['css'];
    }

    public static function setCssAssets(array $assets = [])
    {
        static::$assets['css'] = $assets;
    }
    public static function setGzipResponseContent($gzip = true)
    {
        static::$gzipResponseContent = $gzip;
    }

    public static function gzipContentIfNotDisabled()
    {
        if (static::$gzipResponseContent) {
            $content = static::getContent();
            if (strlen($content) > 256) { // not worth it for really short content
                $compressed = gzencode($content, 1);
                static::setContent($compressed);
                static::setHeader(static::HEADER_CONTENT_LENGTH, strlen($compressed));
                static::setHeader(static::HEADER_CONTENT_ENCODING, 'gzip');
            }
        }
    }

    public static function send()
    {
        $status = static::getHeader(static::HEADER_STATUS);
        $sendContent = true;
        if ((!$status || $status === 200) &&
          static::getHeader(static::HEADER_ETAG) &&
          Request::getHttpHeader('If-None-Match', null) === static::getHeader(static::HEADER_ETAG)
        ) {
            static::setHeader(static::HEADER_STATUS, 304);
            $sendContent = false;
        }

        static::sendHeaders();

        if ($sendContent) {
            static::sendContent();
        }
    }

    public static function setContent(string $content)
    {
        static::$content = $content;
    }

    public static function getContent(): string
    {
        return static::$content;
    }

    public static function sendContent()
    {
        if (static::$contentSent) {
            throw new LogicException('Content has already been sent. It cannot be sent twice');
        }

        echo static::$content;

        static::$contentSent = true;
    }

    public static function setDownloadHttpHeaders($name, $type = null, $size = null, $noSniff = true)
    {
        static::setBinaryHttpHeaders($type, $size, $noSniff);
        static::setHeader('Content-Disposition', 'attachment;filename=' . $name);
    }

    public static function setBinaryHttpHeaders($type, $size = null, $noSniff = true)
    {
        static::setGzipResponseContent(false); // in case its already compressed
        static::setHeaders(array_filter([
      static::HEADER_CONTENT_TYPE => $type,
      static::HEADER_CONTENT_LENGTH => $size ?: null,
      static::HEADER_CONTENT_TYPE_OPTIONS => $noSniff ? 'nosniff' : null,
    ]));
    }

    //public immutable cache = hard-caching (no server checks) until time limit passes
    public static function enablePublicImmutableCache(int $seconds = 300)
    {
        static::setHeader(static::HEADER_CACHE_CONTROL, 'public, max-age=' . $seconds);
    }

    //public mutable cache = soft-caching (requires at least one round trip for headers) as long as etag identifier matches
    public static function enablePublicMutableCache(string $etag)
    {
        static::setHeader(static::HEADER_CACHE_CONTROL, 'public');
        static::setHeader(static::HEADER_ETAG, $etag);
    }

    //always reload and re-execute this resource, disable any local or intermediary caching
    public static function disableHttpCache()
    {
        static::setHeader(static::HEADER_CACHE_CONTROL, 'private, no-cache, no-store');
    }

    public static function setHeader($name, $value)
    {
        static::$headers[$name] = $value;
    }

    public static function setHeaders($headers, $overwrite = true)
    {
        foreach ($headers as $name => $value) {
            if ($overwrite || !static::getHeader($name)) {
                static::setHeader($name, $value);
            }
        }
    }

    public static function getHeader($name, $default = null)
    {
        return static::$headers[$name] ?? $default;
    }

    public static function getHeaders(): array
    {
        return static::$headers;
    }

    public static function setStatus($status)
    {
        static::setHeader(static::HEADER_STATUS, $status);
    }

    public static function setDefaultSecurityHeaders()
    {
        $defaultHeaders = [
            'Content-Security-Policy' => "frame-ancestors 'none'",
            'X-Frame-Options'         => 'DENY',
            'X-XSS-Protection'        => '1',
        ];

        if (IS_PRODUCTION) {
            $defaultHeaders['Strict-Transport-Security'] = 'max-age=31536000';
        }

        static::setHeaders($defaultHeaders, false);
    }

    public static function sendHeaders()
    {
        if (static::$headersSent) {
            throw new LogicException('Headers have already been sent. They cannot be sent twice');
        }

        if (!static::getHeader(static::HEADER_CONTENT_TYPE)) {
            static::setHeader(static::HEADER_CONTENT_TYPE, 'text/html');
        }

        $headers = static::getHeaders();

        if (isset($headers[static::HEADER_STATUS])) {
            $status = 'HTTP/1.0 ' . $headers[static::HEADER_STATUS] . ' ' . static::getStatusTextForCode($headers[static::HEADER_STATUS]);
            header($status);

            if (substr(php_sapi_name(), 0, 3) == 'cgi') {
                // fastcgi servers cannot send this status information because it was sent by them already due to the HTT/1.0 line
                // so we can safely unset them. see ticket #3191
                unset($headers[static::HEADER_STATUS]);
            }
        }

        foreach ($headers as $name => $value) {
            header($name . ': ' . $value);
        }

        static::$headersSent = true;
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

        return $statusTexts[$code] ?? null;
    }

    public static function setFacebookPixelAnalyticsType($type)
    {
        static::$facebookAnalyticsType = $type;
    }

    public static function getFacebookPixelAnalyticsType()
    {
        return static::$facebookAnalyticsType;
    }

    protected static function normalizeHeaderName($name): string
    {
        return preg_replace_callback(
            '/\-(.)/',
            function ($matches) {
                return '-' . strtoupper($matches[1]);
            },
            strtr(ucfirst(strtolower($name)), '_', '-')
        );
    }

    public static function addPostRenderCallback($cb)
    {
        array_push(static::$PostRenderCallbacks, $cb);
    }

    public static function invokePostRenderCallbacks()
    {
        foreach (static::$PostRenderCallbacks as &$cb) {
            $cb();
        }
    }


    //  public static function addBodyCssClass($classOrClasses)
//  {
//    static::$bodyCssClasses = array_unique(array_merge(static::$bodyCssClasses, (array)$classOrClasses));
//  }
//
//  public static function getBodyCssClasses()
//  {
//    return static::$bodyCssClasses;
//  }
}
