<?php
/**
 * Загружать ли пользователю файл с его данными после успешной регистрации
 */

return [
    //Включить true / false - выключить
    'enable' => true,

    //Содержимое файла
    'content' => "
Site Server: %site_server%
Server Name: %server_name%
Rate Exp: %rate_exp%
Chronicle: %chronicle%
====== PROFILE =======
Email: %email%
====== ACCOUNT =======
Login: %login%
Password: %password%
"
];
