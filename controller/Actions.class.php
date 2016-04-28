<?php

/**
 * Description of Actions
 *
 * @author jeremy
 */
class Actions
{
  //this is dumb
  protected static function returnError($error)
  {
    throw new ErrorException($error);
  }

  protected static function returnErrorIf($condition, $error)
  {
    if ($condition)
    {
      Actions::returnError($error);
    }
  }

  protected static function isForRobot()
  {
    $bots = [
      'bot', 'spider', 'crawler', 'siteexplorer', 'yahoo', 'slurp', 'dataaccessd', 'facebook', 'twitter', 'coccoc',
      'calendar', 'curl', 'wget', 'panopta', 'blogtrottr', 'zapier', 'newrelic', 'luasocket',
      'okhttp', 'python'
    ];

    return preg_match('/(' . join('|', $bots) . ')/i', $_SERVER['HTTP_USER_AGENT']);
  }
}