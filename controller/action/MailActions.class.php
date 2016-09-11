<?php

class MailActions extends Actions
{
  public static function executeListSubscribe()
  {
    $nextUrl = Request::getPostParam('returnUrl', '/join-list');

    if (!Request::isPost())
    {
      return Controller::redirect($nextUrl);
    }

    Session::set(Session::KEY_LIST_SUB_SIGNATURE, Request::getPostParam('listSig', true));

    $email = Request::getPostParam('email');
    if (!$email|| !filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      Session::set(Session::KEY_LIST_SUB_ERROR, $email ? __('Please provide a valid email address.') : __('Please provide an email address.'));
    }
    elseif (!Request::getPostParam('listId'))
    {
      Session::set(Session::KEY_LIST_SUB_ERROR, __('List not provided.'));
    }
    else
    {
      $mcListId = htmlspecialchars(Request::getPostParam('listId'));
      $mergeFields = Request::getPostParam('mergeFields') ? (unserialize(Request::getPostParam('mergeFields')) ?: []) : [];
      try
      {
        static::subscribeToMailchimp($email, $mcListId, $mergeFields);
        Session::set(Session::KEY_LIST_SUB_SUCCESS, true);
        Session::set(Session::KEY_LIST_SUB_FB_EVENT, Request::getPostParam('fbEvent') ?? null);
      }
      catch (MailchimpSubscribeException $e)
      {
        Session::set(Session::KEY_LIST_SUB_SUCCESS, false);
        Session::set(Session::KEY_LIST_SUB_ERROR, $e->getMessage());
      }
    }

    return Controller::redirect($nextUrl);
  }

  public static function subscribeToMailchimp($email, $listId, array $mergeFields = [])
  {
    $mcApi   = new Mailchimp();
    $success = $mcApi->listSubscribe($listId, $email, $mergeFields, 'html', false);
    if (!$success)
    {
      throw new MailchimpSubscribeException($mcApi->errorMessage ?: __('Something went wrong adding you to the list.'));
    }
    return true;
  }

  public static function prepareJoinListPartial(array $vars)
  {
    $vars['listSig'] = md5(serialize($vars));
    $vars += ['btnClass' => 'btn-primary', 'returnUrl' => Request::getRelativeUri()];

    if (Session::get(Session::KEY_LIST_SUB_SIGNATURE) == $vars['listSig'])
    {
      $vars['error'] = Session::get(Session::KEY_LIST_SUB_ERROR);
      Session::unsetKey(Session::KEY_LIST_SUB_ERROR);

      $vars['success'] = Session::get(Session::KEY_LIST_SUB_SUCCESS) ? __('Great success! Welcome to LBRY.') : false;
      $vars['fbEvent'] = Session::get(Session::KEY_LIST_SUB_FB_EVENT) ?: 'Lead';
      Session::unsetKey(Session::KEY_LIST_SUB_SUCCESS);
      Session::unsetKey(Session::KEY_LIST_SUB_FB_EVENT);
      Session::unsetKey(Session::KEY_LIST_SUB_SIGNATURE);
    }
    else
    {
      $vars['success'] = false;
    }

    return $vars;
  }
}