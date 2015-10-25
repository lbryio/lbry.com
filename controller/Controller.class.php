<?php

/**
 * Description of Controller
 *
 * @author jeremy
 */
class Controller
{
  public static function dispatch($uri)
  {
    try
    {
      list($viewTemplate, $viewParameters) = static::execute($uri);

      if ($viewTemplate === null)
      {
        return '';
      }

      if (!$viewTemplate)
      {
        throw new LogicException('All execute methods must return a template.');
      }
      
      echo View::render('layout/basic', [
          'content' => View::render($viewTemplate, $viewParameters + ['fullPage' => true])
      ]);
    } 
    catch (StopException $e)
    {

    }
  }
  
  public static function execute($uri)
  {
    $action = new Actions();
    switch($uri)
    {
      case '/':
        return $action->executeHome();
      case '/get':
        return $action->executeGet();
      case '/postcommit':
        return $action->executePostCommit();
      default:
        if (View::exists('page/' . ltrim($uri, '/')))
        {
          return ['page/' . $uri, []];
        }
        else
        {
          return ['page/404', []];
        }
    }
  }

  public static function redirect($url, $statusCode = 302)
  {
    if (empty($url))
    {
      throw new InvalidArgumentException('Cannot redirect to an empty URL.');
    }

    $url = str_replace('&amp;', '&', $url);

    if ($statusCode == 201 || ($statusCode >= 300 && $statusCode < 400))
    {
      header('Location: ' . $url, true, $statusCode);
    }
    else
    {
      echo sprintf('<html><head><meta http-equiv="refresh" content="0;url=%s"/></head></html>', htmlspecialchars($url, ENT_QUOTES));
    }

    throw new StopException('Time to redirect');
  }
}