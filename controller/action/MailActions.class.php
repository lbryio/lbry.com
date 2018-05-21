<?php

class MailActions extends Actions
{
    public static function executeSubscribe()
    {
        if (!Request::isPost()) {
            return ['mail/subscribe'];
        }

        $nextUrl = Request::getPostParam('returnUrl', '/');
        if (!$nextUrl || $nextUrl[0] != '/' || !filter_var($nextUrl, FILTER_VALIDATE_URL)) {
            $nextUrl = '/';
        }

        $email = Request::getPostParam('email');
        if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Session::set(
          Session::KEY_LIST_SUB_ERROR,
        $email ? __('Please provide a valid email address.') : __('Please provide an email address.')
      );

            return Controller::redirect(Request::getRelativeUri());
        }

        $tag = Request::getPostParam('tag');

        $response = LBRY::subscribe($email, $tag);
        if ($response['error']) {
            return ['mail/subscribe', ['error' => $response['error']]];
        }

        return ['mail/subscribe', ['subscribeSuccess' => true, 'nextUrl' => $nextUrl]];
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

    public static function executeUnsubscribe(string $email)
    {
        $decodedEmail = Encoding::base64DecodeUrlsafe(urldecode($email));
        if (!$decodedEmail) {
            return ['mail/unsubscribe', ['error' => 'Invalid unsubscribe link']];
        }

        $response = LBRY::unsubscribe($decodedEmail);
        return ['mail/unsubscribe', ['error' => $response['error']]];
    }
}
