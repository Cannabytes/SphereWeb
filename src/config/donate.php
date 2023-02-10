<?php

const FREEKASSE = [
    'enabled' => true,
    'merchant_id' => 12345,
    'secret_key_1' => '',
    'secret_key_2' => '',
    'currency_default' => 'RUB',
];

const PRIMEPAYMENTS = [
    'enabled' => true,
    'action' => 'initPayout',
    'project' => 1, // ID проекта
    'sum' => '100', // сумма
    'currency' => 'RUB', // сумма
    'payWay' => '1', // карты
    'email' => 'test@test.com', // e-mail
    'purse' => '1111222233334444', // кошелек
    'comment' => "Комментарий к выплате"
];

