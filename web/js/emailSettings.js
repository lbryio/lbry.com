lbry.emailSettingsForm = function (emailState) {
    var
        state = JSON.parse(emailState),
        emails = state.emails,
        tags = state.tags,
        emailTable = $('#email_table'),
        tagTable = $('#tag_table');

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

    $('#email_form').submit(function(e) {
        e.preventDefault();
    });
    $('#tag_form').submit(function(e) {
        e.preventDefault();
    });


}

lbry.applyEmailEdit = function () {
    console.log("applied email settings")

    //How do I call PHP api with the proper arguments from here?
    //Then how do I go to the page again triggering a refresh or show an error?
    //Need to get the token here as well to call the API

    /*let url = 'http://localhost:8080/user/email/edit?auth_token='+token+'&'
    fetch('http://localhost:8080/user/email/edit?').then(value => {
        console.log(value.json())

    });*/
}

lbry.applyTagEdit = function () {
    console.log("applied tag settings")
}