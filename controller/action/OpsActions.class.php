<?php

class OpsActions extends Actions
{
  public static function executePostCommit(): array
  {
    $payload = Request::getParam('payload');
    if (!$payload)
    {
      return NavActions::execute400(['error' => 'No payload']);
    }

    $payload = json_decode($payload, true);
    if ($payload['ref'] === 'refs/heads/master')
    {
      $sig = Request::getHttpHeader('X-Hub-Signature');
      if (!$sig)
      {
        return NavActions::execute400(['error' => "HTTP header 'X-Hub-Signature' is missing."]);
      }

      list($algo, $hash) = explode('=', Request::getHttpHeader('X-Hub-Signature'), 2) + ['', ''];
      if (!in_array($algo, hash_algos(), true))
      {
        return NavActions::execute400(['error' => 'Invalid hash algorithm "' . htmlspecialchars($algo) . '"']);
      }

      $rawPost = file_get_contents('php://input');
      $secret  = Config::get('github_key');
      if ($hash !== hash_hmac($algo, $rawPost, $secret))
      {
        return NavActions::execute400(['error' => 'Hash does not match.']);
      }

      file_put_contents(ROOT_DIR . '/data/writeable/NEEDS_UPDATE', '');
    }

    return [null, []];
  }

  public static function executeLogUpload(): array
  {
    $log = isset($_POST['log']) ? urldecode($_POST['log']) : null;
    if (isset($_POST['name']))
    {
      $name = substr(trim(urldecode($_POST['name'])), 0, 50);
    }
    elseif (isset($_POST['date']))
    {
      $name = substr(trim(urldecode($_POST['date'])), 0, 20) . '_' .
              substr(trim(urldecode($_POST['hash'])), 0, 20) . '_' .
              substr(trim(urldecode($_POST['sys'])), 0, 50) . '_' .
              substr(trim(urldecode($_POST['type'])), 0, 20);
    }
    else
    {
      $name = null;
    }

    $name = preg_replace('/[^A-Za-z0-9_-]+/', '', $name);

    if (!$log || !$name)
    {
      return NavActions::execute400(['error' => "Required params: log, name"]);
    }

    $awsKey    = Config::get('aws_log_access_key');
    $awsSecret = Config::get('aws_log_secret_key');

    if (!$log || !$name)
    {
      throw new RuntimeException('Missing AWS credentials');
    }

    $tmpFile = tempnam(sys_get_temp_dir(), 'lbryinstalllog');
    file_put_contents($tmpFile, $log);

    if (filesize($tmpFile) > 1024 * 1024 * 2)
    {
      return NavActions::execute400(['error' => 'Log file is too large']);
    }

    S3::$useExceptions = true;
    S3::setAuth($awsKey, $awsSecret);
    S3::putObject(S3::inputFile($tmpFile, false), 'lbry-install-logs', $name);
    unlink($tmpFile);

    return [null, []];
  }
}
