<?php

use Bramus\Router\Router;
use Ofey\Logan22\controller\install\install;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

$router = new Router();

/**
 * Инсталлятор
 */
$router->get("/", function() {
    header("Location: /install/rules");
    die();
});
$router->get("rules", function() {
    install::rules();
});
$router->get("db", function() {
    install::db();
});
$router->get("admin", function() {
     install::admin();
});
$router->post("admin", function() {
    install::add_admin();
});

$router->post("db/connect/test", function() {
    install::db_connect();
});

$router->set404(function() {
    echo 'Not find page';
});

$router->run();