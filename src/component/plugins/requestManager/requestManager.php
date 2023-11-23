<?php

namespace Ofey\Logan22\component\plugins\requestManager;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\image\crest;
use Ofey\Logan22\controller\page\error;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sdb;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\template\tpl;

class requestManager {

    static string $namespace = "Ofey\Logan22\component\base\source\\";

    public function show($server = null): void {
        validation::user_protection("admin");
        $config = require_once __DIR__ . "/settings.php";
        if(!$config['PLUGIN_ENABLE']) {
            error::error404("Плагин отключен");
        }

        if ($server != null) {
            $l2jBases = [];
            $serverInfo = server::get_server_info($server);
            $class_name = $serverInfo['collection_sql_base_name'];
            if (class_exists($class_name)) {
                $methods = get_class_methods($class_name);
                foreach ($methods as $method) {
                    if ($method == '__construct' or $method == "hash" or $method == "chronicle" or $method == "need_logout_player_for_item_add") continue;
                    $sql = call_user_func_array(array($class_name, $method), array());
                    $l2jBases[] = new structL2j($method, $sql);
                }
            } else {
                echo 'Класс не найден.';
            }
            tpl::addVar("server", $serverInfo);
            tpl::addVar("l2jBases", $l2jBases);
        }
        tpl::displayPlugin("/requestManager/tpl/requestManager.html");
    }

    public function query() {
        validation::user_protection("admin");
        $sql = $_POST['sql_query'] ?? board::error("Не указан запрос");
        $params = [];
        $server_id = $_POST['server_id'] ?? board::error("Не указан сервер");
        $config = require_once __DIR__ . "/settings.php";
        if(!$config['PLUGIN_ENABLE']) {
           return false;
        }

        if (!empty($_POST['params'])) {
            foreach ($_POST['params'] as $key => $value) {
                if ($value == '') {
                    echo json_encode([
                        "type" => "error",
                        "message" => "Пустое значение «{$key}» параметра",
                    ]);
                    exit;
                }
            }
            $params = array_values($_POST['params']);
        }

        //Список игровых серверов
        $info = server::get_server_info($server_id);
        sdb::set_server_id($server_id);
        sdb::set_type('game');
        sdb::set_connect($info['game_host'], $info['game_user'], $info['game_password'], $info['game_name'], $info['game_port']);
        $sdbRequest = sdb::run($sql, $params, false);

        //Если запрос успешный
        if (!$sdbRequest) {
            echo json_encode([
                "type" => "error",
                "message" => sdb::errorMessage(),
            ]);
            return;
        }

        $rows = $sdbRequest->rowCount();
        $fetchAll = $sdbRequest->fetchAll();
        if (empty($fetchAll)) {
            echo json_encode([
                "type" => "success",
                "rows" => $rows,
                "data" => [],
            ]);
            return;
        }
        foreach ($fetchAll as $key => $value) {
            if (isset($value['clan_crest'])) {
                $fetchAll[$key]['clan_crest'] = crest::get_clan_crest_base64($fetchAll[$key]['clan_crest']);
            }
            if (isset($value['alliance_crest'])) {
                $fetchAll[$key]['alliance_crest'] = crest::get_clan_crest_base64($fetchAll[$key]['alliance_crest']);
            }
        }

        $table_structure = array_keys($fetchAll[0]);

        $result = [
            "type" => "success",
            "table_structure" => $table_structure,
            "rows" => $rows,
            "data" => $fetchAll,
        ];
        echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    }

}

class structL2j {
    public string $method_name, $sql;
    public array $params;

    public function __construct(string $method_name, string $sql) {
        $this->method_name = $method_name;
        $this->sql = $sql;
        $this->params = self::parse_sql_query($sql);

    }

    static function parse_sql_query(string $sql): array {
        preg_match('/^\s*([^\s]+)/', $sql, $matches);
        $sqlType = $matches[1];
        return match ($sqlType) {
            "SELECT" => self::SELECT($sql),
            "INSERT" => self::INSERT($sql),
            "UPDATE" => self::UPDATE($sql),
            default => [],
        };
    }

    private static function SELECT($sql) {
        $pattern = '/\b(?:WHERE|AND)\s+(`?)([^\s`=]+)\1\s*=\s*\?/i';
        preg_match_all($pattern, $sql, $matches);
        if (isset($matches[2])) {
            return $matches[2];
        }
        return [];
    }

    private static function INSERT($sql) {
        $matches = [];
        preg_match('/INSERT INTO \S+ \((.*?)\) VALUES \((.*?)\)/', $sql, $matches);
        if (count($matches) !== 3) {
            return [];
        }
        $columns = explode(',', $matches[1]);
        $values = explode(',', $matches[2]);
        $placeholders = [];
        foreach ($columns as $index => $column) {
            $column = trim($column, "` "); // Убираем обратные кавычки и пробелы
            $value = trim($values[$index]);
            if (str_contains($value, '?')) {
                $placeholders[] = $column; // Добавляем название переменной без обратных кавычек в массив
            }
        }
        return $placeholders;
    }

    private static function UPDATE($sql) {
        $matches = [];
        preg_match('/UPDATE \S+ SET (.*?) WHERE (.*)/', $sql, $matches);
        if (count($matches) !== 3) {
            return [];
        }
        $setClause = $matches[1];
        $whereClause = $matches[2];

        preg_match_all('/`?(\w+)`\s*=\s*\?/', $setClause . $whereClause, $placeholders);

        if (!isset($placeholders[1])) {
            return [];
        }

        return $placeholders[1];
    }


}