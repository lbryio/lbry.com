<?php


include __DIR__ . '/../bootstrap.php';

define('IS_PRODUCTION', $_SERVER['SERVER_NAME'] == 'lbry.io');

try
{
  i18n::register();
  Session::init();
  Controller::dispatch(strtok($_SERVER['REQUEST_URI'], '?'));
}
catch(Exception $e)
{
  if (IS_PRODUCTION)
  {
    throw $e;
  }

  http_response_code(500);
  echo '<pre>'.Debug::exceptionToString($e).'</pre>';
}