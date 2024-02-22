<?php

namespace Ofey\Logan22\template;

use DateTime;
use DateTimeZone;
use Exception;
use InvalidArgumentException;
use Ofey\Logan22\component\account\generation;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\alert\logs;
use Ofey\Logan22\component\base\base;
use Ofey\Logan22\component\captcha\google;
use Ofey\Logan22\component\chronicle\client;
use Ofey\Logan22\component\chronicle\race_class;
use Ofey\Logan22\component\config\config;
use Ofey\Logan22\component\estate\castle;
use Ofey\Logan22\component\estate\clanhall;
use Ofey\Logan22\component\estate\fort;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\component\image\client_icon;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\links\action;
use Ofey\Logan22\component\time\microtime;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\component\time\timezone;
use Ofey\Logan22\model\admin\launcher;
use Ofey\Logan22\model\forum\forum;
use Ofey\Logan22\model\forum\internal;
use Ofey\Logan22\model\gallery\screenshot;
use Ofey\Logan22\model\notification\notification;
use Ofey\Logan22\model\page\page;
use Ofey\Logan22\model\server\online;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\statistic\statistic as statistic_model;
use Ofey\Logan22\model\template\async;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\character;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\model\user\profile\other;
use Ofey\Logan22\route\Route;
use ReflectionMethod;
use RuntimeException;
use Throwable;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;
use Twig\TwigFunction;

class tpl {

    private static array $allTplVars = [];
    private static string $templatePath;
    private static ?bool $isAjax = null;
    private static bool $ajaxLoad = false;
    private static bool $categoryCabinet = false;
    private static bool|array $get_buffs_registry = false;
    private static ?bool $isPluginCustom = null;
    private static array $pluginNames = [];

    /**
     * @param        $var
     * @param string $value
     *
     * @return void
     * Добавление переменной к выводу шаблона
     */
    public static function addVar($var, mixed $value = 'None') {
        if (is_array($var)) {
            self::$allTplVars = array_merge(self::$allTplVars, $var);
        } else {
            self::$allTplVars[$var] = $value;
        }
    }

    private static function pluginLoadSetting($pl_dir){
        $plugins = fileSys::dir_list($pl_dir);
        foreach ($plugins as $key => $value) {
            if (!file_exists(fileSys::dir_list("{$pl_dir}/$value/settings.php"))) {
                unset($plugins[$key]);
            }
        }
        foreach ($plugins as $key => $value) {
            $setting = include fileSys::dir_list("{$pl_dir}/$value/settings.php");
            if (isset($setting['PLUGIN_HIDE'])) {
                if ($setting['PLUGIN_HIDE']) {
                    unset($plugins[$key]);
                    continue;
                }
            }
            if (!isset($setting['INCLUDES'])) {
                unset($plugins[$key]);
                continue;
            }
            return $setting;
        }
        return false;
    }

    private static $pluginsAllCustomAndComponents = [];
    public static function pluginsAll(){
        if(empty(self::$pluginsAllCustomAndComponents)){
            $pluginsAllCustom= self::processPluginsDir("custom/plugins/");
            $pluginsAllComponents = self::processPluginsDir("src/component/plugins/");
            self::$pluginsAllCustomAndComponents = array_merge($pluginsAllCustom, $pluginsAllComponents);
        }
        return self::$pluginsAllCustomAndComponents;
    }

    private static function processPluginsDir($dir, $isCustom = false): array {
        $pluginsAll = [];
        $pluginsDir = fileSys::dir_list($dir);
        foreach ($pluginsDir as $key => $value) {
            if (in_array($value, self::$pluginNames)) {
                continue;
            }
            $settingsPath = fileSys::get_dir("$dir/$value/settings.php");
            if (!file_exists($settingsPath)) {
                unset($pluginsDir[$key]);
                continue;
            }
            $setting = include $settingsPath;
            if (isset($setting['PLUGIN_HIDE']) && $setting['PLUGIN_HIDE']) {
                unset($pluginsDir[$key]);
                continue;
            }
            if($isCustom){
                $setting['isCustom'] = true;
            }else{
                $setting['isCustom'] = false;
            }
            self::$pluginNames[] = $value;
            $pluginsAll[$key] = $setting;
        }
        return $pluginsAll;
    }

    public static function template_design_route(): ?array {
        $fileRoute = $_SERVER['DOCUMENT_ROOT'] . "/template/" . config::get_template() . "/route.php";
        if (file_exists($fileRoute)) {
            require_once $fileRoute;
            if (isset($pages)) {
                return $pages;
            }
        }
        return null;
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError|Throwable
     *
     * $contents массив, где первый параметр название переменной, а второй название блока
     */
    public static function getHTML(async $anyn) {
        $twig = self::preload($anyn->get_fileTpl());
        $template = $twig->load($anyn->get_fileTpl());
        foreach ($anyn->blocks as &$a) {
            $a['html'] = $template->renderBlock($a['html'], self::$allTplVars);
        }
        board::alert($anyn->getArray());
    }

    private static function preload(string $tplName): Environment {
        self::$ajaxLoad = false;
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            self::$ajaxLoad = true;
        }

        $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname($_SERVER["SCRIPT_FILENAME"]));

