<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita19f50e48d71fb4d075a58d7e9c96acd
{
    public static $files = array (
        '1cfd2761b63b0a29ed23657ea394cb2d' => __DIR__ . '/..' . '/topthink/think-captcha/src/helper.php',
    );

    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'think\\composer\\' => 15,
            'think\\captcha\\' => 14,
            'think\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'think\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/topthink/think-installer/src',
        ),
        'think\\captcha\\' => 
        array (
            0 => __DIR__ . '/..' . '/topthink/think-captcha/src',
        ),
        'think\\' => 
        array (
            0 => __DIR__ . '/../..' . '/thinkphp/library/think',
            1 => __DIR__ . '/..' . '/topthink/think-image/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita19f50e48d71fb4d075a58d7e9c96acd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita19f50e48d71fb4d075a58d7e9c96acd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
