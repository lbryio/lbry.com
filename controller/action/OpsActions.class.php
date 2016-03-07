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
    $rawPost = file_get_contents('php://input');
    $secret = Config::get('github_key');

    Actions::returnErrorIf(!isset($_SERVER['HTTP_X_HUB_SIGNATURE']), "HTTP header 'X-Hub-Signature' is missing.");

    list($algo, $hash) = explode('=', $_SERVER['HTTP_X_HUB_SIGNATURE'], 2) + array('', '');
    Actions::returnErrorIf(!in_array($algo, hash_algos(), TRUE), 'Invalid hash algorithm "' . $algo . '"');
    Actions::returnErrorIf($hash !== hash_hmac($algo, $rawPost, $secret), 'Hash does not match. "' . $secret . '"' . ' algo: ' . $algo . '$');

    if ($payload['ref'] === 'refs/heads/master')
    {
      $ret = shell_exec('sudo -u lbry ' . ROOT_DIR . '/update.php  2>&1');
      echo "Successful post commit (aka the script executed, so maybe it is successful):\n";
      echo $ret;
    }

    return [null, []];
  }
}
