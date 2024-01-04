<?php
/**
 * Загружать ли пользователю файл с его данными после успешной регистрации
 */

const ENABLE_REGISTRATION_FILE = true;

const REGISTRATION_FILE_CONTENT = "
Site Server: %site_server%
Server Name: %server_name%
Rate Exp: %rate_exp%
Chronicle: %chronicle%
====== PROFILE =======
Email: %email%
====== ACCOUNT =======
Login: %login%
Password: %password%
";