        self::$templatePath =  "/src/template/logan22";
        if (self::$categoryCabinet) {
            self::$templatePath = "/template/" . config::get_template();
            self::lang_template_load(fileSys::get_dir(self::$templatePath . "/lang.php"));
        }
        $loader = new FilesystemLoader([
            fileSys::get_dir(self::$templatePath),
        ]);

        if (is_dir(fileSys::get_dir("/custom/plugins"))) {
            $loader->addPath(fileSys::get_dir("/custom/plugins"));
        }
        if (is_dir(fileSys::get_dir("/src/component/plugins"))) {
            $loader->addPath(fileSys::get_dir("/src/component/plugins"));
        }

        $arrTwigConfig = [];
        if (ENABLE_CACHE_TEMPLATE) {
            $arrTwigConfig['cache'] = fileSys::get_dir("/uploads/cache/template");
        }
        $arrTwigConfig['auto_reload'] = AUTO_RELOAD;
        $arrTwigConfig['debug'] = DEBUG_TEMPLATE;

        /** Дополнительные переменные */
        $arrTwigConfig['IS_DEFAULT_PUBLIC_TICKET'] = IS_DEFAULT_PUBLIC_TICKET;

        $twig = new Environment($loader, $arrTwigConfig);

        $twig->addExtension(new DebugExtension());
        $twig = self::generalfunc($twig);
        $twig = self::user_var_func($twig);

        //Ищем в плагинах все дополнительные функции, которые дополняют шаблоны
        $all_plugins_dir = fileSys::get_dir_files(fileSys::get_dir("/src/component/plugins"), [
            'fetchAll' => true,
        ]);
        $twigCustomFile = "custom_twig.php";
        foreach ($all_plugins_dir as $pluginDir) {
            $filePath = $pluginDir . '/' . $twigCustomFile;
            if (is_readable($filePath)) {
                require_once $filePath;
                $fileContent = file_get_contents($filePath);
                if (preg_match('/\bnamespace\s+([^\s;]+)/', $fileContent, $matches)) {
                    $namespace = $matches[1];
                    $className = pathinfo($filePath, PATHINFO_FILENAME);
                    $className = $namespace . "\\" .$className;
                    if (class_exists($className)) {
                        $customTwig = new $className();
                        $methods = get_class_methods($customTwig);
                        foreach ($methods as $method) {
                            if (is_callable([$customTwig, $method]) && (new ReflectionMethod($customTwig, $method))->isPublic()) {
                                $twig->addFunction(new \Twig\TwigFunction($method, [$customTwig, $method]));
                            }
                        }
                    }
                }
            }
        }

        $all_plugins_dir = fileSys::get_dir_files(fileSys::get_dir("/custom/plugins"), [
            'fetchAll' => true,
        ]);
        $twigCustomFile = "custom_twig.php";
        foreach ($all_plugins_dir as $pluginDir) {
            $filePath = $pluginDir . '/' . $twigCustomFile;
            if (is_readable($filePath)) {
                require_once $filePath;
                $fileContent = file_get_contents($filePath);
                if (preg_match('/\bnamespace\s+([^\s;]+)/', $fileContent, $matches)) {
                    $namespace = $matches[1];
                    $className = pathinfo($filePath, PATHINFO_FILENAME);
                    $className = $namespace . "\\" .$className;
                    if (class_exists($className)) {
                        $customTwig = new $className();
                        $methods = get_class_methods($customTwig);
                        foreach ($methods as $method) {
                            if (is_callable([$customTwig, $method]) && (new ReflectionMethod($customTwig, $method))->isPublic()) {
                                $twig->addFunction(new \Twig\TwigFunction($method, [$customTwig, $method]));
                            }
                        }
                    }
                }
            }
        }


        self::$allTplVars['dir'] = fileSys::localdir();
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'? 'https' : 'http';
        if($_SERVER["SERVER_PORT"] == 443)
            $protocol = 'https';
        elseif (isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1')))
            $protocol = 'https';
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on')
            $protocol = 'https';

        $self = $protocol . "://" . $_SERVER["SERVER_NAME"] . $relativePath . self::$templatePath;

        self::$allTplVars['protocol'] = $protocol;
        self::$allTplVars['path'] = $relativePath;
        self::$allTplVars['template'] = $self;
        self::$allTplVars['pointTime'] = microtime::pointTime();
        self::$allTplVars['LOGO_PROJECT'] = LOGO_PROJECT;
        return $twig;
    }

    /**
     * Загрузка языкового пакета шаблона
     */
    public static function lang_template_load($tpl) {
        if (!is_dir(dirname($tpl))) {
            return;
        }
        if (!file_exists($tpl)) {
            return;
        }
        lang::load_template_lang_packet($tpl);
    }

    private static $pluginsLoad = null;

