<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 06.09.2022 / 22:41:41
 */

namespace Ofey\Logan22\component\alert;

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\controller\page\error;
use Ofey\Logan22\template\tpl;

class board {

    private static $var = [];

    /**
     * Использовать для аякс уведомлений, когда нужно вернуть результат и сообщение
     */
    public static function notice(bool $ok, string $message = null, int $flags = 0) {
        //Проверка на аякс запрос
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            self::alert([
                'type' => 'notice',
                'ok' => $ok,
                'message' => $message,
            ], $flags);
        }
        exit;
    }

    public static function success(string $message = null, int $flags = 0): void {
        self::notice(true, $message, $flags);
    }

    public static function error(string $message = null, int $flags = 0): void {
        self::notice(false, $message, $flags);
    }

    /**
     * В функцию передаем массив данных, которые мы будем возвращать JSON хэдэром
     * используется для аякс ответов.
     */
    public static function alert(array $arr = [], int $flags = 0) {
        header('Content-Type: application/json; charset=utf-8');
        if (!$arr) {
            exit(json_encode(lang::get_phrase(255)));
        }
        echo json_encode($arr, $flags);
        exit();
    }

    public static function html(string $html, string $title = "") {
        header('Content-Type: application/json; charset=utf-8');
        $arr = [
            'content' => $html,
            'title' => $title,
        ];
        $arr = array_merge(self::$var, $arr);
        echo json_encode($arr, JSON_UNESCAPED_UNICODE);
        exit();
    }

    public static function response($type, $arr = []): void {
        $arr['type'] = $type;
        echo json_encode($arr, JSON_UNESCAPED_UNICODE);
        exit();
    }


}
