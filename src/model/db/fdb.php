<?php

namespace Ofey\Logan22\model\db;

use Exception;
use PDO;
use PDOException;

class fdb {

    /**
     * @var PDO
     */
    static private PDO $db;
    /**
     * @var null
     */
    protected static     $instance     = null;
    static public bool   $error        = false;
    static public string $messageError = '';

    /**
     * DB constructor.
     *
     * @throws Exception
     */
    public static function connect() {
        if(self::$instance === null) {
            try {
                if(!file_exists('src/config/forum.php')) {
                    echo 'Need create connect to forum db';
                    die();
                }
                require_once 'src/config/forum.php';
                self::$db = new PDO('mysql:host=' . FORUM_HOST . ';dbname=' . FORUM_NAME, FORUM_USER, FORUM_PASSWORD, $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                    // turn off emulation mode for "real" prepared statements
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
                ]);
                return self::$db;
            } catch(PDOException $e) {
                self::$error = true;
                self::$messageError = "Ошибка соединения с БД - " . $e->getMessage();
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
    public static function run($query, $args = []) {
        if(!self::connect()) {
            self::$error = true;
            self::$messageError = "Ошибка соединения с БД";
            return false;
        }
        try {
            if(!$args) {
                return self::query($query);
            }
            $stmt = self::prepare($query);
            $stmt->execute($args);
            return $stmt;
        } catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }
        return false;
    }

    public static function interpolateQuery($query, $params) {
        $keys = [];
        $values = $params;

        # build a regular expression for each parameter
        foreach($params as $key => $value) {
            if(is_string($key)) {
                $keys[] = '/:' . $key . '/';
            } else {
                $keys[] = '/[?]/';
            }

            if(is_string($value))
                $values[$key] = "'" . $value . "'";

            if(is_array($value))
                $values[$key] = "'" . implode("','", $value) . "'";

            if(is_null($value))
                $values[$key] = 'NULL';
        }

        $query = preg_replace($keys, $values, $query);

        return $query;
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