<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1c8b0edbac56d1b1b7be0c34d8e31eff
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WP_Compat_Validation_Tool\\' => 26,
        ),
        'I' => 
        array (
            'IPLib\\' => 6,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WP_Compat_Validation_Tool\\' => 
        array (
            0 => __DIR__ . '/../..' . '/10up-lib/wp-compat-validation-tool/src',
        ),
        'IPLib\\' => 
        array (
            0 => __DIR__ . '/..' . '/mlocati/ip-lib/src',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1c8b0edbac56d1b1b7be0c34d8e31eff::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1c8b0edbac56d1b1b7be0c34d8e31eff::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1c8b0edbac56d1b1b7be0c34d8e31eff::$classMap;

        }, null, ClassLoader::class);
    }
}
