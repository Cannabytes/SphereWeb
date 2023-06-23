<?php

namespace Ofey\Logan22\template;

use InvalidArgumentException;
use Ofey\Logan22\component\account\generation;
use Ofey\Logan22\component\alert\logs;
use Ofey\Logan22\component\chronicle\race_class;
use Ofey\Logan22\component\config\config;
use Ofey\Logan22\component\estate\castle;
use Ofey\Logan22\component\estate\clanhall;
use Ofey\Logan22\component\estate\fort;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\time\microtime;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\model\admin\launcher;
use Ofey\Logan22\model\forum\forum;
use Ofey\Logan22\model\gallery\screenshot;
use Ofey\Logan22\model\page\page;
use Ofey\Logan22\model\server\online;
use Ofey\Logan22\model\server\server;
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

class tpl
{

    static private array $allTplVars = [];

    /**
     * @param        $var
     * @param string $value
     *
     * @return void
     * Добавление переменной к выводу шаблона
     */
    public static function addVar($var, mixed $value = 'None')
    {
        if (is_array($var)) {
            self::$allTplVars = array_merge(self::$allTplVars, $var);
        } else {
            self::$allTplVars[$var] = $value;
        }
    }

    public static function template_design_route(): ?array
    {
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
     * @throws LoaderError
     */
    public static function display($tplName, $categoryCabinet = false)
    {
        $__ROOT__ = $_SERVER['DOCUMENT_ROOT'];
        //        $categoryDesign = "cabinet";
        //        Если вызывается личный кабинет
        $templatePath = "/src/template/cabinet/";
        if ($categoryCabinet) {
            $templatePath = "/template/" . config::get_template();
            self::lang_template_load($__ROOT__ . $templatePath . "/lang.php");
        }
        if (!file_exists($__ROOT__ . $templatePath . "/" . $tplName)) {
            echo "Не найден шаблон: " . $__ROOT__ . $templatePath . "/" . $tplName;
            die();
        }
        $loader = new FilesystemLoader($__ROOT__ . $templatePath);

        $twig = new Environment($loader, ['cache' => $__ROOT__ . "/uploads/cache/template",
            'auto_reload' => true,
            'debug' => true,
        ]);
        $twig->addExtension(new DebugExtension());

        $twig->addFilter(new TwigFilter('html_entity_decode', 'html_entity_decode'));

        $twig->addFilter(new TwigFilter('template', function ($string) use ($templatePath) {
            return str_replace(["//",
                "\\",
            ], "/", $templatePath . $string);
        }));

        $twig->registerUndefinedFunctionCallback(function ($name) {
            if (function_exists($name)) {
                return new TwigFunction($name, function () use ($name) {
                    return call_user_func_array($name, func_get_args());
                });
            }
            throw new RuntimeException(sprintf('Function %s not found', $name));
        });

        $twig->addFunction(new TwigFunction('cache_timeout', function ($var = null) {
            return time::cache_timeout($var);
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


        $twig->addFunction(new TwigFunction('user_info', function ($type) {
                if (method_exists(auth::class, $type)) {
                    return auth::$type();
                } else {
                    throw new \InvalidArgumentException(sprintf('Method "%s" does not exist in auth class.', $type));
                }
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

        $twig->addFunction(new TwigFunction('format_number_fr', function ($num) {
            echo number_format($num, 0, ',', ' ');
        }));

        //Время (в секундах) в часы. минуты, сек.
        $twig->addFunction(new TwigFunction('timeHasPassed', function ($num, $onlyHour = false) {
            return statistic_model::timeHasPassed($num, $onlyHour);
        }));
        $twig->addFunction(new TwigFunction('get_class', function ($class_id) {
            return race_class::get_class($class_id);
        }));
        $twig->addFunction(new TwigFunction('get_class_race', function ($class_id) {
            echo race_class::get_class_race($class_id);
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

        $twig->addFunction(new TwigFunction('forum_user_avatar', function ($user_id = 0) {
            return forum::user_avatar($user_id);
        }));

        $twig->addFunction(new TwigFunction('get_enable_game_chat', function () {
            return server::get_server_info(auth::get_default_server())['chat_game_enabled'] ?? false;
        }));

        $twig->addFunction(new TwigFunction('get_screen_enable', function () {
            return config::get_screen_enable();
        }));

        $twig->addFunction(new TwigFunction('grade_img', function ($crystal_type): string {
            $grade_img = '';
            switch ($crystal_type) {
                case 'd':
                    $grade_img = '<img src="/uploads/images/grade/d.png" style="width:20px">';
                    break;
                case 'c':
                    $grade_img = '<img src="/uploads/images/grade/c.png" style="width:20px">';
                    break;
                case 'b':
                    $grade_img = '<img src="/uploads/images/grade/b.png" style="width:20px">';
                    break;
                case 'a':
                    $grade_img = '<img src="/uploads/images/grade/a.png" style="width:20px">';
                    break;
                case 's':
                    $grade_img = '<img src="/uploads/images/grade/s.png" style="width:20px">';
                    break;
                case 'r':
                    $grade_img = '<img src="/uploads/images/grade/r.png" style="width:20px">';
                    break;
                case 'r95':
                    $grade_img = '<img src="/uploads/images/grade/r95.png" style="width:35px">';
                    break;
                case 'r99':
                    $grade_img = '<img src="/uploads/images/grade/r99.png" style="width:35px">';
                    break;
                case 'r110':
                    $grade_img = '<img src="/uploads/images/grade/r110.png" style="width:40px">';
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
            if(file_exists('uploads/screenshots/' . $file)){
                return '/uploads/screenshots/' . $file;
            }else{
                return "/src/template/cabinet/assets/images/not-found.png";
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

        //Список последних новостей
        $twig->addFunction(new TwigFunction('last_news', function ($last_thread = 10) {
            return page::show_news_short(300, $last_thread, false);
        }));

        $twig->addFunction(new TwigFunction('server_online_status', function () {
            return online::server_online_status();
        }));

        $twig->addFunction(new TwigFunction('get_default_page', function ($str, $server_id) {
            $pId = server::get_default_desc_page_id($server_id);
            return $pId ? "<a href='/page/{$pId}'>$str</a>" : $str;
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
            return file_exists("uploads/images/icon/" . $fileIcon . ".webp") && $fileIcon != null ? "/uploads/images/icon/" . $fileIcon . ".webp" : "/uploads/images/icon/NOIMAGE.webp";
        }));

        //Есть ли бонус для персонажа за привлеченного пользователя
        $twig->addFunction(new TwigFunction('is_referral_bonus', function ($referrals) {
            require_once 'src/config/referral.php';
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

            function isReferralDone($referral)
            {
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

        $twig->addFunction(new TwigFunction('referral_link', function () {
            $scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] ? 'https://' : 'http://';
            $name = auth::get_name() ?: auth::get_id();
            return $scheme . $_SERVER['HTTP_HOST'] . "/registration/user/ref/" . mb_strtolower($name);
        }));

        $twig->addFunction(new TwigFunction('currency_exchange_info', function () {
            return json_encode(require 'src/config/donate.php');
        }));

        $template = $twig->load($tplName);
        self::$allTplVars['template'] = $templatePath;
        self::$allTplVars['pointTime'] = microtime::pointTime();
        try {
            echo $template->render(self::$allTplVars);
        } catch (\Exception  $e) {
            $txt = "<h4>TEMPLATE ERROR</h4>";
            $txt .= "Message: " . $e->getMessage() . "<br>";
            $txt .= "File: " . $e->getFile() . "<br>";
            $txt .= "Line: " . $e->getLine(); "<br>";
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
            logs::loggerError(preg_replace('/<h4[^>]*>|<\/h4>|<br[^>]*>/', "
", $txt));
        }
        exit();
    }

    /**
     * Загрузка языкового пакета шаблона
     *
     * @return void
     */
    public static function lang_template_load($tpl)
    {
        if (!file_exists($tpl)) {
            return;
        }
        lang::load_template_lang_packet($tpl);
    }
}