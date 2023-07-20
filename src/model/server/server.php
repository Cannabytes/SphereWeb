<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 09.09.2022 / 18:53:03
 */

namespace Ofey\Logan22\model\server;

use Exception;
use Ofey\Logan22\component\base\base;
use Ofey\Logan22\component\cache\cache;
use Ofey\Logan22\component\cache\dir;
use Ofey\Logan22\component\config\config;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\restapi\restapi;
use Ofey\Logan22\model\db\sdb;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;
use ReflectionMethod;

class server {

    static private ?array $server_info = null;

    /**
     * @param $id
     *
     * @return array|false
     * @throws Exception
     *
     * Функция возвращаем всю инфу о сервере
     */
    public static function get_server_info($id = null): bool|array {
        if ($id != null and self::$server_info != null) {
            foreach (self::$server_info as $server) {
                if ($id == $server['id']) {
                    return $server;
                }
            }
        }
        self::$server_info = sql::run("SELECT * FROM server_list")->fetchAll();
        foreach (self::$server_info as $k => $server) {
            self::$server_info[$k]['desc_page_id'] = self::get_default_desc_page_id($server['id']);
        }

        if ($id != null) {
            foreach (self::$server_info as $server) {
                if ($id == $server['id']) {
                    return $server;
                }
            }
            return false;
        }

        return self::$server_info;
    }

    //Кол-во серверов
    public static function get_count_servers(): int {
        return count(self::get_server_info());
    }

    //Страница по умолчанию
    private static array $get_default_desc_page_id = [];

    //Возращаем ID страницы описания
    public static function get_default_desc_page_id($server_id) {
        if (self::$get_default_desc_page_id == []) {
            self::$get_default_desc_page_id = sql::getRows("SELECT
                                server_id, 
                                lang, 
                                page_id, 
                                `default`
                            FROM
                                server_description");
        }
        //Возращаем ID страницы описания согласно языка пользователя
        foreach (self::$get_default_desc_page_id as $row) {
            if ($server_id == $row['server_id']) {
                if ($row['lang'] == lang::lang_user_default()) {
                    return $row['page_id'];
                }
            }
        }
        //Если нет такой страницы, вернем ID страницы по умолчанию
        foreach (self::$get_default_desc_page_id as $row) {
            if ($server_id == $row['server_id']) {
                if ($row['default']) {
                    return $row['page_id'];
                }
            }
        }
        //Если ничего не найдено, вернем NULL
        return null;
    }

    /*
     * Проверка на существования сервера во внутреннем реестре
     */
    public static function exist_server_registry(int $server_id = 0): bool|array {
        if ($server_id == null) {
            $server_id = auth::get_default_server();
            if (!$server_id) {
                return false;
            }
        }
        return self::get_server_info($server_id);
    }

    public static function preAcross(dir $dir, int $server_id = 0, string $name = null, $second = 60): array {
        $server_info = server::exist_server_registry($server_id);
        if (!$server_info)
            return [
                null,
                false,
            ];
        $server_id = $server_info['id'];
        return [
            $server_info,
            cache::read($dir->show_dynamic($server_id, $name), second: $second),
        ];
    }

    //Возвращает экземпляром класса

    /**
     * @throws Exception
     */
    private static function acrossBase($collection_name, $server_info, $prepare = []) {


        $sqlQuery = base::get_sql_source($server_info['collection_sql_base_name'], $collection_name);
        $reflection = new ReflectionMethod($server_info['collection_sql_base_name'], $collection_name);
        $attributes = $reflection->getAttributes();

        $inGameDBQuery = "game";
        foreach ($attributes as $attr) {
            if ('db' == basename($attr->getName())) {
                $inGameDBQuery = $attr->getArguments()[0];
            }
        }

        if (gettype($prepare) == "string") {
            $prepare = [$prepare];
        }
        if ($inGameDBQuery == "login") {
            sdb::set_type('login');
            $ok = sdb::set_connect($server_info['login_host'], $server_info['login_user'], $server_info['login_password'], $server_info['login_name']);
        } else {
            sdb::set_type('game');
            $ok = sdb::set_connect($server_info['game_host'], $server_info['game_user'], $server_info['game_password'], $server_info['game_name']);
        }
        if (!$ok)
            return $ok;
        return sdb::run($sqlQuery, $prepare);
    }

    // Запрос с возвращением единственной записи
    public static function across($collection_name, $server_info, $prepare = []) {
        if ($server_info['rest_api_enable']) {
            $data = restapi::Send(
                $server_info,
                $collection_name,
                $prepare,
            );
            if ($data == "false") {
                return false;
            }
            return json_decode($data, true)[0];
        }
        $ok = self::acrossBase($collection_name, $server_info, $prepare);
        if (!$ok)
            return $ok;
        return $ok->fetch();
    }

    /**
     * Запрос с возвращением всего массива
     *
     * @throws Exception
     */
    public static function acrossAll($collection_name, $server_info, $prepare = []) {
        if ($server_info['rest_api_enable']) {
            $data = restapi::Send(
                $server_info,
                $collection_name,
                $prepare,
            );
            if ($data == "false") {
                return false;
            }
            return json_decode($data, true);
        }
        $ok = self::acrossBase($collection_name, $server_info, $prepare);
        if (!$ok) {
            return false;
        }
        try {
            return $ok->fetchAll();
        } catch (\Error $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    //TODO: Проверка TRUE/FALSE исполнения запроса
    public static function acrossBool($collection_name, $server_info, $prepare = []) {
    }

    //TODO: Для записи в базу
    public static function acrossInsert($collection_name, $server_info, $prepare = []) {
    }
}