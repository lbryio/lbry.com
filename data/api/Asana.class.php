<?php

class Asana
{
  protected static $curlOptions = [];

  public static function listRoadmapTasks()
  {
    return static::get('abc');
    $uri = '/projects/projectId-id/tasks';
  }

  protected static function get($endpoint, array $data = [])
  {
    $apiKey = '0/c85cfce3591c2a3e214408cfba7cc44c';
    $options = [];
//    $apiKey = Config::get('prefinery_key');
//    curl -H "Authorization: Bearer ACCESS_TOKEN" https://app.asana.com/api/1.0/users/me
    $options['headers'] = ['Authorization: Bearer ' . $apiKey];
    return
      Curl::get('https://app.asana.com/api/1.0/users/me', $data, $options)
    ;
  }
}

class AsanaException extends Exception
{
}
