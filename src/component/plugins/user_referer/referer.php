<?php

namespace Ofey\Logan22\component\plugins\user_referer;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\captcha\google;
use Ofey\Logan22\component\config\config;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\request\request;
use Ofey\Logan22\component\request\request_config;
use Ofey\Logan22\component\session\session;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sdb;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\auth\registration;
use Ofey\Logan22\model\user\player\character;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;
use SimpleCaptcha\Builder;

class referer {

    public function show() {
        if (!server::get_server_info()) {
            tpl::display("error/not_server.html");
        }
        $referer = $_SERVER['HTTP_REFERER'] ?? null;
        tpl::addVar("referer", $referer);
        tpl::displayPlugin("/user_referer/tpl/registration.html");
    }

    public function registration_user(){

        $referer = $_SESSION['referer'] ?? null;
        if($referer == null){
            $referer = $_SERVER['HTTP_REFERER'] ?? null;
        }

        $email = request::setting('email', new request_config(isEmail: true));
        $password = request::setting('password', new request_config(max: 32));

        if (config::get_captcha_version("google")) {
            $g_captcha = google::check($_POST['captcha']??null);
            if (isset($g_captcha['success'])){
                if(!$g_captcha['success']) {
                    board::notice(false, $g_captcha['error-codes'][0]);
                }
            }else{
                board::notice(false, "Google recaptcha не вернула ответ");
            }
        } elseif (config::get_captcha_version("default")) {
            $builder = new Builder();
            $captcha = $_POST['captcha'] ?? false;
            if (!$builder->compare(trim($captcha), $_SESSION['captcha'])) {
                board::response("notice", ["message" => lang::get_phrase(295), "ok"=>false, "reloadCaptcha" => true]);
            }
        }

        if (auth::is_user($email)) {
            board::response("notice", ["message" => lang::get_phrase(201, $email), "ok"=>false, "reloadCaptcha" => true]);
        }
        registration::add($email, $password, false, false);
        self::saveReferer($referer);
        board::response("notice", [
            "ok" => true,
            "message" => lang::get_phrase(177),
            "redirect" => "/main",
        ]);
    }

    public function registration_account() {

        $referer = $_SESSION['referer'] ?? null;
        if($referer == null){
            $referer = $_SERVER['HTTP_REFERER'] ?? null;
        }

        $login = request::setting('login', new request_config(min: 4, max: 16, rules: "/^[a-zA-Z0-9_]+$/"));
        if ($_POST['prefix'] != "off_prefix") {
            $prefixInfo = require "src/config/prefix_suffix.php";
            if ($prefixInfo['enable']) {
                if ($prefixInfo['type'] == "prefix") {
                    $prefix = $_POST['prefix'] ?? "";
                    if ($prefix != "null") {
                        $login = $prefix . $login;
                    }
                } else {
                    $prefix = $_POST['prefix'] ?? "";
                    if ($prefix != "null") {
                        $login = $login . $prefix;
                    }
                }
            }
        }
        $password = request::setting('password', new request_config(min: 4, max: 60));
        $password_hide = request::checkbox('password_hide');
        if (auth::get_is_auth()) {
            player_account::add($login, $password, $password_hide);
        } else {
            if (config::get_captcha_version("google")) {
                $g_captcha = google::check($_POST['captcha'] ?? null);
                if (isset($g_captcha['success'])) {
                    if (!$g_captcha['success']) {
                        board::notice(false, $g_captcha['error-codes'][0]);
                    }
                } else {
                    board::notice(false, "Google recaptcha не вернула ответ");
                }
            } elseif (config::get_captcha_version("default")) {
                $builder = new Builder();
                $captcha = $_POST['captcha'] ?? false;
                if (!$builder->compare(trim($captcha), $_SESSION['captcha'])) {
                    board::response("notice", ["message" => lang::get_phrase(295), "ok" => false, "reloadCaptcha" => true]);
                }
            }
            $email = request::setting("email", new request_config(isEmail: true));
            if ($reQuest = player_account::add_account_not_user($login, $password, $password_hide, $email)) {
                //Сохраняем referer пользователя
                self::saveReferer($referer);
                $fileDownload = include_once "src/config/registration_download.php";
                $content = trim($fileDownload['content']) ?? "";
                if ($fileDownload['enable']) {
                    $content = str_replace(["%site_server%", "%server_name%", "%rate_exp%", "%chronicle%", "%email%", "%login%", "%password%"],
                        [$_SERVER['SERVER_NAME'], $reQuest['name'], "x" . $reQuest['rate_exp'], $reQuest['chronicle'], $email, $login, $password], $content);
                }
                board::response("notice_registration",
                    [
                        "ok" => true,
                        "message" => lang::get_phrase(207),
                        "isDownload" => $fileDownload['enable'],
                        "title" => $_SERVER['SERVER_NAME'] . " - " . $login . ".txt",
                        "content" => $content,
                        "redirect" => "/accounts",
                    ]);
            }
        }
    }

