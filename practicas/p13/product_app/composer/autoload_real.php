<?php
class ComposerAutoloaderInitc06ebc53c0cbd9ba44655617cc6d747a
{
    private static $loader;
    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }
    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }
        spl_autoload_register(array('ComposerAutoloaderInitc06ebc53c0cbd9ba44655617cc6d747a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc06ebc53c0cbd9ba44655617cc6d747a', 'loadClassLoader'));
        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc06ebc53c0cbd9ba44655617cc6d747a::getInitializer($loader));
        $loader->register(true);
        return $loader;
    }
}