    private static function generalfunc(Environment $twig = null): Environment {
        $twig->addFilter(new TwigFilter('html_entity_decode', 'html_entity_decode'));
        $twig->addFilter(new TwigFilter('file_exists', function ($filePath) {
            return file_exists($filePath);
        }));
        $twig->addFilter(new TwigFilter('donate_remove_show_bug', function ($text) {
            return str_replace(["<Soul Crystal Enhancement>"], ["-=Soul Crystal Enhancement=-"], $text);
        }));


        $twig->addFunction(new TwigFunction('template', function ($var = null) {
            return str_replace(["//",
                "\\",
            ], "/", fileSys::localdir(self::$templatePath . $var));
        }));

        $twig->registerUndefinedFunctionCallback(function ($name) {
            if (function_exists($name)) {
                return new TwigFunction($name, function () use ($name) {
                    return call_user_func_array($name, func_get_args());
                });
            }
            throw new RuntimeException(sprintf('Function %s not found', $name));
        });

        $twig->addFunction(new TwigFunction('class_group_color', function ($access_level = "user") {
            switch ($access_level) {
                case "admin":
                    return "danger";
                case "moderator":
                    return "success";
                default:
                    return "info";
            }
        }));

        $twig->addFunction(new TwigFunction('get_plugins_include', function ($includeName) {
            if(empty(self::$pluginsAllCustomAndComponents)){
                $pluginsAllCustom = self::processPluginsDir("custom/plugins/");
                $pluginsAllComponents = self::processPluginsDir("src/component/plugins/");
                self::$pluginsAllCustomAndComponents = array_merge($pluginsAllCustom, $pluginsAllComponents);
            }
            $templates = [];
            foreach (self::$pluginsAllCustomAndComponents as $key => $plugin) {
                if (isset($plugin['INCLUDES'])) {
                    if(isset($plugin['PLUGIN_ENABLE'])){
                        if(!$plugin['PLUGIN_ENABLE']){
                            continue;
                        }
                    }
                    foreach ($plugin['INCLUDES'] as $name => $file) {
                        if ($name == $includeName) {
                           $templates[] = $file;
                        }
                    }
                }
            }
           return $templates;
        }));

        $twig->addFunction(new TwigFunction('path', function ($link = "/") {
            $link = sprintf("%s/%s", fileSys::getSubDir(), $link);
            return str_replace(['//', '\\'], '/', $link);
        }));

        $twig->addFunction(new TwigFunction('cache_timeout', function ($var = null) {
            return time::cache_timeout($var);
        }));

        $twig->addFunction(new TwigFunction('isAjaxRequest', function () {
            if (self::$isAjax === null) {
                self::$isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
            }
            return self::$isAjax;
        }));

        $twig->addFunction(new TwigFunction('get_captcha_version', function ($name = null) {
            if ($name == null) {
                return config::get_captcha_version();
            }
            return strcasecmp(config::get_captcha_version(), $name) == 0;
        }));

        $twig->addFunction(new TwigFunction('prefix_info', function () {
            return require fileSys::get_dir("src/config/prefix_suffix.php");
        }));

        $twig->addFunction(new TwigFunction('google_secret_key', function () {
            return google::get_client_key();
        }));

        $twig->addFunction(new TwigFunction('get_account_players', function ($isPlayersData = false) {
            return character::get_account_players($isPlayersData);
        }));


        $twig->addFunction(new TwigFunction('get_statistic_online_week', function ($server_id = 0) {
            return statistic_model::get_online_last_week($server_id = 0);
        }));

        $twig->addFunction(new TwigFunction('get_statistic_online_month', function ($server_id = 0) {
            return statistic_model::get_statistic_online_month($server_id = 0);
        }));

        //TODO: Проверить, так как появились уже функции statistic_get_pvp
        $twig->addFunction(new TwigFunction('get_pvp', function ($count = 10, $server_id = 0) {
            return array_slice(statistic_model::get_pvp($server_id), 0, $count);
        }));

        $twig->addFunction(new TwigFunction('get_pk', function ($count = 10, $server_id = 0) {
            return array_slice(statistic_model::get_pk($server_id), 0, $count);
        }));

        $twig->addFunction(new TwigFunction('alias', function ($alias) {
            return Route::get_alias($alias);
        }));

        //Список языков
        $twig->addFunction(new TwigFunction('lang_list', function ($remove_lang = null) {
            return lang::lang_list($remove_lang);
        }));

        //Вывести язык который сейчас включен
        $twig->addFunction(new TwigFunction('lang_active', function ($isActive = true) {
            $langs = lang::lang_list();
            if($isActive){
                foreach ($langs AS $lang){
                    if ($lang['isActive']){
                        return $lang;
                    }
                }
                return false;
            }else{
                foreach ($langs as $key => $lang) {
                    if ($lang['isActive']) {
                        unset($langs[$key]);
                    }
                }
            }
            return $langs;
        }));


        //Возвращает полный список содержимого языкового пакета
        $twig->addFunction(new TwigFunction('title_start_page', function () {
            $lang = lang::lang_user_default();
            return TITLE[$lang] ?? "[Not Set Title]";
        }));

        $twig->addFunction(new TwigFunction('description_start_page', function () {
            $lang = lang::lang_user_default();
            return DESCRIPTION[$lang] ?? "[Not Set Description]";
        }));

        $twig->addFunction(new TwigFunction('keywords_start_page', function () {
            return KEYWORDS;
        }));


        //Возвращает полный список содержимого языкового пакета
        $twig->addFunction(new TwigFunction('show_all_lang_package', function () {
            return lang::show_all_lang_package();
        }));

        //Обрезаем слово до N значения, если оно больше, то добавляем в конец троеточие
        $twig->addFunction(new TwigFunction('truncateWord', function ($word, $length = 16) {
            if (mb_strlen($word, 'utf-8') <= $length) {
                return $word;
            } else {
                return mb_substr($word, 0, $length, 'utf-8') . '...';
            }
        }));

        $twig->addFunction(new TwigFunction("MODE_TEMPLATE", function (){
            return MODE_TEMPLATE;
        }));

        $twig->addFunction(new TwigFunction('user_info', function ($type) {
            if (method_exists(auth::class, $type)) {
                return auth::$type();
            } else {
                throw new InvalidArgumentException(sprintf('Method "%s" does not exist in auth class.', $type));
            }
        }));

        $twig->addFunction(new TwigFunction('get_user_info', function ($user_id) {
            return auth::get_user_info($user_id);
        }));


        //Показать слово
        $twig->addFunction(new TwigFunction('get_phrase', function ($key, ...$values) {
            return lang::get_phrase($key, ...$values);
        }));

        //Аналог get_phrase
        $twig->addFunction(new TwigFunction('phrase', function ($phraseKey, ...$values) {
            return lang::get_phrase($phraseKey, ...$values);
        }));

        //{{ config("getEnableTicket") }}
        $twig->addFunction(new TwigFunction('config', function ($funcName) {
            return config::$funcName();
        }));

        $twig->addFunction(new TwigFunction('get_template', function () {
            return config::get_template();
        }));

        $twig->addFunction(new TwigFunction('format_number_fr', function ($num, $separator = ".") {
            echo number_format($num, 0, ',', $separator);
        }));


        $twig->addFunction(new TwigFunction('ProhloVremya', function ($mysqlTimeFormat) {
            return statistic_model::timeHasPassed(time() - strtotime($mysqlTimeFormat));
        }));

        //Время (в секундах) в часы. минуты, сек.
        $twig->addFunction(new TwigFunction('timeHasPassed', function ($num, $onlyHour = false) {
            return statistic_model::timeHasPassed($num, $onlyHour);
        }));

        $twig->addFunction(new TwigFunction('formatSeconds', function ($secs = 0) {
            if (!is_numeric($secs)) {
                return 'Некорректное значение';
            }

            $lang = lang::lang_user_default() == "ru" ? 0 : 1;
            $times_values = [
                ['сек.', 'sec.'],
                ['мин.', 'min.'],
                ['час.', 'h.'],
                ['д.', 'd.'],
                ['мес.', 'm.'],
                ['лет', 'y.'],
            ];
            $divisors = [1, 60, 3600, 86400, 2592000, 31104000];
            for ($pow = count($divisors) - 1; $pow >= 0; $pow--) {
                if ($secs >= $divisors[$pow]) {
                    $time = $secs / $divisors[$pow];
                    return round($time) . ' ' . $times_values[$pow][$lang];
                }
            }
            return round($secs) . ' ' . $times_values[0][$lang];
        }));

        $twig->addFunction(new TwigFunction('get_class', function ($class_id) {
            return race_class::get_class($class_id);
        }));
        $twig->addFunction(new TwigFunction('get_class_race', function ($class_id) {
            return race_class::get_class_race($class_id);
        }));
        $twig->addFunction(new TwigFunction('key', function ($class_id) {
            echo key($class_id);
        }));
        $twig->addFunction(new TwigFunction('file_exists', function ($file) {
            return file_exists($file);
        }));

        //Обрезаем число до 10 символов (на некоторых сборках в микротайме хранится время) и выводим в формате времени
        $twig->addFunction(new TwigFunction('unitToDate', function ($var) {
            return date("H:i d.m.Y", (int)substr($var, 0, 10));
        }));

        $twig->addFunction(new TwigFunction('sex', function ($v) {
            return $v == 0 ? 'male' : 'female';
        }));
        $twig->addFunction(new TwigFunction('MobileDetect', function () {
            if (!isset($_SERVER["HTTP_USER_AGENT"])) {
                return false;
            }
            return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
                , $_SERVER["HTTP_USER_AGENT"]);
        }));


