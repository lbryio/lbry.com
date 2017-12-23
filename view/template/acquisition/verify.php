<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title>Verify Your Identity</title>
  <link rel="icon" href="images/favicon.ico">
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script type="text/javascript">
      var magicLink = "#";
      var verifyCallback = function(response) {
        let payload = btoa(JSON.stringify({
          recaptcha: response,
          token: "<?php echo $token ?>"
        }));
        magicLink = "lbry://?verify=" + payload;
        document.getElementById("magic-link-text").textContent = payload;
        document.getElementById("success").style.display = "block";
      };
      var expiredCallback = function() {
        document.getElementById("success").style.display = "none";
      }
  </script>
</head>
<body>
  <div style="display: flex; align-items: center; flex-direction: column;" class="text-center">
    <img src="/img/lbry-dark-1600x528.png" style="max-height: 80px; margin-top: 50px;" alt="LBRY"/>
    <h1>Almost Done!</h1>
    <p>Click the captcha to continue...</p>
    <div class="g-recaptcha" data-sitekey="6LcG_z0UAAAAAKBPDBhiJU_jI9cRNRiJwcUHq95u" data-callback="verifyCallback" data-expired-callback="expiredCallback"></div>
    <div style="display: none; margin-top: 10px;" id="success">
      <p>Now click the magic link below to verify your identity in app...</p>
      <a class="btn-primary btn-large spacer1" onclick="location.href=magicLink">Magic Link</a>
      <p><i>Does the magic link not work? Not on the same device as the app? Paste this text into the verification screen instead.</i></p>
      <code class="multiline-code" id="magic-link-text"></code>
    </div>
  </div>
</body>
</html>
