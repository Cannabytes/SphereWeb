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
    }

    public static function MIN_PHP_VERSION() : float {
        return self::MIN_PHP_VERSION;
    }

}

