<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit45dc0338abc67cde9b566c717b3f888a
{
    public static $files = array (
        'cfe4039aa2a78ca88e07dadb7b1c6126' => __DIR__ . '/../..' . '/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Shebo\\PhpProject\\' => 17,
        ),
        'P' => 
        array (
            'Pecee\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Shebo\\PhpProject\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Pecee\\' => 
        array (
            0 => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee',
        ),
    );

    public static $classMap = array (
        'BaseController' => __DIR__ . '/../..' . '/app/controllers/BaseController.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'DbHandler' => __DIR__ . '/../..' . '/app/models/DbHandler.php',
        'Group' => __DIR__ . '/../..' . '/app/models/Group.php',
        'GroupController' => __DIR__ . '/../..' . '/app/controllers/GroupController.php',
        'HomeController' => __DIR__ . '/../..' . '/app/controllers/HomeController.php',
        'IndexController' => __DIR__ . '/../..' . '/app/controllers/IndexController.php',
        'LoginController' => __DIR__ . '/../..' . '/app/controllers/LoginController.php',
        'LogoutController' => __DIR__ . '/../..' . '/app/controllers/LogoutController.php',
        'MySQLHandler' => __DIR__ . '/../..' . '/app/models/MySQLHandler.php',
        'UserController' => __DIR__ . '/../..' . '/app/controllers/UserController.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit45dc0338abc67cde9b566c717b3f888a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit45dc0338abc67cde9b566c717b3f888a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit45dc0338abc67cde9b566c717b3f888a::$classMap;

        }, null, ClassLoader::class);
    }
}
