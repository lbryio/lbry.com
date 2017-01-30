<?php

class AcquisitionActions extends Actions
{
  const DEVELOPER_REWARD = 250,
        SESSION_KEY_DEVELOPER_CREDITS_ERROR = 'acquisition.developer-credits-error',
        SESSION_KEY_DEVELOPER_CREDITS_SUCCESS = 'acquisition.developer-credits-success',
        SESSION_KEY_DEVELOPER_CREDITS_WALLET_ADDRESS = 'acquisition.developer-credits-wallet-address';

  public static function executeThanks()
  {
    return ['acquisition/thanks'];
  }

  public static function executeYouTubeSub()
  {
    if (!Request::isPost())
    {
      return Controller::redirect('/youtube');
    }

    $email = Request::getPostParam('email');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      Session::setFlash('error', 'Please enter a valid email.');
      return Controller::redirect('/youtube');
    }

    Salesforce::createContact($email, SalesForce::DEFAULT_LIST_ID, 'YouTube Campaign');
    Mailgun::sendYouTubeWarmLead(['email' => $email]);

    Session::setFlash('success', 'Thanks! We\'ll be in touch. The good kind of touch.');

    return Controller::redirect(Request::getReferrer(), 303);
  }

  public static function executeYouTube(string $campaignId = '')
  {
    $template = 'acquisition/youtube' . ($campaignId ? '-' . $campaignId : '');
    if (!View::exists($template))
    {
      return NavActions::execute404();
    }
    return [$template];
  }

  public static function executeDeveloperProgram()
  {
    $vars = [
      'defaultWalletAddress' => Session::get(static::SESSION_KEY_DEVELOPER_CREDITS_WALLET_ADDRESS),
      'error' => Session::get(static::SESSION_KEY_DEVELOPER_CREDITS_ERROR),
      'success' => Session::get(static::SESSION_KEY_DEVELOPER_CREDITS_SUCCESS)
    ];
    Session::unsetKey(static::SESSION_KEY_DEVELOPER_CREDITS_SUCCESS);
    Session::unsetKey(static::SESSION_KEY_DEVELOPER_CREDITS_ERROR);
    return ['acquisition/developer-program', $vars];
  }

  public static function executeDeveloperProgramRedirect()
  {
    $walletAddress = trim(Request::getPostParam('wallet'));
    Session::set(static::SESSION_KEY_DEVELOPER_CREDITS_WALLET_ADDRESS, $walletAddress);
    if (!$walletAddress)
    {
      Session::set(static::SESSION_KEY_DEVELOPER_CREDITS_ERROR, 'Please provide a wallet address.');
    }
    elseif (!preg_match('/^b[1-9A-HJ-NP-Za-km-z]{33}$/', $walletAddress))
    {
      Session::set(static::SESSION_KEY_DEVELOPER_CREDITS_ERROR, 'This does not appear to be a valid wallet address.');
    }
    else
    {
      $githubParams = [
        'client_id' => Config::get('github_developer_credits_client_id'),
        'redirect_uri' => 'http://localhost:8000/developer-program/callback',
        'scope' => 'user:email',
        'allow_signup' => false
      ];
      return Controller::redirect('https://github.com/login/oauth/authorize?' . http_build_query($githubParams));
    }
    return Controller::redirect('/developer-program');
  }

  public static function executeDeveloperProgramGithubCallback()
  {
    $code = Request::getParam('code');
    $walletAddress = Session::get(static::SESSION_KEY_DEVELOPER_CREDITS_WALLET_ADDRESS);
    if (!$walletAddress || !$code)
    {
      Session::set(static::SESSION_KEY_DEVELOPER_CREDITS_ERROR, 'Your wallet address disappeared while authenticated with GitHub.');
    }
    elseif (!$code)
    {
      Session::set(static::SESSION_KEY_DEVELOPER_CREDITS_ERROR, 'This does not appear to be a valid response from GitHub.');
    }
    else
    {
      $authResponseData = Curl::post('https://github.com/login/oauth/access_token', [
        'code' => $code,
        'client_id' => Config::get('github_developer_credits_client_id'),
        'client_secret' => Config::get('github_developer_credits_client_secret')
      ], [
        'headers' => ['Accept: application/json'],
        'json_response' => true
      ]);
      if (!$authResponseData || !isset($authResponseData['access_token']))
      {
        Session::set(static::SESSION_KEY_DEVELOPER_CREDITS_ERROR, 'Request to GitHub failed.');
      }
      elseif (isset($authResponseData['error_description']))
      {
        Session::set(static::SESSION_KEY_DEVELOPER_CREDITS_ERROR, 'GitHub replied: ' . $authResponseData['error_description']);
      }
      else
      {
        $accessToken = $authResponseData['access_token'];
        $userResponseData = Curl::get('https://api.github.com/user', [], [
          'headers' => ['Authorization: token ' . $accessToken, 'Accept: application/json', 'User-Agent: lbryio'],
          'json_response' => true
        ]);

        if (date('Y-m', strtotime($userResponseData['created_at'])) > '2017-01')
        {
          Session::set(static::SESSION_KEY_DEVELOPER_CREDITS_ERROR, 'This GitHub account is too recent.');
        }
        else
        {
          //        print_r($userResponseData);
          /*
           * TODO: send credits here, see success message below for relevant values
           * (keep wallet address in success message)
           */

          Session::set(static::SESSION_KEY_DEVELOPER_CREDITS_SUCCESS,
            'Send credits to GitHub user ' . $userResponseData['login'] . ' (' . $userResponseData['email'] . ') at wallet address ' . $walletAddress);
        }
      }
    }
    return Controller::redirect('/developer-program');
  }
}