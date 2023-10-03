<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 17.08.2022 / 12:13:03
 */

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\base\base;
use Ofey\Logan22\component\chronicle\client;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\servername\servername;
use Ofey\Logan22\component\time\timezone;
use Ofey\Logan22\model\admin\patchlist;
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\admin\update_cache;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\install\install;
use Ofey\Logan22\template\tpl;
use PDO;

class options {

    static public function edit_server_show($server_id): void {
        validation::user_protection("admin");
        tpl::addVar([
            'servername_list_default' => servername::all(),
            'client_list_default'     => client::all(),
            "title"                   => lang::get_phrase(221),
            'server'                  => \Ofey\Logan22\model\server\server::get_server_info($server_id),
        ]);
        tpl::display("/admin/server/edit.html");
    }

    static public function server_show() {
        validation::user_protection("admin");
        tpl::addVar([
            'servername_list_default' => servername::all(),
            'client_list_default'     => client::all(),
            'timezone_list_default'   => timezone::all(),
            "title"                   => lang::get_phrase(221),
            'server_list'             => \Ofey\Logan22\model\server\server::get_server_info(),
        ]);
        tpl::display("/admin/server/add.html");
    }

    public static function new_server_save() {
        validation::user_protection("admin");
        server::save_server();
    }

    public static function test_connect_db() {
        validation::user_protection("admin");
        if(install::test_connect_mysql($_POST['host'] ?? "127.0.0.1", $_POST['user'] ?? "root", $_POST['password']  ?? "", $_POST['name'] ?? "")) {
            board::notice(true, lang::get_phrase(222));
        } else {
            board::notice(false, lang::get_phrase(223));
        }
    }

    public static function test_connect_db_selected_name() {
        validation::user_protection("admin");
        try {
            $pdo = new PDO("mysql:host={$_POST['host']}", $_POST['login'], $_POST['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SHOW DATABASES";
            $stmt = $pdo->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $databases[] = $row['Database'];
            }
            echo json_encode($databases);
            $pdo = null;
        } catch (PDOException $e) {
            die('Ошибка: ' . $e->getMessage());
        }
    }

    public static function server_list() {
        validation::user_protection("admin");
        tpl::display("/admin/server/servers.html");
    }

    public static function description_create($id) {
        validation::user_protection("admin");
        tpl::addVar([
            'title'                  => "Описание сервера",
            'all_page_name'          => \Ofey\Logan22\model\page\page::all_page_name(),
            'server_id'              => $id,
            'desc_server_list_short' => \Ofey\Logan22\model\page\page::desc_server_list_short($id),
            'server_list'            => \Ofey\Logan22\model\server\server::get_server_info(),
            'server_info'            => \Ofey\Logan22\model\server\server::get_server_info($id),
        ]);
        tpl::display("/admin/server/description.html");
    }

    public static function description_save() {
        validation::user_protection("admin");
        server::add_description();
    }

    //Установка дефолтной страницы
    public static function description_default_page_save() {
        validation::user_protection("admin");
        server::description_default();
    }

    /*
     * Обновление данных сервера
     */
    public static function update_server_save() {
        validation::user_protection("admin");
        server::update_server();
    }

    /*
     * Удаление сервера
     */
    public static function remove_server() {
        validation::user_protection("admin");
        server::remove_server();
    }

    /**
     * страница с настройками времени кэширования
     */
    public static function cache_page(){
        validation::user_protection("admin");
        tpl::display("/admin/cache/cache.html");
    }

    public static function cache_save(){
        validation::user_protection("admin");
        update_cache::save();
    }



}













