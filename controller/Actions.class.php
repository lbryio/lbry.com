<?php

/**
 * Description of Actions
 *
 * @author jeremy
 */
class Actions
{
  /**
   * @var Session
   */
  protected $session;

  public function __construct()
  {
    $this->session = new Session();
  }
  
  public function executeHome()
  {
    return ['page/home', []];
  }

  public function executeGet()
  {
    if ($this->validateDownloadAccess())
    {
      return ['page/get-allowed', []];
    }
    $inviteError = $this->session->get('invite_error');
    $this->session->unsetKey('invite_error');
    return ['page/get-denied', ['inviteError' => $inviteError]];
  }

  public function executePostCommit()
  {
    $payload = json_decode($_REQUEST['payload'], true);
    $rawPost = file_get_contents('php://input');
    $secret = trim(file_get_contents($_SERVER['ROOT_DIR']  . '/data/secret/github-secret'));

    $this->returnErrorIf(!isset($_SERVER['HTTP_X_HUB_SIGNATURE']), "HTTP header 'X-Hub-Signature' is missing.");

    list($algo, $hash) = explode('=', $_SERVER['HTTP_X_HUB_SIGNATURE'], 2) + array('', '');
    $this->returnErrorIf(!in_array($algo, hash_algos(), TRUE), 'Invalid hash algorithm "' . $algo . '"');
    $this->returnErrorIf($hash !== hash_hmac($algo, $rawPost, $secret), 'Hash does not match. "' . $secret . '"' . ' algo: ' . $algo . '$');

    if ($payload['ref'] === 'refs/heads/master')
    {
      $ret = shell_exec('sudo -u lbry ' . $_SERVER['ROOT_DIR'] . '/update.sh  2>&1');
      echo "Successful post commit (aka the script executed, so maybe it is successful):\n";
      echo $ret;
    }

    return [null, []];
  }

  protected function validateDownloadAccess()
  {
    $seshionKey = 'has-download-access';
    if ($this->session->get($seshionKey))
    {
      return true;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      $this->accessCodes = include $_SERVER['ROOT_DIR'] . '/data/secret/access_list.php';
      $today = date('Y-m-d H:i:s');
      foreach($this->accessCodes as $code => $date)
      {
        if ($_POST['invite'] == $code && $today <= $date)
        {
          $this->session->set($seshionKey, true);
          Controller::redirect('/get', 302);
        }
      }

      if ($_POST['invite'])
      {
        $this->session->set('invite_error', 'Please provide a valid invite code.');
      }
      else
      {
        $this->session->set('invite_error', 'Please provide an invite code.');
      }

      Controller::redirect('/get', 401);
    }

    return false;
  }

  //this is dumb
  protected function returnError($error)
  {
    throw new ErrorException($error);
  }

  protected function returnErrorIf($condition, $error)
  {
    if ($condition)
    {
      $this->returnError($error);
    }
  }
}