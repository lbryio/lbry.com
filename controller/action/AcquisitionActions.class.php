<?php

class AcquisitionActions extends Actions
{
  public static function executeThanks()
  {
    return ['acquisition/thanks'];
  }

  public static function executeYouTubeSub()
  {
    if (!Request::isPost())
    {
      return Controller::redirect('/youtube');
    }

    $email = Request::getPostParam('email');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
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
    if (!View::exists($template))
    {
      return NavActions::execute404();
    }
    return [$template];
  }
}
