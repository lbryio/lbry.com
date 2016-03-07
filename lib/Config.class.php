<?php

class Config
{
  protected static $loaded = false;
  protected static $data = [];

  public static function get($name, $default = null)
  {
    static::load();
    return array_key_exists($name, static::$data) ? static::$data[$name] : $default;
  }


  protected static function load()
  {
    if (!static::$loaded)
    {
      $dataFile = ROOT_DIR.'/data/config.php';
      if (!is_readable($dataFile))
      {
        throw new RuntimeException('config file is missing or not readable');
      }
      static::$data = require $dataFile;
      static::$loaded = true;
    }
  }
}
