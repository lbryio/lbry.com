<?php

class Asana
{
    protected static $curlOptions = ['json_response' => true, 'cache' => true, 'timeout' => 10];

    public static function listRoadmapTasks($cache = true)
    {
        // Use print_r(static::get('/projects')) to get project IDs

        $roadmapProjectId = 502841492992874;
        $tasks = [];

        $allTasks = array_reduce(
      static::get('/projects/' . $roadmapProjectId . '/tasks', [], $cache),
      function ($carry, $task) use ($cache) {
          $fullTask =  static::get('/tasks/' . $task['id'], [], $cache);
          if ($fullTask['name']) {
              $carry[] = $fullTask;
          }
          return $carry;
      },
      []
    );

        foreach ($allTasks as $task) {
            $badge = "Planned";
            if ($task['completed']) {
                $badge = "Complete";
            } elseif (in_array("In Progress", array_map(function ($tag) {
                return $tag['name'];
            }, $task['tags'] ?? []))) {
                $badge = "In Progress";
            }
            $taskDueTime = strtotime($task['due_on']);
            $year = date('Y', $taskDueTime);
            $tasks[' ' . $year . ' '][] = array_intersect_key($task, ['name' => null]) + [
          'badge'         => $badge,
          'date'          => $task['due_on'] ?? null,
          'body'          => nl2br($task['notes']),
//          'assignee'      => $fullTask['assignee'] ? ucwords($fullTask['assignee']['name']) : '',
          'quarter_date'  => 'Q' . static::dateToQuarter($task['due_on']) . ' ' . $year
        ];
        }

        foreach ($tasks as &$groupTasks) {
            usort($groupTasks, function ($tA, $tB) {
                if ($tA['date'] xor $tB['date']) {
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
