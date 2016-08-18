<?php

/**
 * Created by PhpStorm.
 * User: kauffj
 * Date: 8/16/16
 * Time: 8:18 PM
 */
class Os
{
  const OS_ANDROID = 'android',
    OS_IOS = 'ios',
    OS_LINUX = 'linux',
    OS_OSX = 'osx',
    OS_WINDOWS = 'windows';

  public static function getAll()
  {
    //url, English name, icon class, partial name
    //yes, this is probably a bad pattern
    return [
      Os::OS_WINDOWS => ['/windows', 'Windows', 'icon-windows', '_windows'],
      Os::OS_OSX     => ['/osx', 'OS X', 'icon-apple', '_osx'],
      Os::OS_LINUX   => ['/linux', 'Linux', 'icon-linux', '_linux'],
      Os::OS_ANDROID => ['/android', 'Android', 'icon-android', '_android'],
      Os::OS_IOS     => ['/ios', 'iOS', 'icon-mobile', '_ios']
    ];
  }
}