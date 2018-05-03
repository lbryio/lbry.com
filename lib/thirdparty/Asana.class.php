<?php

class Asana
{
  protected static $curlOptions = ['json_response' => true, 'cache' => true, 'timeout' => 10];

  public static function listRoadmapTasks($cache = true)
  {
    // Use print_r(static::get('/projects')) to get project IDs

    $projects = [
      158602294500138 => ['LBRY Browser', 'https://github.com/lbryio/lbry-web-ui'],
      158602294500137 => ['LBRY Data Network', 'https://github.com/lbryio/lbry'],
      161514803479899 => ['Blockchain and Wallets', 'https://github.com/lbryio/lbrycrd'],
      136290697597644 => ['Integration and Building', null],
      158602294500249 => ['Documentation', null],
      658477315612493 => ['Complete', null],
      658477315612495 => ['In progress', null]
    ];

    $tasks = [];

    $tags = [
      192699565737944 => 'Open Beta',
      542803886522122 => 'Upcoming',
      658477315612491 => ' 2018 ',
      659021359433311 => ' 2025 '
    ];

    foreach ($tags as $tagId => $tagLabel)
    {
      $taggedTasks = static::get('/tags/' . $tagId . '/tasks', ['completed_since' => 'now'], $cache);
      foreach ($taggedTasks as $task)
      {
        $fullTask  = static::get('/tasks/' . $task['id'], [], $cache);
        $projectId = $fullTask['memberships'][0]['project']['id'] ?? null;
        if ($fullTask['name'])
        {
          if ($projectId && isset($projects[$projectId]))
          {
            list($projectName, $projectUrl) = $projects[$projectId];
          }
          else
          {
            $projectName = 'Planned';
            $projectId = null;
          }
          $tasks[$tagLabel][] = array_intersect_key($fullTask, ['name' => null]) + [
              'badge'         => $projectName,
              'date'          => $fullTask['due_on'] ?? null,
              'body'          => nl2br($fullTask['notes']),
              'group'         => $tagLabel,
              'project_id'    => $projectId,
              'assignee'      => $fullTask['assignee'] ? ucwords($fullTask['assignee']['name']) : '',
              'quarter_date'  => 'Q' . static::dateToQuarter($fullTask['due_on']) . ' ' . (string) date('Y', strtotime($fullTask['due_on']))
            ];
        }
      }
    }

    foreach ($tasks as &$groupTasks)
    {
      usort($groupTasks, function ($tA, $tB)
      {
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
    $apiKey = Config::get(Config::ASANA_KEY);

    $options = [
                 'headers' => ['Authorization: Bearer ' . $apiKey],
                 'cache'   => $cache
               ] + static::$curlOptions;

    $responseData = CurlWithCache::get('https://app.asana.com/api/1.0' . $endpoint, $data, $options);
    return $responseData['data'] ?? [];
  }

  // Converts date to quarter
  protected static function dateToQuarter($date)
  {
    return (string)ceil(date('m', strtotime($date))/3);
  }
}

class AsanaException extends Exception
{
}
