<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title>Verify Your Identity</title>
  <link href="/css/yt2.css" rel="stylesheet" type="text/css" />
  <link rel="icon" href="images/favicon.ico">
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script type="text/javascript">
      var verifyCallback = function(response) {
        alert(response);
      };
  </script>
</head>
<body>
  <h1>Almost Done!</h1>
  <p> Click the captcha to continue...</p>
  <!--<p><?php echo $token ?></p>-->
  <!--"6LcG_z0UAAAAAKBPDBhiJU_jI9cRNRiJwcUHq95u"-->
  <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-callback="verifyCallback"></div>
</body>
</html>
