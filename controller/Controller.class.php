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
      $viewAndParams = static::execute($uri);
      $viewTemplate = $viewAndParams[0];
      $viewParameters = isset($viewAndParams[1]) ? $viewAndParams[1] : [];

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
    switch($uri)
    {
      case '/':
        return ContentActions::executeHome();
      case '/fund':
        return CreditActions::executeFund();
      case '/get':
      case '/windows':
      case '/ios':
      case '/android':
      case '/linux':
      case '/osx':
        return DownloadActions::executeGet();
      case '/postcommit':
        return OpsActions::executePostCommit();
      case '/log-upload':
        return OpsActions::executeLogUpload();
      case '/list-subscribe':
        return MailActions::executeListSubscribe();
      case '/LBRY-deck.pdf':
        return static::redirect('https://s3.amazonaws.com/files.lbry.io/LBRY-deck.pdf', 307);
      case '/dl/lbry_setup.sh':
        return static::redirect('https://raw.githubusercontent.com/lbryio/lbry-setup/master/lbry_setup.sh', 307);
      case '/lbry-osx-latest.dmg':
        return static::redirect('https://s3.amazonaws.com/files.lbry.io/osx/lbry.0.2.3.dmg', 307);
      case '/lbry-linux-latest.deb':
        return static::redirect('https://s3.amazonaws.com/files.lbry.io/linux/lbry_0.2.3_amd64.deb', 307);
      case '/art':
        return static::redirect('/what');
      default:
        $blogPattern = '#^/news(/|$)#';
        if (preg_match($blogPattern, $uri))
        {
          $slug = preg_replace($blogPattern, '', $uri);
          return $slug ? BlogActions::executePost($slug) : BlogActions::executeIndex();
        }
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
