<?php
/**
 * route.php это обязательный файл
 */

$routes = [
    [
        //Метод POST/GET
        "method"  => "POST",
        //Адрес
        "pattern" => "/donate/transfer/monobank/createlink",
        //Файл, в которой будет вызвана функция из call
        "file"    => "pay.php",
        //Функция, которая обработкает когда прийдет запрос
        "call"    => function() {
            (new monobank())->create_link();
        },
    ],

    [
        "method"  => "POST",
        "pattern" => "/donate/webhook/monobank",
        "file"    => "pay.php",
        "call"    => function() {
            (new monobank())->webhook();
        },
    ],
];

