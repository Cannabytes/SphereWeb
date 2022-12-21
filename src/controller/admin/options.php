<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 17.08.2022 / 12:13:03
 */

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\base\base;
use Ofey\Logan22\component\chronicle\client;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\servername\servername;
use Ofey\Logan22\component\time\timezone;
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\install\install;
use Ofey\Logan22\template\tpl;
use PDO;

class options {

    static public function edit_server_show($server_id) {
        validation::user_protection("admin");
        tpl::addVar([
            'servername_list_default' => servername::all(),
            'client_list_default'     => client::all(),
            'timezone_list_default'   => timezone::all(),
            "title"                   => lang::get_phrase(221),
            'server'                  => \Ofey\Logan22\model\server\server::get_server_info($server_id),
            'sql_base_source'         => base::sql_base_source(),
        ]);
        tpl::display("/admin/options/server_edit.html");
    }

    static public function server_show() {
        validation::user_protection("admin");
        tpl::addVar([
            'servername_list_default' => servername::all(),
            'client_list_default'     => client::all(),
            'timezone_list_default'   => timezone::all(),
            "title"                   => lang::get_phrase(221),
            'server_list'             => \Ofey\Logan22\model\server\server::get_server_info(),
            'sql_base_source'         => base::sql_base_source(),
        ]);
        tpl::display("/admin/options/server.html");
    }

    public static function new_server_save() {
        validation::user_protection("admin");
        server::save_server();
    }

    public static function test_connect_db() {
        validation::user_protection("admin");
        if(install::test_connect_mysql($_POST['host'], $_POST['user'], $_POST['password'], $_POST['name'])) {
            board::notice(true, lang::get_phrase(222));
        } else {
            board::notice(false, lang::get_phrase(223));
        }
    }

    public static function server_list() {
        validation::user_protection("admin");
        tpl::addVar('server_list', \Ofey\Logan22\model\server\server::get_server_info());
        tpl::display("/admin/options/server_list.html");
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
        tpl::display("/admin/options/description.html");
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

    public static function sql_generator() {
        validation::user_protection("admin");
        tpl::addVar([
            'sql_base_source' => base::sql_base_source(),
            'db_data_list'    => server::db_data_list(),
        ]);
        tpl::addVar('server_list', \Ofey\Logan22\model\server\server::get_server_info());
        tpl::display("admin/options/sql_source.html");
    }

    public static function sql_generator_load_file($filename) {
        validation::user_protection("admin");
        $jsondata = file_get_contents("src/component/base/source/{$filename}");
        $json = json_decode($jsondata, true);
        tpl::addVar([
            'sql_base_source' => base::sql_base_source(),
            'source_data'     => $json,
            'db_data_list'    => server::db_data_list(),
        ]);
        tpl::addVar('server_list', \Ofey\Logan22\model\server\server::get_server_info());
        tpl::display("admin/options/sql_source.html");
    }

    public static function sql_request_test() {
        validation::user_protection("admin");
        $db_id = $_POST['db_id'];
        $sql_name = $_POST['sql_name'];
        $sql_text = $_POST['sql_text'];
        $sql_prepare = $_POST['sql_prepare'];
        $sql_name = $_POST['sql_name'];
        $operator = trim(explode(' ', $sql_text)[0]);
        $server_pdo = server::db_connect_id($db_id);
        //string prepare to array
        $sql_prepare = array_filter(array_map('trim', explode(",", $sql_prepare)));
        $server = $server_pdo->run($sql_text, $sql_prepare);
        if(gettype($server) == "array") {
            if(isset($server['ok'])) {
                board::notice($server['ok'], $server['message']);
            }
        }
        if($operator == "INSERT") {
            if(gettype($server) == "object") {
                board::notice(true, 'OK');
            }
            exit;
        }
        if($operator == "SELECT") {
            $server_info = $server->fetchAll(PDO::FETCH_ASSOC);
            if($server->rowCount() == 0) {
                board::notice(true, 'Нет возвращаемых результатов');
            } else {
                board::notice(true, implode(" ", $server_info[0]));
            }
        }

        if($operator == "UPDATE") {
            if($server->rowCount() == 0) {
                board::notice(true, 'Нет измененных данных');
            } else {
                board::notice(true, "Изменено {$server->rowCount()} строк");
            }
        }
        board::notice(true, 'OK');
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
}













