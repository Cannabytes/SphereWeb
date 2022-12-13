<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 09.09.2022 / 18:53:03
 */

namespace Ofey\Logan22\model\server;

use Ofey\Logan22\component\base\base;
use Ofey\Logan22\component\cache\cache;
use Ofey\Logan22\component\cache\dir;
use Ofey\Logan22\model\db\sdb;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;

class server {

    static private ?array $server_info = null;

    /**
     * @param $id
     *
     * @return array|false
     * @throws \Exception
     *
     * Функция возвращаем всю инфу о сервере
     */
    static function get_server_info($id = null): bool|array {
        if($id!=null and self::$server_info!=null){
            foreach(self::$server_info as $server){
                if($id==$server['id']){
                    return $server;
                }
            }
        }
        self::$server_info = sql::run("SELECT
                                    server_list.id, 
                                    server_list.`name`, 
                                    server_list.description, 
                                    server_list.rate_exp, 
                                    server_list.rate_sp, 
                                    server_list.rate_adena, 
                                    server_list.rate_drop_item, 
                                    server_list.rate_spoil, 
                                    server_list.date_start_server, 
                                    server_list.chronicle, 
                                    server_list.login_host, 
                                    server_list.login_user, 
                                    server_list.login_password, 
                                    server_list.login_name, 
                                    server_list.game_host, 
                                    server_list.game_user, 
                                    server_list.game_password, 
                                    server_list.game_name, 
                                    server_list.collection_sql_base_name, 
                                    server_list.password_encrypt
                                FROM
                                    server_list")->fetchAll();
        if($id!=null){
            foreach(self::$server_info as $server){
                if($id==$server['id']){
                    return $server;
                }
            }
            return false;
        }
        return self::$server_info;
    }

    /*
     * Проверка на существования сервера во внутреннем реестре
     */
    static public function exist_server_registry(int $server_id = 0): bool|array {
        if($server_id == null) {
            $server_id = auth::get_default_server();
            if(!$server_id) {
                return false;
            }
        }
       return self::get_server_info($server_id);
    }

    public static function preAcross(dir $dir, int $server_id = 0, string $name = null): array {
        $server_info = server::exist_server_registry($server_id);
        if(!$server_info)
            return [
                null,
                false,
            ];
        $server_id = $server_info['id'];
        return [
            $server_info,
            cache::read($dir->show_dynamic($server_id, $name)),
        ];
    }

    //Возвращает экземпляром класса
    public static function acrossBase($collection_name, $server_info, $prepare = []) {
        $collection = base::get_sql_source($server_info['collection_sql_base_name'], $collection_name);
        if(!$collection) {
            die("Нет коллекции: {$collection_name}");
        }
        if(gettype($prepare) == "string") {
            $prepare = [$prepare];
        }
         if($collection['call'] == "login") {
            sdb::set_type($collection['call']);
            $ok = sdb::set_connect($server_info['login_host'], $server_info['login_user'], $server_info['login_password'], $server_info['login_name']);
        } else {
            sdb::set_type($collection['call']);
            $ok = sdb::set_connect($server_info['game_host'], $server_info['game_user'], $server_info['game_password'], $server_info['game_name']);
        }
        if(!$ok)
            return $ok;
        return sdb::run($collection['sql'], $prepare);
    }

    // Запрос с возвращением единственной записи
    public static function across($collection_name, $server_info, $prepare = []) {
        $ok = self::acrossBase($collection_name, $server_info, $prepare);
        if(!$ok)
            return $ok;
        //        if(!$ok['ok']) die($ok['message']);
        return $ok->fetch();
    }

    // Запрос с возвращением всего массива
    public static function acrossAll($collection_name, $server_info, $prepare = []) {
        $ok = self::acrossBase($collection_name, $server_info, $prepare);
        return $ok->fetchAll();
    }

    //TODO: Проверка TRUE/FALSE исполнения запроса
    public static function acrossBool($collection_name, $server_info, $prepare = []) {
    }

    //TODO: Для записи в базу
    public static function acrossInsert($collection_name, $server_info, $prepare = []) {
    }
}