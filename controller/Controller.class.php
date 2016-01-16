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

      $content = View::render($viewTemplate, $viewParameters + ['fullPage' => true]);

      echo View::getLayout() ? View::render('layout/' . View::getLayout(), ['content' => $content]) : $content;
    } 
    catch (StopException $e)
    {

    }
  }
  
  public static function execute($uri)
  {
    switch($uri)
    {
      case '/':
        return ContentActions::executeHome();
      case '/fund':
        return CreditActions::executeFund();
      case '/get':
        return ContentActions::executeGet();
      case '/postcommit':
        return OpsActions::executePostCommit();
      case '/list-subscribe':
        return MailActions::executeListSubscribe();
      case '/dl/lbry_setup.sh':
        return static::redirect('https://raw.githubusercontent.com/lbryio/lbry-setup/master/lbry_setup.sh', 307);
      default:
        $noSlashUri = ltrim($uri, '/');
        if (View::exists('page/' . $noSlashUri))
        {
          return ['page/' . $noSlashUri, []];
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