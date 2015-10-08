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

  protected function validateDownloadAccess()
  {
    $seshionKey = 'buttsz';
    if ($this->session->get($seshionKey))
    {
      return true;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      $this->accessCodes = include $_SERVER['ROOT_DIR'] . '/data/access_list.php';
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