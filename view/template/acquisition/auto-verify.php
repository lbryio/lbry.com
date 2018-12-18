<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Verify Your Identity</title>
    <link rel="icon" href="images/favicon.ico">
    <script src='https://www.google.com/recaptcha/api.js?' async defer></script>
    <script type="text/javascript">
        const ENDPOINT = 'https://api.lbry.io/user_email/confirm_v2'

        var verifyUser = function(email, verification_token, recaptcha) {
            const url = `${ENDPOINT}?email=${email}&verification_token=${verification_token+"x"}&recaptcha=${recaptcha}`;
            fetch(url)
                .then((response) => {
                    if (response.error) {
                        throw Error(response.error)
                    }
                    document.getElementById("title").textContent = "Done!"
                    document.getElementById("verify").style.display = "none";
                    document.getElementById("verify-success").style.display = "block";
                })
                .catch(error => {
                    document.getElementById("title").textContent = "Uh oh"
                    document.getElementById("verify").style.display = "none";
                    document.getElementById("verify-error").style.display = "block";
                    document.getElementById("verify-error-text").textContent = error.message;
                })
        }

        var verifyCallback = function(response) {
            const urlParams = new URLSearchParams(window.location.search);
            const email = urlParams.get('email')
            const verification_token = urlParams.get('verification_token');
            // In the future we will have an `origin` query, to smartly redirect (or tell users they are verified)
            // eg. if origin == "android" and device == "android" open the app, else say "your android app is verified"
            verifyUser(email, verification_token, response);

            document.getElementById("captcha-block").style.display = "none";
            document.getElementById("verify").style.display = "block";
        }

        var expiredCallback = function(error) {
            console.log("expired", error)
        }
    </script>
</head>
<body>
<div style="display: flex; align-items: center; flex-direction: column;" class="text-center">
    <img src="/img/lbry-dark-1600x528.png" style="max-height: 80px; margin-top: 50px; margin-bottom: 38px" alt="LBRY"/>
    <h1 id="title">Almost Done!</h1>
    <div id="captcha-block">
        <p>Click the captcha to continue...</p>
        <br/>
        <div class="g-recaptcha" data-sitekey="6LcG_z0UAAAAAKBPDBhiJU_jI9cRNRiJwcUHq95u" data-callback="verifyCallback" data-expired-callback="expiredCallback"></div>
    </div>

    <div style="display: none; margin-top: 10px;" id="verify">
        <p>Verifying...</p>
    </div>
    <div style="display: none; margin-top: 10px;" id="verify-error">
        <code id="verify-error-text"></code>
        <p style="margin-top: 10px">There was an error. Contact help@lbry.io if this keeps happening.</p>
    </div>
    <div style="display: none; margin-top: 10px;" id="verify-success">
        <p>Success! Your email is now verified in the app</p>
    </div>
</div>
</body>
</html>
