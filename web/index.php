<?php

# Enable PHP dev cli-server
if (php_sapi_name() === 'cli-server' && is_file(__DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI'])))
{
  return false;
}

include __DIR__ . '/../bootstrap.php';

define('IS_PRODUCTION', $_SERVER['SERVER_NAME'] == 'lbry.io');

ini_set('display_errors', IS_PRODUCTION ? 'off' : 'on');
error_reporting(IS_PRODUCTION ? 0 : (E_ALL | E_STRICT));

try
{
  Session::init();
  i18n::register();
  if (!IS_PRODUCTION)
  {
    View::compileCss();
  }
  Controller::dispatch(strtok(Request::getRelativeUri(), '?'));
}
catch(Throwable $e)
{
  if (IS_PRODUCTION)
  {
    Slack::sendErrorIfProd($e);
    throw $e;
  }

  http_response_code(500);
  echo '<pre>'.Debug::exceptionToString($e).'</pre>';
}
