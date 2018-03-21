<?php
$status_token = $_POST['status_token'];
$channel_name = $_POST['new_preferred_channel'];
$email = $_POST['new_email'];
$sync_consent = isset($_POST['sync_consent']);

$current_value = AcquisitionActions::actionGetYoutubeStatus($status_token);

if(!preg_match("/@[A-Za-z0-9_-]+$/", $channel_name)){
    $channel_name = "@" . $channel_name;
}

AcquisitionActions::actionYoutubeEdit($status_token, $channel_name, $email, $sync_consent, $current_value);
