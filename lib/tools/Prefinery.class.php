<?php

class Prefinery
{
  const STATE_APPLIED   = 'applied';
  const STATE_INVITED   = 'invited';
  const STATE_IMPORTED  = 'imported';
  const STATE_REJECTED  = 'rejected';
  const STATE_ACTIVE    = 'active';
  const STATE_SUSPENDED = 'suspended';

  const DOMAIN = 'https://lbry.prefinery.com';
  const PREFIX = '/api/v2/betas/8679';

  protected static $curlOptions = [
    'headers'   => [
      'Accept: application/json',
      'Content-type: application/json'
    ],
    'json_data' => true
  ];


  public static function findUser($emailOrId, $useApc = true)
  {
    $apcEnabled = extension_loaded('apc') && ini_get('apc.enabled');
    if ($useApc && $apcEnabled)
    {
      $cached = apc_fetch('prefinery-user-'.$emailOrId, $success);
      if ($success)
      {
        return $cached;
      }
    }

    $user = is_numeric($emailOrId) ? Prefinery::findTesterById($emailOrId) : Prefinery::findTesterByEmail($emailOrId);
    if ($user)
    {
      unset($user['invitation_code']); // so we dont leak it
      if ($useApc && $apcEnabled)
      {
        apc_store('prefinery-user-'.$emailOrId, $user, 3600);
      }
    }

    return $user;
  }

  protected static function findTesterById($id)
  {
    return static::get('/testers/' . (int)$id);
  }

  protected static function findTesterByEmail($email)
  {
    $data = static::get('/testers', ['email' => $email]);

    if ($data && is_array($data) && count($data))
    {
      foreach ($data as $userData) //can partial match on email, very unlikely though
      {
        if (strtolower($userData['email']) == strtolower($email))
        {
          return $userData;
        }
      }
      return $data[0];
    }

    return null;
  }

  public static function findOrCreateUser($email, $inviteCode = null, $referrerId = null)
  {
    $user = static::findUser($email);
    if (!$user)
    {
      // dont record ip for lbry.io addresses, for testing
      $ip = !preg_match('/@lbry\.io$/', $email) ? Request::getOriginalIp() : null;
      $ua = Request::getUserAgent();
      $user = Prefinery::createTester(array_filter([
        'email'           => $email,
        'status'          => $inviteCode ? static::STATE_ACTIVE: static::STATE_APPLIED, # yes, has to be ACTIVE to validate invite code
        'invitation_code' => $inviteCode,
        'referrer_id'     => $referrerId,
        'profile'         => ['ip' => $ip, 'user_agent' => $ua]
      ]));

//      if ($inviteCode)
//      {
//        $user = static::updateTester(array_intersect_key($user, ['id' => null]) + ['status' => static::STATE_ACTIVE]);
//        if ($user['invitation_code'] != $inviteCode)
//        {
//          $user['is_custom_code'] = true;
//        }
//      }

      $user['is_custom_code'] = false;
    }

//    unset($user['invitation_code']); // so we dont leak it
    return $user;
  }

  protected static function createTester(array $testerData)
  {
    return static::post('/testers', ['tester' => array_filter($testerData)], false);
  }

  public static function updateTester(array $testerData)
  {
    if (!$testerData['id'])
    {
      throw new PrefineryException('Update tester must be called with a tester id');
    }
    $apcEnabled = extension_loaded('apc') && ini_get('apc.enabled');
    if ($apcEnabled)
    {
      apc_delete('prefinery-user-'.$testerData['id']);
    }
    return static::put('/testers/' . $testerData['id'], ['tester' => array_diff_key(array_filter($testerData), ['id' => null])], false);
  }

  protected static function put($endpoint, array $data = [])
  {
    $apiKey = Config::get('prefinery_key');
    $options = static::$curlOptions;
    $options['headers'][] = 'X-HTTP-Method-Override: PUT';
    return static::decodePrefineryResponse(
      Curl::put(static::DOMAIN . static::PREFIX . $endpoint . '.json?api_key=' . $apiKey, $data, $options)
    );
  }

  protected static function get($endpoint, array $data = [])
  {
    $apiKey = Config::get('prefinery_key');
    return static::decodePrefineryResponse(
      Curl::get(static::DOMAIN . static::PREFIX . $endpoint . '.json?api_key=' . $apiKey, $data, static::$curlOptions)
    );
  }

  protected static function post($endpoint, array $data = [], $allowEmptyResponse = true)
  {
    $apiKey = Config::get('prefinery_key');
    return static::decodePrefineryResponse(
      Curl::post(static::DOMAIN . static::PREFIX . $endpoint . '.json?api_key=' . $apiKey, $data, static::$curlOptions),
      $allowEmptyResponse
    );
  }

  protected static function decodePrefineryResponse($rawBody, $allowEmptyResponse = true)
  {
    if (!$rawBody)
    {
      throw new PrefineryException('Empty cURL response.');
    }

    $data = json_decode($rawBody, true);

    if (!$allowEmptyResponse && !$data && $data !== [])
    {
      throw new PrefineryException('Received empty or improperly encoded response.');
    }

    if (isset($data['error']))
    {
      throw new PrefineryException($data['error']);
    }

    if (isset($data['errors']))
    {
      throw new PrefineryException($data['errors'] ? implode("\n", array_map(function ($error) {
        return $error['message'];
      }, (array)$data['errors'])) : 'Received empty error array.');
    }

    return $data;
  }
}

class PrefineryException extends Exception
{
}
