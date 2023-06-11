<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 04.01.2023 / 6:33:29
 */

namespace Ofey\Logan22\component\version;

class version {

    private const MIN_PHP_VERSION = 8.2;

    public static function check_version_php() : void {
        if ((float) PHP_VERSION < self::MIN_PHP_VERSION()) {
            echo sprintf("Need min version php : %.1f<br>", self::MIN_PHP_VERSION());
            echo 'Your php version : ' . PHP_VERSION;
            exit;
        }
        self::libsPHP();
    }

    public static function MIN_PHP_VERSION() : float {
        return self::MIN_PHP_VERSION;
    }

    public static function libsPHP() : void {
        if (!extension_loaded('gd') && !function_exists('gd_info')) {
            echo 'Need to enable GD in php.ini';
            exit;
        }
        if (!extension_loaded('curl')) {
            echo 'Need to enable curl in php.ini - ';
            exit;
        }
        if (!extension_loaded('pdo_mysql')) {
            echo 'Need to enable pdo_mysql in php.ini';
            exit;
        }
        if (!extension_loaded('mbstring')) {
            echo 'Need to enable mbstring in php.ini';
            exit;
        }
        if (!extension_loaded('fileinfo')) {
            echo 'Need to enable fileinfo in php.ini';
            exit;
        }
    }

}

