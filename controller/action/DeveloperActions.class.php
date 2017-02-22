<?php

class DeveloperActions extends Actions
{
  const DEVELOPER_REWARD = 250,
         API_DOC_URL = 'https://lbryio.github.io/lbry/api/';

  public static function executeQuickstart(string $step = null)
  {
    $stepLabels = [
      '' => 'Home',
      'install' => 'Installation',
      'api' => 'The API',
      'credits' => 'Credits'
    ];
    $allSteps = array_keys($stepLabels);
    $currentStep = $step ?: $allSteps[0];

    $viewParams = [
      'currentStep' => $currentStep,
      'stepLabels' => $stepLabels
    ];

    if ($currentStep !== 'all')
    {
      if (!isset($stepLabels[$currentStep]))
      {
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

  public static function executeDeveloperProgram()
  {
    return ['developer/developer-program', [
      'defaultWalletAddress' => Session::get(Session::KEY_DEVELOPER_CREDITS_WALLET_ADDRESS),
      'error'                => Session::getFlash(Session::KEY_DEVELOPER_CREDITS_ERROR),
      'success'              => Session::getFlash(Session::KEY_DEVELOPER_CREDITS_SUCCESS)
    ]];
  }

  public static function prepareFormNewPartial(array $vars)
  {
    return $vars + [
      'defaultWalletAddress' => Session::get(Session::KEY_DEVELOPER_CREDITS_WALLET_ADDRESS),
      'error'                => Session::getFlash(Session::KEY_DEVELOPER_CREDITS_ERROR),
      'success'              => Session::getFlash(Session::KEY_DEVELOPER_CREDITS_SUCCESS)
    ];
  }

  public static function prepareFormCreditsPublishPartial(array $vars)
  {
    return $vars + [
      'defaultWalletAddress' => Session::get(Session::KEY_DEVELOPER_CREDITS_WALLET_ADDRESS),
      'error'                => Session::getFlash(Session::KEY_DEVELOPER_CREDITS_ERROR),
      'success'              => Session::getFlash(Session::KEY_DEVELOPER_CREDITS_SUCCESS)
    ];
  }

  public static function executeDeveloperProgramPost()
  {
    $walletAddress = trim(Request::getPostParam('wallet'));
    Session::set(Session::KEY_DEVELOPER_CREDITS_WALLET_ADDRESS, $walletAddress);

    if (!$walletAddress)
    {
      Session::setFlash(Session::KEY_DEVELOPER_CREDITS_ERROR, 'Please provide a wallet address.');
    }
    elseif (!preg_match('/^b[1-9A-HJ-NP-Za-km-z]{33}$/', $walletAddress))
    {
      Session::setFlash(Session::KEY_DEVELOPER_CREDITS_ERROR, 'This does not appear to be a valid wallet address.');
    }
    else
    {
      if (!Config::get('github_developer_credits_client_id'))
      {
        throw new Exception('no github client id');
      }

      $githubParams = [
        'client_id'    => Config::get('github_developer_credits_client_id'),
        'redirect_uri' => Request::getHostAndProto() . '/developer-program/callback',
        'scope'        => 'user:email public_repo',
        'allow_signup' => false
      ];
      return Controller::redirect('https://github.com/login/oauth/authorize?' . http_build_query($githubParams));
    }

    return Controller::redirect(Request::getReferrer('/quickstart/credits'));
  }

  public static function executeDeveloperProgramGithubCallback()
  {
    $code          = Request::getParam('code');
    $walletAddress = Session::get(Session::KEY_DEVELOPER_CREDITS_WALLET_ADDRESS);

    if (!$walletAddress)
    {
      Session::setFlash(Session::KEY_DEVELOPER_CREDITS_ERROR, 'Your wallet address disappeared while authenticated with GitHub.');
    }
    elseif (!$code)
    {
      Session::setFlash(Session::KEY_DEVELOPER_CREDITS_ERROR, 'This does not appear to be a valid response from GitHub.');
    }
    else
    {
      $newUserUrl          = LBRY::getApiUrl('/user/new_developer');
      $lbryApiResponseData = Curl::post($newUserUrl, [
        'github_code' => $code
      ], [
//        'json_response' => true
      ]);
      echo '<pre>';
      print_r($lbryApiResponseData);
      die('omg');
    }

    return Controller::redirect(Request::getReferrer('/quickstart/credits'));
  }
}