    private static function saveReferer($referer = null){
        if ($referer != null and $referer != "") {
            $isHost = filter_var($referer, FILTER_VALIDATE_URL);
            if ($isHost) {
                $referer = parse_url($referer, PHP_URL_HOST);
            }
            if ($referer) {
                $sql = "INSERT INTO `user_variables` (`user_id`, `var`, `val`) VALUES (?, 'referer', ?)";
                sql::run($sql, [session::get("id"), $referer]);
            }
        }
    }

    public function refererList($sort = "users") {
        validation::user_protection("admin");

        if($sort == "users"){
            $sort = "referer_count";
        }elseif($sort == "points"){
            $sort = "total_points";
        }else{
            $sort = "referer_count";
        }
        validation::user_protection("admin");
        $sql = "SELECT
                    u.val as location,
                    SUM(d.total_points) AS total_points,
                    COUNT(r.user_id) AS referer_count
                FROM user_variables AS u
                LEFT JOIN (
                    SELECT user_id, SUM(point) AS total_points
                    FROM donate_history_pay
                    GROUP BY user_id
                ) AS d ON u.user_id = d.user_id
                LEFT JOIN user_variables AS r ON u.user_id = r.user_id AND r.var = 'referer'
                WHERE u.var = 'referer'
                GROUP BY u.val;";
        $refererData = sql::getRows($sql);
        $mergedData = array();
        foreach ($refererData as $item) {
            $location = $item["location"];
            $isHost = filter_var($location, FILTER_VALIDATE_URL);
            if ($isHost) {
                $host = parse_url($location, PHP_URL_HOST);
                if ($host) {
                    if (isset($mergedData[$host])) {
                        $mergedData[$host]["total_points"] += intval($item["total_points"]);
                        $mergedData[$host]["referer_count"] += $item["referer_count"];
                    } else {
                        $mergedData[$host] = $item;
                    }
                }
            } else {
                if (isset($mergedData[$location])) {
                    $mergedData[$location]["total_points"] += intval($item["total_points"]);
                    $mergedData[$location]["referer_count"] += $item["referer_count"];
                } else {
                    $mergedData[$location] = $item;
                }
            }
        }
        $mergedData = array_values($mergedData);
        usort($mergedData, function ($a, $b) use ($sort) {
            return $b[$sort] <=> $a[$sort];
        });

        foreach($mergedData as &$item) {
            $filename = fileSys::get_dir("src/component/plugins/user_referer/db/{$item['location']}.txt");
            if (file_exists($filename)) {
                //Количество строк в файле
                $item['views'] = count(file($filename));
            } else {
                $item['views'] = 0;
            }
        }
        tpl::addVar("refererData", $mergedData);
        tpl::displayPlugin("/user_referer/tpl/referer_list.html");
    }

