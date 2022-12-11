<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 06.09.2022 / 22:41:41
 */

namespace Ofey\Logan22\component\alert;

class board {

    /**
     * В функцию передаем массив данных, которые мы будем возвращать JSON хэдэром
     * используется для аякс ответов.
     */
    static public function alert($arr = [], $flags = 0) {
        header('Content-Type: application/json; charset=utf-8');
        if(empty($arr)) {
            exit(json_encode("Передано пустое значение"));
        }
        echo json_encode($arr);
        exit();
    }

    /**
     *  Использовать для аякс уведомлений, когда нужно вернуть результат и сообщение
     */
    static public function notice(bool $ok, string $message, int $flags = 0) {
        self::alert([
            'ok'      => $ok,
            'message' => $message,
        ], $flags);
    }
}