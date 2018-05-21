<?php

namespace Routing;

class HttpMethodNotAllowedException extends HttpException
{
    protected $allowedMethods;

    public function __construct(array $allowedMethods, $message = "", $code = 0, Exception $previous = null)
    {
        $this->allowedMethods = $allowedMethods;
        parent::__construct($message, $code, $previous);
    }

    public function getAllowedMethods()
    {
        return $this->allowedMethods;
    }
}
