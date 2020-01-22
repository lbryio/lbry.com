<?php

class OS
{
    /*
     * if changing below constants, you should add permanent redirects for old OS names used in URLs
     */
    const OS_ANDROID = 'android',
    OS_IOS = 'ios',
    OS_LINUX = 'linux',
    OS_OSX = 'osx',
    OS_WINDOWS = 'windows';

    public static function OS_DETAIL($os)
    {
        switch ($os) {
        case 'android':
          return [
            '/android',
            'Android',
            'icon-android',
            false,
            "Android",
            "<span class='icon-android icon-fw'></span> Android"
          ];

        case 'ios':
          return [
            '/ios',
            'iOS',
            'icon-mobile',
            false,
            "iOS",
            "<span class='icon-ios icon-fw'></span> iOS"
          ];

        case 'linux':
          return [
            '/linux',
            'Linux',
            'icon-linux',
            __("Download .deb"),
            "Linux",
            "<span class='icon-linux icon-fw'></span> Linux"
          ];

        case 'osx':
          return [
            '/osx',
            'macOS',
            'icon-apple',
            __("Download for macOS"),
            "OSX",
            "<span class='icon-apple icon-fw'></span> macOS"
          ];

        case 'windows':
          return [
            '/windows',
            'Windows',
            'icon-windows',
            __("Download for Windows"),
            "Windows",
            "<span class='icon-windows icon-fw'></span> Windows"
          ];
      }
    }

    public static function getAll()
    {
        //url, English name, icon class, partial name
        //yes, this is probably a bad pattern
        return [
      OS::OS_WINDOWS => ['/windows', 'Windows', 'icon-windows', __("Download for Windows"), "Windows"],
      OS::OS_OSX     => ['/osx', 'macOS', 'icon-apple', __("Download for macOS"), "OSX"],
      OS::OS_LINUX   => ['/linux', 'Linux', 'icon-linux', __("Download .deb"), "Linux"],
      OS::OS_ANDROID => ['/android', 'Android', 'icon-android', false, false],
      OS::OS_IOS     => ['/ios', 'iOS', 'icon-ios', false, false]
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
