<?php

namespace Routing;

class Route
{
    /**
     * Constants for before and after filters
     */
    public const BEFORE = 'before';
    public const AFTER  = 'after';
    public const PREFIX = 'prefix';

    /**
     * Constants for common HTTP methods
     */
    public const ANY     = 'ANY';
    public const GET     = 'GET';
    public const HEAD    = 'HEAD';
    public const POST    = 'POST';
    public const PUT     = 'PUT';
    public const PATCH   = 'PATCH';
    public const DELETE  = 'DELETE';
    public const OPTIONS = 'OPTIONS';
}
