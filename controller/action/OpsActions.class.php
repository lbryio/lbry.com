<?php

/**
 * Description of OpsActions
 *
 * @author jeremy
 */
class OpsActions extends Actions
{
  public static function executePostCommit()
  {
    $payload = json_decode($_REQUEST['payload'], true);
    if ($payload['ref'] === 'refs/heads/master')
    {
      Actions::returnErrorIf(!isset($_SERVER['HTTP_X_HUB_SIGNATURE']), "HTTP header 'X-Hub-Signature' is missing.");

      list($algo, $hash) = explode('=', $_SERVER['HTTP_X_HUB_SIGNATURE'], 2) + array('', '');
      Actions::returnErrorIf(!in_array($algo, hash_algos(), TRUE), 'Invalid hash algorithm "' . $algo . '"');

      $rawPost = file_get_contents('php://input');
      $secret = Config::get('github_key');
      Actions::returnErrorIf($hash !== hash_hmac($algo, $rawPost, $secret), 'Hash does not match. "' . $secret . '"' . ' algo: ' . $algo . '$');

      file_put_contents(ROOT_DIR . '/data/writeable/NEEDS_UPDATE', '');
    }

    return [null, []];
  }
}