    public function get_referer($referer) {
        validation::user_protection("admin");
        $referers = sql::getRows("SELECT users.id, users.email, users.name, users.avatar, COALESCE(SUM(dhp.point), 0) AS total_points
FROM users
LEFT JOIN user_variables ON users.id = user_variables.user_id 
LEFT JOIN (
    SELECT user_id, SUM(point) AS point
    FROM donate_history_pay
    WHERE sphere=0
    GROUP BY user_id
) AS dhp ON users.id = dhp.user_id
WHERE user_variables.var = 'referer' AND user_variables.val = ?
GROUP BY users.id, users.email, users.name, users.avatar; ", [$referer]);

        //Сделать сортировку по total_points
        usort($referers, function ($a, $b) {
            return $b['total_points'] <=> $a['total_points'];
        });

        tpl::addVar("referer", $referer);
        tpl::addVar("referers", $referers);
        tpl::displayPlugin("/user_referer/tpl/get_referer.html");
    }

    public function get_user_char_info($email) {
        validation::user_protection("admin");
        $player_accounts = player_account::show_all_account_player($email);

        $accounts = [];
        foreach ($player_accounts as &$account) {
            $login = $account['login'];
            $players = character::all_characters($login);
            if (!$players) {
                continue;
            }
            if (sdb::is_error()){
                return null;
            }
            foreach ($players as $player) {
                $accounts[$login][] = $player;
            }
        }

        tpl::addVar("accounts", $accounts);
        tpl::displayPlugin("/user_referer/tpl/get_user_char_info.html");
    }

    public function get_clan_users($clanName) {
        validation::user_protection("admin");
        $server_info = server::get_server_info(auth::get_default_server());
        $clan_info = server::across("statistic_clan_data", $server_info, [$clanName]);
        if (!$clan_info) {
            return null;
        }

        $clan_players = server::acrossAll("statistic_clan_players", $server_info, [$clan_info['clan_id']]);

        $new_clan_players = [];
        $allSphereCoin = 0;
        foreach ($clan_players as &$player) {
            $point = sql::getRow("SELECT
                                            users.email,
                                            SUM(donate_history_pay.point) AS sphereCoin
                                        FROM
                                            player_accounts
                                            LEFT JOIN
                                            users
                                            ON 
                                                player_accounts.email = users.email
                                            LEFT JOIN
                                            donate_history_pay
                                            ON 
                                                users.id = donate_history_pay.user_id
                                        WHERE
                                            player_accounts.login = ?
                                        GROUP BY users.email;", [$player['account_name']]);
            if($point){
                $allSphereCoin += $point['sphereCoin'] ?? 0;
                $new_clan_players[$point['email']]['characters'][] = $player;
                $new_clan_players[$point['email']]['sphereCoin'] += $point['sphereCoin'] ?? 0;
            }
        }

        //Поменяй сортировку массива, мне необходимо чтоб сортировка произошла по кол-ву sphereCoin с сохранением ключа
        uasort($new_clan_players, function ($a, $b) {
            return $b['sphereCoin'] <=> $a['sphereCoin'];
        });


    $clan_players = $new_clan_players;
        tpl::addVar("clanName", $clanName);
        tpl::addVar("allSphereCoin", $allSphereCoin);
        tpl::addVar("clanInfo", $clan_info);
        tpl::addVar("clan_players", $clan_players);

        tpl::displayPlugin("/user_referer/tpl/get_clan_users.html");
    }

    public static function append_view($file_name, $new_entry) {
        if (!file_exists(fileSys::get_dir("src/component/plugins/user_referer/db"))) {
            mkdir(fileSys::get_dir("src/component/plugins/user_referer/db"), 0777, true);
        }
        $file_name = fileSys::get_dir("src/component/plugins/user_referer/db/{$file_name}");
        if (!file_exists($file_name)) {
            $file = fopen($file_name, 'w');
            fclose($file);
        }
        $file = fopen($file_name, 'a');
        fwrite($file, $new_entry . "\n");
        fclose($file);
    }
}