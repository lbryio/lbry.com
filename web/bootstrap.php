<?php
include $_SERVER['ROOT_DIR'] . '/autoload.php';

Controller::dispatch($_SERVER['REQUEST_URI']);