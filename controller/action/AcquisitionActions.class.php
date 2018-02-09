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

  public static function executeYouTube(string $campaignId = '')
  {
    $template = 'acquisition/youtube' . ($campaignId ? '-' . $campaignId : '');
    if (!View::exists($template)) {
      return NavActions::execute404();
    }
    return [$template];
  }

  public static function executeYT2()
  {
    return ['acquisition/yt2'];
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
    return ['acquisition/youtube_status', ['token' => $token]];
  }

  public static function actionYoutubeToken(string $email, string $desired_lbry_channel_name, string $youtube_channel_id)
  {

    $email_is_valid = static::email_verification($email);
    $desired_lbry_channel_name_is_valid = static::lbry_channel_verification($desired_lbry_channel_name);
    $youtube_channel_id_is_valid = static::youtube_channel_verification($youtube_channel_id);


    if ($email_is_valid && $desired_lbry_channel_name_is_valid && $youtube_channel_id_is_valid) {
      $token = LBRY::newYoutube($email, $youtube_channel_id, $desired_lbry_channel_name);

      if ($token['error'] === null) {
        $url = "/youtube/status/" . $token['data']['status_token'];
        Controller::redirect($url);
      } else {
        $url = "/yt2?error=true&error_message=" . $token['error'];
        Controller::redirect($url);
      }
    } else {
      $url = "/yt2?error=true";
      Controller::redirect($url);
    }
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
