<?php

class Actions
{
  public static function param($key, $default = null)
  {
    return $_POST[$key] ?? $_GET[$key] ?? $default;
  }

  protected static function isForRobot()
  {
    $bots = [
      'bot', 'spider', 'crawler', 'siteexplorer', 'yahoo', 'slurp', 'dataaccessd', 'facebook', 'twitter', 'coccoc',
      'calendar', 'curl', 'wget', 'panopta', 'blogtrottr', 'zapier', 'newrelic', 'luasocket',
      'okhttp', 'python'
    ];

    return preg_match('/(' . join('|', $bots) . ')/i', Request::getUserAgent());
  }
}