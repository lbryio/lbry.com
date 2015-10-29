<?php
include $_SERVER['ROOT_DIR'] . '/autoload.php';

i18n::register();
Session::init();
Controller::dispatch($_SERVER['REQUEST_URI']);