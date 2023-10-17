<?php

namespace Ofey\Logan22\model\install;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\config\config;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\session\session;
use Ofey\Logan22\model\encrypt\encrypt;
use PDO;
use PDOException;

class install {

    //Мы должны получить host, user, pass, name
    //Так же проверка на существования файла подключения к БД, если файл существует, тогда запрет
    public static function test_connect_mysql($host, $port, $user, $password, $name = ""): bool|PDO {
        if($name === "") {
            board::notice(false, "Нет имени базы данных");
        }
        try {
            // Создаем DSN с учетом порта
            $dsn = "mysql:host={$host};port={$port};dbname={$name};charset=utf8mb4";
            $conn = new PDO($dsn, $user, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            return false;
        }
    }


    public static function saveConfig($host, $port, $user, $password, $name) {
        lang::load_package();
        $phpText = "<?php
const DB_HOST = '{$host}';
const DB_USER = '{$user}';
const DB_PASSWORD = '{$password}';
const DB_NAME = '{$name}';
const CHARSET = 'utf8';
";
        file_put_contents($_SERVER["DOCUMENT_ROOT"] . "/src/config/db.php", $phpText);
    }

    public static function add_user_admin() {
        lang::load_package();
        if(!file_exists($_SERVER["DOCUMENT_ROOT"] . '/src/config/db.php')) {
            board::notice(false, lang::get_phrase(154));
        }
        if(self::exist_admin()) {
            //Возможно тут стоит просто редирект сделать
            board::notice(false, lang::get_phrase(155));
        }
        $name = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $ip = '127.0.0.1';
        $port = 3306;
        require_once $_SERVER["DOCUMENT_ROOT"] . "/src/config/db.php";
        $conn = self::test_connect_mysql(DB_HOST, $port, DB_USER, DB_PASSWORD, DB_NAME);
        if(!$conn) {
            board::notice(false, lang::get_phrase(156));
        } else {
            $smt = $conn->prepare("INSERT INTO `users` (`name`, `password`, `email`, `ip`, `access_level`) VALUES (?, ?, ?, ?, ?)",);
            if($smt->execute([
                $name,
                password_hash($password, config::algorithm_hashing_user_password()),
                $email,
                $ip,
                'admin',
            ])) {
                self::add_first_news();
                board::notice(true, lang::get_phrase(157));
            }
        }
    }

    public static function exist_admin() {
        if(!file_exists(fileSys::get_dir('/src/config/db.php'))) {
            return false;
        }
        $sql = 'SELECT * FROM users WHERE access_level = "admin"';
        require_once fileSys::get_dir("/src/config/db.php");
        $conn = self::test_connect_mysql(DB_HOST, 3306,DB_USER, DB_PASSWORD, DB_NAME);
        return $conn->query($sql)->fetch();
    }

    private static function add_first_news(): void {
        $txt = lang::get_phrase(158);
        require_once fileSys::get_dir("/src/config/db.php");
        $conn = self::test_connect_mysql(DB_HOST, 3306, DB_USER, DB_PASSWORD, DB_NAME);
        $smt = $conn->prepare('INSERT INTO `pages` (`is_news`, `name`, `description`) VALUES (1, ?, ?);');
        $smt->execute([
            lang::get_phrase(159),
            $txt,
        ]);
    }
}