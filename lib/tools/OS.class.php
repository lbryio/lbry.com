<?php

class OS
{
    /*
     * if changing below constants, you should add permanent redirects for old OS names used in URLs
     */
    public const OS_ANDROID = 'android',
    OS_IOS = 'ios',
    OS_LINUX = 'linux',
    OS_OSX = 'osx',
    OS_WINDOWS = 'windows';

    public static function getAll()
    {
        //url, English name, icon class, partial name
        //yes, this is probably a bad pattern
        return [
      OS::OS_WINDOWS => ['/windows', 'Windows', 'icon-windows', __("Get LBRY Desktop for Windows"), "Windows"],
      OS::OS_OSX     => ['/osx', 'macOS', 'icon-apple', __("Get LBRY Desktop for macOS"), "OSX"],
      OS::OS_LINUX   => ['/linux', 'Linux', 'icon-linux', __("Get LBRY Desktop for Linux"), "Linux"],
      OS::OS_ANDROID => ['/android', 'Android', 'icon-android', __('Get LBRY Android'), false],
      OS::OS_IOS     => ['/ios', 'iOS', 'icon-ios', __('Get Odysee for iOS'), false]
    ];
    }

    public static function getOsForExtension($ext)
    {
        switch ($ext) {
      case 'deb':
      case 'AppImage':
        return OS::OS_LINUX;

      case 'dmg':
      case 'pkg':
        return OS::OS_OSX;

      case 'msi': // fallthrough
      case 'exe':
        return OS::OS_WINDOWS;

      case 'apk':
          return OS::OS_ANDROID;

      default:
        throw new LogicException("Unknown ext $ext");
    }
    }
}