        $twig->addFunction(new TwigFunction('get_youtube_id', function ($link) {
            $video_id = explode("?v=", $link);
            if (!isset($video_id[1])) {
                $video_id = explode("youtu.be/", $link);
            }
            if (empty($video_id[1])) {
                $video_id = explode("/v/", $link);
            }
            $video_id = explode("&", $video_id[1]);
            $youtubeVideoID = $video_id[0];
            if ($youtubeVideoID) {
                return $youtubeVideoID;
            }
            return null;
        }));

        //Сервер по умолчанию
        $twig->addFunction(new TwigFunction("get_server_default", function () {
            return server::get_server_info(auth::get_default_server());
        }));
        //Сокращенный аналог get_server_default()
        $twig->addFunction(new TwigFunction('get_server', function ($server_id = null) {
            return server::get_server_info(auth::get_default_server());
        }));

        //Кол-во серверов
        $twig->addFunction(new TwigFunction("get_count_servers", function () {
            return server::get_count_servers();
        }));

        //Информация о серверах или сервере
        $twig->addFunction(new TwigFunction('get_server_info', function ($server_id = null) {
            return server::get_server_info($server_id);
        }));

        $twig->addFunction(new TwigFunction('get_launcher_info', function ($server_id = null) {
            return launcher::get_launcher_info($server_id);
        }));

