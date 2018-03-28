<?php js_start() ?>
if(localStorage.getItem('status_token')){
    var status_token = localStorage.getItem('status_token');
    url = '/youtube/status/' + status_token;
    $(location).attr('href', url);
}

else{
    $(location).attr('href', '/youtube');
}
<?php js_end() ?>
