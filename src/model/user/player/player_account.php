<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 23.08.2022 / 23:20:45
 */

namespace Ofey\Logan22\model\user\player;

use Exception;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\base\base;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\db\sdb;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\encrypt\encrypt;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\auth\registration;

class player_account {

    /**
     * TODO: На будущее переделать, сначала проверить что N аккаунт пуст во внутренне БД и в БД сервера,
     * и только после этого производить регистрацию.
     *
     * @param $server_id
     * @param $login
     * @param $password
     * @param $password_hide
     *
     * @throws Exception
     */
    public static function add($server_id, $login, $password, $password_hide) {
        self::valid_login($login);
        self::valid_password($password);
        if(self::count_account($server_id) >= 20) {
            exit(json_encode([
                'ok'      => false,
                'message' => "Вы превысили максимальное количество аккаунтов",
                'getCode' => 0,
            ]));
        }

        $reQuest = self::getReQuest($server_id, $login);
        $err = self::account_registration($reQuest, [
            $login,
            encrypt::server_password($password, $reQuest['password_encrypt']),
            auth::get_email(),
        ], showErrorPage: false);
        if(is_array($err)) {
            if(!$err['ok']) {
                exit(json_encode([
                    'ok'      => false,
                    'message' => $err['message'],
                ]));
            }
        }
        $s = self::add_inside_account($login, $password, auth::get_email(), auth::get_ip(), $server_id, $password_hide);
        exit(json_encode([
            'ok'      => true,
            'message' => "Вы успешно зарегистрировали новый аккаунт",
            'getCode' => 0,
        ]));
    }

    public static function add_account_not_user($server_id, $login, $password, $password_hide, $email) {
        self::valid_login($login);
        self::valid_password($password);
        self::valid_email($email);

        if(!auth::exist_user($email)) {
            registration::add($email, $password, true);
        }

        $reQuest = self::getReQuest($server_id, $login);
        $err = self::account_registration($reQuest, [
            $login,
            encrypt::server_password($password, $reQuest['password_encrypt']),
            $email,
        ]);
        //TODO: логирование ошибок
        if(is_array($err)) {
            if(!$err['ok']) {
                exit(json_encode([
                    'ok'      => false,
                    'message' => $err['message'],
                ]));
            }
        }
        self::add_inside_account($login, $password, $email, $_SERVER['REMOTE_ADDR'], $server_id, $password_hide);
        exit(json_encode([
            'ok'      => true,
            'message' => "Вы успешно зарегистрировали новый аккаунт",
            'getCode' => 0,
        ]));
    }

    /*
     * Проверка существования персонажа
     */
    public static function is_player($info, $prepare) {
        $base = base::get_sql_source($info['collection_sql_base_name'], "is_player");
        return self::extracted($base, $info, $prepare);
    }

    public static function max_value_item_object($info, $prepare = []) {
        $base = base::get_sql_source($info['collection_sql_base_name'], 'max_value_item_object');
        return self::extracted($base, $info, $prepare);
    }

    //Имеется ли на персонаже предмет N
    public static function check_item($info, $prepare = []) {
        $base = base::get_sql_source($info['collection_sql_base_name'], 'check_item_player');
        return self::extracted($base, $info, $prepare);
    }

    public static function update_item_count_player($info, $prepare = []) {
        $base = base::get_sql_source($info['collection_sql_base_name'], 'update_item_count_player');
        return self::extracted($base, $info, $prepare);
    }

    public static function add_item($info, $prepare = []) {
        $base = base::get_sql_source($info['collection_sql_base_name'], 'add_item');
        return self::extracted($base, $info, $prepare);
    }

    public static function account_is_exist($info, $prepare) {
        $base = base::get_sql_source($info['collection_sql_base_name'], "account_is_exist");
        return self::extracted($base, $info, $prepare);
    }

    /**
     * @throws Exception
     */
    public static function account_registration($info, $prepare, $showErrorPage = true) {
        $base = base::get_sql_source($info['collection_sql_base_name'], "account_registration");
        return self::extracted($base, $info, $prepare, $showErrorPage);
    }

