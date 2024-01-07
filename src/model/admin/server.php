<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 17.08.2022 / 19:21:01
 */

namespace Ofey\Logan22\model\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\install\install;

class server {

    private static $data_list_server = null;

    public static function save_server() {
        $name_server = !empty($_POST['name']) ? trim($_POST['name']) : board::notice(false, "Не заполнено название сервера");
        $version_client = !empty($_POST['version_client']) ? trim($_POST['version_client']) : board::notice(false, "Не заполнена версия клиента");

        $rate_exp = !empty($_POST['rate_exp']) ? trim($_POST['rate_exp']) : board::notice(false, "Не заполнено поле Rate EXP");
        $rate_sp = !empty($_POST['rate_sp']) ? trim($_POST['rate_sp']) : board::notice(false, "Не заполнено поле Rate SP");
        $rate_adena = !empty($_POST['rate_adena']) ? trim($_POST['rate_adena']) : board::notice(false, "Не заполнено поле Rate Adena");
        $rate_drop = !empty($_POST['rate_drop']) ? trim($_POST['rate_drop']) : board::notice(false, "Не заполнено поле Rate Drop");
        $rate_spoil = !empty($_POST['rate_spoil']) ? trim($_POST['rate_spoil']) : board::notice(false, "Не заполнено поле Rate Spoil");

//        $date_start = !empty($_POST['date_start']) ? trim($_POST['date_start']) : board::notice(false, "Не заполнено поле даты старта сервера");
//        $time_start = !empty($_POST['time_start']) ? trim($_POST['time_start']) : board::notice(false, "Не заполнено поле время старта сервера");
        $date_start = date("Y-m-d");
        $time_start = date("H:i");

        $rest_api_enable = isset($_POST['rest_api_enable']) ?: 0;

        //Данные БД для логина
        $db_login_host = !empty($_POST['db_login_host']) ? trim($_POST['db_login_host']) : "";
        $db_login_user = !empty($_POST['db_login_user']) ? trim($_POST['db_login_user']) : "";
        $db_login_password = $_POST['db_login_password'];
        $db_login_port = $_POST['db_login_port'] ?? 3306;

        $db_login_name = "";
        if (isset($_POST['db_login_name'])) {
            $db_login_name = trim($_POST['db_login_name']);
        } else {
            if(!$rest_api_enable){
                board::notice(false, "Не выбрана БД логина");
            }
        }

        //Данные БД для гейма
        $db_game_host = !empty($_POST['db_game_host']) ? trim($_POST['db_game_host']) : "";
        $db_game_user = !empty($_POST['db_game_user']) ? trim($_POST['db_game_user']) : "";
        $db_game_password = $_POST['db_game_password'];
        $db_game_port = $_POST['db_game_port'] ?? 3306;

        $db_game_name = "";
        if (isset($_POST['db_game_name'])) {
            $db_game_name = trim($_POST['db_game_name']);
        } else {
            if(!$rest_api_enable) {
                board::notice(false, "Не выбрана БД сервера");
            }
        }


        $sql_base_source = !empty($_POST['sql_base_source']) ? trim($_POST['sql_base_source']) : board::notice(false, "Need select sql database server collection");
        $check_server_online = isset($_POST['check_server_online']) ?: 0;

        $check_loginserver_online_host = $_POST['check_loginserver_online_host'];
        $check_loginserver_online_port = $_POST['check_loginserver_online_port'] ?: null;
        $check_gameserver_online_host = $_POST['check_gameserver_online_host'];
        $check_gameserver_online_port = $_POST['check_gameserver_online_port'] ?: null;

        $rest_api_enable = isset($_POST['rest_api_enable']) ?: 0;
        $rest_api_ip = $_POST['rest_api_ip'] ?? "127.0.0.1";
        $rest_api_port = $_POST['rest_api_port'] ?? 3333;
        $rest_api_key = $_POST['rest_api_key'] ?? "";

        $chat_game_enabled = isset($_POST['chat_game_enabled']) ?: 0;
        $launcher_enabled = 0;

        if(!$rest_api_enable) {
            //Проверяем соединение с БД перед тем как добавить
            if(!install::test_connect_mysql($db_login_host, $db_login_port, $db_login_user, $db_login_password, $db_login_name)) {
                board::notice(false, lang::get_phrase(223));
            }
            if(!install::test_connect_mysql($db_game_host, $db_game_port, $db_game_user, $db_game_password, $db_game_name)) {
                board::notice(false, lang::get_phrase(223));
            }
        }

        $sql = "INSERT INTO `server_list` (`name`, `rate_exp`, `rate_sp`, `rate_adena`, `rate_drop_item`, `rate_spoil`, `date_start_server`, `chronicle`, `login_host`, `login_port`, `login_user`, `login_password`, `login_name`, `game_host`, `game_port`, `game_user`, `game_password`, `game_name`, `collection_sql_base_name`, `check_server_online`,  `check_loginserver_online_host`, `check_loginserver_online_port`, `check_gameserver_online_host`, `check_gameserver_online_port`, `chat_game_enabled` , `launcher_enabled`, `rest_api_enable`, `rest_api_hostname`, `rest_api_port`, `rest_api_key` ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $ok = sql::run($sql, [
            $name_server,
            $rate_exp,
            $rate_sp,
            $rate_adena,
            $rate_drop,
            $rate_spoil,
            "{$date_start} {$time_start}:00",
            $version_client,
            $db_login_host,
            $db_login_port,
            $db_login_user,
            $db_login_password,
            $db_login_name,
            $db_game_host,
            $db_game_port,
            $db_game_user,
            $db_game_password,
            $db_game_name,
            $sql_base_source,

            $check_server_online,
            $check_loginserver_online_host,
            $check_loginserver_online_port,
            $check_gameserver_online_host,
            $check_gameserver_online_port,

            $chat_game_enabled,
            $launcher_enabled,

            $rest_api_enable,
            $rest_api_ip,
            $rest_api_port,
            $rest_api_key,

        ], false);

        board::notice(true, 'Добавлено');
    }

    public static function update_server() {
        $server_id = !empty($_POST['server_id']) ? trim($_POST['server_id']) : board::notice(false, "Нет ID редактируемого сервера");

        $name_server = !empty($_POST['name']) ? trim($_POST['name']) : board::notice(false, "Не заполнено название сервера");
        $version_client = !empty($_POST['version_client']) ? trim($_POST['version_client']) : board::notice(false, "Не заполнена версия клиента");

        $rate_exp = !empty($_POST['rate_exp']) ? trim($_POST['rate_exp']) : board::notice(false, "Не заполнено поле Rate EXP");
        $rate_sp = !empty($_POST['rate_sp']) ? trim($_POST['rate_sp']) : board::notice(false, "Не заполнено поле Rate SP");
        $rate_adena = !empty($_POST['rate_adena']) ? trim($_POST['rate_adena']) : board::notice(false, "Не заполнено поле Rate Adena");
        $rate_drop = !empty($_POST['rate_drop']) ? trim($_POST['rate_drop']) : board::notice(false, "Не заполнено поле Rate Drop");
        $rate_spoil = !empty($_POST['rate_spoil']) ? trim($_POST['rate_spoil']) : board::notice(false, "Не заполнено поле Rate Spoil");

//        $date_start = !empty($_POST['date_start']) ? trim($_POST['date_start']) : board::notice(false, "Не заполнено поле даты старта сервера");
//        $time_start = !empty($_POST['time_start']) ? trim($_POST['time_start']) : board::notice(false, "Не заполнено поле время старта сервера");
        $date_start = date("Y-m-d");
        $time_start = date("H:i");


        //Данные БД для логина
        $db_login_host = !empty($_POST['db_login_host']) ? trim($_POST['db_login_host']) : "";
        $db_login_port = $_POST['db_login_port'] ?? 3306;

        $db_login_user = !empty($_POST['db_login_user']) ? trim($_POST['db_login_user']) : "";
        $db_login_password = $_POST['db_login_password'];
        $db_login_name = !empty($_POST['db_login_name']) ? trim($_POST['db_login_name']) : "";
        //Данные БД для гейма
        $db_game_host = !empty($_POST['db_game_host']) ? trim($_POST['db_game_host']) : "";
        $db_game_port = $_POST['db_game_port'] ?? 3306;
        $db_game_user = !empty($_POST['db_game_user']) ? trim($_POST['db_game_user']) : "";
        $db_game_password = $_POST['db_game_password'];
        $db_game_name = !empty($_POST['db_game_name']) ? trim($_POST['db_game_name']) : "";

        $sql_base_source = !empty($_POST['sql_base_source']) ? trim($_POST['sql_base_source']) : board::notice(false, "Need select sql database server collection");
        $check_server_online = isset($_POST['check_server_online']) ?: 0;

        $check_loginserver_online_host = $_POST['check_loginserver_online_host'];
        $check_loginserver_online_port = $_POST['check_loginserver_online_port'] ?: null;
        $check_gameserver_online_host = $_POST['check_gameserver_online_host'];
        $check_gameserver_online_port = $_POST['check_gameserver_online_port'] ?: null;

        $rest_api_enable = isset($_POST['rest_api_enable']) ?: 0;
        $rest_api_ip = !empty($_POST['rest_api_ip']) ? trim($_POST['rest_api_ip']) : "127.0.0.1";
        $rest_api_port = !empty($_POST['rest_api_port']) ? trim($_POST['rest_api_port']) : 3333;
        $rest_api_key = !empty($_POST['rest_api_key']) ? trim($_POST['rest_api_key']) : "";


        $chat_game_enabled = isset($_POST['chat_game_enabled']) ?: 0;
        $launcher_enabled = 0;

        $sql = "UPDATE `server_list` SET
                         `name` = ?,
                        `rate_exp` = ?,
                        `rate_sp` = ?,
                        `rate_adena` = ?,
                        `rate_drop_item` = ?,
                        `rate_spoil` = ?,
                        `date_start_server` = ?,
                        `chronicle` = ?,
                        `login_host` = ?,
                        `login_port` = ?,
                        `login_user` = ?,
                        `login_password` = ?,
                        `login_name` = ?,
                        `game_host` = ?,
                        `game_port` = ?,
                        `game_user` = ?,
                        `game_password` = ?,
                        `game_name` = ?,
                        `collection_sql_base_name` = ?,
                        `check_server_online` = ?,
                        `check_loginserver_online_host` = ?,
                        `check_loginserver_online_port` = ?,
                        `check_gameserver_online_host` = ?,
                        `check_gameserver_online_port` = ?,
                        `chat_game_enabled` = ?,
                        `launcher_enabled` = ?,
                        `rest_api_enable` = ?,
                        `rest_api_hostname` = ?,
                        `rest_api_port` = ?,
                        `rest_api_key` = ?
                        WHERE
                            `id` = ?";
        $ok = sql::run($sql, [
            $name_server,
            $rate_exp,
            $rate_sp,
            $rate_adena,
            $rate_drop,
            $rate_spoil,
            "{$date_start} {$time_start}:00",
            $version_client,
            $db_login_host,
            $db_login_port,
            $db_login_user,
            $db_login_password,
            $db_login_name,
            $db_game_host,
            $db_game_port,
            $db_game_user,
            $db_game_password,
            $db_game_name,
            $sql_base_source,

            $check_server_online,
            $check_loginserver_online_host,
            $check_loginserver_online_port,
            $check_gameserver_online_host,
            $check_gameserver_online_port,

            $chat_game_enabled,
            $launcher_enabled,

            $rest_api_enable,
            $rest_api_ip,
            $rest_api_port,
            $rest_api_key,

            $server_id,
        ]);
        if (!$ok) {
            board::notice(false, 'Ошибка');
        }
        board::notice(true, 'Добавлено');
    }

    //Добавление описания
    public static function add_description() {
        $server_id = (int)$_POST['id'];
        $lang = ($_POST['lang']);
        $page_id = (int)($_POST['page_id']);
        sql::run("DELETE FROM `server_description` WHERE `server_id` = ? AND `lang` = ? ", [
            $server_id,
            $lang,
        ]);
        sql::run("INSERT INTO `server_description` (`server_id`, `lang`, `page_id`) VALUES (?, ?, ?)", [
            $server_id,
            $lang,
            $page_id,
        ]);
        board::notice(true, 'Добавлено');
    }

    public static function description_default() {
        $server_id = $_POST['server_id'];
        $page_id = $_POST['page_id'];
        $lang = $_POST['lang'];
        sql::run("UPDATE `server_description` SET `default` = 0 WHERE `server_id` = ?", [
            $server_id,
        ]);
        sql::run("UPDATE `server_description` SET `default` = 1 WHERE `server_id` = ? AND `lang` = ? AND `page_id` = ?", [
            $server_id,
            $lang,
            $page_id,
        ]);
    }

    public static function server_info($id) {
        return sql::run("SELECT * FROM `server_list` WHERE id=?;", [$id])->fetch();
    }

    public static function get_server_data($id){
        return sql::getRows("SELECT * FROM `server_data` WHERE server_id = ?", [$id]);
    }

    public static function remove_server() {
        $server_id = $_POST['server_id'];
        $get_server_info = \Ofey\Logan22\model\server\server::get_server_info($server_id);
        if (!$get_server_info) {
            board::notice(false, "Сервер не найден");
        }
        sql::run("DELETE FROM `server_list` WHERE `id` = ?", [$server_id]);
        sql::run("DELETE FROM `server_description` WHERE `server_id` = ?", [$server_id]);
        board::notice(true, lang::get_phrase(146));
    }

    public static function additionally_save($element, $data, $select_server_id){
        sql::run("DELETE FROM `server_data` WHERE `key` = ? AND server_id = ?", [$element, $select_server_id]);
        sql::run("INSERT INTO `server_data` (`key`, `val`, `server_id`) VALUES (?, ?, ?)", [$element, $data, $select_server_id]);
        board::success(lang::get_phrase(217));
    }
}