        $twig->addFunction(new TwigFunction('get_user_in_list', function ($user_id) {
            return other::get_user_in_list($user_id);
        }));

        $twig->addFunction(new TwigFunction('lang_user_default', function () {
            return lang::lang_user_default();
        }));

        $twig->addFunction(new TwigFunction('strip_html_tags', function ($text) {
            return strip_tags($text);
        }));



        //Удаление сообщения тегов форума из текста
        $twig->addFunction(new TwigFunction('forum_message_clear_tag', function ($message) {
            $pattern = '/\[(.*?)\]/s';
            return preg_replace($pattern, '', $message);
        }));

        $twig->addFunction(new TwigFunction('last_forum_message', function ($last_message = 10) {
            return forum::get_last_message($last_message);
        }));

        $twig->addFunction(new TwigFunction('last_forum_thread', function ($last_thread = 10) {
            return forum::get_last_thread($last_thread);
        }));

        $twig->addFunction(new TwigFunction('get_forum_link', function ($thread) {
            return forum::get_link($thread);
        }));

        $twig->addFunction(new TwigFunction('forum_enable', function () {
            return forum::forum_enable();
        }));

        $twig->addFunction(new TwigFunction('show_image_sphere_coin', function () {
            return config::show_image_sphere_coin();
        }));

        $twig->addFunction(new TwigFunction('get_avatar' , function ($img = "none.jpeg", $thumb = false){
            if($thumb){
                if (mb_substr($img, 0, 5) == "user_") {
                    $img = "thumb_" . $img;
                }
            }
            return fileSys::localdir(sprintf("/uploads/avatar/%s", $img));
        }));

        $twig->addFunction(new TwigFunction('get_skill', function ($img = "none.jpeg") {
            return fileSys::localdir(sprintf("/uploads/images/skills/%s", $img));
        }));

        $twig->addFunction(new TwigFunction('get_icon', function ($img = "none.jpeg") {
            return fileSys::localdir(sprintf("/uploads/images/icon/%s", $img));
        }));

        $twig->addFunction(new TwigFunction('get_item_info', function ($item_id) {
            return client_icon::get_item_info($item_id, false, false);
        }));

        $twig->addFunction(new TwigFunction('get_forum_img', function ($img = "none.jpeg", $thumb = false) {
            if ($thumb) {
                if (mb_substr($img, 0, 5) == "user_") {
                    $img = "thumb_" . $img;
                }
            }
            return fileSys::localdir(sprintf("/uploads/images/forum/%s", $img));
        }));

        $twig->addFunction(new TwigFunction('get_ticket_img' , function ($img = "none.jpeg", $thumb = false){
            if($thumb){
                $img = "thumb_" . $img;
            }
            return fileSys::localdir(sprintf("/uploads/tickets/%s", $img));
        }));

        $twig->addFunction(new TwigFunction('get_server_data', function ($key, $server_id = null) {
            if ($server_id === null) {
                $server_id = auth::get_default_server();
            }
            $data = server::get_server_info($server_id);

            $keys = array_column($data['data'], 'key');
            $index = array_search($key, $keys, true);

            if ($index !== false) {
                return $data['data'][$index]['val'];
            }

            return null;
        }));


        $twig->addFunction(new TwigFunction('forum_user_avatar', function ($user_id = 0) {
            return forum::user_avatar($user_id);
        }));

        $twig->addFunction(new TwigFunction("forum_internal", function () {
            return internal::forum();
        }));

        $twig->addFunction(new TwigFunction('get_enable_game_chat', function () {
            return server::get_server_info(auth::get_default_server())['chat_game_enabled'] ?? false;
        }));

        $twig->addFunction(new TwigFunction('get_screen_enable', function () {
            return config::get_screen_enable();
        }));

