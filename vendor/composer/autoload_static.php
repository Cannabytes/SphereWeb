<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0507220f772e7a768dd11955ae70034d
{
    public static $files = array (
        '7b11c4dc42b3b3023073cb14e519683c' => __DIR__ . '/..' . '/ralouphie/getallheaders/src/getallheaders.php',
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '131de54a350e12fe19b0cf294a5ff45c' => __DIR__ . '/../..' . '/src/config/general.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'SimpleCaptcha\\' => 14,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'O' => 
        array (
            'Ofey\\Logan22\\' => 13,
        ),
        'I' => 
        array (
            'Intervention\\Image\\' => 19,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'SimpleCaptcha\\' => 
        array (
            0 => __DIR__ . '/..' . '/s1syphos/php-simple-captcha/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-factory/src',
            1 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Ofey\\Logan22\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Intervention\\Image\\' => 
        array (
            0 => __DIR__ . '/..' . '/intervention/image/src/Intervention/Image',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Verot\\Upload\\Upload' => __DIR__ . '/..' . '/verot/class.upload.php/src/class.upload.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0507220f772e7a768dd11955ae70034d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0507220f772e7a768dd11955ae70034d::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit0507220f772e7a768dd11955ae70034d::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit0507220f772e7a768dd11955ae70034d::$classMap;

        }, null, ClassLoader::class);
    }
}
