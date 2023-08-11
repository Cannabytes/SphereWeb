<?php
/**
 * route.php это обязательный файл
 */

$routes = [
    //Роутер для создания ссылки перехода на сайт оплаты
    [
        //Метод POST/GET
        "method"  => "POST",
        //Адрес
        "pattern" => "/donate/transfer/primepayments/createlink",
        //Файл, в которой будет вызвана функция из call
        "file"    => "pay.php",
        //Функция, которая обработкает когда прийдет запрос
        "call"    => function() {
            (new primepayments())->create_link();
        },
    ],

    [
        "method"  => "POST",
        "pattern" => "/donate/transfer/primepayments",
        "file"    => "pay.php",
        "call"    => function() {
            (new primepayments())->transfer();
        },
    ],
];

