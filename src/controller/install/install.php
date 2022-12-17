<?php
/**
 * Класс установщик
 */

namespace Ofey\Logan22\controller\install;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class install {

    //Min version PHP
    private static float $need_min_version_php = 8.1;

    //Разрешение на установку
//    private static function __installation_permission(): bool {
//        if(self::$need_min_version_php >= PHP_VERSION){
//            return true;
//        }
//        return false;
//    }

    /**
     * Установка, вывод правил, соглашения
     */
    public static function rules() {
        if(\Ofey\Logan22\model\install\install::exist_admin() and file_exists($_SERVER['DOCUMENT_ROOT'] . '/src/config/db.php')) {
            header("Location: /");
            die();
        }
        tpl::display("install/install_rules.html", [
            "php_version" => PHP_VERSION,
            "need_min_version_php" => self::$need_min_version_php,
//            "installation_permission" => self::__installation_permission(),
        ]);
    }

    public static function db() {
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/src/config/db.php')) {
            header("Location: /install/admin");
            die();
        }
//        if(!self::__installation_permission()) header("Location: /install/rules");
        tpl::display("install/install_db.html");
    }

    //Проверка соединения с базой данных
    public static function db_connect() {
//        if(!self::__installation_permission()) return;

        if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/src/config/db.php')) {
            header("Location: /");
            die();
        }
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/src/config/db.php')) {
            header("Location: /");
            die();
        }
        self::connect_test_db(false);
    }

    public static function connect_test_db($only_admin = true) {
//        if(!self::__installation_permission()) return;

        if($only_admin) {
            if(auth::get_access_level() != "admin") {
                board::notice(false, 'Access is denied');
            }
        }
        $host = $_POST['host'];
        $user = $_POST['user'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $pdo = \Ofey\Logan22\model\install\install::test_connect_mysql($host, $user, $password, $name);
        if($pdo) {
            self::install_sql_struct($pdo, $_SERVER["DOCUMENT_ROOT"] . "/install/sql/struct/*.sql");
            self::install_sql_struct($pdo, $_SERVER["DOCUMENT_ROOT"] . "/install/sql/data/*.sql");
            \Ofey\Logan22\model\install\install::saveConfig($host, $user, $password, $name);
            board::notice(true, 'Next install');
        } else {
            board::notice(false, 'Database connection error');
        }
    }

    private static function install_sql_struct($pdo, $dir) {
//        if(!self::__installation_permission()) return;

        $files = glob($dir);
        foreach($files as $file) {
            $sql = file_get_contents($file);
            $pdo->query($sql);
        }
    }

    public static function admin() {
        if(\Ofey\Logan22\model\install\install::exist_admin()) {
            header("Location: /");
            die();
        }
        //Удаляем старую сессию
        session_start();
        session_destroy();
        //        if(!self::__installation_permission()) header("Location: /install/rules");
        tpl::display("install/install_admin.html");
    }

    public static function add_admin() {
//        if(!self::__installation_permission()) header("Location: /install/rules");
        \Ofey\Logan22\model\install\install::add_user_admin();
    }

}