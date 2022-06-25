<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitac9105a3838ea52cfd4fdf5ee2e8e664
{
    public static $files = array (
        '1044ecf7a60404aa88dbf905b507a70f' => __DIR__ . '/../..' . '/source/Boot/Config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Source\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitac9105a3838ea52cfd4fdf5ee2e8e664::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitac9105a3838ea52cfd4fdf5ee2e8e664::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitac9105a3838ea52cfd4fdf5ee2e8e664::$classMap;

        }, null, ClassLoader::class);
    }
}