    /**
     * @throws Exception
     */
    public static function extracted($collection, $info, $prepare = [], $showErrorPage = true) {
        if(gettype($prepare) == "string") {
            $prepare = [$prepare];
        }
        $server_id = $info['id'];
        sdb::set_server_id($server_id);
        sdb::set_type($collection['call']);
        if($collection['call'] == "login") {
            sdb::set_connect($info['login_host'], $info['login_user'], $info['login_password'], $info['login_name']);
        } else {
            sdb::set_connect($info['game_host'], $info['game_user'], $info['game_password'], $info['game_name']);
        }
        return sdb::run($collection['sql'], $prepare, $showErrorPage);
    }

    public static function valid_login($login) {
        if(3 > mb_strlen($login)) {
            board::notice(false, 'Логин от 3 символов');
        }
        if(16 < mb_strlen($login)) {
            board::notice(false, 'Логин до 16 символов');
        }
        if(!preg_match("/^[a-zA-Z0-9]+$/", $login) == 1) {
            board::notice(false, "Логин должен быть формата a-zA-Z0-9");
        }
    }

    /*
     * Проверка на диапазон значений в пароле
     */
    public static function valid_password($password) {
        if(4 > mb_strlen($password)) {
            board::notice(false, "Пароль от 4 символов");
        }
        if(32 < mb_strlen($password)) {
            board::notice(false, "Логин до 32 символов");
        }
    }

    public static function valid_email($email) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            board::notice(false, "Введите корректный E-mail");
        }
    }

    /**
     * @throws Exception
     */
    public static function add_inside_account($login, $password, $email, $ip, $server_id, $password_hide) {
        return sql::run("INSERT INTO `player_accounts` (`login`, `password`, `email`, `ip`, `server_id`, `password_hide`, `date_create`, `date_update`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [
            $login,
            $password,
            $email,
            $ip,
            $server_id,
            (int)$password_hide,
            time::mysql(),
            time::mysql(),
        ]);
    }

    //Проверка аккаунта во внутренней БД
    public static function exist_account_inside($login, $server_id) {
        return sql::run("SELECT id, password_hide FROM player_accounts WHERE login = ? AND server_id = ?", [
            $login,
            $server_id,
        ])->fetch();
    }

    /**
     * @param $server_id
     * @param $login
     *
     * @return mixed|void
     */
    public static function getReQuest($server_id, $login): mixed {
        $server_info = server::server_info($server_id);
        if(!$server_info) {
            board::notice(false, "Сервер не найден");
        }
        if(self::exist_account_inside($login, $server_id)) {
            board::alert([
                'ok'      => false,
                'message' => "Такой аккаунт уже занят",
                'getCode' => 0,
            ]);
        }
        $account = self::account_is_exist($server_info, $login);
        if(gettype($account) != "object") {
            if(!$account['ok']) {
                board::alert([
                    'ok'      => false,
                    'message' => $account['message'],
                    'getCode' => 0,
                ]);
            }
        }
        if($account->fetch()) {
            board::alert([
                'ok'      => false,
                'message' => "Такой аккаунт уже занят",
                'getCode' => 0,
            ]);
        }
        return $server_info;
    }

    //Возвращаем список всех аккаунтов пользователя
    static function show_all_account_player() {
        if(!auth::get_is_auth())
            return;
        return sql::run("SELECT id, login, `password`, email, ip, server_id, password_hide, date_create, date_update FROM player_accounts WHERE email = ? ORDER BY date_create", [
            auth::get_email(),
        ])->fetchAll();
    }

    //Кол-во имеющихся аккаунтов
    static function count_account($server_id) {
        if(!auth::get_is_auth())
            return;
        return sql::run("SELECT COUNT(*) as `count` FROM player_accounts WHERE server_id = ? AND email = ?", [
            $server_id,
            auth::get_email(),
        ])->fetch()["count"];
    }
}