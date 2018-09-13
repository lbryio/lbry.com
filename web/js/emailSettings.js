lbry.emailSettingsForm = function (formSelector, tags, userAuthToken) {
    var
        form = $(formSelector),
        emailSection = form.find('.email-section'),
        tagSection = form.find('.tag-section'),
        hasError = false,
        isEmailSubmitPending = false,
        tagMap = new Map(),
        isTagSubmitPending = false;

    $.each(tags, function(tag, enabled){
        tagMap[tag] = enabled;
    });

    form.submit(function(e) {

        e.preventDefault();

        form.find('.notice').hide();
        hasError = false;
        isEmailSubmitPending = true;
        isTagSubmitPending = true;
        var promiseMap = $.map(emailSection.find("input"), function(element) {
            var url = 'https://api.lbry.io/user/email/edit?auth_token=' + userAuthToken
            url = url + "&email="+element.value+"&enabled="+element.checked.toString();
            return fetch(url).then(function(value) { return value.json()})

        });
        //Call api for each email a user will have linked - polyfill needed for IE for Promise.all
        Promise.all(promiseMap)
            .then(function(apiValues) {
                isEmailSubmitPending = false;
                showSuccess();
            })
            .catch(function(value) {
                isEmailSubmitPending = false;
                hasError = true;
                var error = "get actual error message from value";
                emailSection.find('.notice-error').html(error).show();
            });

        //do tag edit
        var url = 'https://api.lbry.io/user/tag/edit?auth_token=' + userAuthToken
        var addTags =  new Array(),
            removeTags = new Array();

        tagSection.find('input').each(function () {
            var tagName = this.value
            var enabled = this.checked
            if (enabled && !tagMap[tagName] ){
                addTags.push(tagName)
            } else if (!enabled && tagMap[tagName]){
                removeTags.push(tagName)
            }
        });

        var hasChanges = addTags[0] || removeTags[0]
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
            form.find('.notice-success').show().get(0).scrollIntoView();
        }
    }
}

