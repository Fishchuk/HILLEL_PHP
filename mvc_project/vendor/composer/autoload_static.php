<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc68697e560ccd503a1b2d34bf1ea74f5
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'App\\Config' => __DIR__ . '/../..' . '/App/Config.php',
        'App\\Controllers\\AuthController' => __DIR__ . '/../..' . '/App/Controllers/AuthController.php',
        'App\\Controllers\\HomeController' => __DIR__ . '/../..' . '/App/Controllers/HomeController.php',
        'App\\Controllers\\PostsController' => __DIR__ . '/../..' . '/App/Controllers/PostsController.php',
        'App\\Controllers\\UserController' => __DIR__ . '/../..' . '/App/Controllers/UserController.php',
        'App\\Helpers\\FileHelper' => __DIR__ . '/../..' . '/App/Helpers/FileHelper.php',
        'App\\Helpers\\SessionHelper' => __DIR__ . '/../..' . '/App/Helpers/SessionHelper.php',
        'App\\Models\\Post' => __DIR__ . '/../..' . '/App/Models/Post.php',
        'App\\Models\\User' => __DIR__ . '/../..' . '/App/Models/User.php',
        'App\\Validators\\Posts\\CreatePostValidator' => __DIR__ . '/../..' . '/App/Validators/Posts/CreatePostValidator.php',
        'App\\Validators\\UserValidator' => __DIR__ . '/../..' . '/App/Validators/UserValidator.php',
        'Core\\Controller' => __DIR__ . '/../..' . '/Core/Controller.php',
        'Core\\Model' => __DIR__ . '/../..' . '/Core/Model.php',
        'Core\\Router' => __DIR__ . '/../..' . '/Core/Router.php',
        'Core\\Validator' => __DIR__ . '/../..' . '/Core/Validator.php',
        'Core\\View' => __DIR__ . '/../..' . '/Core/View.php',
        'PHPGangsta_GoogleAuthenticator' => __DIR__ . '/..' . '/phpgangsta/googleauthenticator/PHPGangsta/GoogleAuthenticator.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc68697e560ccd503a1b2d34bf1ea74f5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc68697e560ccd503a1b2d34bf1ea74f5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc68697e560ccd503a1b2d34bf1ea74f5::$classMap;

        }, null, ClassLoader::class);
    }
}