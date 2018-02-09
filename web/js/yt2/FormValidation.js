function submitDetailsForm() {
    $("#youtube_claim").submit(function (event) {

        // get value from id
        var lbry_channel_name = $.trim($('#lbry_channel_name').val());
        var email = $.trim($('#email').val());
        var youtube_url = $.trim($('#youtube_url').val());

        // Make sure that the error message are hidden before trying to validate value
        $('#lbry_error').hide();
        $('#email_error').hide();
        $('#youtube_url_error').hide();

            // If the lbry name is invalid or blank stop the post request
            if(!validateLBRYName(lbry_channel_name) || lbry_channel_name === '') {
                $('#lbry_channel_name').addClass('error_form');
                $('#lbry_error').show();
                event.preventDefault();
            }
            // Show the other field if the LBRY channel name field is validated once
            else{
                // Check only if the two fields
                if ($('#email').is(":visible") && $('#youtube_url').is(":visible")) {
                    // If the email is invalid or blank stop the post request
                    if (!validateEmail(email) || email === '') {
                        $('#email').addClass('error_form');
                        $('#email_error').show();
                        event.preventDefault();
                    }

                    // If the youtube url is invalid or blank stop the post request
                    if (!validateYoutubeChannelUrl(youtube_url) || youtube_url === '') {
                        $('#youtube_url').addClass('error_form');
                        $('#youtube_url_error').show();
                        event.preventDefault();
                    }
                }
                else{
                    event.preventDefault();
                }
                $('#youtube_url').show();
                $('#email').show();
            }


    });
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function validateLBRYName(lbry_channel_name){
    var re = /[1-z]+/;
    return re.test(lbry_channel_name);
}

function validateYoutubeChannelUrl(youtube_channel_url){
    var re = /^UC[A-Za-z0-9_-]{22}$/;
    return re.test(youtube_channel_url)
}