<?php

namespace Ofey\Logan22\model\db;

use Exception;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\alert\logs;
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
                    return null;
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
        if(self::connect()===null) {
//            var_dump(debug_backtrace());
            echo 'Необходимо установить движок.<br><a href="/install">Нажми чтоб перейти на страницу установки.</a>';
            exit;
        }
        if(self::connect()===false) {
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
            logs::loggerSQL($query, $args, $e->getMessage());
            if($showJson){
                board::notice(false, $e->getMessage());
            }
            echo "Ошибка выполнения запроса!<br>";
            echo "Запрос: {$query}<br>";
            if(is_array($args)){
                echo "Параметры: " . implode(", ", $args) . "<br>";
            }else{
                echo "Параметры: " .  $args  . "<br>";
            }
            echo "Ошибка: {$e->getMessage()}<br>";
            die();
        }
    }

    /**
     * @param       $query
     * @param array $args
     *
     * @return mixed
     */
    public static function getRow($query, array $args = []) {
        return self::run($query, $args)->fetch();
    }

    /**
     * @param       $query
     * @param array $args
     *
     * @return array
     */
    public static function getRows($query, array $args = []) {
//        if(!is_array($args)){
//            $args = [$args];
//        }
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