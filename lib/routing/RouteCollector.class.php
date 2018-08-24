<?php

namespace Routing;

class RouteCollector
{
    const DEFAULT_CONTROLLER_ROUTE = 'index';

    const APPROX_CHUNK_SIZE = 10;

    /**
     * @var RouteParser
     */
    private $routeParser;
    /**
     * @var array
     */
    private $filters = [];
    /**
     * @var array
     */
    private $staticRoutes = [];
    /**
     * @var array
     */
    private $regexToRoutesMap = [];
    /**
     * @var array
     */
    private $reverse = [];

    /**
     * @var array
     */
    private $globalFilters = [];

    /**
     * @var string
     */
    private $globalRoutePrefix = '';

    public function __construct(RouteParser $routeParser = null)
    {
        $this->routeParser = $routeParser ?: new RouteParser();
    }

    public function hasRoute(string $name): bool
    {
        return isset($this->reverse[$name]);
    }

    public function route(string $name, array $args = null): string
    {
        $url = [];

        $replacements = is_null($args) ? [] : array_values($args);

        $variable = 0;

        foreach ($this->reverse[$name] as $part) {
            if (!$part['variable']) {
                $url[] = $part['value'];
            } elseif (isset($replacements[$variable])) {
                if ($part['optional']) {
                    $url[] = '/';
                }

                $url[] = $replacements[$variable++];
            } elseif (!$part['optional']) {
                throw new BadRouteException("Expecting route variable '{$part['name']}'");
            }
        }

        return implode('', $url);
    }

    public function addRoute(string $httpMethod, $route, $handler, array $filters = []): RouteCollector
    {
        if (is_array($route)) {
            list($route, $name) = $route;
        }

        $route = $this->addPrefix($this->trim($route));

        list($routeData, $reverseData) = $this->routeParser->parse($route);

        if (isset($name)) {
            $this->reverse[$name] = $reverseData;
        }

        $filters = array_merge_recursive($this->globalFilters, $filters);

        isset($routeData[1]) ?
      $this->addVariableRoute($httpMethod, $routeData, $handler, $filters) :
      $this->addStaticRoute($httpMethod, $routeData, $handler, $filters);

        return $this;
    }

    private function addStaticRoute(string $httpMethod, $routeData, $handler, $filters)
    {
        $routeStr = $routeData[0];

        if (isset($this->staticRoutes[$routeStr][$httpMethod])) {
            throw new BadRouteException("Cannot register two routes matching '$routeStr' for method '$httpMethod'");
        }

        foreach ($this->regexToRoutesMap as $regex => $routes) {
            if (isset($routes[$httpMethod]) && preg_match('~^' . $regex . '$~', $routeStr)) {
                throw new BadRouteException("Static route '$routeStr' is shadowed by previously defined variable route '$regex' for method '$httpMethod'");
            }
        }

        $this->staticRoutes[$routeStr][$httpMethod] = [$handler, $filters, []];
    }

    private function addVariableRoute(string $httpMethod, $routeData, $handler, $filters)
    {
        list($regex, $variables) = $routeData;

        if (isset($this->regexToRoutesMap[$regex][$httpMethod])) {
            throw new BadRouteException("Cannot register two routes matching '$regex' for method '$httpMethod'");
        }

        $this->regexToRoutesMap[$regex][$httpMethod] = [$handler, $filters, $variables];
    }

    public function group(array $filters, \Closure $callback)
    {
        $oldGlobalFilters = $this->globalFilters;

        $oldGlobalPrefix = $this->globalRoutePrefix;

        $this->globalFilters =
      array_merge_recursive($this->globalFilters, array_intersect_key($filters, [Route::AFTER => 1, Route::BEFORE => 1]));

        $newPrefix = isset($filters[Route::PREFIX]) ? $this->trim($filters[Route::PREFIX]) : null;

        $this->globalRoutePrefix = $this->addPrefix($newPrefix);

        $callback($this);

        $this->globalFilters = $oldGlobalFilters;

        $this->globalRoutePrefix = $oldGlobalPrefix;
    }

    private function addPrefix(string $route)
    {
        return $this->trim($this->trim($this->globalRoutePrefix) . '/' . $route);
    }