        $twig->addFunction(new TwigFunction('grade_img', function ($crystal_type): string {
            $grade_img = '';
            $dirGrade = fileSys::localdir("/uploads/images/grade");
            switch ($crystal_type) {
                case 'd':
                    $grade_img = "<img src='{$dirGrade}/d.png' style='width:20px'>";
                    break;
                case 'c':
                    $grade_img = "<img src='{$dirGrade}/c.png' style='width:20px'>";
                    break;
                case 'b':
                    $grade_img = "<img src='{$dirGrade}/b.png' style='width:20px'>";
                    break;
                case 'a':
                    $grade_img = "<img src='{$dirGrade}/a.png' style='width:20px'>";
                    break;
                case 's':
                    $grade_img = "<img src='{$dirGrade}/s.png' style='width:20px'>";
                    break;
                case 'r':
                    $grade_img = "<img src='{$dirGrade}/r.png' style='width:20px'>";
                    break;
                case 'r95':
                    $grade_img = "<img src='{$dirGrade}/r95.png' style='width:35px'>";
                    break;
                case 'r99':
                    $grade_img = "<img src='{$dirGrade}/r99.png' style='width:35px'>";
                    break;
                case 'r110':
                    $grade_img = "<img src='{$dirGrade}/r110.png' style='width:40px'>";
                    break;
            }
            return $grade_img;
        }));

        //Сгенерировать рандомный аккаунт
        $twig->addFunction(new TwigFunction('generation_account', function () {
            return generation::word();
        }));

        //Последние скриншоты
        $twig->addFunction(new TwigFunction('screenshots', function ($limit = 8) {
            return screenshot::load($limit);
        }));

        //Список аккаунтов пользователя
        $twig->addFunction(new TwigFunction('show_all_account_player', function () {
            return player_account::show_all_account_player();
        }));


        $twig->addFunction(new TwigFunction('is_screenshot', function ($file = null) {
            if (file_exists('uploads/screenshots/' . $file)) {
                return fileSys::get_dir('/uploads/screenshots/' . $file);
            } else {
                return fileSys::get_dir("/src/template/logan22/assets/images/not-found.png");
            }
        }));

        /**
         * Вывод статиститки сервера
         */
        $twig->addFunction(new TwigFunction('statistic_top_counter', function ($server_id = 0) {
            return statistic_model::top_counter($server_id);
        }));

        $twig->addFunction(new TwigFunction('statistic_get_pvp', function ($server_id = 0, $limit = 0): ?array {
            if ($server_id < 0 || $limit < 0) throw new InvalidArgumentException('Server ID and limit must be non-negative integers');
            $pvpStats = statistic_model::get_pvp($server_id);
            return $pvpStats ? ($limit > 0 ? array_slice($pvpStats, 0, $limit) : $pvpStats) : null;
        }));

        $twig->addFunction(new TwigFunction('statistic_get_pk', function ($server_id = 0, $limit = 0): ?array {
            if ($server_id < 0 || $limit < 0) throw new InvalidArgumentException('Server ID and limit must be non-negative integers');
            $pkStats = statistic_model::get_pk($server_id);
            return $pkStats ? ($limit <= 0 ? $pkStats : array_slice($pkStats, 0, $limit)) : null;
        }));

        $twig->addFunction(new TwigFunction('statistic_players_online_time', function ($server_id = 0) {
            return statistic_model::get_players_online_time($server_id);
        }));

        $twig->addFunction(new TwigFunction('statistic_get_clans', function ($server_id = 0, $limit = 0) {
            if ($server_id < 0 || $limit < 0) throw new InvalidArgumentException('Server ID and limit must be non-negative integers');
            $clanStats = statistic_model::get_clan($server_id);
            return $clanStats ? ($limit >= 1 ? array_slice($clanStats, 0, $limit) : $clanStats) : null;
        }));

        $twig->addFunction(new TwigFunction('statistic_get_castle', function ($server_id = 0) {
            return statistic_model::get_castle($server_id);
        }));

        $twig->addFunction(new TwigFunction('statistic_get_players_heroes', function ($server_id = 0) {
            return statistic_model::get_players_heroes($server_id);
        }));

        $twig->addFunction(new TwigFunction('statistic_get_players_block', function ($server_id = 0) {
            return statistic_model::get_players_block($server_id);
        }));

        $twig->addFunction(new TwigFunction('clan_icon', function ($data) {
            $crest = "";
            if(isset($data['alliance_crest'])){
                $crest_base64 = $data['alliance_crest'];
                if($data['alliance_crest']!=null){
                    $crest = "<img src='data:image/jpeg;base64,{$crest_base64}'>";
                }
            }
            if(isset($data['clan_crest'])){
                $crest_base64 = $data['clan_crest'];
                if($data['clan_crest']!=null){
                    $crest .= "<img src='data:image/jpeg;base64,{$crest_base64}'>";
                }
            }
            return $crest;
        }));

        //Список последних новостей
        $twig->addFunction(new TwigFunction('last_news', function ($last_thread = 10) {
            return page::show_news_short(300, $last_thread, false);
        }));

        $twig->addFunction(new TwigFunction('get_page', function ($id) {
            return page::get_news($id);
        }));

        $twig->addFunction(new TwigFunction('news_poster', function ($image, $full = false) {
            $uploadsPath = "uploads/images/news/";
            if(!$full){
                $image = "thumb_" . $image;
            }
            $imagePath = $uploadsPath . $image;
            $fullImagePath = fileSys::localdir($imagePath);
            if (!file_exists(fileSys::getSubDir() . $fullImagePath)) {
                return fileSys::localdir("/src/template/logan22/assets/images/logo_news_d.jpg");
            }
            return "/" . $fullImagePath;
        }));


