<?php
/**
 * route.php это обязательный файл
 */

$routes = [
    [
        //Метод POST/GET
        "method"  => "POST",
        //Адрес
        "pattern" => "/donate/transfer/freekassa/createlink",
        //Файл, в которой будет вызвана функция из call
        "file"    => "pay.php",
        //Функция, которая обработкает когда прийдет запрос
        "call"    => function() {
            (new freekassa())->create_link();
        },
    ],

    [
        "method"  => "GET",
        "pattern" => "/donate/transfer/freekassa",
        "file"    => "pay.php",
        "call"    => function() {
            (new freekassa())->transfer();
        },
    ],
];

