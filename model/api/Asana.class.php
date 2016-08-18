<?php

class Asana
{
  protected static $curlOptions = ['json_response' => true, 'cache' => true];

  public static function listRoadmapTasks()
  {
    /*
     *   return static::get('/projects');
            [55] => Array
                (
                    [id] => 158602294500138
                    [name] => Browser
                )

            [56] => Array
                (
                    [id] => 158602294500137
                    [name] => Daemon
                )

            [57] => Array
                (
                    [id] => 161514803479899
                    [name] => Blockchain and Wallet
                )


            [60] => Array
                (
                    [id] => 158829550589337
                    [name] => Reporting and Analytics
                )

            [61] => Array
                (
                    [id] => 158602294500214
                    [name] => Other
                )

            [62] => Array
                (
                    [id] => 136290697597644
                    [name] => CI
                )

            [63] => Array
                (
                    [id] => 158602294500249
                    [name] => Documentation
                )
    */
//    return static::get('/projects');
    $projects = [
      158602294500138 => ['LBRY Browser', 'https://github.com/lbryio/lbry-web-ui'],
      158602294500137 => ['LBRYnet', 'https://github.com/lbryio/lbry'],
      161514803479899 => ['Blockchain and Wallets', 'https://github.com/lbryio/lbrycrd'],
      158829550589337 => ['Reporting and Analytics', null],
      136290697597644 => ['Integration and Building', null],
      158602294500249 => ['Documentation', null],
      158602294500214 => ['Other', null]
    ];

    $tasks = [
      'ongoing' => [],
      'upcoming' => []
    ];

    $categories = array_keys($tasks);
    foreach($projects as $projectId => $projectTuple)
    {
      list($projectName, $projectUrl) = $projectTuple;
      $projectTasks = static::get('/tasks?' . http_build_query(['completed_since' => 'now', 'project' => $projectId]));
      $key = null;
      foreach ($projectTasks as $task)
      {
        if (mb_substr($task['name'], -1) === ':') //if task ends with ":", it is a category heading so switch the active key
        {
          $key = array_reduce($categories, function($carry, $category) use($task) {
            return $carry ?: (strcasecmp($task['name'], $category . ':') === 0 ? $category : null);
          });
        }
        elseif ($key && $task['name'])
        {
          $fullTask = static::get('/tasks/' . $task['id']);
          $tasks[$key][] = array_intersect_key($fullTask, ['name' => null, 'due_on' => null]) + [
              'project' => $projectName,
              'url' => $projectUrl,
              'assignee' => $fullTask['assignee'] ? ucwords($fullTask['assignee']['name']) : ''
          ];
        }
      }
    }

    foreach($tasks as &$taskSet)
    {
      usort($taskSet, function($tA, $tB) {
        if ($tA['due_on'] xor $tB['due_on'])
        {
          return $tA['due_on'] ? -1 : 1;
        }
        return $tA['due_on'] < $tB['due_on'] ? -1 : 1;
      });
    }

    return $tasks;
  }

  protected static function get($endpoint, array $data = [])
  {
    $apiKey = Config::get('asana_key');

    $options = static::$curlOptions + [
        'headers' => ['Authorization: Bearer ' . $apiKey]
    ];

    $responseData = Curl::get('https://app.asana.com/api/1.0' . $endpoint, $data, $options);
    return isset($responseData['data']) ? $responseData['data'] : [];
  }
}

class AsanaException extends Exception
{
}
