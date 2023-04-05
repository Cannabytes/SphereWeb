<?php
//Отключили кэширование, чтоб не приходилось обновлять через ctrl+sh+r
header("Cache-Control: no-cache, must-revalidate");
require __DIR__ . '/vendor/autoload.php';
\Ofey\Logan22\component\version\version::check_version_php();
require __DIR__ . '/src/route/route_registry.php';

