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
}