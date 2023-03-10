<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 23.08.2022 / 23:20:45
 */

namespace Ofey\Logan22\model\user\player;

use Exception as ExceptionAlias;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\base\base;
use Ofey\Logan22\component\cache\cache;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sdb;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\encrypt\encrypt;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\auth\registration;

class player_account {

    /**
     * Разрешать/запрещать просмотр другим своимх предметов/характеристик персонажа
     */
    public static function show_characters_info() {
        validation::user_protection();
        $account = trim($_POST['account']);
        $show_characters_info = (int)filter_var($_POST['show_characters_info'], FILTER_VALIDATE_BOOLEAN);;
        $s = sql::run("UPDATE `player_accounts` SET `show_characters_info` = ? WHERE `login` = ? AND `email` = ?", [
            $show_characters_info,
            $account,
            auth::get_email(),
        ]);
    }

    /**
     * @param      $account_name название аккаунта
     * @param bool $iemail возвращать информацию вместе с пользовательской э.почтой
     *
     * @return mixed
     * @throws ExceptionAlias
     */
    public static function get_show_characters_info($account_name, bool $iemail = true) {
        $info = sql::run("SELECT `email`, `show_characters_info` FROM player_accounts WHERE login = ?", [$account_name])->fetch();
        if($info == null) {
            return null;
        }
        if($iemail) {
            return $info;
        }
        return $info['show_characters_info'];
    }

    /**
     * TODO: На будущее переделать, сначала проверить что N аккаунт пуст во внутренне БД и в БД сервера,
     * и только после этого производить регистрацию.
     *
     * @param $server_id
     * @param $login
     * @param $password
     * @param $password_hide
     *
     * @throws ExceptionAlias
     */
    public static function add($server_id, $login, $password, $password_hide) {
        self::valid_login($login);
        self::valid_password($password);
        if(self::count_account($server_id) >= 20) {
            board::notice(false, lang::get_phrase(206));
        }

        $reQuest = self::getReQuest($server_id, $login);
        $err = self::account_registration($reQuest, [
            $login,
            encrypt::server_password($password, $reQuest),
            auth::get_email(),
        ], showErrorPage: false);
        if(is_array($err)) {
            if(!$err['ok']) {
                board::notice(false, $err['message']);
            }
        }
        self::add_inside_account($login, $password, auth::get_email(), auth::get_ip(), $server_id, $password_hide);
        board::notice(true, lang::get_phrase(207));
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
            encrypt::server_password($password, $reQuest),
            $email,
        ]);
        //TODO: логирование ошибок
        if(is_array($err)) {
            if(!$err['ok']) {
                board::notice(false, $err['message']);
            }
        }
        self::add_inside_account($login, $password, $email, $_SERVER['REMOTE_ADDR'], $server_id, $password_hide);
        board::notice(true, lang::get_phrase(207));
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
    public static function check_item_player($info, $prepare = []) {
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
     * @throws ExceptionAlias
     */
    public static function account_registration($info, $prepare, $showErrorPage = true) {
        $sqlQuery = base::get_sql_source($info['collection_sql_base_name'], "account_registration");
        return self::extracted($sqlQuery, $info, $prepare, $showErrorPage, gameServer: false);
    }

    /**
     * @throws ExceptionAlias
     */
    public static function extracted($sqlQuery, $info, $prepare = [], $showErrorPage = true, $gameServer = true) {
        if(gettype($prepare) == "string") {
            $prepare = [$prepare];
        }
        $server_id = $info['id'];
        sdb::set_server_id($server_id);
        if($gameServer) {
            sdb::set_type('game');
            sdb::set_connect($info['game_host'], $info['game_user'], $info['game_password'], $info['game_name']);
        } else {
            sdb::set_type('login');
            sdb::set_connect($info['login_host'], $info['login_user'], $info['login_password'], $info['login_name']);
        }
        return sdb::run($sqlQuery, $prepare, $showErrorPage);
    }

    public static function valid_login($login) {
        if(3 > mb_strlen($login)) {
            board::notice(false, lang::get_phrase(208));
        }
        if(16 < mb_strlen($login)) {
            board::notice(false, lang::get_phrase(209));
        }
        if(!preg_match("/^[a-zA-Z0-9]+$/", $login) == 1) {
            board::notice(false, lang::get_phrase(210));
        }
    }

    /*
     * Проверка на диапазон значений в пароле
     */
    public static function valid_password($password) {
        if(4 > mb_strlen($password)) {
            board::notice(false, lang::get_phrase(211));
        }
        if(32 < mb_strlen($password)) {
            board::notice(false, lang::get_phrase(212));
        }
    }

    public static function valid_email($email) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            board::notice(false, lang::get_phrase(213));
        }
    }

    /**
     * @throws ExceptionAlias
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
            board::notice(false, lang::get_phrase(150));
        }
        if(self::exist_account_inside($login, $server_id)) {
            board::alert([
                'ok'      => false,
                'message' => lang::get_phrase(214),
                'getCode' => 0,
            ]);
        }
        $account = self::account_is_exist($server_info, $login);
        //        if(isset($account['error'])){
        //            board::notice(false, $account['error']);
        //        }
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
                'message' => lang::get_phrase(214),
                'getCode' => 0,
            ]);
        }
        return $server_info;
    }

    //Возвращаем список всех аккаунтов пользователя
    //$default_server - вернуть данные своих аккаунтов только сервера который по умолчанию
    static function show_all_account_player($server_id = null) {
        if(!auth::get_is_auth())
            return;

        if($server_id === null) {
            return sql::getRows("SELECT id, login, `password`, email, ip, server_id, password_hide, date_create, date_update FROM player_accounts WHERE email = ? ORDER BY date_create", [
                auth::get_email(),
            ]);
        }

        if(is_int((int)$server_id)) {
            return sql::getRows("SELECT id, login, `password`, email, ip, server_id, password_hide, date_create, date_update FROM player_accounts WHERE email = ? AND server_id = ? ORDER BY date_create", [
                auth::get_email(),
                $server_id,
            ]);
        }

        return sql::getRows("SELECT id, login, `password`, email, ip, server_id, password_hide, date_create, date_update FROM player_accounts WHERE email = ? AND server_id = ? ORDER BY date_create", [
            auth::get_email(),
            auth::get_default_server(),
        ]);
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