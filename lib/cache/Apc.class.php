<?php

/**
 * Created by PhpStorm.
 * User: kauffj
 * Date: 8/13/16
 * Time: 2:42 PM
 */
class Apc
{
    public static function isEnabled()
    {
        return extension_loaded('apc') && ini_get('apc.enabled');
    }
}
