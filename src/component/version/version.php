<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 04.01.2023 / 6:33:29
 */

namespace Ofey\Logan22\component\version;

class version {

    private const MIN_PHP_VERSION = 8.1;

    static public function MIN_PHP_VERSION(): float {
        return self::MIN_PHP_VERSION;
    }

    static public function check_version_php(): void {
        if((float)PHP_VERSION < self::MIN_PHP_VERSION()) {
            echo sprintf("Need min version php : %.1f<br>", self::MIN_PHP_VERSION());
            echo 'Your php version : ' . PHP_VERSION;
            exit;
        }
    }

}