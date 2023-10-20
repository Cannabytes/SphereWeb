<?php

namespace Ofey\Logan22\component\alert;

use Exception;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;

class logs {

    //Сохранение в файл всех данных, которые приходят от платежных систем
    public static function loggerTransaction(string $payName, string $username, bool $sing, array $var): void {
        $json = json_encode(self::requestInfo(), JSON_PRETTY_PRINT);
        $date = date('H_i_s d-m-Y');

        $sing = var_export($sing, true);

        $directory = fileSys::get_dir("uploads/logs/transaction/{$payName}/{$username}/");
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $filePath = $directory . "{$date}_{$sing}.log";
        file_put_contents($filePath, $json);
    }

    private static function requestInfo() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $content = $_GET;
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = $_POST;
        } elseif ($_SERVER['REQUEST_METHOD'] === 'REQUEST') {
            $content = $_REQUEST;
        } else {
            return "null data request";
        }
        return $content;
    }

    //Сохраняем все ошибки, максимально все данные, чтоб потом мы могли разобрать и фиксануться

    /**
     * @throws Exception
     */
    public static function loggerSQL($query, $args, $comment = "") {
        $numPlaceholders = substr_count($query, '?');
        if (is_string($args)) {
            $args = [$args]; // Convert string to array
        }
        $numArgs = count($args);

        if ($numPlaceholders != $numArgs) {
            $comment = $comment . "\nНесоответствие количества плейсхолдеров ({$numPlaceholders}) и аргументов ({$numArgs})";
        }

        foreach ($args as $value) {
            if (is_string($value)) {
                $quotedValue = sql::connect()->quote($value);
                $query = preg_replace('/\?/', $quotedValue, $query, 1);
            } else {
                $query = preg_replace('/\?/', $value, $query, 1);
            }
        }

        self::loggerError($comment, "uploads/logs/sql/", $query, $args);
    }

    //Иногда формируемся неправильный SQL запрос, чтоб пресечь такие ошибки, будем сохранять запросы , которые были сформированы с ошибкой
    public static function loggerError(string $comment = "", string $directory = "uploads/logs/info/", mixed ...$params): void {
        $projectPath = $_SERVER['DOCUMENT_ROOT'];
        $dataRequest = self::requestInfo();
        $traceLog = [];
        $debug_backtrace = debug_backtrace();
        $countTrace = count($debug_backtrace);
        foreach ($debug_backtrace as $call) {
            if (isset($call['function'])) {
                $log = "";
                if (isset($call['file'])) {
                    $file = str_replace('\\', '/', realpath($call['file']));
                    $file = str_replace($projectPath, '', $file);
                    $log .= ' | file: ' . $file;
                }
                if (isset($call['line'])) {
                    $log .= ' | line: ' . $call['line'];
                }
                $traceLog[] = '#' . $countTrace . ' - Func: ' . $call['function'] . '()' . $log;
                $countTrace--;
            }
        }
        $traceLog = array_reverse($traceLog);
        array_pop($traceLog);

        if (auth::get_is_auth()) {
            $user = ["id" => auth::get_id(), "email" => auth::get_email(),];
        } else {
            $user = "Not auth";
        }

        $array = ["user" => $user, "request" => $dataRequest, "backtrace" => $traceLog, "URI" => $_SERVER['REQUEST_URI'],];

        if (!empty($comment)) {
            $array["comment"] = $comment;
        }

        if (!empty($params)) {
            $i = 1;
            foreach ($params as $param) {
                $array["param_info_" . $i++] = ["type" => gettype($param), "data" => $param,];
            }
        }

        $json = json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        list($microseconds, $seconds) = explode(' ', microtime());
        $microseconds = str_replace('.', '', $microseconds);
        $date = date('d-m-Y H_i_s' . '_' . $microseconds);
        $filePath = $directory . "/{$date}.log";
        file_put_contents($filePath, $json);
    }


}