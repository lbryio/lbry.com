<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>Verify Your Identity</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>

    <link rel="icon" href="images/favicon.ico"/>

    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script>
      var magicLink = "#";
      var verifyCallback = function(response) {
        let payload = btoa(JSON.stringify({
          recaptcha: response,
          token: "<?php echo $token ?>"
        }));
        magicLink = "lbry://?verify=" + payload;
        document.getElementById("magic-link-text").textContent = payload;
        document.getElementById("success").style.display = "block";
        document.getElementById("captcha-block").style.display = "none";
      };
      var expiredCallback = function() {
        document.getElementById("success").style.display = "none";
        document.getElementById("captcha-block").style.display = "block";
      }
    </script>
  </head>

  <body>
    <main class="ancillary">
      <section class="hero hero--half-height">
        <div class="inner-wrap inner-wrap--hero">
          <h1>Almost Done!</h1>
        </div>
      </section>

      <section>
        <div class="inner-wrap inner-wrap--center">
          <div id="captcha-block">
            <p>Click the captcha to continue...</p>
            <br/>
            <div class="g-recaptcha" data-sitekey="6LePsJgUAAAAAFTuWOKRLnyoNKhm0HA4C3elrFMG" data-callback="verifyCallback" data-expired-callback="expiredCallback"></div>
          </div>

          <div style="display: none; margin-top: 10px;" id="success">
            <p>Now click the magic link below to verify your identity in app...</p>
            <br/>
            <a class="btn-primary btn-large spacer1" onclick="location.href=magicLink">Magic Link</a>
            <p><i>When prompted, open the link with LBRY Browser on Android or LBRY on Desktop. Does the magic link not work? Not on the same device as the app? Paste this (very long) piece of text into the verification screen of the app to confirm your identity.</i></p>
            <code class="multiline-code" id="magic-link-text"></code>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>
