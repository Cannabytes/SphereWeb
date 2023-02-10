<?php

namespace Ofey\Logan22\template;

use ArgumentCountError;
use Ofey\Logan22\component\account\generation;
use Ofey\Logan22\component\chronicle\race_class;
use Ofey\Logan22\component\estate\castle;
use Ofey\Logan22\component\estate\clanhall;
use Ofey\Logan22\component\estate\fort;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\time\microtime;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\config\config;
use Ofey\Logan22\model\forum\forum;
use Ofey\Logan22\model\gallery\screenshot;
use Ofey\Logan22\model\page\page;
use Ofey\Logan22\model\server\online;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\statistic\statistic;
use Ofey\Logan22\model\statistic\statistic as statistic_model;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\model\user\profile\other;
use Ofey\Logan22\route\Route;
use RuntimeException;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;
use Twig\TwigFunction;

class tpl {

    //
    static private array $allTplVars = [];

    //
    public static function addVar($var, $value = '') {
        if(is_array($var)) {
            foreach($var as $key => $row) {
                self::$allTplVars[$key] = $row;
            }
        } else {
            self::$allTplVars[$var] = $value;
        }
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public static function display($tplName, $categoryCabinet = false) {
        $__ROOT__ = $_SERVER['DOCUMENT_ROOT'];
        $categoryDesign = "cabinet";
        if($categoryCabinet) {
            $categoryDesign = "designs/" . config::get_template();
            self::lang_template_load($__ROOT__ . "/template/{$categoryDesign}/lang.php");
        }
        if(!file_exists($__ROOT__ . "/template/$categoryDesign/$tplName")) {
            echo "Не найден шаблон: " . $__ROOT__ . "/template/$categoryDesign/$tplName";
            die();
        }
        $loader = new FilesystemLoader($__ROOT__ . "/template/$categoryDesign");
        $twig = new Environment($loader, [
            'cache'       => $__ROOT__ . "/uploads/cache",
            'auto_reload' => true,
            'debug'       => true,
        ]);
        $twig->addExtension(new DebugExtension());

        $twig->addFilter(new TwigFilter('html_entity_decode', 'html_entity_decode'));

        $twig->addFilter(new TwigFilter('template', function($string) use ($categoryDesign) {
            return str_replace([
                "//",
                "\\",
            ], "/", "/template/{$categoryDesign}/{$string}");
        }));

        $twig->registerUndefinedFunctionCallback(function($name) {
            if(function_exists($name)) {
                return new TwigFunction($name, function() use ($name) {
                    return call_user_func_array($name, func_get_args());
                });
            }
            throw new RuntimeException(sprintf('Function %s not found', $name));
        });

        $twig->addFunction(new TwigFunction('cache_timeout', function($var = null) {
            return time::cache_timeout($var);
        }));

        //TODO: Проверить, так как появились уже функции statistic_get_pvp
        $twig->addFunction(new TwigFunction('get_pvp', function($count = 10, $server_id = 0) {
            return array_slice(statistic::get_pvp($server_id), 0, $count);
        }));

        $twig->addFunction(new TwigFunction('get_pk', function($count = 10, $server_id = 0) {
            return array_slice(statistic::get_pk($server_id), 0, $count);
        }));

        $twig->addFunction(new TwigFunction('alias', function($alias) {
            return Route::get_alias($alias);
        }));

        //Список языков
        $twig->addFunction(new TwigFunction('lang_list', function($remove_lang = null) {
            return lang::lang_list($remove_lang);
        }));

        //TODO: Наверное лучшее все эти функции сделать отдельно
        // и функцию общего возрата {{ user_info().get_id() }} типо такого пробовать
        $twig->addFunction(new TwigFunction('user_info', function($type) {
            switch($type) {
                case 'get_default_server':
                    return auth::get_default_server();
                case 'get_id':
                    return auth::get_id();
                case 'get_is_auth':
                    return auth::get_is_auth();
                case 'get_email':
                    return auth::get_email();
                case 'get_password':
                    return auth::get_password();
                case 'get_name':
                    return auth::get_name();
                case 'get_ip_registration':
                    return auth::get_ip_registration();
                case 'get_ip':
                    return auth::get_ip();
                case 'get_date_create':
                    return auth::get_date_create();
                case 'get_date_update':
                    return auth::get_date_update();
                case 'get_access_level':
                    return auth::get_access_level();
                case 'get_signature':
                    return auth::get_signature();
                case 'get_donate_point':
                    return auth::get_donate_point();
                case 'get_avatar':
                    return auth::get_avatar();
                case 'get_avatar_background':
                    return auth::get_avatar_background();
            }
        }));

        //Показать слово
        $twig->addFunction(new TwigFunction('get_phrase', function($key, ...$values) {
            return lang::get_phrase($key, ...$values);
        }));
        //Аналог get_phrase
        $twig->addFunction(new TwigFunction('phrase', function($key, ...$values) {
            try {
                return lang::get_phrase($key, ...$values);
            } catch(ArgumentCountError $e) {
                return "[lang code: ($key) - " . $e->getMessage() . "]";
            }
        }));

        $twig->addFunction(new TwigFunction('get_template', function() {
            return config::get_template();
        }));

        $twig->addFunction(new TwigFunction('format_number_fr', function($num) {
            echo number_format($num, 0, ',', ' ');
        }));

        //Время (в секундах) в часы. минуты, сек.
        $twig->addFunction(new TwigFunction('timeHasPassed', function($num) {
            return statistic::timeHasPassed($num);
        }));
        $twig->addFunction(new TwigFunction('get_class', function($class_id) {
            return race_class::get_class($class_id);
        }));
        $twig->addFunction(new TwigFunction('get_class_race', function($class_id) {
            echo race_class::get_class_race($class_id);
        }));
        $twig->addFunction(new TwigFunction('key', function($class_id) {
            echo key($class_id);
        }));
        $twig->addFunction(new TwigFunction('file_exists', function($file) {
            return file_exists($file);
        }));

        //Обрезаем число до 10 символов (на некоторых сборках в микротайме хранится время) и выводим в формате времени
        $twig->addFunction(new TwigFunction('unitToDate', function($var) {
            $date = mb_strimwidth($var, 0, 10);
            return date("H:i d.m.Y", (int)$date);
        }));

        $twig->addFunction(new TwigFunction('sex', function($v) {
            if($v == 0) {
                return 'male';
            }
            return 'female';
        }));

        $twig->addFunction(new TwigFunction('get_youtube_id', function($link) {
            $video_id = explode("?v=", $link);
            if(!isset($video_id[1])) {
                $video_id = explode("youtu.be/", $link);
            }
            if(empty($video_id[1]))
                $video_id = explode("/v/", $link);
            $video_id = explode("&", $video_id[1]);
            $youtubeVideoID = $video_id[0];
            if($youtubeVideoID) {
                return $youtubeVideoID;
            } else {
                return false;
            }
        }));

        //Сервер по умолчанию
        $twig->addFunction(new TwigFunction("get_server_default", function() {
            return server::get_server_info(auth::get_default_server());
        }));

        //Информация о серверах или сервере
        $twig->addFunction(new TwigFunction('get_server_info', function($server_id = null) {
            return server::get_server_info($server_id);
        }));

        $twig->addFunction(new TwigFunction('get_user_in_list', function($user_id) {
            return other::get_user_in_list($user_id);
        }));

        $twig->addFunction(new TwigFunction('lang_user_default', function() {
            return lang::lang_user_default();
        }));

        $twig->addFunction(new TwigFunction('last_forum_message', function($last_message = 10) {
            return forum::get_last_message($last_message);
        }));

        $twig->addFunction(new TwigFunction('last_forum_thread', function($last_thread = 10) {
            return forum::get_last_thread($last_thread);
        }));

        $twig->addFunction(new TwigFunction('get_forum_link', function($thread_id = 0, $post_id = 0) {
            return forum::get_link($thread_id, $post_id);
        }));

        $twig->addFunction(new TwigFunction('forum_enable', function() {
            return forum::forum_enable();
        }));

        $twig->addFunction(new TwigFunction('forum_user_avatar', function($user_id = 0) {
            return forum::user_avatar($user_id);
        }));

        $twig->addFunction(new TwigFunction('get_enable_game_chat', function() {
            return server::get_server_info(auth::get_default_server())['chat_game_enabled'] ?? false;
        }));

        $twig->addFunction(new TwigFunction('get_screen_enable', function() {
            return config::get_screen_enable();
        }));

        $twig->addFunction(new TwigFunction('grade_img', function($crystal_type) {
            switch($crystal_type) {
                case 'none':
                    echo '';
                    break;
                case 'd':
                    echo '<img src="/uploads/images/grade/d.png" style="width:20px">';
                    break;
                case 'c':
                    echo '<img src="/uploads/images/grade/c.png" style="width:20px">';
                    break;
                case 'b':
                    echo '<img src="/uploads/images/grade/b.png" style="width:20px">';
                    break;
                case 'a':
                    echo '<img src="/uploads/images/grade/a.png" style="width:20px">';
                    break;
                case 's':
                    echo '<img src="/uploads/images/grade/s.png" style="width:20px">';
                    break;
                case 'r':
                    echo '<img src="/uploads/images/grade/r.png" style="width:20px">';
                    break;
                case 'r95':
                    echo '<img src="/uploads/images/grade/r95.png" style="width:35px">';
                    break;
                case 'r99':
                    echo '<img src="/uploads/images/grade/r99.png" style="width:35px">';
                    break;
                case 'r110':
                    echo '<img src="/uploads/images/grade/r110.png" style="width:40px">';
            }
        }));

        //Сгенерировать рандомный аккаунт
        $twig->addFunction(new TwigFunction('generation_account', function() {
            return generation::word();
        }));

        //Последние скриншоты
        $twig->addFunction(new TwigFunction('screenshots', function($limit = 8) {
            return screenshot::load($limit);
        }));

        //Список аккаунтов пользователя
        $twig->addFunction(new TwigFunction('show_all_account_player', function() {
            return player_account::show_all_account_player();
        }));

        /**
         * Вывод статиститки сервера
         */
        $twig->addFunction(new TwigFunction('statistic_top_counter', function($server_id = 0) {
            return statistic_model::top_counter($server_id);
        }));

        $twig->addFunction(new TwigFunction('statistic_get_pvp', function($server_id = 0) {
            return statistic_model::get_pvp($server_id);
        }));

        $twig->addFunction(new TwigFunction('statistic_get_pk', function($server_id = 0) {
            return statistic_model::get_pk($server_id);
        }));

        $twig->addFunction(new TwigFunction('statistic_players_online_time', function($server_id = 0) {
            return statistic_model::get_players_online_time($server_id);
        }));

        $twig->addFunction(new TwigFunction('statistic_get_clans', function($server_id = 0) {
            return statistic_model::get_clan($server_id);
        }));

        $twig->addFunction(new TwigFunction('statistic_get_castle', function($server_id = 0) {
            return statistic_model::get_castle($server_id);
        }));

        $twig->addFunction(new TwigFunction('statistic_get_players_heroes', function($server_id = 0) {
            return statistic_model::get_players_heroes($server_id);
        }));

        $twig->addFunction(new TwigFunction('statistic_get_players_block', function($server_id = 0) {
            return statistic_model::get_players_block($server_id);
        }));





        //Список последних новостей
        $twig->addFunction(new TwigFunction('last_news', function($last_thread = 10) {
            return page::show_news_short(300, $last_thread, false);
        }));

        $twig->addFunction(new TwigFunction('server_online_status', function() {
            return online::server_online_status();
        }));

        $twig->addFunction(new TwigFunction('get_default_page', function($str, $server_id) {
            $pId = server::get_default_desc_page_id($server_id);
            if($pId) {
                return "<a href='/page/{$pId}'>$str</a>";
            }
            return $str;
        }));

        $twig->addFunction(new TwigFunction('http_referer', function() {
            return $_SERVER['HTTP_REFERER'] ?? null;
        }));

        //Возвращает сумму чисел в массиве по конкретному полю
        $twig->addFunction(new TwigFunction('array_field_sum', function(array $array, string $field) {
            $sum = 0;
            foreach($array as $players) {
                foreach($players as $key => $value) {
                    if($key == $field) {
                        $sum += $value;
                    }
                }
            }
            return $sum;
        }));

        $twig->addFunction(new TwigFunction('get_clanhall', function($id) {
            return clanhall::get($id);
        }));

        $twig->addFunction(new TwigFunction('get_fort', function($id) {
            return fort::get($id);
        }));

        $twig->addFunction(new TwigFunction('get_castle', function($id) {
            return castle::get($id);
        }));

        $twig->addFunction(new TwigFunction('icon', function($fileIcon = null) {
            if(file_exists("uploads/images/icon/" . $fileIcon . ".webp") and $fileIcon != null) {
                return "/uploads/images/icon/" . $fileIcon . ".webp";
            }
            return "/uploads/images/icon/NOIMAGE.webp";
        }));

        $template = $twig->load($tplName);
        self::$allTplVars['template'] = "/template/{$categoryDesign}";
        self::$allTplVars['pointTime'] = microtime::pointTime();
        echo $template->render(self::$allTplVars);
        exit();
    }

    /**
     * Загрузка языкового пакета шаблона
     *
     * @return void
     */
    public static function lang_template_load($tpl) {
        if(!file_exists($tpl)) {
            return;
        }
        lang::load_template_lang_packet($tpl);
    }
}