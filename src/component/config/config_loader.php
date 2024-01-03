<?php
$configDirectory = \Ofey\Logan22\component\fileSys\fileSys::localdir('src/config');
$configFiles = glob($configDirectory . '/*.php');
foreach ($configFiles as $configFile) {
    require_once $configFile;
}
