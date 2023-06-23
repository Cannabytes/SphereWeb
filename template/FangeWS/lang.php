<?php
/**
 * Языковой пакет для собствененого шаблона
 * В шаблоне вызывается {{ phrase('home') }}
 */
return [
    'ru' => [
        'home'                    => 'Главная',
        'important_announcements' => 'ВАЖНЫЕ ОБЪЯВЛЕНИЯ',
        'project_streamers'       => 'Стримеры проекта',
        'last_news'               => 'Последние новости',
        'messages_forum'          => 'Сообщения с форума',
        'other news'              => 'Остальные новости',
        'promotions_players'      => 'Акции для игроков',
        'files'                   => 'Файлы',
        'registration'            => 'Регистрация',
        'about server'            => 'О серверe',
        'forum'                   => 'Форум',
        'donation'                => 'Пожертвования',
        'help'                    => 'Помощь',
        'all_rights'              => 'Тестовые сервера. Все права принадлежат NCSoft',
		'auth' 				  	  => 'Авторизация',
		'statistic_server'		  => 'Статистика серверов',
		'bayka' 				  => 'Данный сервер является тестовым вариантом игры и предназначен только для ознакомления игроков. Все права принадлежат компании NCSOFT.',
		'server_open' 			  => 'Сервер %s x%d успешно открыт!',
		'start_game' 			  => 'Начать играть',
		'stream' 				  => 'Стрим трансляции',
		'client and registration' => 'Клиент и регистрация',
		'download server patch'   => 'СКАЧАТЬ ПАТЧ СЕРВЕРА',
		'faq troubleshooting'	  => 'FAQ РЕШЕНИЕ ПРОБЛЕМ',
		'recommend' 			  => 'Советуем отключить Антивирус перед установкой всех файлов. т.к файлы защиты клиента могут определятся как вирус.',
		'download_patch' 		  => 'Скачать патч',
		'download_client' 		  => 'Скачать клиент',
		'redirect_forum' 		  => 'Перейти на форум',

        'news' => 'Новости',
        'home_page' => 'Начальная страница',
        'files_for_game' => 'Для игры',
        'desc_of_world' => 'Описание миров',
        'forum_talk' => 'Общение',
        'help_project' => 'Помощь проекту',
        'go_to_lk' => 'Перейти в личный кабинет',
        'game_client' => 'ИГРОВОЙ КЛИЕНТ 5.4 GB',
        'select_server' => 'ВЫБЕРИТЕ СЕРВЕР',
        'selection' => 'Выбрать',
        'files_for_...' => 'Файлы для',
        'download_and_install_game' => 'СКАЧАЙ И УСТАНОВИ Клиент',
        'download_clear_client' => 'Скачать чистый клиент',
        'source' => 'источник',
        'download_patch_and_launcher' => 'СКАЧАЙ патч или апдейтер',
        'download' => 'Скачать',
        'create_account' => 'Создание аккаунта',
        'desc_server' => 'Описание сервера',
        'main_info' => 'Основная информация',
        'info_coming_soon' => 'Информация скоро появится...',
        'rating_players' => 'РЕЙТИНГ ИГРОКОВ',
        'rating_clans' => 'Рейтинг кланов',
        'recent_topics_from_the_forum' => 'ПОСЛЕДНИЕ ТЕМЫ С ФОРУМА',
        'forum_topic' => 'Темы с форума',
        'server_rating' => 'Рейтинг сервера',
        'ratingPvP' => 'Рейтинг PvP',
        'ratingPK' => 'Рейтинг PK',

        'server_about_1' => '<div class="about__content content">
                                 <h3 class="content__title">Основная информация:</h3>
                                 <ul class="list">
                                    <li>Версия: Interlude</li>
                                    <li>Направление: Craft PvP</li>
                                    <li>Назначение: основной сервер на проекте типа craft-PvP - без вайпов и с поддержанием онлайна за счет присоединения новых серверов</li>
                                    <li>Дата открытия: <span class="color-white">17 июля 2020 в 20:00 GTM+3</span></li>
                                    <li>Начало ОБТ: <span class="color-white">14 июля 2020 в 20:200 GTM+3</span></li>
                                    <li>Начало Великой Олимпиады: <span class="color-white">27 июля 18:00 GTM+3</span></li>
                                    <li>Первая выдача Геройства: <span class="color-white">3 августа 00:01 GTM+3</span></li>
                                    <li>EXP/SP - x50 | Adena - x25 | Drop x20 | Spoil x10 | Seal Stone x7 | Raid Bosses x5 | Epic Bosses x1</li>
                                 </ul>
                                 <h3 class="content__title">Игровой процесс и основные изменения:</h3>
                                 <ul class="list">
                                    <li>Автоматическое изучение навыков</li>
                                    <li>Автоматический подбор дропа (опционально)</li>
                                    <li>Внутриигровой Buffer с баффами 2 и 3 проф. на 1 час с возможностью сохранения профилей</li>
                                    <li>Увеличение лимита переносимого веса для всех классов - автоизучение Weight Limit Lv.1</li>
                                    <li>Команда для блокировки баффов от сторонник игроков - .blockbuff</li>
                                    <li>Команда для оффлайн торговли - .offline</li>
                                    <li>Mana Potion: восстанавливает 400 MP, откат 7 секунд - облегчает процесс развития персонажа, не вносит дисбаланс и не сводит игру к 1-ой клавише</li>
                                    <li>Дополнительный PvP-контент за счет добавления PvP-зоны в области респавна некоторых боссов с анонсом о их появлении за 10-15 минут</li>
                                    <li>Зоны входа и логова у Antharas, Valakas, Frintezza - является no-PK зонами (в них не действуют правила PvP зоны, но за убийства нефлагнутых игроков не начисляется счетчик PK)</li>
                                    <li>Внутриигровая торговая площадка, позволяющая продавать предметы в оффлайн режиме за альтернативные валюты</li>
                                    <li>Автоматические евенты: Team vs Team, Capture the Flag и Last Hero</li>
                                    <li>Вечерний респавн эпик боссов: Baium, Antharas и Valakas</li>
                                    <li>Упрощенное получение сабкласса и статуса дворянина</li>
                                 </ul>
                                 <h3 class="content__title">Заточка:</h3>
                                 <ul class="list">
                                    <li>Максимальная заточка на оружие +16, на броню и бижутерию +14</li>
                                    <li>Шансы заточить предмет согласно официальному серверу</li>
                                 </ul>
                                 <br>
                                 <a href="#" class="btn btn_type_def">
                                    <div class="btn__content">Подробное описание</div>
                                 </a>
                              </div>',

        'server_about_2' => '<div class="about__content content">
                                 <h3 class="content__title">Основная информация:</h3>
                                 <ul class="list">
                                    <li>Версия: Interlude</li>
                                    <li>Направление: классический PvP</li>
                                    <li>Дата открытия: <span class="color-white">date 20:00 GTM+3</span></li>
                                    <li>Начало ОБТ: <span class="color-white">date 20:00 GTM+3</span></li>
                                    <li>Начало Великой Олимпиады: <span class="color-white">date GTM+3</span></li>
                                    <li>Первая выдача Геройства: <span class="color-white">date GTM+3</span></li>
                                    <li>EXP/SP - x1200 | Adena - x300</li>
                                 </ul>
                                 <h3 class="content__title">Игровой процесс и основные изменения:</h3>
                                 <ul class="list">
                                    <li>Старт персонажа: 20 уровень, комплект экипировки D-Grade, 10.000.000 Adena, умение Noblesse Blesseng</li>
                                    <li>В зонах Ketra Orc Outpost, Varka Orc Outpost, Primeval Isle - рейт адены x1000</li>
                                    <li>Каст Flames of Invincibility (альянс уд) - 5 секунд</li>
                                    <li>Статический откат Flames of Invincibility (альянс уд) - 60 минут</li>
                                    <li>Многофункциональная Community Board (Alt +B) - в ней есть абсолютно весь необходиый функционал</li>
                                    <li>Удобный Buffer с возможностью сохранения профилей</li>
                                    <li>Автоматические эвенты: Team vs Team, Capture the Flag, Death Match, Last Hero, Group vs Group и Siege Event</li>
                                    <li>Система эпических фрагментов - доступная эпическая бижутерия для соло игроков</li>
                                 </ul>
                                 <h3 class="content__title">Заточка:</h3>
                                 <ul class="list">
                                    <li>Максимальная заточка на оружие <span class="color-white">+18</span>, на экипировку <span class="color-white">+16</span></li>
                                    <li>Шанс заточки на оружие до +10 — 75%%, затем 60%% с уменьшением</li>
                                    <li>Шанс заточки на экипировку до +9 – 75%%, затем 60%% с уменьшением</li>
                                    <li>При неудачной заточке - сбрасывается на +4</li>
                                 </ul>
                                 <h3 class="content__title">Дополнительный дроп с боссов 76+:</h3>
                                 <div class="itm">
                                    <img src="{{template}}/images/about/items/festival-adena.png" alt="" class="itm__img">
                                    <div class="itm__content">Fange Монета (50-100 шт.)</div>
                                 </div>
                                 <div class="itm">
                                    <img src="{{template}}/images/about/items/ls-top-grade.png" alt="" class="itm__img">
                                    <div class="itm__content">Top-Grade Life Stone (1-3 шт.)</div>
                                 </div>
                                 <div class="itm">
                                    <img src="{{template}}/images/about/items/giants-codex.png" alt="" class="itm__img">
                                    <div class="itm__content">Giant\'s Codex (1-3 шт.)</div>
                                 </div>
                                 <br>
                                 <a href="#" class="btn btn_type_def">
                                    <div class="btn__content">Подробное описание</div>
                                 </a>
                              </div>',
        'server_about_3' => '<div class="about__content content">
                                 <h3 class="content__title">Основная информация:</h3>
                                 <ul class="list">
                                    <li>Версия: Interlude</li>
                                    <li>Направление: Craft PvP</li>
                                    <li>Дата открытия: <span class="color-white">3 апреля 20:00 GTM+3</span></li>
                                    <li>Начало ОБТ: <span class="color-white">31 марта 20:00 GTM+3</span></li>
                                    <li>Начало Великой Олимпиады: <span class="color-white">6 апреля 18:00 GTM+3</span></li>
                                    <li>Первая выдача Геройства: <span class="color-white">13 апреля 00:01 GTM+3</span></li>
                                    <li>EXP/SP - x75 | Adena - x1 | Drop x20 | Spoil x25 | Seal Stone x5</li>
                                 </ul>
                                 <h3 class="content__title">Игровой процесс и основные изменения:</h3>
                                 <ul class="list">
                                    <li>Старт персонажа: 10 уровень в деревне Gludin, комплект экипировки N-Grade и необходимые расходные материалы для начальной прокачки</li>
                                    <li>Каст Flames of Invincibility (альянс уд) - 5 секунд</li>
                                    <li>Статический откат Flames of Invincibility (альянс уд) - 60 минут</li>
                                    <li>Многофункциональная Community Board (Alt +B) - в ней есть абсолютно весь необходиый функционал</li>
                                    <li>Удобный Buffer с возможностью сохранения профилей</li>
                                    <li>Автоматические эвенты: Team vs Team, Capture the Flag, Death Match, Last Hero, Group vs Group и Siege Event</li>
                                    <li>Рецепты ресурсов x100</li>
                                    <li>Увеличенный размер инвентаря до 250</li>
                                    <li>Запрет на навыки призыва в локации Hot Springs</li>
                                    <li>На сервере присутствуют мобы-чемпионы с увеличенным дропом</li>
                                 </ul>
                                 <h3 class="content__title">Заточка:</h3>
                                 <ul class="list">
                                    <li>Максимальная заточка на оружие +16, на броню и бижутерию +14</li>
                                    <li>Шансы заточить предмет согласно официальному серверу</li>
                                 </ul>
                                 <h3 class="content__title">Дополнительный дроп с боссов 76+:</h3>
                                 <div class="itm">
                                    <img src="{{template}}/images/about/items/ls-top-grade.png" alt="" class="itm__img">
                                    <div class="itm__content">Top-Grade Life Stone (1-2 шт.)</div>
                                 </div>
                                 <div class="itm">
                                    <img src="{{template}}/images/about/items/giants-codex.png" alt="" class="itm__img">
                                    <div class="itm__content">Giant\'s Codex (1-2 шт.)</div>
                                 </div>
                                 <br>
                                 <a href="#" class="btn btn_type_def">
                                    <div class="btn__content">Подробное описание</div>
                                 </a>
                              </div>',


    ],

    'en' => [
        'home'                    => 'home',
        'important_announcements' => 'IMPORTANT ANNOUNCEMENTS',
        'project_streamers'       => 'Project streamers',
        'last_news'               => 'Latest news',
        'messages_forum'          => 'Forum messages',
        'other news'              => 'Other news',
        'promotions_players'      => 'Promotions for players',
        'files'                   => 'Files',
        'registration'            => 'Registration',
        'about server'            => 'About server',
        'forum'                   => 'Forum',
        'donation'                => 'Donations',
        'help'                    => 'Help',
        'all_rights'              => 'Test servers. All rights reserved by NCSoft',
		'auth' 					  => 'Sing Up',
		'statistic_server'		  => 'Statistic Servers',
		'bayka' 				  => 'This server is a test version of the game and is intended for familiarization of players only. All rights reserved by NCSOFT.',
		'server_open' 			  => 'Server %s x%d opened successfully!',
		'start_game'			  => 'Start playing',
		'stream'			 	  => 'Stream stream',
		'client and registration' => 'Client and registration',
		'download server patch'   => 'DOWNLOAD SERVER PATCH',
		'faq troubleshooting'  	  => 'FAQ TROUBLESHOOTING',
		'recommend'				  => 'We recommend disabling Anti-Virus before installing all files. because client protection files may be detected as a virus.',
		'download_patch' 		  => 'Download patch',
		'download_client' 		  => 'Download client',
		'redirect_forum' 		  => 'Go to forum',

        'news' => 'News',
        'home_page' => 'Home page',
        'files_for_game' => 'For game',
        'desc_of_world' => 'Description of the worlds',
        'forum_talk' => 'Communication',
        'help_project' => 'Help the project',
        'go_to_lk' => 'Go to your personal account',
        'game_client' => 'GAME CLIENT 5.4 GB',
        'select_server' => 'SELECT SERVER',
        'selection' => 'Select',
        'files_for_...' => 'Files for',
        'download_and_install_game' => 'DOWNLOAD AND INSTALL Client',
        'download_clear_client' => 'Download a clear client',
        'source' => 'source',
        'download_patch_and_launcher' => 'DOWNLOAD a patch or updater',
        'download' => 'Download',
        'create_account' => 'Create an account',
        'desc_server' => 'Description server',
        'main_info' => 'Main information',
        'info_coming_soon' => 'Information coming soon...',
        'rating_players' => 'RANKING OF PLAYERS',
        'rating_clans' => 'Clan rating',
        'recent_topics_from_the_forum' => 'RECENT TOPICS FROM THE FORUM',
        'forum_topic' => 'Forum topic',
        'server_rating' => 'Server rating',
        'ratingPvP' => 'PvP rating',
        'ratingPK' => 'PK rating',


        'server_about_1' => '<div class="about_content content">
                                  <h3 class="content__title">Basic info:</h3>
                                  <ul class="list">
                                     <li>Version: Interlude</li>
                                     <li>Direction: Craft PvP</li>
                                     <li>Purpose: the main server on a project like craft-PvP - without wipes and keeping online by connecting new servers</li>
                                     <li>Opening date: <span class="color-white">July 17, 2020 at 20:00 GTM+3</span></li>
                                     <li>OBT start: <span class="color-white">July 14, 2020 at 20:200 GTM+3</span></li>
                                     <li>Start of the Great Olympiad: <span class="color-white">27 July 18:00 GTM+3</span></li>
                                     <li>First giveaway of Heroism: <span class="color-white">August 3 00:01 GTM+3</span></li>
                                     <li>EXP/SP - x50 | Adena - x25 | Drop x20 | Spoil x10 | Seal Stone x7 | Raid Bosses x5 | Epic Bosses x1</li>
                                  </ul>
                                  <h3 class="content__title">Gameplay and major changes:</h3>
                                  <ul class="list">
                                     <li>Automatic skill learning</li>
                                     <li>Automatic drop selection (optional)</li>
                                     <li>In-game Buffer with buffs 2 and 3 prof. for 1 hour with the ability to save profiles</li>
                                     <li>Increased carry weight limit for all classes - Autolearn Weight Limit Lv.1</li>
                                     <li>The command to block buffs from supporter players is .blockbuff</li>
                                     <li>Command for offline trading - .offline</li>
                                     <li>Mana Potion: restores 400 MP, cooldown 7 seconds - facilitates the process of character development, does not introduce imbalance and does not reduce the game to the 1st key</li>
                                     <li>Additional PvP content by adding a PvP zone in the spawn area of some bosses with an announcement of their appearance in 10-15 minutes</li>
                                     <li>Entrance and lair zones near Antharas, Valakas, Frintezza are no-PK zones (they do not have PvP zone rules, but killing unflagged players does not give a PK counter)</li>
                                     <li>An in-game marketplace that allows you to sell items offline for alternative currencies</li>
                                     <li>Automatic events: Team vs Team, Capture the Flag and Last Hero</li>
                                     <li>Evening spawn epic bosses: Baium, Antharas and Valakas</li>
                                     <li>Simplified obtaining subclass and noble status</li>
                                  </ul>
                                  <h3 class="content__title">Sharpening:</h3>
                                  <ul class="list">
                                     <li>Maximum enchant for weapons +16, for armor and jewelry +14</li>
                                     <li>Chance to enchant an item according to the official server</li>
                                  </ul>
                                  <br>
                                  <a href="#" class="btn btn_type_def">
                                     <div class="btn__content">Details</div>
                                  </a>
                               </div>',

        'server_about_2' => '<div class="about_content content">
                                  <h3 class="content__title">Basic info:</h3>
                                  <ul class="list">
                                     <li>Version: Interlude</li>
                                     <li>Direction: Classic PvP</li>
                                     <li>Opening date: <span class="color-white">date 20:00 GTM+3</span></li>
                                     <li>OBT start: <span class="color-white">date 20:00 GTM+3</span></li>
                                     <li>Start of the Great Olympiad: <span class="color-white">date GTM+3</span></li>
                                     <li>First issue of Heroism: <span class="color-white">date GTM+3</span></li>
                                     <li>EXP/SP - x1200 | Adena-x300</li>
                                  </ul>
                                  <h3 class="content__title">Gameplay and major changes:</h3>
                                  <ul class="list">
                                     <li>Character start: level 20, D-Grade equipment set, 10.000.000 Adena, Noblesse Blesseng skill</li>
                                     <li>In Ketra Orc Outpost, Varka Orc Outpost, Primeval Isle - adena rate x1000</li>
                                     <li>Cast Flames of Invincibility (alliance oud) - 5 seconds</li>
                                     <li>Flames of Invincibility static cooldown (alliance oud) - 60 minutes</li>
                                     <li>Multifunctional Community Board (Alt +B) - it has absolutely all the necessary functionality</li>
                                     <li>Convenient Buffer with the ability to save profiles</li>
                                     <li>Automatic events: Team vs Team, Capture the Flag, Death Match, Last Hero, Group vs Group and Siege Event</li>
                                     <li>Epic Fragment System - affordable epic jewelry for solo players</li>
                                  </ul>
                                  <h3 class="content__title">Sharpening:</h3>
                                  <ul class="list">
                                     <li>Maximum enchant for weapons <span class="color-white">+18</span>, for equipment <span class="color-white">+16</span></li>
                                     <li>Chance to enchant weapons to +10 - 75%%, then 60%% with decrease</li>
                                     <li>Chance to enchant gear up to +9 - 75%%, then 60%% with decrease</li>
                                     <li>If enchant fails, reset to +4</li>
                                  </ul>
                                  <h3 class="content__title">Additional drop from 76+ bosses:</h3>
                                  <div class="itm">
                                     <img src="{{template}}/images/about/items/festival-adena.png" alt="" class="itm__img">
                                     <div class="itm__content">Fange Coin (50-100 pcs)</div>
                                  </div>
                                  <div class="itm">
                                     <img src="{{template}}/images/about/items/ls-top-grade.png" alt="" class="itm__img">
                                     <div class="itm__content">Top-Grade Life Stone (1-3 pieces)</div>
                                  </div>
                                  <div class="itm">
                                     <img src="{{template}}/images/about/items/giants-codex.png" alt="" class="itm__img">
                                     <div class="itm__content">Giant\'s Codex (1-3 pieces)</div>
                                  </div>
                                  <br>
                                  <a href="#" class="btn btn_type_def">
                                     <div class="btn__content">Details</div>
                                  </a>
                               </div>',

        'server_about_3' => '<div class="about_content content">
                                  <h3 class="content__title">Basic info:</h3>
                                  <ul class="list">
                                     <li>Version: Interlude</li>
                                     <li>Direction: Craft PvP</li>
                                     <li>Opening date: <span class="color-white">April 3 20:00 GTM+3</span></li>
                                     <li>OBT start: <span class="color-white">March 31 20:00 GTM+3</span></li>
                                     <li>The beginning of the Great Olympiad: <span class="color-white">April 6, 18:00 GTM+3</span></li>
                                     <li>First giveaway of Heroism: <span class="color-white">April 13 00:01 GTM+3</span></li>
                                     <li>EXP/SP - x75 | Adena - x1 | Drop x20 | Spoil x25 | Seal Stone x5</li>
                                  </ul>
                                  <h3 class="content__title">Gameplay and major changes:</h3>
                                  <ul class="list">
                                     <li>Character start: level 10 in Gludin village, N-Grade equipment set and necessary consumables for initial leveling</li>
                                     <li>Cast Flames of Invincibility (alliance oud) - 5 seconds</li>
                                     <li>Flames of Invincibility static cooldown (alliance oud) - 60 minutes</li>
                                     <li>Multifunctional Community Board (Alt +B) - it has absolutely all the necessary functionality</li>
                                     <li>Convenient Buffer with the ability to save profiles</li>
                                     <li>Automatic events: Team vs Team, Capture the Flag, Death Match, Last Hero, Group vs Group and Siege Event</li>
                                     <li>Resource recipes x100</li>
                                     <li>Increased inventory size to 250</li>
                                     <li>Summon skill ban in Hot Springs</li>
                                     <li>There are champion mobs with increased drops on the server</li>
                                  </ul>
                                  <h3 class="content__title">Sharpening:</h3>
                                  <ul class="list">
                                     <li>Maximum enchant for weapons +16, for armor and jewelry +14</li>
                                     <li>Chance to enchant an item according to the official server</li>
                                  </ul>
                                  <h3 class="content__title">Additional drop from 76+ bosses:</h3>
                                  <div class="itm">
                                     <img src="{{template}}/images/about/items/ls-top-grade.png" alt="" class="itm__img">
                                     <div class="itm__content">Top-Grade Life Stone (1-2 pieces)</div>
                                  </div>
                                  <div class="itm">
                                     <img src="{{template}}/images/about/items/giants-codex.png" alt="" class="itm__img">
                                     <div class="itm__content">Giant\'s Codex (1-2 pieces)</div>
                                  </div>
                                  <br>
                                  <a href="#" class="btn btn_type_def">
                                     <div class="btn__content">Details</div>
                                  </a>
                               </div>',


    ],




];

