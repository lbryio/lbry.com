<?php
# Enable PHP dev cli-server
if (php_sapi_name() === 'cli-server'){
    if(is_file(__DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']))){
        return false;
    }
}

header('Location: https://lbry.org'.$_SERVER['REQUEST_URI']);
