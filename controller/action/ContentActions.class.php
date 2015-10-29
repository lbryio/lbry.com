<?php

/**
 * Description of ContentActions
 *
 * @author jeremy
 */
class ContentActions extends Actions
{
  public static function executeHome()
  {
    return ['page/home', []];
  }
//
//  protected static function validateDownloadAccess()
//  {
//    $seshionKey = 'has-download-access';
//    if (Session::get($seshionKey))
//    {
//      return true;
//    }
//
//    if ($_SERVER['REQUEST_METHOD'] === 'POST')
//    {
//      $accessCodes = include $_SERVER['ROOT_DIR'] . '/data/secret/access_list.php';
//      $today = date('Y-m-d H:i:s');
//      foreach($accessCodes as $code => $date)
//      {
//        if ($_POST['invite'] == $code && $today <= $date)
//        {
//          Session::set($seshionKey, true);
//          Controller::redirect('/get', 302);
//        }
//      }
//
//      if ($_POST['invite'])
//      {
//        Session::set('invite_error', 'Please provide a valid invite code.');
//      }
//      else
//      {
//        Session::set('invite_error', 'Please provide an invite code.');
//      }
//
//      Controller::redirect('/get', 401);
//    }
//
//    return false;
//  }
}