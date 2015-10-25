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
    $payload = json_decode($_REQUEST['payload']);
    $secret = file_get_contents($_SERVER['ROOT_DIR']  . '/data/secret/github-secret');
    $isToMaster = $payload->ref === 'refs/heads/master';

    file_put_contents($_SERVER['ROOT_DIR'] . '/log/github.txt', ($isToMaster ? 'master' : 'apprentince') . "\n$secret\n" . print_r($payload, TRUE) . print_r($_REQUEST, true));

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
}