lbry.emailSettingsForm = function (formSelector, tags, userAuthToken) {
    var
        form = $(formSelector),
        emailSection = form.find('.email-section'),
        tagSection = form.find('.tag-section'),
        tagMap = new Map();

    $.each(tags, function(tag, enabled) {
        tagMap[tag] = enabled;
    });

    emailSection.find(':input').change(submitEmail);
    tagSection.find(':input').change(submitTags);

    function submitEmail(e) {
        var element = e.target,
            url = 'https://api.lbry.com/user_email/edit?auth_token=' + userAuthToken
                    + "&email=" + element.value + "&enabled=" + element.checked.toString();

        emailSection.find('.notice').hide();
        fetch(url).then(function (value) {
            var apiValues = value.json();
            emailSection.find('.notice-success').show()
        })
        .catch(function (value) {
            var error = "Something went wrong saving your email";
            emailSection.find('.notice-error').html(error).show();
        });
    }

    function submitTags() {
        tagSection.find('.notice').hide();
        var url = 'https://api.lbry.com/user_tag/edit?auth_token=' + userAuthToken,
            addTags = [],
            removeTags = [];

        tagSection.find('input').each(function () {
            var tagName = this.value
            var enabled = this.checked
            if (enabled && !tagMap[tagName]) {
                addTags.push(tagName)
            } else if (!enabled && tagMap[tagName]) {
                removeTags.push(tagName)
            }
        });

        var hasChanges = addTags[0] || removeTags[0]
        var addTagsParam = addTags[0]
        for (var i = 1; i < addTags.length; i++) {
            hasChanges = true
            addTagsParam = addTagsParam + "," + addTags[i];
        }
        var removeTagsParam = removeTags[0]
        for (var i = 1; i < removeTags.length; i++) {
            hasChanges = true
            removeTagsParam = removeTagsParam + "," + removeTags[i];
        }
        if (addTagsParam && addTagsParam.length > 0) {
            url += "&add=" + addTagsParam
        }
        if (removeTagsParam && removeTagsParam.length > 0) {
            url += "&remove=" + removeTagsParam
        }

        if (hasChanges) {
            fetch(url)
                .then(function (response) {
                    return response.json()
                })
                .then(function (jsonResponse) {
                    if (jsonResponse.success) {
                        tagSection.find('.notice-success').show()
                    } else {
                        tagSection.find('.notice-error').html(jsonResponse.error).show();
                    }
                })
                .catch(function (value) {
                    tagSection.find('.notice-error').html(value.error).show();
                });
        }
    }

    form.show();
}

