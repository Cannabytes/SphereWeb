<?php

namespace Ofey\Logan22\model\db;

use Exception;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\controller\page\error;
use Ofey\Logan22\template\tpl;
use PDO;
use PDOException;

class sdb {

    public static string $host, $user, $pass, $name;
    /**
     * @var null
     */
    protected static $instance = null;
    /**
     * @var PDO
     */
    private static $db = [];
    private static bool $showErrorPage = false;
    private static int $server_id = 0;
    private static string $type;
    private static bool $error = false;
    private static ?string $errorMessage = null;

    public static function get_error() {
        return self::$db[self::get_server_id()][self::get_type()]->errorInfo();
    }

    public static function is_error(): ?string {
        if(self::$error){
            return self::$errorMessage;
        }
        return false;
    }

    public static function get_server_id(): int {
        return self::$server_id;
    }

    public static function set_server_id(int $server_id) {
        self::$server_id = $server_id;
    }

    public static function get_type(): string {
        return self::$type;
    }

    public static function set_type($type = 'login') {
        self::$type = $type;
    }

    public static function set_connect($host, $user, $pass, $name) {
        self::$host = $host;
        self::$user = $user;
        self::$pass = $pass ?? "";
        self::$name = $name;
        return self::connect();
    }

    /**
     * DB constructor.
     *
     * @throws Exception
     */
    public static function connect() {
        if (self::$instance === null) {
            try {
                self::$db[self::get_server_id()][self::get_type()] = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$name, self::$user, self::$pass, $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_TIMEOUT => 1,
                ]);
                return self::$db[self::get_server_id()][self::get_type()];
            } catch (PDOException $e) {
//                echo "Ошибка соединения с БД - " . $e->getMessage();
                return false;
            }
        }
        return self::$instance;
    }

    public static function lastInsertId() {
        return self::$db[self::get_server_id()][self::get_type()]->lastInsertId();
    }

    public static function errorMessage() {
        return self::$errorMessage;
    }

    public static function setShowErrorPage(bool $b): void {
        self::$showErrorPage = $b;
    }

    public static function isShowErrorPage(): bool {
        return self::$showErrorPage;
    }

    //Сообщение ошибки

    /**
     * @param       $query
     * @param array $args
     *
     * @return array
     */
    public static function getRows($query, $args = []) {
        return self::run($query, $args)->fetchAll();
    }


    // В случаи ошибки возвращает null и записывает ошибку в $errorMessage
    public static function run($query, $args = []) {
        self::$error = false;
        self::$errorMessage = null;
        if (!self::connect()) {
            self::$error = true;
            self::$errorMessage = "Not connect to DB";
            return null;
        }
        try {
            if (!$args) {
                return self::query($query);
            }
            $stmt = self::prepare($query);
            $stmt->execute($args);
            return $stmt;
        } catch (PDOException $e) {
            if (self::isShowErrorPage()) {
                tpl::addVar("title", "Ошибка");
                error::show($e);
            }
            board::notice(false, "Error: " . $e->getMessage());
            //            echo "Ошибка @:". $e->getMessage();
            //            echo "<br>";
            //            echo "Файл: ".  $e->getFile();
            //            var_dump($e->getTrace());
            //            echo "Линия: ".  $e->getTrace();
        }
    }

    private static function query($stmt) {
        try {
            return self::$db[self::get_server_id()][self::get_type()]->query($stmt);
        } catch (PDOException $e) {
            self::$error = true;
            self::$errorMessage = $e->getMessage();
            return false;
        }
    }

    public static function prepare($stmt) {
        return self::$db[self::get_server_id()][self::get_type()]->prepare($stmt);
    }

    /**
     * @param       $query
     * @param array $args
     *
     * @return mixed
     */
    public static function getValue($query, $args = []) {
        $result = self::getRow($query, $args);
        if (!empty($result)) {
            $result = array_shift($result);
        }
        return $result;
    }

    /**
     * @param       $query
     * @param array $args
     *
     * @return mixed
     */
    public static function getRow($query, $args = []) {
        return self::run($query, $args)->fetch();
    }

    /**
     * @param       $query
     * @param array $args
     *
     * @return array
     */
    public static function getColumn($query, $args = []) {
        return self::run($query, $args)->fetchAll(PDO::FETCH_COLUMN);
    }

    public static function sql($query, array $args = []) {
        self::run($query, $args);
    }


}