<?php

class OS
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
      OS::OS_WINDOWS => ['/windows', 'Windows', 'icon-windows', '_windows'],
      OS::OS_OSX     => ['/osx', 'OS X', 'icon-apple', '_osx'],
      OS::OS_LINUX   => ['/linux', 'Linux', 'icon-linux', '_linux'],
      OS::OS_ANDROID => ['/android', 'Android', 'icon-android', '_android'],
      OS::OS_IOS     => ['/ios', 'iOS', 'icon-mobile', '_ios']
    ];
  }
}