<?php
include $_SERVER['ROOT_DIR'] . '/autoload.php';

i18n::register();
Session::init();
Controller::dispatch(strtok($_SERVER['REQUEST_URI'], '?'));