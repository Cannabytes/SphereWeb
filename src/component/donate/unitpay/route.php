<?php
/**
 * route.php это обязательный файл
 */

$routes = [
    [
        //Метод POST/GET
        "method"  => "POST",
        //Адрес
        "pattern" => "/donate/transfer/unitpay/createlink",
        //Файл, в которой будет вызвана функция из call
        "file"    => "pay.php",
        //Функция, которая обработкает когда прийдет запрос
        "call"    => function() {
            (new unitpay())->create_link();
        },
    ],

    [
        "method"  => 'GET',
        "pattern" => "/donate/transfer/unitpay",
        "file"    => "pay.php",
        "call"    => function() {
            (new unitpay())->transfer();
        },
    ],
];

