<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit1c8b0edbac56d1b1b7be0c34d8e31eff
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

        spl_autoload_register(array('ComposerAutoloaderInit1c8b0edbac56d1b1b7be0c34d8e31eff', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit1c8b0edbac56d1b1b7be0c34d8e31eff', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit1c8b0edbac56d1b1b7be0c34d8e31eff::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
