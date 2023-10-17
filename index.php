<?php
error_reporting(E_ALL); // Включить вывод всех типов ошибок
ini_set('display_errors', 1); // Включить вывод ошибок в браузере
//Раскомментировать нижнюю строку для сборка логов ошибок
ini_set('error_log', 'errors.log');
require __DIR__ . '/vendor/autoload.php';
\Ofey\Logan22\component\version\version::check_version_php();
Ofey\Logan22\component\fileSys\fileSys::set_root_dir(__DIR__);
require __DIR__ . '/src/route/route_registry.php';

