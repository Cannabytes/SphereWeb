<?php
/**
 * Система защиты аккаунтов от кражи
 * При регистрации пользователь может выбрать префикс или суффикс к аккаунту
 * Мы не обязываем пользователя обязательно использовать данную защиту, только по его желанию.
 */
return [
    //Включить систему префиксов-суффиксов
    //true - включить / false - выключить
    'enable' => true,

    //prefix or suffix
    //prefix добавляет в начало символы Sj_login
    //suffix добавляет в конец слова символы login_Sj
    'type' => 'prefix',
];

