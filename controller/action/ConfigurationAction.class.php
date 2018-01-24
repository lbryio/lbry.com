<?php

class ConfigurationAction extends Actions
{
  public static function checkGithubKey()
  {
     if (Config::get('github_key') == null)
     {
        return false;
     }
     else {
       return true;
     }
  }

  public static function checkAsanaKey()
  {
    if (Config::get('asana_key') == null)
    {
      return false;
    }
    else {
      return true;
    }
  }

  public static function checkIsProd(){
    if (Config::get('is_prod') === 'no')
    {
        return false;
    }
    elseif (Config::get('is_prod') === 'yes') {
        return true;
    }
    else
    {
      return false;
    }
  }

}
