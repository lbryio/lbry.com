lbry.emailSettingsForm = function (formSelector, emailState, userAuthToken) {
    var
        form = $(formSelector),
        state = JSON.parse(emailState),
        emails = state.emails,
        tags = state.tags,
        emailSection = form.find('.email-section'),
        tagSection = form.find('.tag-section'),
        emailTable = emailSection.find('table'),
        tagTable = tagSection.find('table'),
        hasError = false,
        isEmailSubmitPending = false,
        isTagSubmitPending = false;

    $.each(emails, function(email, enabled = false){
        console.log('email: ',email, ' enabled: ',enabled)
        $labelCell = $('<td><label>'+email+'</label></td>');
        $checkbox = $('<input id="'+email+'" type="checkbox">').prop('checked',enabled ? true : false);
        $checkBoxCell = $('<td></td>').append($checkbox);
        $rowEmail =  $('<tr></tr><br>').append($labelCell).append($checkBoxCell);
        emailTable.append($rowEmail)
    });
    $.each(tags, function(tag, enabled){
        console.log('tagName: ',tag,' enabled: ',enabled)
        $labelCell = $('<td><label>'+tag+'</label></td>')
        $checkbox = $('<input id="'+tag+'" type="checkbox">').prop('checked',enabled ? true : false);
        $checkBoxCell = $('<td></td>').append($checkbox);
        $rowTag =  $('<tr></tr><br>')
        tagTable.append($rowTag).append($labelCell).append($checkBoxCell);
    });

    function showSuccess() {
        if (!isEmailSubmitPending && !isTagSubmitPending && !hasError)
        {
            form.find('.notice-success').show();
        }
    }

    //cleverness could eliminate some mild DRY violations below
    form.submit(function(e) {
        //remove below obv
        // return false;

        e.preventDefault();

        form.find('.notice').hide();
        hasError = false;
        isEmailSubmitPending = true;
        isTagSubmitPending = true;

        //do email edit
        var url = 'http://localhost:8080/user/email/edit?auth_token=' + userAuthToken,
            //Did not test below but should be close to this, it may need to be scrubbed and/or modified.
            formData = emailSection.find(':input').serialize();


        fetch(url, {
            method: "POST",
            body: formData
        }).then(function(value) {
            isEmailSubmitPending = false;
            showSuccess();
        }).catch(function(value) {
            isEmailSubmitPending = false;
            hasError = true;
            var error = "get actual error message from value";
            emailSection.find('.notice-error').html(error).show();
        });

        //do tag edit
        var url = 'http://localhost:8080/user/fix/me?auth_token=' + userAuthToken,
            //Did not test below but should be close to this, it may need to be scrubbed and/or modified.
            formData = tagSection.find(':input').serialize();


        fetch(url, {
            method: "POST",
            body: formData
        }).then(function(value) {
            isTagSubmitPending = false;
            showSuccess();
        }).catch(function(value) {
            isTagSubmitPending = false;
            hasError = true;
            var error = "get actual error message from value";
            tagSection.find('.notice-error').html(error).show();
        });
    });

    form.show();
}