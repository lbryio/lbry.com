<?php
$status_token = $_POST['status_token'];
$channel_name = $_POST['new_preferred_channel'];
$email = $_POST['new_email'];
$sync_consent = isset($_POST['sync_consent']);

LBRY::editYouTube($status_token, $channel_name, $email, $sync_consent);


Controller::redirect("/youtube/status/" . $status_token);
