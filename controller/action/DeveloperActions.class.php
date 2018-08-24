<?php

class DeveloperActions extends Actions
{
    const DEVELOPER_REWARD = 10,
    API_DOC_URL = 'https://lbryio.github.io/lbry/';

    public static function executeQuickstart(string $step = null)
    {
        $stepLabels  = [
      ''        => 'Home',
      'install' => 'Installation',
      'api'     => 'The API',
      'credits' => 'Credits'
    ];
        $allSteps    = array_keys($stepLabels);
        $currentStep = $step ?: $allSteps[0];

        $viewParams = [
      'currentStep' => $currentStep,
      'stepLabels'  => $stepLabels
    ];

        if ($currentStep !== 'all') {
            if (!isset($stepLabels[$currentStep])) {
                Controller::redirect('/quickstart');
            }

            $stepNum = array_flip($allSteps)[$currentStep];

            $viewParams += [
        'stepNum'  => $stepNum,
        'prevStep' => $stepNum === 0 ? null : $allSteps[$stepNum - 1],
        'nextStep' => $stepNum + 1 >= count($allSteps) ? null : $allSteps[$stepNum + 1],
      ];
        }

        return ['developer/quickstart', $viewParams];
    }

    public static function prepareQuickstartHomePartial(array $vars)
    {
        return $vars + [
      'usdValue' => static::DEVELOPER_REWARD * LBRY::getLBCtoUSDRate()
    ];
    }


    public static function prepareQuickstartInstallPartial(array $vars)
    {
        return $vars + ['versions' => [
      Os::OS_LINUX => Github::getDaemonReleaseProperty(OS::OS_LINUX, 'tag_name'),
      Os::OS_OSX => Github::getDaemonReleaseProperty(OS::OS_OSX, 'tag_name'),
      Os::OS_WINDOWS => Github::getDaemonReleaseProperty(OS::OS_WINDOWS, 'tag_name'),
    ]];
    }

    public static function prepareFormNewDeveloperRewardPartial(array $vars)
    {
        return $vars + [
      'defaultWalletAddress' => Session::get(Session::KEY_DEVELOPER_CREDITS_WALLET_ADDRESS),
      'error'                => Session::get(Session::KEY_DEVELOPER_LAST_FORM) == "new_developer" ? Session::getFlash(Session::KEY_DEVELOPER_CREDITS_ERROR) : '',
      'apiUrl'               => LBRY::getApiUrl('/reward/new?reward_type=new_developer')
    ];
    }

    public static function prepareFormCreditsPublishPartial(array $vars)
    {
        return $vars + [
      'defaultWalletAddress' => Session::get(Session::KEY_DEVELOPER_CREDITS_WALLET_ADDRESS),
      'error'                => Session::get(Session::KEY_DEVELOPER_LAST_FORM) == "new_publish" ? Session::getFlash(Session::KEY_DEVELOPER_CREDITS_ERROR) : '',
      'apiUrl'               => LBRY::getApiUrl('/reward/new?reward_type=first_publish')
    ];
    }

    public static function executeQuickstartAuth()
    {
        Session::set(Session::KEY_DEVELOPER_CREDITS_WALLET_ADDRESS, trim(Request::getPostParam('wallet_address')));
        Session::set(Session::KEY_DEVELOPER_LAST_FORM, Request::getPostParam('formName'));

        if (Request::getPostParam('returnUrl')) {
            Session::set(Session::KEY_DEVELOPER_RETURN_URL_SUCCESS, Request::getPostParam('returnUrl'));
        }

        if (!Config::get(Config::GITHUB_DEVELOPER_CREDITS_CLIENT_ID)) {
            throw new Exception('no github client id');
        }

        $gitHubParams = [
      'client_id'    => Config::get(Config::GITHUB_DEVELOPER_CREDITS_CLIENT_ID),
      'redirect_uri' => Request::getHostAndProto() . '/quickstart/github/callback',
      'scope'        => 'user:email',
      'allow_signup' => false
    ];

        return Controller::redirect('https://github.com/login/oauth/authorize?' . http_build_query($gitHubParams));
    }

    public static function executeQuickstartGithubCallback()
    {
        $code = Request::getParam('code');

        if (!$code) {
            Session::setFlash(Session::KEY_DEVELOPER_CREDITS_ERROR, 'This does not appear to be a valid response from GitHub.');
        } else {
            $authResponseData = Curl::post('https://github.com/login/oauth/access_token', [
        'code'          => $code,
        'client_id'     => Config::get(Config::GITHUB_DEVELOPER_CREDITS_CLIENT_ID),
        'client_secret' => Config::get(Config::GITHUB_DEVELOPER_CREDITS_CLIENT_SECRET)
      ], [
        'headers'       => ['Accept: application/json'],
        'json_response' => true
      ]);

            if (!$authResponseData || !isset($authResponseData['access_token'])) {
                Session::setFlash(Session::KEY_DEVELOPER_CREDITS_ERROR, 'Request to GitHub failed.');
            } elseif (isset($authResponseData['error_description'])) {
                Session::setFlash(Session::KEY_DEVELOPER_CREDITS_ERROR, 'GitHub replied: ' . $authResponseData['error_description']);
            } else {
                Session::set(Session::KEY_GITHUB_ACCESS_TOKEN, $authResponseData['access_token']);
            }
        }

        return Controller::redirect(Session::get(Session::KEY_DEVELOPER_RETURN_URL_SUCCESS, '/quickstart/credits'));
    }
}