    public function filter(string $name, $handler)
    {
        $this->filters[$name] = $handler;
    }


    public function get($route, $handler, array $filters = [])
    {
        return $this->addRoute(Route::GET, $route, $handler, $filters);
    }

    public function head($route, $handler, array $filters = [])
    {
        return $this->addRoute(Route::HEAD, $route, $handler, $filters);
    }

    public function post($route, $handler, array $filters = [])
    {
        return $this->addRoute(Route::POST, $route, $handler, $filters);
    }

    public function put($route, $handler, array $filters = [])
    {
        return $this->addRoute(Route::PUT, $route, $handler, $filters);
    }

    public function patch($route, $handler, array $filters = [])
    {
        return $this->addRoute(Route::PATCH, $route, $handler, $filters);
    }

    public function delete($route, $handler, array $filters = [])
    {
        return $this->addRoute(Route::DELETE, $route, $handler, $filters);
    }

    public function options($route, $handler, array $filters = [])
    {
        return $this->addRoute(Route::OPTIONS, $route, $handler, $filters);
    }

    public function any($route, $handler, array $filters = [])
    {
        return $this->addRoute(Route::ANY, $route, $handler, $filters);
    }


    public function controller(string $route, string $classname, array $filters = []): RouteCollector
    {
        $reflection = new ReflectionClass($classname);

        $validMethods = $this->getValidMethods();

        $sep = $route === '/' ? '' : '/';

        foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            foreach ($validMethods as $valid) {
                if (stripos($method->name, $valid) === 0) {
                    $methodName = $this->camelCaseToDashed(substr($method->name, strlen($valid)));

                    $params = $this->buildControllerParameters($method);

                    if ($methodName === self::DEFAULT_CONTROLLER_ROUTE) {
                        $this->addRoute($valid, $route . $params, [$classname, $method->name], $filters);
                    }

                    $this->addRoute($valid, $route . $sep . $methodName . $params, [$classname, $method->name], $filters);

                    break;
                }
            }
        }

        return $this;
    }

    private function buildControllerParameters(ReflectionMethod $method): string
    {
        $params = '';

        foreach ($method->getParameters() as $param) {
            $params .= "/{" . $param->getName() . "}" . ($param->isOptional() ? '?' : '');
        }

        return $params;
    }

    private function camelCaseToDashed(string $string): string
    {
        return strtolower(preg_replace('/([A-Z])/', '-$1', lcfirst($string)));
    }

    public function getValidMethods(): array
    {
        return [
      Route::ANY,
      Route::GET,
      Route::POST,
      Route::PUT,
      Route::PATCH,
      Route::DELETE,
      Route::HEAD,
      Route::OPTIONS,
    ];
    }

    public function getData(): RouteData
    {
        return new RouteData($this->staticRoutes, $this->regexToRoutesMap ? $this->generateVariableRouteData() : [], $this->filters);
    }

    private function trim(string $route): string
    {
        return trim($route, '/');
    }

    private function generateVariableRouteData(): array
    {
        $chunkSize = $this->computeChunkSize(count($this->regexToRoutesMap));
        $chunks    = array_chunk($this->regexToRoutesMap, $chunkSize, true);
        return array_map([$this, 'processChunk'], $chunks);
    }

    private function computeChunkSize(int $count): float
    {
        $numParts = max(1, round($count / self::APPROX_CHUNK_SIZE));
        return ceil($count / $numParts);
    }

    private function processChunk($regexToRoutesMap): array
    {
        $routeMap  = [];
        $regexes   = [];
        $numGroups = 0;
        foreach ($regexToRoutesMap as $regex => $routes) {
            $firstRoute   = reset($routes);
            $numVariables = count($firstRoute[2]);
            $numGroups    = max($numGroups, $numVariables);

            $regexes[] = $regex . str_repeat('()', $numGroups - $numVariables);

            foreach ($routes as $httpMethod => $route) {
                $routeMap[$numGroups + 1][$httpMethod] = $route;
            }

            $numGroups++;
        }

        $regex = '~^(?|' . implode('|', $regexes) . ')$~';
        return ['regex' => $regex, 'routeMap' => $routeMap];
    }
}
