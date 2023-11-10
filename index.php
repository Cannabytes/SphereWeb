<?php
//Раскомментировать/закомментировать - нужно для сборка логов ошибок, предупреждений и т.д.
ini_set('error_log', 'errors.log');
require __DIR__ . '/vendor/autoload.php';
Ofey\Logan22\component\version\version::check_version_php();
Ofey\Logan22\component\fileSys\fileSys::set_root_dir(__DIR__);
require __DIR__ . '/src/route/route_registry.php';

