<?php
/**
 * route.php это обязательный файл
 */

$routes = [
    [
        //Метод POST/GET
        "method"  => "POST",
        //Адрес
        "pattern" => "/donate/transfer/cryptocloud/createlink",
        //Файл, в которой будет вызвана функция из call
        "file"    => "pay.php",
        //Функция, которая обработкает когда прийдет запрос
        "call"    => function() {
            (new cryptocloud())->create_link();
        },
    ],

    [
        "method"  => 'POST',
        "pattern" => "/donate/transfer/cryptocloud",
        "file"    => "pay.php",
        "call"    => function() {
            (new cryptocloud())->transfer();
        },
    ],

];

