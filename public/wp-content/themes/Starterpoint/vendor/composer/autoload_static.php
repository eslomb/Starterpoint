<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit82b7142f5b8f626536be43cb678b65b4
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Starterpoint\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Starterpoint\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit82b7142f5b8f626536be43cb678b65b4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit82b7142f5b8f626536be43cb678b65b4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
