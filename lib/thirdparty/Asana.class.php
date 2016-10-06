<?php

class Asana
{
  protected static $curlOptions = ['json_response' => true, 'cache' => true];

  public static function listRoadmapTasks($cache = true)
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
      158602294500137 => ['LBRY Data Network', 'https://github.com/lbryio/lbry'],
      161514803479899 => ['Blockchain and Wallets', 'https://github.com/lbryio/lbrycrd'],
      136290697597644 => ['Integration and Building', null],
      158602294500249 => ['Documentation', null],
    ];

    $groupCategories = ['ongoing', 'upcoming'];
    $tasks = [];

    foreach($projects as $projectId => $projectTuple)
    {
      list($projectName, $projectUrl) = $projectTuple;
      $projectTasks = static::get('/tasks', ['completed_since' => 'now', 'project' => $projectId], $cache);
      $group = null;
      foreach ($projectTasks as $task)
      {
        if (mb_substr($task['name'], -1) === ':') //if task ends with ":", it is a category heading so switch the active key
        {
          $group = array_reduce($groupCategories, function($carry, $candidate) use($task) {
            return $carry ?: (strcasecmp($task['name'], $candidate . ':') === 0 ? $candidate : null);
          });
        }
        elseif ($group && $task['name'])
        {
          $fullTask = static::get('/tasks/' . $task['id']);
          $tasks[$group][] = array_intersect_key($fullTask, ['name' => null]) + [
              'project_label' => $projectName,
              'badge' => $projectName,
              'date' => $fullTask['due_on'] ?? null,
              'body' => $fullTask['notes'],
              'url' => $projectUrl,
              'group' => $group,
              'assignee' => $fullTask['assignee'] ? ucwords($fullTask['assignee']['name']) : ''
          ];
        }
      }
    }

    foreach($tasks as &$groupTasks)
    {
      usort($groupTasks, function ($tA, $tB)
      {
        if ($tA['group'] != $tB['group'])
        {
          return $tA['group'] <= $tB['group'] ? -1 : 1;
        }
        if ($tA['date'] xor $tB['date'])
        {
          return $tA['date'] ? -1 : 1;
        }
        return $tA['date'] < $tB['date'] ? -1 : 1;
      });
    }

    return $tasks;
  }

  protected static function get($endpoint, array $data = [], $cache = true)
  {
    $apiKey = Config::get('asana_key');

    $options = [
        'headers' => ['Authorization: Bearer ' . $apiKey],
        'cache' => $cache
    ] + static::$curlOptions;

    $responseData = Curl::get('https://app.asana.com/api/1.0' . $endpoint, $data, $options);
    return isset($responseData['data']) ? $responseData['data'] : [];
  }
}

class AsanaException extends Exception
{
}
