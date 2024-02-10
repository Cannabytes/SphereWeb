let phrase = {
    "ru": {
        "registration_account": "Регистрация аккаунта",
        "description": "Описание",
        "forum": "Форум",
        "launcher": "Лаунчер",
        "setting": "Настройки",
        "way_to_game": "Пути к игре",
        "updates": "Обновления",
        "download_launcher": "Скачать Launcher",
        "about_launcher": "О программе",
        "start_update": "Начать обновление",
        "logs": "Лог",
        "apply": "Применить",
        "need_select_client_dir": "Выберите папку клиента для",
        "setting_launcher": "Настройки лаунчера",
        "files": "Файлы",
        "autoload": "Автозагрузка",
        "autoload_desc": "Лаунчер не нужно будет запускать, он не потербляет память. После старта Windows, лаунчер будет загружен в память, и срабатывать только при обращении к нему.",
        "autoupdate_launcher": "Автообновление",
        "autoupdate_launcher_desc": "Лаунчер будет периодически проверять обновление, и обновляться если вышла новая версия.",
        "autooff_launcher_desc": "Автоматически выключение лаунчера в режиме простоя.",
        "is_save_loading_file": "Сохранять загруженные файлы",
        "is_save_loading_file_desc": "Если \"Да\", лаунчер будет сохранять файлы патчей, для того чтоб не загружать их в будущем в случае если когда-то ранее Вы его уже загружали.\nДанная опция может сократить время загрузки.",
        "close": "Закрыть",
        "setting_way_to_game": "Настройка путей",
        "update": "Обновление",
        "launcher_description":"Sphere-Launcher - это программа для обновления и загрузки файлов игры.<br>\n" +
            "Лаунчер использует передовые технологии, для обеспечения максимальной скорости и удобства использования.<br>\n" +
            "<br>",
        "ok":"OK",
        "your_need_launcher":"У Вас нет лаунчера?",
        "need_start_launcher":"Необходимо запустить лаунчер!",
        "start_game": "Запуск игры",
        "no_download": "Нет загрузки",
        "loading_is_complete": "Загрузка завершена",
        "download_canceled": "Загрузка отменена",
        "error": "Ошибка",
        "cancel_update": "Отменить обновление",
        "connect": "Подключение",
        "not_dir": "Тут больше нету папок.<br>Нажмите на кнопку <Сохранить> и мы сюда будем загружать клиент!",
        "file_upload": "Загрузка файлов",
        "file_comparison": "Сравнение файлов",
        "stream": "Потоки",
        "countStream": "Количество потоков",
        "countStream_description": "Укажите кол-во загружаемых одновременно файлов",
        "launcher_is_started": "Лаунчер был запущен",
        "auto exit": "Автовыключение",

        "notify_message": "%s",
        "its_already_loading": "Уже идет загрузка",
        "server_does_not_have_permission": "Сервер не имеет разрешения на использование лаунчера",
        "no_update_required": "Обновление не требуется",
        "need_update" : "Необходимо обновление.",
        "click_to_update" : "Нажмите для обновления.",
        "start_of_update": "Начало обновления",
        "counting_files_for_update": "Подсчет необходимых файлов для обновления",
        "update_required_for_files": "Необходимо обновить %d файлов",
        "forced_download_stopped": "Загрузка принудительно остановлена",
        "update_successful": "Обновление успешно завершено",
        "update_error": "Ошибка обновления: При попытке скачать файл %s был получен StatusCode %d",
        "file_download_error": "Произошла ошибка загрузки файла",
        "game_launched": "Игра была запущена",
        "folder_not_exists": "Папка %s не существует",
        "error_checking_folder": "Ошибка при проверке папки %s: %s",
        "game_and_client_files_different": "Файлы игры и файлы клиента - разные. Необходимо обновиться.",
        "empty_command_received": "Вы прислали пустую команду",
        "json_request_read_error": "Ошибка чтения json запроса",
        "turn_off": "Выключить",
        "open_website": "Открыть сайт",
        "update_interrupted": "Обновление было прервано",
        "unpacking_file_failed": "Не удалось распаковать файл: %s",
        "you_do_not_have_permissions_to_perform_this_action": "У вас нет прав на выполнение действий",
        "directory_does_not_exist": "Директория не существует: %s",
        "error_checking_directory": "Ошибка при проверке директории: %s",
        "token_api_error": "Ошибка TokenAPI",
        "find_server": "Выбираю оптимальный сервер загрузки",
        "auto_off_program_time" : "Отключение через",
        "min": "мин.",
        "hour": "ч.",
        "not_off_launcher": "Не отключать",
        "5 min": "5 мин.",
        "10 min": "10 мин.",
        "30 min": "30 мин.",
        "1 h": "1 ч.",
        "3 h": "3 ч.",
        "the_program_shuts_down_due_to_inactivity" : "Программа выключается из-за отсутствия активности.",
        "launcher_tab_description_1": "О загрузчике Sphere-Launcher",
        "launcher_description_1" : "Sphere Launcher - это программа для загрузки файлов игры, запуска. С большим набором\n" +
            "                            функционала.<br>\n" +
            "                            Главные задачи при разработки лаунчера были:\n" +
            "                            <ol>\n" +
            "                                <li>Максимальная скорость работы, выжать из ПК максимальную скорость загрузки,\n" +
            "                                    обработки.\n" +
            "                                </li>\n" +
            "                                <li>Отказ от повторных загрузок файлов, если пользователь их загружал. Так как 87%\n" +
            "                                    файлов в патчах, это файлы-дубликаты, которые раньше или постоянно игрок загружает.\n" +
            "                                </li>\n" +
            "                                <li>Создание универсального лаунчера, который можно использовать игроком для всех\n" +
            "                                    серверов.\n" +
            "                                </li>\n" +
            "                                <li>Поддержка автологина в игру (для патчей, которые это подддерживают).</li>\n" +
            "                                <li>Кастоматизация и простое изменение интерфейса, достаточно знать базово HTML / CSS.\n" +
            "                                </li>\n" +
            "                            </ol>\n" +
            "                            Думаю в большей мере я справился с задачей, огромное сложности были преодолены и продолжаю\n" +
            "                            улучшать, расширять возможности и решать выявленные ошибки. По этому лаунчер имеет функцию автообновления.",
        "launcher_tab_description_2" : "Как добавить свой лаунчер",
        "launcher_description_2" : "Для того чтоб сделать патч, необходимо выполнить следующие действия.<br>\n" +
            "                            <ol>\n" +
            "                                <li><a href=\"/admin/launcher/create/patch\">Сгенерировать патч</a>.</li>\n" +
            "                                <li>Залить архивы себе на сайт / сервер.</li>\n" +
            "                                <li>Разработчику лаунчера передать ссылки на файл с архивом и патч листом.</li>\n" +
            "                                <li>Получить от разработчика <strong>tokenApi</strong>.</li>\n" +
            "                                <li><a href=\"/admin/launcher/add\">Добавить информацию о Вашем лаунчере</a>.</li>\n" +
            "                            </ol>",
        "launcher_tab_description_3" : "Сколько можно создавать лаунчеров?",
        "launcher_description_3" : " Вы можете создавать неограниченное кол-во лаунчеров под свой сервер.",

        "launcher_tab_description_4" : "Что такое токен и зачем он нужен?",
        "launcher_description_4" : "Токен это публичный ключ, одна из систем безопасности.<br>Каждый токен, имеет струю привязку к патчу Вашему серверу.",

        "launcher_tab_description_5" : "Что будет если другой сервер будет использовать мой токен?",
        "launcher_description_5" : "Если кто-то решит использовать Ваш токен для своего лаунчера, тогда игроки сервера-воришки скачают Ваш патч и зайдут на Ваш сервер.",

        "launcher_tab_description_6" : "Как работает лаунчер?",
        "launcher_description_6" : "Лаунчер работает через веб-браузер, это есть Ваш интерфейс лаунчера.<br>\n" +
            "                                Посетителю на странице лаунчера, будет предложено скачать или запустить лаунчер.<br>\n" +
            "                                Если игрок ранее загружал уже лаунчер, вне зависимости с какого источника (всегда\n" +
            "                                загружается с основного репозитория), тогда он сможет просто запустить лаунчер из\n" +
            "                                браузера. Игроку нет необходимости искать ярлык лаунчера или загружать повторно.<br>\n" +
            "                                После запуска лаунчера, пользователь сможет воспользоваться всем функционалом",
        "project" : "Проект",
        "default" : "По умолчанию",
        "link" : "Ссылка",
        "note" : "Заметка",
        "to go" : "Перейти",
        "change" : "Изменить",
        "remove" : "Удалить",
        "create patch" : "Создать патч",
        "add new launcher": "Добавить новый лаунчер",

        "data launcher": "Лаунчера данные",
        "server" : "Сервер",
        "name" : "Название",
        "autoload_info" : "Показывать аккаунты для автозагрузки?",
        "autoload_info_desc" : "Настройка актуальная только если игровой клиент поддерживает функцию автовхода в игру (без авторизации).",
        "yes" : "Да",
        "no" : "Нет",
        "launcher_note" : "Заметка о лаунчере",
        "launcher_note_desc" : "Для чего хотите использовать этот лаунчер? - Это напоминание только для Вас.",
        "tokenApi_desc" : "Ключ необходим для безопастности. Его можно получить после генерации патча.",
        "button_start_game" : "Кнопка запуска игры",
        "button_img" : "Изображение кнопки",
        "button_name_ru" : "Название кнопки запуска на русском",
        "button_name_en" : "Название кнопки запуска на английском",
        "save" : "Сохранить",

        "status" : "Статус",
        "files uploaded" : "Загружено файлов",
        "total files" : "Всего файлов",
        "download speed" : "Скорость загрузки",
        "loading time" : "Время загрузки",

        "StatusWait" : "Ожидание действий",
        "StatusScroll" : "Загрузка списка",
        "StatusComparison" : "Сравнение файлов",
        "StatusDownload" : "Загрузка файлов",
        "StatusCompleted" : "Завершена загрузка",
        "StatusStopped" : "Загрузка остановлена",
        "StatusError" : "Произошла ошибка",

        "process_update": "Идет обновление. Ожидайте.",
        "no_update_needed" : "Обновление не требуется.",
        "launcher version" : "Последняя версия лаунчера",
        "launcher last version" : "Последняя версия лаунчера",


    },
    "en": {
        "registration_account": "Registration account",
        "description": "Description",
        "forum": "Forum",
        "launcher": "Launcher",
        "setting": "Settings",
        "way_to_game": "Paths to game",
        "updates": "Updates",
        "download_launcher": "Download Launcher",
        "about_launcher": "About",
        "start_update": "Start Update",
        "logs": "Log",
        "apply": "Apply",
        "need_select_client_dir": "Select client folder for",
        "setting_launcher": "Launcher settings",
        "files": "Files",
        "autoload": "Autoload",
        "autoload_desc": "The launcher won't need to be started, it won't consume memory. After Windows starts, the launcher will be loaded into memory, and will only fire when accessed.",
        "autoupdate_launcher": "Autoupdate",
        "autoupdate_launcher_desc": "Launcher will periodically check for updates, and update if a new version is available.",
        "autooff_launcher_desc": "Automatically shutdown the launcher in idle mode.",
        "is_save_loading_file": "Save downloaded files",
        "is_save_loading_file_desc": "If \"Yes\", the launcher will save patch files in order not to download them in the future if you have already downloaded it before.\nThis option may reduce the loading time.",
        "close": "Close",
        "setting_way_to_game": "Setting Ways",
        "update": "Update",
        "launcher_description":"Sphere-Launcher is a program to update and download game files.<br>\n" +
            "Launcher uses cutting-edge technology to ensure maximum speed and ease of use.<br>\n" +
            "<br>",
        "ok":"OK",
        "your_need_launcher": "Don't have a launcher?",
        "need_start_launcher": "Need to start the launcher!",
        "start_game": "Start game",
        "no_download": "No download",
        "loading_is_complete": "Loading Complete",
        "download_canceled": "Download cancelled",
        "error": "Error",
        "cancel_update": "Cancel update",
        "connect": "Connect",
        "not_dir": "There are no more folders here.<br>Click on the <Save> button and we will load the client here!",
        "file_upload": "File Upload",
        "file_comparison": "File comparison",
        "stream": "Streams",
        "countStream": "Number of streams",
        "countStream_description": "Specify the number of files to download simultaneously",
        "launcher_is_started": "Launcher has been successfully launched",
        "auto exit": "Automatic shutdown",

        "notify_message": "%s",
        "its_already_loading": "Loading is already in progress",
        "server_does_not_have_permission": "The server is not authorized to use the launcher",
        "no_update_required": "No update is needed",
        "need_update": "Update Required.",
        "click_to_update": "Click to Update.",
        "start_of_update": "Start of Update",
        "counting_files_for_update": "Counting the required update files",
        "update_required_for_files": "You need to update %d files",
        "forced_download_stopped": "Forced download stopped",
        "update_successful": "Update completed successfully",
        "update_error": "Update error: StatusCode %d received when attempting to download file %s",
        "file_download_error": "An error occurred during file download",
        "game_launched": "The game has been launched",
        "folder_not_exists": "Folder %s does not exist",
        "error_checking_folder": "Error checking folder %s: %s",
        "game_and_client_files_different": "Game files and client files are different. An update is required.",
        "empty_command_received": "You sent an empty command",
        "json_request_read_error": "Error reading JSON request",
        "turn_off": "Turn off",
        "open_website": "Open site",
        "update_interrupted": "The update was interrupted",
        "unpacking_file_failed": "Failed to unpack file: %s",
        "you_do_not_have_permissions_to_perform_this_action": "You do not have permission to perform actions",
        "directory_does_not_exist": "Directory does not exist: %s",
        "error_checking_directory": "Error checking directory: %s",
        "token_api_error": "TokenAPI error",
        "find_server    ": "Determining the Best Download Server",
        "auto_off_program_time" : "Disabled time",
        "min": "min.",
        "hour": "h.",
        "not_off_launcher": "Do not turn off",
        "5 min": "5 min.",
        "10 min": "10 min.",
        "30 min": "30 min.",
        "1 h": "1 h.",
        "3 h": "3 h.",
        "the_program_shuts_down_due_to_inactivity" : "Sphere-Launcher отключается из-за отсутствия активности.",
        "launcher_tab_description_1": "About the Sphere Launcher",
        "launcher_description_1": "<p>Sphere Launcher is a program for downloading and launching game files with a wide range of functionality.<br>\nThe main goals in developing the launcher were:\n<ol>\n<li>Maximum speed of operation, extracting the maximum download and processing speed from the PC.</li>\n<li>Avoiding redundant file downloads if the user has already downloaded them, as 87% of files in patches are duplicate files that players have downloaded before or continuously.</li>\n<li>Creating a universal launcher that can be used by players for all servers.</li>\n<li>Support for auto-login in the game (for patches that support it).</li>\n<li>Customization and easy interface modification, requiring basic knowledge of HTML / CSS.</li>\n</ol>\nI believe I have largely succeeded in the task; significant challenges have been overcome, and I continue to improve, expand capabilities, and address identified issues. Therefore, the launcher has an auto-update feature.</p>",
        "launcher_tab_description_2": "How to Add Your Launcher",
        "launcher_description_2": "<p>To create a patch, follow these steps:<br>\n<ol>\n<li><a href=\"/admin/launcher/create/patch\">Generate a patch</a>.</li>\n<li>Upload the archives to your website/server.</li>\n<li>Provide the launcher developer with links to the archive file and the patch list.</li>\n<li>Get the <strong>tokenApi</strong> from the developer.</li>\n<li><a href=\"/admin/launcher/add\">Add information about your launcher</a>.</li>\n</ol></p>",
        "launcher_tab_description_3": "How Many Launchers Can You Create?",
        "launcher_description_3": "<p>You can create an unlimited number of launchers for your server.</p>",
        "launcher_tab_description_4": "What is a Token and Why is it Needed?",
        "launcher_description_4": "<p>A token is a public key, one of the security systems. Each token is tied to the patch for your server.</p>",
        "launcher_tab_description_5": "What Happens If Another Server Uses My Token?",
        "launcher_description_5": "<p>If someone decides to use your token for their launcher, then players of the thief server will download your patch and connect to your server.</p>",
        "launcher_tab_description_6": "How Does the Launcher Work?",
        "launcher_description_6": "<p>The launcher operates through a web browser, serving as your launcher's interface.<br>\nVisitors to the launcher page will be prompted to download or run the launcher.<br>\nIf a player has previously downloaded the launcher from any source (always downloaded from the main repository), they can simply run the launcher from the browser. There is no need for the player to search for the launcher shortcut or download it again.<br>\nAfter launching the launcher, the user can use all the functionality.</p>",

        "project": "Project",
        "default" : "Default",
        "link" : "Link",
        "note" : "Note",
        "to go" : "To Go",
        "change" : "Change",
        "remove" : "Delete",
        "create patch" : "Create patch",
        "add new launcher": "Add new launcher",
        "data launcher": "Launcher data",
        "server" : "Server",
        "name": "Name",
        "autoload_info": "Show accounts for autoload?",
        "autoload_info_desc": "This setting is relevant only if the game client supports the auto-login feature (without authorization).",
        "yes": "Yes",
        "no": "No",
        "launcher_note": "Launcher Note",
        "launcher_note_desc": "What do you want to use this launcher for? - This reminder is only for you.",
        "tokenApi_desc": "The key is necessary for security. You can obtain it after generating the patch.",
        "button_start_game": "Start Game Button",
        "button_img": "Button Image",
        "button_name_ru": "Button Name in Russian",
        "button_name_en": "Button Name in English",
        "save": "Save",

        "status": "Status",
        "files uploaded": "Files Uploaded",
        "total files": "Total Files",
        "download speed": "Download Speed",
        "loading time": "Loading Time",

        "StatusWait": "Waiting for Actions",
        "StatusScroll": "Loading List",
        "StatusComparison": "Comparing Files",
        "StatusDownload": "Downloading Files",
        "StatusCompleted": "Download Completed",
        "StatusStopped": "Download Stopped",
        "StatusError": "An Error Occurred",

        "process_update": "Updating in progress. Please wait.",
        "no_update_needed" : "No update is needed.",
        "launcher version" : "Your launcher version",
        "launcher last version" : "The latest version of the launcher",

},

};

function sprintf(format) {
    let args = Array.prototype.slice.call(arguments, 1);
    return format.replace(/%[sd]/g, function(match) {
        if (args.length === 0) return match;
        return args.shift();
    });
}

function getPhrase(fphrase, ...param) {
    lang = userLang
    if (phrase && phrase[lang] && phrase[lang][fphrase]) {
        return sprintf(phrase[lang][fphrase], ...param);
    } else {
        return `No Phrase <${fphrase}>`;
    }
}

function loadWorld() {
    let elementsWithDataPhrase = $('[data-phrase]');
    elementsWithDataPhrase.each(function (index) {
        let phraseName = $(this).data("phrase");
        let translatedPhrase = getPhrase(phraseName);
        $(this).html(translatedPhrase);
    });
}

loadWorld()
