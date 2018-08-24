<?php
class Autoloader
{
    public static $classes = [];

    public static function autoload($class)
    {
        if (class_exists($class, false) || interface_exists($class, false)) {
            return true;
        }

        $class = strtolower($class);
        $path = static::$classes[$class] ?? false;

        if ($path) {
            require_once $path;
            return true;
        }

        return false;
    }

    public static function reload($reload = false)
    {
        $key = 'lbry-classes-5';
        if (ini_get('apc.enabled') && !$reload) {
            $classes = apc_fetch($key, $success);
            if ($success) {
                static::$classes = $classes;
                return;
            }
        }

        static::$classes = [];

        $dir = new RecursiveDirectoryIterator(ROOT_DIR, RecursiveDirectoryIterator::SKIP_DOTS);
        $ite = new RecursiveIteratorIterator($dir);
        $pathIterator = new RegexIterator($ite, '/.*\.php$/', RegexIterator::GET_MATCH);
        foreach ($pathIterator as $paths) {
            foreach ($paths as $path) {
                static::$classes += static::parseFile($path);
            }
        }

        if (ini_get('apc.enabled')) {
            apc_store($key, static::$classes);
        }
    }

    protected static function parseFile($path)
    {
        $mapping = [];
        $classes = [];

        preg_match_all('~^\s*(?:namespace)\s+([^;]+)~mi', file_get_contents($path), $namespaces);
        preg_match_all('~^\s*(?:abstract\s+|final\s+)?(?:class|interface)\s+(\w+)~mi', file_get_contents($path), $classes);

        if (isset($namespaces[1]) && count($namespaces[1]) > 2) {
            throw new RuntimeException('Autoloader cannot handle 2 namespaces in the same file');
        }

        $prefix = isset($namespaces[1]) && count($namespaces[1]) ? reset($namespaces[1]) . '\\' : '';

        foreach ($classes[1] as $class) {
            $mapping[strtolower($prefix . $class)] = $path;
        }
        return $mapping;
    }
}

ini_set('unserialize_callback_func', 'spl_autoload_call');
spl_autoload_register('Autoloader::autoload');
Autoloader::reload(true);
