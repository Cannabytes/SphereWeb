<?php

namespace Ofey\Logan22\model\db;

use Exception;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\controller\page\error;
use Ofey\Logan22\template\tpl;
use PDO;
use PDOException;

class sdb {

    /**
     * @var PDO
     */
    static private $db = [];

    public static function get_error() {
        return self::$db[self::get_server_id()][self::get_type()]->errorInfo();
    }

    /**
     * @var null
     */
    protected static      $instance  = null;
    static private int    $server_id = 0;
    static private string $type;

    public static function set_server_id(int $server_id) {
        self::$server_id = $server_id;
    }

    public static function get_server_id(): int {
        return self::$server_id;
    }

    public static function set_type($type = 'login') {
        self::$type = $type;
    }

    public static function get_type(): string {
        return self::$type;
    }

    public static string $host, $user, $pass, $name;

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
        if(self::$instance === null) {
            try {
                self::$db[self::get_server_id()][self::get_type()] = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$name, self::$user, self::$pass, $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_TIMEOUT => 1,
                ]);
                return self::$db[self::get_server_id()][self::get_type()];
            } catch(PDOException $e) {
//                echo "Ошибка соединения с БД - " . $e->getMessage();
                return false;
            }
        }
        return self::$instance;
    }

    public static function query($stmt) {
        try {
            return self::$db[self::get_server_id()][self::get_type()]->query($stmt);
        } catch (PDOException $e) {
            // handle the error here
            self::$error = true;
            self::$errorMessage = $e->getMessage();
            return false;
        }
    }

    public static function prepare($stmt) {
        return self::$db[self::get_server_id()][self::get_type()]->prepare($stmt);
    }

    static public function lastInsertId() {
        return self::$db[self::get_server_id()][self::get_type()]->lastInsertId();
    }

    private static bool $error = false;
    private static string $errorMessage;

    //Произошла ли ошибка
    public static function is_error() {
        return self::$error;
    }

    //Сообщение ошибки
    public static function errorMessage() {
        return self::$errorMessage;
    }

    /**
     * $showErrorPage - Если false в случае ошибки вернет JSON ответ ошибки с текстом,
     *                  Если true в случае ошибки будет загружена страница ошибки.
     *
     * @throws Exception
     */
    public static function run($query, $args = [], $showErrorPage = true) {
        self::$error = false;
        self::$errorMessage = "";
        if(!self::connect()) {
            self::$error = true;
            self::$errorMessage = "Not connect to db";
            return [
                'error' => 'Not connect to db',
            ];
        }
        try {
            if(!$args) {
                return self::query($query);
            }
            $stmt = self::prepare($query);
            $stmt->execute($args);
            return $stmt;
        } catch(PDOException $e) {
            if($showErrorPage) {
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
    public static function getRows($query, $args = []) {
        return self::run($query, $args)->fetchAll();
    }

    /**
     * @param       $query
     * @param array $args
     *
     * @return mixed
     */
    public static function getValue($query, $args = []) {
        $result = self::getRow($query, $args);
        if(!empty($result)) {
            $result = array_shift($result);
        }
        return $result;
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