        $twig->addFunction(new TwigFunction('phrase_array', function ($arr) {
            $userLang = lang::lang_user_default();
            foreach($arr AS $lang => $phrase){
                if($userLang == $lang){
                    return $phrase;
                }
            }
            return "[no phrase to lang: {$userLang}]";
        }));

        $twig->addFunction(new TwigFunction('server_online_status', function () {
            return array_reverse(online::server_online_status());
        }));

        $twig->addFunction(new TwigFunction('get_default_page', function ($str, $server_id) {
            $pId = server::get_default_desc_page_id($server_id);
            return $pId;
        }));

        $twig->addFunction(new TwigFunction('http_referer', function () {
            return $_SERVER['HTTP_REFERER'] ?? null;
        }));

        //Возвращает сумму чисел в массиве по конкретному полю
        $twig->addFunction(new TwigFunction('array_field_sum', function (array $array, string $field) {
            return array_reduce($array, function ($sum, $players) use ($field) {
                return $sum + ($players[$field] ?? 0);
            }, 0);
        }));

        $twig->addFunction(new TwigFunction('get_clanhall', function ($id) {
            return clanhall::get($id);
        }));

        $twig->addFunction(new TwigFunction('get_fort', function ($id) {
            return fort::get($id);
        }));

        $twig->addFunction(new TwigFunction('get_castle', function ($id) {
            return castle::get($id);
        }));

        $twig->addFunction(new TwigFunction('icon', function ($fileIcon = null) {
            return client_icon::icon($fileIcon);
        }));


        //Есть ли бонус для персонажа за привлеченного пользователя
        $twig->addFunction(new TwigFunction('is_referral_bonus', function ($referrals) {
            foreach ($referrals as $account) {
                if ($account['done'] || !isset($account['characters'])) {
                    continue;
                }
                foreach ($account['characters'] as $character) {
                    if ($character['level'] < LEVEL || $character['pvp'] < PVP || $character['pk'] < PK || $character['time_in_game'] < GAME_TIME) {
                        continue;
                    }

                    return $character['player_name'];
                }
            }
            return false;
        }));

        //Кол-во завершенных и не завершенных рефералов
        $twig->addFunction(new TwigFunction('referral_count', function ($referrals) {
            if (!is_array($referrals)) {
                throw new InvalidArgumentException('Argument must be an array.');
            }

            function isReferralDone($referral) {
                return isset($referral['done']) && $referral['done'];
            }

            $completedCount = array_reduce($referrals, function ($count, $referral) {
                if (isReferralDone($referral)) {
                    $count++;
                }
                return $count;
            }, 0);

            $totalCount = count($referrals);
            if ($totalCount === 0) {
                return ['completed' => 0,
                    'continues' => 0,
                    'made' => 0,
                ];
            }

            return ['completed' => $completedCount,
                'continues' => $totalCount - $completedCount,
                'made' => $completedCount / $totalCount * 100,
            ];
        }));

        //bool прошло ли больше N времени
        $twig->addFunction(new TwigFunction("testOfTime", function ($mysqlTime) {
            if (time() - strtotime($mysqlTime) > 3600 * 3) {
                return false;
            }
            return true;
        }));

        //Проверка на наличие возможности просматривать чужим своего персонажа
        $twig->addFunction(new TwigFunction("is_forbidden", function ($charnames) {
            return character::is_forbidden($charnames);
        }));

        $twig->addFunction(new TwigFunction("timezone_list", function () {
            return timezone::all();
        }));

        $twig->addFunction(new TwigFunction("timezone", function ($time = null) {
            if ($time === null) {
                return 'Не указано время';
            }
            $timezone = auth::get_timezone();

            $date = new DateTime($time);
            $date->setTimezone(new DateTimeZone($timezone));
            return $date->format('Y-m-d H:i:s');
        }));

