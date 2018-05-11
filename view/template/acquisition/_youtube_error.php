<?php

$error_message = AcquisitionActions::prepareYoutubeErrorMessage($error_message ,($email ?? null));

echo "<div>" . "The following error occurred: ". $error_message  . " For support please send an email to hello@lbry.io" . "</div>";
