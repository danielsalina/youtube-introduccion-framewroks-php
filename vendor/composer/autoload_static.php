<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdddba087630659584b1ff8116354d283
{
    public static $files = array (
        'e320f53bb3364b7ed572ecc5ef33c5cf' => __DIR__ . '/../..' . '/app/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdddba087630659584b1ff8116354d283::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdddba087630659584b1ff8116354d283::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdddba087630659584b1ff8116354d283::$classMap;

        }, null, ClassLoader::class);
    }
}
