<?php

namespace Routing;

class HandlerResolver implements HandlerResolverInterface
{
    public function resolve($handler)
    {
        if (is_array($handler) && is_string($handler[0])) {
            $handler[0] = new $handler[0];
        }

        return $handler;
    }
}
