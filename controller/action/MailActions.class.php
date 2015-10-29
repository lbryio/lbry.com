<?php

/**
 * Description of MailActions
 *
 * @author jeremy
 */
class MailActions extends Actions
{
  public static function executeListSubscribe()
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    {
      Controller::redirect('/get');
    }
    
    $email = $_POST['email'];
    if (!$email|| !filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      Session::set('list_error', $email ? __('Please provide a valid email address.') : __('Please provide an email address.'));
    }
    elseif (!$_POST['listId'])
    {
      Session::set('list_error', __('List not provided.'));
    }
    else
    {
      $mcApi = new Mailchimp();
      if ($mcApi->listSubscribe($_POST['listId'], $email, [], 'html', false))
      {
        Session::set('list_success', __('Great success! Welcome to LBRY.'));
      }
      else
      {
        Session::set('list_error', __('Something went wrong adding you to the list.'));
      }
    }

    Controller::redirect($_POST['return_url'] ?: '/get');
  }
  
  public static function prepareJoinList(array $vars)
  {
    $vars += ['btnClass' => 'btn-primary', 'returnUrl' => $_SERVER['REQUEST_URI']];
    $vars['error'] = Session::get('list_error');
    $vars['success'] = Session::get('list_success');
    Session::unsetKey('list_error');
    Session::unsetKey('list_success');
    return $vars;
  }

}