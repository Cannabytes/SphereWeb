<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 06.09.2022 / 22:41:41
 */

namespace Ofey\Logan22\component\alert;

use Ofey\Logan22\component\lang\lang;

class board {

    /**
     * В функцию передаем массив данных, которые мы будем возвращать JSON хэдэром
     * используется для аякс ответов.
     */
    static public function alert(array $arr = [], int $flags = 0) {
        header('Content-Type: application/json; charset=utf-8');
        if (!$arr) {
            exit(json_encode(lang::get_phrase(255)));
        }
        echo json_encode($arr, $flags);
        exit();
    }

    /**
     * Использовать для аякс уведомлений, когда нужно вернуть результат и сообщение
     */
    static public function notice(bool $ok, string $message = null, int $flags = 0) {
        self::alert([
            'ok'      => $ok,
            'message' => $message,
        ], $flags);
    }
}
