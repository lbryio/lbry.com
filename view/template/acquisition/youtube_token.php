<?php
$desired_lbry_channel_name = $_POST['desired_lbry_channel_name'];

if(!preg_match("/([@][1-z]+)/", $desired_lbry_channel_name)){
  $desired_lbry_channel_name = "@" . $desired_lbry_channel_name;
}
AcquisitionActions::actionYoutubeToken($desired_lbry_channel_name);
 ?>
