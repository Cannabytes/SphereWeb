<?php

//Часовой пояс по умолчанию, если не установлено у пользователя или не определен при регистрации
const DEFAULT_TIMEZONE = "Europe/Moscow";

//Стоимость сфера коинов, для смены аватарки
const PRICE_CHANGE_AVATAR = 5;

//Есть два шаблона, light (светлый) и dark (темный), по умолчанию light, он будет загружаться для пользователей, которые
//не авторизованы и не выбрали предпочтительный цвет шаблона в настройках
const MODE_TEMPLATE = "dark";

//По умолчанию тикет считать открытым (true) или закрыты (false)
const IS_DEFAULT_PUBLIC_TICKET = true;

// true / false - включить / отключить кэширование шаблонов
// На рабочих проектах - включить
const ENABLE_CACHE_TEMPLATE = false;

// Дебаг шаблонов
// На рабочих проектах - выключить
const DEBUG_TEMPLATE = true;

// Автоперезагрузка шаблонов
const AUTO_RELOAD = true;

// Скрывать пароли игроков
// Необходимо на случай, если у Вас клиент с автологином и вы используете лаунчер
const SAVE_ACCOUNT_PASSWORD = false;

// Сайт на техническом обслуживании.
// Мы отключаем сайт и выводим сообщение что сайт находится на тех.обслуживании
// Пользователи не сможет посещать страницы и просматривать сайт, за исключением администратора.
const TECHNICAL_WORK = false;
// Оповещение о времени, когда техническое обслуживание будет завершено
// Можно текстом указать сообщение или false если не нужно выводить сообщение об оповещении возобновления работы
const TECHNICAL_WORK_TIME_UP = "21:00 - 22.07.2025";

//Лого проекта, это надпись или небольшое изображение, которое выводится в самом верху страницы слева.
const LOGO_PROJECT = "<i class='fa fa-fire text-primary'></i><span class='fs-4 text-dual'>Sphere</span><span class='fs-4 text-primary'>Web</span>" ;

//Титул заглавной страницы (первой /)
const TITLE = [
    "ru" => "Добро пожаловать на лучший сервер 21 века",
    "en" => "Welcome to the best server of the 21st century",
];

//Описание главной страницы
const DESCRIPTION = [
    "ru" => "Публичный сервер Lineage 2",
    "en" => "Lineage 2 public server",
];

const KEYWORDS = "Lineage 2 сервер, Игровой сервер Lineage 2, PvP сервер, Новый сервер, High Five сервер, Бесплатный сервер Lineage 2, Lineage 2 скачать, CMS SphereWeb, MMORPG, Lineage2Clan, Get-Web.Site,
Lineage2Community, Aden, Giran, Lineage2 Server, L2j, Aden Castle, Dion Castle, Giran Castle, Gludio Castle, Goddard Castle, Innadril Castle, Oren Castle, Rune Castle, Schuttgart Castle, Talking Island Castle,
Human Fighter, Human Knight, Rogue, Warrior, Human Mystic, Human Wizard, Cleric, Elf Fighter, Elven Knight, Scout, Elf Mystic, Elven Wizard, Elven Oracle, Dark Elf Fighter, Palus Knight, Assassin, Dark Elf Mystic, Dark Wizard, Shillien Oracle, Orc Fighter, Orc Raider, Monk, Orc Mystic, Orc Shaman, Overlord, Dwarf Fighter, Scavenger, Artisan, Dwarf Mystic, Warsmith, Bounty Hunter, Kamael Soldier, Trooper, Berserker, Kamael Mystic, Soul Breaker, Soul Breaker,
Открытый мир фэнтезийной вселенной, разнообразие игровых рас: люди, эльфы, тёмные эльфы, орки, дворфы, камаэлы, многообразие профессий и классов персонажей, PvP (игрок против игрока) и PvE (игрок против окружающей среды) контент, захватываемые замки и территории, квесты и задания для развития персонажа, разнообразие монстров и боссов, эпические сражения и рейды, экономическая составляющая игры: торговля, создание предметов, игровая валюта, социальное взаимодействие: кланы, альянсы, гильдии, разнообразие игровых зон и локаций, развитие персонажа через навыки и экипировку,
Open-world fantasy universe, diverse playable races including Humans, Elves, Dark Elves, Orcs, Dwarves, and Kamael, variety of character professions and classes, PvP and PvE content, capturable castles and territories, quests and tasks for character development, diverse range of monsters and bosses, epic battles and raids, in-game economy involving trading, crafting, and currency, social interaction through clans, alliances, guilds, diverse gaming zones and locations, character progression through skills and equipment,
Игровые события Lineage 2, Lineage 2 фестивали, Праздничные события Lineage 2, Lineage 2 система торговли, Крафт в Lineage 2, PvP/PvE системы Lineage 2, Lineage 2 форумы, Lineage 2 сообщество, Lineage 2 обсуждения, Lineage 2 обновления, High Five обновление Lineage 2, Lineage 2 последний патч.";


//Сохранять ли данные о статистики онлайна
const SAVE_ONLINE_STATISTIC = true;
//Минимальное время в минутах, когда будет отправлен следующий запрос на сохранение статистики онлайна
const PAUSE_TIME = 10;
//Увеличивать показатели выводимого онлайна (для пользователей, в админке онлайн честный).
const ONLINE_MUL = 1.72;