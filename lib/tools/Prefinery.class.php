<?php

class Prefinery
{
  protected static $curlOptions = [
    'headers' => [
      'Accept: application/json',
      'Content-type: application/json'
    ],
    'json_post' => true
  ];

  protected static function get($endpoint, array $data = [])
  {
    $apiKey = Config::get('prefinery_key');

    $baseUrl = 'https://lbry.prefinery.com/api/v2/betas/8679';

    return static::decodePrefineryResponse(
      Curl::get($baseUrl . $endpoint . '.json?api_key=' . $apiKey, $data, static::$curlOptions)
    );
  }

  protected static function post($endpoint, array $data = [], $allowEmptyResponse = true)
  {
    $apiKey = Config::get('prefinery_key');

    $baseUrl = 'https://lbry.prefinery.com/api/v2/betas/8679';

    return static::decodePrefineryResponse(
      Curl::post($baseUrl . $endpoint . '.json?api_key=' . $apiKey, $data, static::$curlOptions),
      $allowEmptyResponse
    );
  }

  public static function findTesterByEmail($email)
  {
    $data = static::get('/testers', ['email' => $email]);

    if ($data && is_array($data) && count($data))
    {
      foreach($data as $userData) //can partial match on email, very unlikely though
      {
        if ($userData['email'] == $email)
        {
          return $userData;
        }
      }
      return $data[0];
    }

    return null;
  }

  public static function findTesterById($id)
  {
    return static::get('/testers/' . $id);
  }

  public static function createTester(array $testerData)
  {
    $params = ['tester' => array_filter($testerData)];

    return static::post('/testers', $params, false);
  }

  public static function checkIn($prefineryId)
  {
    throw new Exception('this sets a user to active, you probably do not want this');
    static::post('/testers/' . $prefineryId . '/checkin');
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

    if (isset($data['errors']))
    {
      throw new PrefineryException(implode("\n", array_map(function($error) {
        return $error['message'];
      }, (array)$data['errors'])));
    }

    return $data;
  }
}

class PrefineryException extends Exception {}