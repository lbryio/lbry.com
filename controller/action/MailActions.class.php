<?php

class MailActions extends Actions
{
  public static function executeSubscribe()
  {
    if (!Request::isPost())
    {
      return ['mail/subscribe'];
    }

    $nextUrl = Request::getPostParam('returnUrl', '/');
    if (!$nextUrl || $nextUrl[0] != '/' || !filter_var($nextUrl, FILTER_VALIDATE_URL))
    {
      $nextUrl = '/';
    }

    $email = Request::getPostParam('email');
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      Session::set(Session::KEY_LIST_SUB_ERROR,
        $email ? __('Please provide a valid email address.') : __('Please provide an email address.'));

      return Controller::redirect(Request::getRelativeUri());
    }

    $sent = Mailgun::sendSubscriptionConfirmation($email);
    if (!$sent)
    {
      return ['mail/subscribe', ['error' => __('email.subscribe_send_failed')]];
    }

    return ['mail/subscribe', ['subscribeSuccess' => true, 'nextUrl' => $nextUrl]];
  }

  public static function executeConfirm(string $hash)
  {
    $email = Mailgun::checkConfirmHashAndGetEmail($hash);
    if ($email === null)
    {
      return ['mail/subscribe', ['error' => __('email.invalid_confirm_hash')]];
    }

    $outcome = Mailgun::addToMailingList(Mailgun::LIST_GENERAL, $email);
    if ($outcome !== true)
    {
      return ['mail/subscribe', ['error' => $outcome]];
    }

    return ['mail/subscribe', ['confirmSuccess' => true, 'learnFooter' => true]];
  }

  public static function executeSubscribed()
  {
    return ['mail/subscribe', ['confirmSuccess' => true, 'learnFooter' => true]];
  }



  public static function prepareSubscribeFormPartial(array $vars)
  {
    $vars += ['btnClass' => 'btn-primary', 'returnUrl' => Request::getRelativeUri()];

    $vars['error'] = Session::get(Session::KEY_LIST_SUB_ERROR);
    Session::unsetKey(Session::KEY_LIST_SUB_ERROR);

    return $vars;
  }
}