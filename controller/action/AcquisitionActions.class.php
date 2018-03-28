<?php

class AcquisitionActions extends Actions
{
  public static function executeThanks()
  {
    return ['acquisition/thanks'];
  }

  public static function executeYouTubeSub()
  {
    if (!Request::isPost()) {
      return Controller::redirect('/youtube');
    }

    $email = Request::getPostParam('email');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      Session::setFlash('error', 'Please enter a valid email.');
      return Controller::redirect('/youtube');
    }

    Salesforce::createContact($email, SalesForce::DEFAULT_LIST_ID, 'YouTube Campaign');
    Mailgun::sendYouTubeWarmLead(['email' => $email]);

    Session::setFlash('success', 'Thanks! We\'ll be in touch. The good kind of touch.');

    return Controller::redirect(Request::getReferrer(), 303);
  }

  public static function executeYouTube()
  {
    if(isset($_GET['error_message'])){
      $error_message = Request::encodeStringFromUser($_GET['error_message']);
    }

    return ['acquisition/youtube', [
        'reward' => LBRY::youtubeReward(),
        'error_message' => $error_message ?? ''
    ]];
  }

  public static function executeVerify(string $token)
  {
    return ['acquisition/verify', ['token' => $token]];
  }

  public static function executeYoutubeToken()
  {
    return ['acquisition/youtube_token', ['_no_layout' => true]];
  }

  public static function executeYoutubeStatus(string $token)
  {
    if(isset($_GET['error_message'])){
      $error_message = Request::encodeStringFromUser($_GET['error_message']);
    }

    $data = LBRY::statusYoutube($token);
    if ($data['success'] == false){
      Controller::redirect('/youtube?error=true&error_message=' . $data['error']);
    }
    return ['acquisition/youtube_status', [
        'token' => $token,
        'status_token' => $data,
        'error_message' => $error_message ?? ''
    ]];
  }

  public static function actionYoutubeToken(string $desired_lbry_channel_name)
  {

    $desired_lbry_channel_name_is_valid = static::lbry_channel_verification($desired_lbry_channel_name);

    if ($desired_lbry_channel_name_is_valid) {
      $token = LBRY::connectYoutube($desired_lbry_channel_name);
      if ($token['success'] == false) {
          Controller::redirect('/youtube?error=true&error_message=' . $token['error']);
      }
      else {
          Controller::redirect($token['data']);
      }

    }
  }
  public static function actionYoutubeEdit($status_token, $channel_name, $email, $sync_consent)
  {
    $current_value = LBRY::statusYoutube($status_token);
    if($current_value['data']['email'] == $email)
    {
      $status = LBRY::editYoutube($status_token, $channel_name, null, $sync_consent);
    }
    else
    {
      $status = LBRY::editYoutube($status_token, $channel_name, $email, $sync_consent);
    }

    if($status['success'] == false){
        Controller::redirect("/youtube/status/". $status_token . "?error=true&error_message=" . $status['error']);
    }
    else{
        Controller::redirect("/youtube/status/" . $status_token);
    }
  }
  public static function executeYoutubeEdit(){
    return ['acquisition/youtube_edit'];
  }

  public static function executeRedirectYoutube(){
      return ['acquisition/youtube_status_redirect'];
  }

  protected static function email_verification($email)
  {
    if (preg_match('/\S+@\S+\.\S+/', $email)) {
      return true;
    } else {
      return false;
    }
  }

  protected static function youtube_channel_verification($youtube_channel_id)
  {
    if (preg_match('/^UC[A-Za-z0-9_-]{22}$/', $youtube_channel_id)) {
      return true;
    } else {
      return false;
    }
  }

  protected static function lbry_channel_verification($lbry_channel)
  {
    if (preg_match('/[1-z]+/', $lbry_channel)) {
      return true;
    } else {
      return false;
    }
  }
}
