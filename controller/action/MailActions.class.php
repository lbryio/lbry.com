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
    $nextUrl = isset($_POST['returnUrl']) && $_POST['returnUrl'] ? $_POST['returnUrl'] : '/join-list';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    {
      Controller::redirect($nextUrl);
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
      $mcListId = $_POST['listId'];
      $mergeFields = isset($_POST['mergeFields']) ? unserialize($_POST['mergeFields']) : [];
      $success = $mcApi->listSubscribe($mcListId, $email, $mergeFields, 'html', false);
      if ($success)
      {
        Session::set(Session::KEY_MAILCHIMP_LIST_IDS, array_merge(Session::get(Session::KEY_MAILCHIMP_LIST_IDS, []), [$mcListId]));
        Session::set(Session::KEY_LIST_SUB_SUCCESS, __('Great success! Welcome to LBRY.'));
      }
      else
      {
        $error = $mcApi->errorMessage ?: __('Something went wrong adding you to the list.');
        Session::set('list_error', $error);
      }
    }

    Controller::redirect($nextUrl);
  }
  
  public static function prepareJoinList(array $vars)
  {
    $vars += ['btnClass' => 'btn-primary', 'returnUrl' => $_SERVER['REQUEST_URI']];
    $vars['error'] = Session::get('list_error');
    $vars['success'] = Session::get(Session::KEY_LIST_SUB_SUCCESS);
    Session::unsetKey('list_error');
    Session::unsetKey(Session::KEY_LIST_SUB_SUCCESS);
    return $vars;
  }

}