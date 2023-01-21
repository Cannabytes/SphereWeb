<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 22.08.2022 / 22:09:47
 */

namespace Ofey\Logan22\model\db;

use Exception;
use PDO;
use PDOException;

class db_server {

    /**
     * @var PDO
     */
    public ?PDO $db = null;

    /**
     * @throws Exception
     */
    public function __construct($db_host, $db_user, $db_password, $db_name){
        return $this->connect($db_host, $db_user, $db_password, $db_name);
    }

    /**
     * DB constructor.
     *
     * @throws Exception
     */
    public function connect($db_host = null, $db_user = null, $db_password = null, $db_name = null) {
        if($this->db === null) {
            try {
                $this->db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_password, $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
                ]);
                return $this->db;
            } catch(PDOException $e) {
                echo "Ошибка соединения с БД - " . $e->getMessage();
                exit;
            }
        }
        return $this->db;
    }

    public function query($stmt) {
        return $this->db->query($stmt);
    }

    public function prepare($stmt) {
        return $this->db->prepare($stmt);
    }

    public function exec($query) {
        return $this->db->exec($query);
    }

    public function lastInsertId() {
        return $this->db->lastInsertId();
    }

    /**
     * @throws Exception
     */
    public function run($query, $args = []) {
        if($this->db == null) {
            echo 'Not connect to db';
            exit;
        }
        try {
            if(!$args) {
                return $this->query($query);
            }
            $stmt = $this->prepare($query);
            $stmt->execute($args);
            return $stmt;
        } catch(PDOException $e) {
            return [
              'ok' => false,
              'message' => $e->getMessage() ,
              'getCode' => $e->getCode(),
            ];
        }
    }

    /**
     * @param       $query
     * @param array $args
     *
     * @return mixed
     */
    public function getRow($query, $args = []) {
        return $this->run($query, $args)->fetch();
    }

    /**
     * @param       $query
     * @param array $args
     *
     * @return array
     */
    public function getRows($query, $args = []) {
        return $this->run($query, $args)->fetchAll();
    }

    /**
     * @param       $query
     * @param array $args
     *
     * @return mixed
     */
    public function getValue($query, $args = []) {
        $result = $this->getRow($query, $args);
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
    public function getColumn($query, $args = []) {
        return $this->run($query, $args)->fetchAll(PDO::FETCH_COLUMN);
    }

    public function sql($query, array $args = []) {
        $this->run($query, $args);
    }

}