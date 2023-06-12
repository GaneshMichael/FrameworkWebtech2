<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd9bbf3682d79905293d52bbc34618555
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd9bbf3682d79905293d52bbc34618555::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd9bbf3682d79905293d52bbc34618555::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd9bbf3682d79905293d52bbc34618555::$classMap;

        }, null, ClassLoader::class);
    }
}