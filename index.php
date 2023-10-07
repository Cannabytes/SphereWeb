<?php
//Раскомментировать нижнюю строку для сборка логов ошибок
ini_set('error_log', 'errors.log');
require __DIR__ . '/vendor/autoload.php';
\Ofey\Logan22\component\version\version::check_version_php();
require __DIR__ . '/src/route/route_registry.php';

