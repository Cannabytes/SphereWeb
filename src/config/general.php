<?php

//Часовой пояс по умолчанию, если не установлено у пользователя или не определен при регистрации
const DEFAULT_TIMEZONE = "Europe/Moscow";

//Стоимость сфера коинов, для смены аватарки
const PRICE_CHANGE_AVATAR = 5;

//Есть два шаблона, light (светлый) и dark (темный), по умолчанию light, он будет загружаться для пользователей, которые
//не авторизованы и не выбрали предпочтительный цвет шаблона в настройках
const MODE_TEMPLATE = "dark";


// true / false - включить / отключить кэширование шаблонов
const ENABLE_CACHE_TEMPLATE = false;

// Дебаг шаблонов
const DEBUG_TEMPLATE = true;

// Автоперезагрузка шаблонов
const AUTO_RELOAD = true;