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

    public static function editEmailSettings(string $token)
    {
        list($status, $headers, $response) = LBRY::emailStatus($token);
        if( $status == 403){
            //Catch 403 to return elegant error message.
            $response['error'] = "This email link is invalid. If you clicked this from an older email it may have been expired for security purposes. Please email help@lbry.io for a valid one.";
        }
        $responseData = $response['data'] ?? [];
        return ['mail/settings', [
          'emails' => $responseData['emails'] ?? [],
          'tags' => $responseData['tags'] ?? [],
          'token' => $token,
          'error' => $response['error'] ?? false
        ]];
    }

    public static function prepareSettingsFormPartial(array $vars)
    {
        return $vars + [
        'tagMetadata' => [
           '3d-printing' => [
              'label' => '3D Printing',
              'description' => 'Receive updates, tips, and new content suggestions related to 3D Printing.'
           ],
          'android' => [
            'label' => 'Android',
            'description' => 'Be an Android beta tester, earn LBC, and receive notification when the app goes live!'
          ],
          'college' => [
            'label' => 'University',
            'description' => 'LBRY has special programs and opportunities for people in school.'
          ],
          'creator' => [
            'label' => 'Creator',
            'description' => 'Get the most out of the stuff you create with tips and feedback from LBRY.'
          ],
          'consumer' => [
            'label' => 'Content Lover',
            'description' => 'Learn how to get the most out of LBRY as someone who just wants to find cool stuff.'
          ],
          'developer' => [
            'label' => 'Developer',
            'description' => 'Receive technical updates and other news intended for those who are familiar with software engineering.'
          ],
          'ios' => [
            'label' => 'iPhone',
            'description' => 'Be an iOS alpha tester, earn LBC, and receive notification when the app goes live!'
          ],
          'reward' => [
            'label' => 'Rewards',
            'description' => 'Receive emails about the latest rewards that are available to LBRY users.'
          ],
          'subscription' => [
            'label' => 'Subscriptions',
            'description' => 'Stay up to date on the latest content from your favorite creators.'
          ],
         ]
      ];
    }
}
