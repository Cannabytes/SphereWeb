<?php

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\session\session;

const MIN_PHP_VERSION = 8.1;
if((float)PHP_VERSION < MIN_PHP_VERSION) {
    echo sprintf("Need min version php : %.1f<br>", MIN_PHP_VERSION);
    echo 'Your php version : ' . PHP_VERSION;
    exit;
}

session::init();
lang::load_package();
/**
 * Проверка существования файла подключения к БД
 */
if(!file_exists('src/config/db.php')) {
    include 'install/install.php';
    die();
}

