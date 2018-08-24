<?php
$desired_lbry_channel_name = Request::encodeStringFromUser($_POST['desired_lbry_channel_name']);

if (!preg_match("/@[A-Za-z0-9_-]+$/", $desired_lbry_channel_name)) {
    $desired_lbry_channel_name = "@" . $desired_lbry_channel_name;
}

AcquisitionActions::actionYoutubeToken($desired_lbry_channel_name);
