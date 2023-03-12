<?php

namespace Ofey\Logan22\model\db;

use Exception;
use Ofey\Logan22\component\alert\board;
use PDO;
use PDOException;

class sql {

    /**
     * @var PDO
     */
    static private $db;
    /**
     * @var null
     */
    protected static $instance = null;
    static public bool $error = false;

    /**
     * DB constructor.
     *
     * @throws Exception
     */
    public static function connect() {
        if(self::$instance === null) {
            try {
                if(!file_exists('src/config/db.php')) {
                    header("Location: /install/db");
                    die();
                }
                require_once 'src/config/db.php';
                self::$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD, $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                    // turn off emulation mode for "real" prepared statements
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
                ]);
                return self::$db;
            } catch(PDOException $e) {
                echo "Ошибка соединения с БД - " . $e->getMessage();
                exit;
            }
        }
        return self::$instance;
    }

    public static function query($stmt) {
        return self::$db->query($stmt);
    }

    public static function prepare($stmt) {
        return self::$db->prepare($stmt);
    }

    static public function exec($query) {
        return self::$db->exec($query);
    }

    static public function lastInsertId() {
        return self::$db->lastInsertId();
    }

    /**
     * @throws Exception
      */
    public static function run($query, $args = [], $showJson = false) {
        if(!self::connect()) {
            echo 'Not connect to db';
            exit;
        }
        try {
            if(!$args) {
                return self::query($query);
            }
            $stmt = self::prepare($query);
            $stmt->execute($args);
            return $stmt;
        } catch(PDOException $e) {
            if($showJson){
                board::notice(false, $e->getMessage());
            }
            echo "Ошибка выполнения запроса!<br>";
            echo "Запрос: {$query}<br>";
            echo "Параметры: " . implode(", ",$args) . "<br>";
            echo "Ошибка: {$e->getMessage()}<br>";
            die();
//            throw new Exception($e);
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
       return self::run($query, $args);
    }
}