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
        tagMap = new Map(),
        isTagSubmitPending = false;


    $.each(emails, function(email, enabled = false){
        //console.log('email: ',email, ' enabled: ',enabled);
        $labelCell = $('<td style="padding: 5px 10px 5px 5px;" ><label>'+email+'</label></td>');
        var checked = enabled ? 'checked':''
        $checkbox = $(
            '<section class="slider-checkbox">' +
                '<input id="'+email+'" type="checkbox" '+checked+'>' +
                '<label class="label"></label>'+
            '</section>'
            );
        $checkBoxCell = $('<td style="padding: 5px 10px 5px 5px;">'+$checkbox[0].outerHTML+'</td>');
        $rowEmail =  $('<tr>'+$labelCell[0].outerHTML+$checkBoxCell[0].outerHTML+'</tr>');
        emailTable.append($rowEmail)
    });
    $.each(tags, function(tag, enabled){
        tagMap[tag] = enabled;
        //console.log('tagName: ',tag,' enabled: ',enabled)
        $labelCell = $('<td style="padding: 5px 10px 5px 5px;"><label>'+tag+'</label></td>');
        var checked = enabled ? 'checked':''
        $checkbox = $(
            '<section class="slider-checkbox">' +
                '<input id="'+tag+'" type="checkbox" '+checked+'>' +
                '<label class="label"></label>'+
            '</section>'
        );
        $checkBoxCell = $('<td style="padding: 5px 10px 5px 5px;">'+$checkbox[0].outerHTML+'</td>');
        $rowTag =  $('<tr>'+$labelCell[0].outerHTML+$checkBoxCell[0].outerHTML+'</tr>');
        tagTable.append($rowTag)
    });

    //cleverness could eliminate some mild DRY violations below
    form.submit(function(e) {
        //remove below obv
        // return false;

        e.preventDefault();

        form.find('.notice').hide();
        hasError = false;
        isEmailSubmitPending = true;
        isTagSubmitPending = true;
        console.log("Run Email Edit");
        //do email edit
        var url = 'https://api.lbry.io/user/email/edit?auth_token=' + userAuthToken
        $.param($.map(emailSection.find("input"), function(element) {
            console.log("email: ",element.id," is_enabled: ",element.checked);
            url = url + "&email="+element.id+"&enabled="+element.checked.toString();
            fetch(url).then(function(value) { return value.json()}).then(jsonResponse => {
                isEmailSubmitPending = false;
                if (!jsonResponse.success){
                    hasError = true
                    emailSection.find('.notice-error').html(jsonResponse.error).show();
                }
                showSuccess();
            }).catch(function(value) {
                isEmailSubmitPending = false;
                hasError = true;
                var error = "get actual error message from value";
                emailSection.find('.notice-error').html(error).show();
            });
        }));
        console.log("Run Tag Edit");
        //do tag edit
        var url = 'https://api.lbry.io/user/tag/edit?auth_token=' + userAuthToken
        var addTags =  new Array(),removeTags = new Array();
        $('#tag_table tr').each(function() {
            $trow = $(this);
            $trow.find('input').each(function () {
                var tagName = $(this)[0].id
                var enabled =  $(this)[0].checked
                if (enabled && !tagMap[$(this)[0].id] ){
                    addTags.push($(this)[0].id)
                }else if (!enabled && tagMap[$(this)[0].id]){
                    removeTags.push($(this)[0].id)
                }
            })
        });
        var hasChanges = addTags[0] || removeTags[0]
        console.log("AddTags: ",addTags,"RemoveTags: ",removeTags)
        var addTagsParam = addTags[0]
        for (var i = 1; i < addTags.length; i++) {
            hasChanges = true
            addTagsParam = addTagsParam+","+addTags[i];
        }
        var removeTagsParam = removeTags[0]
        for (var i = 1; i < removeTags.length; i++) {
            hasChanges = true
            removeTagsParam = removeTagsParam +","+removeTags[i];
        }
        if (addTagsParam && addTagsParam.length > 0){
            url = url + "&add="+addTagsParam
        }
        if ( removeTagsParam  && removeTagsParam.length > 0){
            url = url + "&remove="+removeTagsParam
        }
        if (hasChanges){
            fetch(url).then(response => { return response.json() }).then(jsonResponse =>{
                isTagSubmitPending = false;
                console.log("Success: ",jsonResponse)
                if (jsonResponse.success){
                    showSuccess();
                }else {
                    hasError = true;
                    tagSection.find('.notice-error').html(jsonResponse.error).show();
                }
            }).catch(function(value) {
                isTagSubmitPending = false;
                hasError = true;
                tagSection.find('.notice-error').html(value.error).show();
            });
        } else{
            isTagSubmitPending = false;
        }

    });

    form.show();

    function showSuccess() {
        if (!isEmailSubmitPending && !isTagSubmitPending && !hasError)
        {
            form.find('.notice-success').show();
        }
    }
}

