<?php

namespace Ofey\Logan22\model\install;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\encrypt\encrypt;
use PDO;
use PDOException;

class install {

    //Мы должны получить host, user, pass, name
    //Так же проверка на существования файла подключения к БД, если файл существует, тогда запрет
    static public function test_connect_mysql($host, $user, $password, $name): bool|PDO {
        try {
            $conn = new PDO("mysql:host={$host};dbname={$name};charset=utf8mb4", $user, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            return false;
        }
    }

    static public function saveConfig($host, $user, $password, $name) {
        $phpText = "<?php
const DB_HOST = '{$host}';
const DB_USER = '{$user}';
const DB_PASSWORD = '{$password}';
const DB_NAME = '{$name}';
const CHARSET = 'utf8';
";
        file_put_contents($_SERVER["DOCUMENT_ROOT"] . "/src/config/db.php", $phpText);
    }

    static public function add_user_admin() {
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
        require_once $_SERVER["DOCUMENT_ROOT"] . "/src/config/db.php";
        $conn = self::test_connect_mysql(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if(!$conn) {
            board::notice(false, lang::get_phrase(156));
        } else {
            $smt = $conn->prepare("INSERT INTO `users` (`name`, `password`, `email`, `ip`, `access_level`) VALUES (?, ?, ?, ?, ?)",);
            if($smt->execute([
                $name,
                encrypt::user_password($password),
                $email,
                $ip,
                'admin',
            ])) {
                self::setting();
                self::add_first_news();
                board::notice(true, lang::get_phrase(157));
            }
        }
    }

    static public function exist_admin() {
        if(!file_exists($_SERVER["DOCUMENT_ROOT"] . '/src/config/db.php')) {
            return false;
        }
        $sql = 'SELECT * FROM users WHERE access_level = "admin"';
        require_once $_SERVER["DOCUMENT_ROOT"] . "/src/config/db.php";
        $conn = self::test_connect_mysql(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        return $conn->query($sql)->fetch();
    }

    static public function setting() {
        require_once $_SERVER["DOCUMENT_ROOT"] . "/src/config/db.php";
        $conn = self::test_connect_mysql(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $smt = $conn->prepare("INSERT INTO `config` (`template`, `timeout_statistic`, `language_default`, `enable_game_chat`, `screen_enable`, `max_user_count_screenshots`, `max_count_all_screenshots`, `forum_enable`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",);
        $smt->execute([
            'default',
            60,
            'ru',
            0,
            0,
            30,
            300,
            0,
        ]);
    }

    static private function add_first_news(): void {
        $txt = lang::get_phrase(158);
        require_once $_SERVER["DOCUMENT_ROOT"] . "/src/config/db.php";
        $conn = self::test_connect_mysql(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $smt = $conn->prepare('INSERT INTO `pages` (`is_news`, `name`, `description`) VALUES (1, ?, ?);');
        $smt->execute([
            lang::get_phrase(159),
            $txt,
        ]);
    }
}