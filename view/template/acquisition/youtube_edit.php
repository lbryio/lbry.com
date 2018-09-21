<?php
$status_token = Request::encodeStringFromUser($_POST['status_token']);
$channel_name = Request::encodeStringFromUser($_POST['new_preferred_channel']);
$email = Request::encodeStringFromUser($_POST['new_email']);
$sync_consent = isset($_POST['sync_consent']);
$fee_amount = isset($_POST['paid']) ? Request::encodeStringFromUser($_POST['fee_amount']) : null;
$fee_address = isset($_POST['paid']) ? Request::encodeStringFromUser($_POST['fee_address']) : null;
$fee_currency = isset($_POST['paid']) ? Request::encodeStringFromUser($_POST['fee_currency']) : null;
$free = !isset($_POST['paid']);
if (!preg_match("/@[A-Za-z0-9-]+$/", $channel_name)) {
    $channel_name = "@" . $channel_name;
}

AcquisitionActions::actionYoutubeEdit($status_token, $channel_name, $email, $sync_consent, $fee_amount, $fee_address, $fee_currency,$free);
