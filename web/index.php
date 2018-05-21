<?php

# Enable PHP dev cli-server
if (php_sapi_name() === 'cli-server' && is_file(__DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']))) {
    return false;
}

include __DIR__ . '/../bootstrap.php';

define('IS_PRODUCTION', Config::get(Config::IS_PROD) === true);

ini_set('display_errors', IS_PRODUCTION ? 'off' : 'on');
error_reporting(IS_PRODUCTION ? 0 : (E_ALL | E_STRICT));

register_shutdown_function('Controller::shutdown');

if (!IS_PRODUCTION) {
    // make warnings into errors
    set_error_handler(function ($errno, $errstr, $errfile, $errline) {
        throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
    }, E_WARNING|E_CORE_WARNING|E_COMPILE_WARNING|E_USER_WARNING);
}

try {
    Session::init();
    i18n::register();
    if (!IS_PRODUCTION) {
        View::compileCss();
    }
    Controller::dispatch(Request::getRoutingUri());
} catch (Throwable $e) {
    if (IS_PRODUCTION) {
        Slack::sendErrorIfProd($e);
        throw $e;
    }

    http_response_code(500);
    echo '<pre>'.Debug::exceptionToString($e).'</pre>';
}
