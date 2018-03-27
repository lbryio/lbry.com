<?php
$status_token = Request::encodeStringFromUser($_POST['status_token']);
$channel_name = Request::encodeStringFromUser($_POST['new_preferred_channel']);
$email = Request::encodeStringFromUser($_POST['new_email']);
$sync_consent = isset($_POST['sync_consent']);


if(!preg_match("/@[A-Za-z0-9_-]+$/", $channel_name)){
    $channel_name = "@" . $channel_name;
}

AcquisitionActions::actionYoutubeEdit($status_token, $channel_name, $email, $sync_consent);