        $twig->addFunction(new TwigFunction('referral_link', function () {
            $scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] ? 'https://' : 'http://';
            $name = auth::get_name() ?: auth::get_id();
            return $scheme . $_SERVER['HTTP_HOST'] . fileSys::localdir() . "/registration/user/ref/" . mb_strtolower($name);
        }));

        $twig->addFunction(new TwigFunction('currency_exchange_info', function () {
            return json_encode(require fileSys::get_dir('src/config/donate.php'));
        }));

        $twig->addFunction(new TwigFunction('get_buffs_registry', function () {
            if (self::$get_buffs_registry === false) {
                self::$get_buffs_registry = include fileSys::get_dir("src/config/forum/buff.php");
            }
            return self::$get_buffs_registry;
        }));

        $twig->addFunction(new TwigFunction('random_skill_buff_registry', function () {
            if (self::$get_buffs_registry === false) {
                self::$get_buffs_registry = include fileSys::get_dir("src/config/forum/buff.php");
            }
            $buffs = self::$get_buffs_registry['buff'];
            return $buffs[array_rand($buffs)];
        }));

        $twig->addFunction(new TwigFunction('action', function ($name, array $params = []) {
            if (!empty($params)) {
                return action::get($name, ...$params);
            } else {
                return action::get($name);
            }
        }));



        $twig->addFunction(new TwigFunction('get_collection', function ($chronicle_name) {
            $protocols = client::get_protocol($chronicle_name);
            if (!$protocols)
                return 'false';
            $all_class_base_data = base::all_class_base_data();
            $collection = [];
            foreach ($all_class_base_data as $class) {
                $chronicle_protocols = ($class)::chronicle();
                $diff = array_intersect($protocols, $chronicle_protocols);
                if ($diff) {
                    $collection[basename_php($class)] = $class;
                }
            }
            return $collection;
        }));

        $twig->addFunction(new TwigFunction("get_self_notification", function ($bool = 0) {
            return notification::get_self_notification($bool);
        }));

        //Список плагинов, которые показываем в меню пользователю
        $twig->addFunction(new TwigFunction("show_plugins", function () {
            return self::pluginsAll();
        }));


        $twig->addFunction(new TwigFunction("get_plugin_config", function ($plugin_name, $config = "config.php") {
            $plugin_type = Route::get_plugin_type($plugin_name);
            if($plugin_type == "component"){
                $pluginsPath = "src/component/plugins";
            }elseif ("custom"){
                $pluginsPath = "custom/plugins";
            }
            $pluginPath = "{$pluginsPath}/{$plugin_name}/{$config}";
            $plugins = fileSys::dir_list($pluginsPath);
            if (in_array($plugin_name, $plugins)) {
                $configFile = fileSys::localdir($pluginPath);
                if (file_exists($configFile)) {
                    return require $configFile;
                }
            }
            return false;
        }));

        function basename_php($str) {
            $base = substr($str, strrpos($str, '\\') + 1);
            if (strrpos($base, "\\") !== false) {
                $base = substr($base, 0, strrpos($base, "\\"));
            }
            return $base;
        }

        return $twig;
    }

    public static function displayDemo(string $template) {
        self::$categoryCabinet = true;
        if (file_exists(fileSys::localdir("template/" . config::get_template() . "/object.php"))) {
            $additionalVars = require fileSys::localdir("template/" . config::get_template() . "/object.php");
            if (is_array($additionalVars)) {
                self::$allTplVars = array_merge(self::$allTplVars, $additionalVars);
            }
        }
        self::display($template);
    }


    public static function displayPlugin($tplName){
        $pluginDirName = basename(dirname(dirname($tplName)));
        $plugin_type = Route::get_plugin_type($pluginDirName);
        if($plugin_type == "component"){
            self::addVar("template_plugin", fileSys::localdir("/src/component/plugins/{$pluginDirName}"));
        }elseif ("custom"){
            self::addVar("template_plugin", fileSys::localdir("/custom/plugins/{$pluginDirName}"));
        }
        $twig = self::preload($tplName);
        if (self::$ajaxLoad) {
            $template = $twig->load($tplName);
            $html = $template->renderBlock("content", self::$allTplVars);
            $title = $template->renderBlock("title");
            board::html($html, $title);
        } else {
            $template = $twig->load($tplName);
            echo $template->render(self::$allTplVars);
        }
    }

    public static function display($tplName) {
        $twig = self::preload($tplName);
        try {
            // Если загрузка идет через аякс, то возвращаем только контент, используется при переходе по ссылкам
            if (self::$ajaxLoad) {
                $template = $twig->load($tplName);
                if ($template->hasBlock("content")) {
                    $html = $template->renderBlock("content", self::$allTplVars);
                    $title = $template->hasBlock("title") ? $template->renderBlock("title") : null;
                    board::html($html, $title);
                } else {
                    // Обработка отсутствия блока "content"
                    // Можно добавить действия по умолчанию или обработку ошибки здесь
                    // Например: board::html("Default content", "Default title");
                }
            } else {
                $template = $twig->load($tplName);
                echo $template->render(self::$allTplVars);
            }
        } catch (Exception $e) {
            $txt = "<h4>TEMPLATE ERROR</h4>";
            $txt .= "Message: " . $e->getMessage() . "<br>";
            $txt .= "File: " . $e->getFile() . "<br>";
            $txt .= "Line: " . $e->getLine() . "<br>";
            $txt .= "Code: ";
            $file = fopen($e->getFile(), "r");
            if ($file) {
                for ($i = 1; $i < $e->getLine(); ++$i) {
                    if (fgets($file) === false) {
                        break;
                    }
                }
                $line = fgets($file);
                fclose($file);
                $txt .= htmlspecialchars($line);
            }
            echo $txt;
            logs::loggerError(preg_replace('/<h4[^>]*>|<\/h4>|<br[^>]*>/', "\n", $txt));
        }
        exit();
    }


    private static function user_var_func(Environment $twig = null): Environment {
        $twig->addFunction(new TwigFunction('get_user_variables', function ($varName) {
            return auth::get_user_variables($varName);
        }));

        return $twig;
    }


}
