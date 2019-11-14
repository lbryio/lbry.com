<?php
$status_token = Request::encodeStringFromUser($_POST['status_token']);
$channel_name = null;
if (isset($_POST['new_preferred_channel'])) {
    $channel_name = Request::encodeStringFromUser($_POST['new_preferred_channel']);
}
$email = Request::encodeStringFromUser($_POST['new_email']);
$sync_consent = isset($_POST['sync_consent']);


if ($channel_name !== "" && $channel_name !== null && !preg_match("/@[A-Za-z0-9-]+$/", $channel_name)) {
    $channel_name = "@" . $channel_name;
}

if ($channel_name === "") {
    $channel_name = null;
}
AcquisitionActions::actionYoutubeEdit($status_token, $channel_name, $email, $sync_consent);
