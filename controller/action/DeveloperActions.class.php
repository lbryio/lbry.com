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

  public static function prepareQuickstartOnePartial(array $vars)
  {
    return $vars + [
      'version' => '0.8.4'
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
    return Controller::redirect('/developer-program');
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
      $authResponseData = Curl::post('https://github.com/login/oauth/access_token', [
        'code'          => $code,
        'client_id'     => Config::get('github_developer_credits_client_id'),
        'client_secret' => Config::get('github_developer_credits_client_secret')
      ], [
        'headers'       => ['Accept: application/json'],
        'json_response' => true
      ]);

      if (!$authResponseData || !isset($authResponseData['access_token']))
      {
        Session::setFlash(Session::KEY_DEVELOPER_CREDITS_ERROR, 'Request to GitHub failed.');
      }
      elseif (isset($authResponseData['error_description']))
      {
        Session::setFlash(Session::KEY_DEVELOPER_CREDITS_ERROR, 'GitHub replied: ' . $authResponseData['error_description']);
      }
      else
      {
        $accessToken      = $authResponseData['access_token'];

        $starResponseData = Curl::put('https://api.github.com/user/starred/lbryio/lbry', [], [
          'headers'       => ['Authorization: token ' . $accessToken, 'Accept: application/json', 'User-Agent: lbryio', 'Content-Length: 0'],
          'json_response' => true
        ]);

        $userResponseData = Curl::get('https://api.github.com/user', [], [
          'headers'       => ['Authorization: token ' . $accessToken, 'Accept: application/json', 'User-Agent: lbryio'],
          'json_response' => true
        ]);

        if (!$userResponseData || !$userResponseData['created_at'] || $starResponseData !== [])
        {
          Session::setFlash(Session::KEY_DEVELOPER_CREDITS_ERROR, 'Received unexpected response from GitHub. Perhaps authorization was revoked?');
        }
        elseif(date('Y-m-d', strtotime($userResponseData['created_at'])) > '2017-01-30')
        {
          Session::setFlash(Session::KEY_DEVELOPER_CREDITS_ERROR, 'This GitHub account is too recent.');
        }
        else
        {
          $lockName = 'github_dev_credits_write';
          $dataFile = ROOT_DIR . '/data/writeable/github_developer_credits';

          $lock = Lock::getLock($lockName, true); // EXCLUSIVE LOCK. IF SENDING CREDITS IS SLOW, THIS COULD BLOCK USERS

          $existing = is_file($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];

          if (isset($existing[$userResponseData['login']]) || isset($existing[$userResponseData['id']]))
          {
            Session::setFlash(Session::KEY_DEVELOPER_CREDITS_ERROR, 'You (' . $userResponseData['login'] . ') already received credits.');
          }
          else
          {
            try
            {
              $response =
                Curl::post('http://localhost:5279/lbryapi', [
                  'method' => 'send_amount_to_address',
                  'params' => [['amount' => 250, 'address' => $walletAddress]],
                ], [
                  'json_data'     => true,
                  'json_response' => true,
                ]);
            }
            catch (Exception $e)
            {
              $response = null;
            }

            $response = [true];

            if ($response === [true])
            {
              $existing[$userResponseData['id']] = [$userResponseData['email'], $walletAddress, date('Y-m-d H:i:s'), $userResponseData['login']];
              file_put_contents($dataFile, json_encode($existing));

              Session::setFlash(Session::KEY_DEVELOPER_CREDITS_SUCCESS,
                'Credits on their way to address ' . $walletAddress . ' for GitHub user ' . $userResponseData['login'] . '. It may take up to a minute for them to arrive.');
            }
            elseif (is_array($response) && (isset($response['faultString']) && stripos($response['faultString'], 'InsufficientFundsError') !== false))
            {
              Slack::sendErrorIfProd('Github dev credits need a refill');
              Session::setFlash(Session::KEY_DEVELOPER_CREDITS_ERROR,
                'Our wallet is running low on funds. Please ping jeremy@lbry.io so he can refill it, then try again.');
            }
            else
            {
              Slack::sendErrorIfProd($response === null ?
                  'Error connecting to LBRY API via cURL' :
                  'Error of unknown origin in sending Github dev credits'  . var_export($response, true)
              );
              Session::setFlash(Session::KEY_DEVELOPER_CREDITS_ERROR, 'Failed to send credits. This is an error on our side. Please email jeremy@lbry.io if it persists.');
              Session::setFlash(Session::KEY_DEVELOPER_CREDITS_ERROR,
                'Failed to send credits. This is an error on our side. Please email jeremy@lbry.io if it persists.');
            }
          }

          Lock::freeLock($lock);
          $lock = null;
        }
      }
    }
    return Controller::redirect('/developer-program');
  }
}
