<?php

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\session\session;



session::init();
lang::load_package();
/**
 * Проверка существования файла подключения к БД
 */
if(!file_exists('src/config/db.php')) {
    include 'install/install.php';
    die();
}

