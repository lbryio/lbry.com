function submitEditForm(){
    $("#youtube_settings").submit(function (event) {

        // get value from id
        var lbry_channel_name = $.trim($('#channel-name').val());
        var email = $.trim($('#email').val());

        // Hide the error message
        $('#channel-name-error').hide();
        $('#email-error').hide();

        // If the channel name is invalid or blank stop the post request
        if(!validateLBRYName(lbry_channel_name) || lbry_channel_name === ''){
            $('#lbry_channel_name').addClass('error_form');
            $('#channel-name-error').show();
            event.preventDefault();
        }

        if(!validateEmail(email) || email === ''){
            $('#email').addClass('error_form');
            $('#email-error').show();
            event.preventDefault();
        }

        // If the checkbox is not check stop the post request
        if(!$('#sync-consent').prop('checked')){
            $('#sync-consent').addClass('error_form');
            $('#sync-consent-error').show();
            event.preventDefault();
        }
        localStorage.setItem("status_token", $.trim($('#status_token').val()));
        localStorage.setItem("lbry_channel_name_sync", $.trim($('#channel-name').val()));
    });
}

function submitDetailsForm() {
    $("#youtube_claim").submit(function (event) {

        // get value from id
        var lbry_channel_name = $.trim($('#lbry_channel_name').val());

        // Make sure that the error message are hidden before trying to validate value
        $('#lbry_error').hide();

            // If the lbry name is invalid or blank stop the post request
            if(!validateLBRYName(lbry_channel_name) || lbry_channel_name === '') {
                $('#lbry_channel_name').addClass('error_form');
                $('#lbry_error').show();
                event.preventDefault();
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