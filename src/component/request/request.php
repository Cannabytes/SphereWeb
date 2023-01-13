<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 02.01.2023 / 3:56:52
 */

namespace Ofey\Logan22\component\request;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;

/**
 * Класс для обработки входящих POST запросов
 */
class request {

    static request_config $config;
    public static array   $settingValue = [];

    /**
     * @param $value
     * @param $config
     *
     * @return void
     *
     * Добавляет настройки
     * Ключ -> конфиг (селф класс)
     */
    public static function setting($key, request_config $config = new request_config()): mixed {
        self::$config = $config;
        foreach($_POST as $name => &$value) {
            if($name != $key)
                continue;
            self::required($name, $value);
            self::min($name, $value);
            self::max($name, $value);
            self::minValue($name, $value);
            self::maxValue($name, $value);
            self::rules($name, $value);
            self::isEmail($name, $value);
            self::isURL($name, $value);
            return $value;
        }
        board::notice(false, "Не найдено значение реквеста : " . $key);
    }

    public static function checkbox($key): bool {
        if(isset($_POST[$key])){
            return true;
        }
        return false;
    }

    /**
     * @param $key
     * @param array $array
     *
     */
    public static function compare($key, array $array = []) {
        if(in_array($_POST[$key], $array)) {
            return $_POST[$key];
        }
        board::notice(false, "Вы не выбрали допустимое значение в поле $key");
    }



    /**
     * Принимает название настройки (импута) и возращает его настройки
     *
     * @return request_config
     */
    public static function request(): request_config {
        return self::$config;
    }

    private static function isEmail($name, $value): void {
        if(!self::request()->isEmail())
            return;
        if(self::request()->isURL())
            return;
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            board::notice(false, lang::get_phrase(291));
        }
    }

    private static function isURL($name, $value): void {
        if(!self::request()->isURL())
            return;
        if(self::request()->isEmail())
            return;
        if(self::request()->isNumber())
            return;
        if(!filter_var($value, FILTER_VALIDATE_URL)) {
            board::notice(false,"Адрес ссылки указан неверно");
        }
    }

    private static function maxValue($name, $value): void {
        if(self::request()->isEmail())
            return;
        if(!self::request()->isNumber())
            return;
        if(self::request()->isURL())
            return;
        if(is_numeric($value)) {
             if(self::request()->getMaxValue() < $value) {
                board::notice(false, lang::get_phrase(287, $name, self::request()->getMaxValue()));
            }
            $value = settype($value, 'int');
        }else{
            board::notice(false, lang::get_phrase(292, $name));
        }
    }

    private static function minValue($name, $value): void {
        if(self::request()->isEmail())
            return;
        if(!self::request()->isNumber())
            return;
        if(self::request()->isURL())
            return;
        if(is_numeric($value)) {
            if(self::request()->getMinValue() > $value) {
                board::notice(false, lang::get_phrase(293, self::request()->getMinValue(), $name));
            }
            $value = settype($value, 'int');
        }else{
            board::notice(false, lang::get_phrase(292, $name));
        }
    }

    private static function max($name, $value): void {
        if(self::request()->isEmail())
            return;
        if(self::request()->isNumber())
            return;
        if(self::request()->isURL())
            return;
        if(self::request()->getMax() < mb_strlen($value)) {
            board::notice(false, lang::get_phrase(286, $name, self::request()->getMax()));
        }
    }

    private static function min($name, $value): void {
        if(self::request()->isEmail())
            return;
        if(self::request()->isNumber())
            return;
        if(self::request()->isURL())
            return;
        if(self::request()->getMin() > mb_strlen($value)) {
            board::notice(false, lang::get_phrase(290, $name, self::request()->getMin(), self::request()->getMax()));
        }
    }

    private static function required($name, $value) {
        if(self::request()->isRequired()) {
            if(empty($value)) {
                board::notice(false, lang::get_phrase(288, $name));
            }
        }
    }

    private static function rules($name, $value): void {
        if(self::request()->isEmail())
            return;
        if(self::request()->isNumber())
            return;
        if(self::request()->isURL())
            return;
        if(self::request()->getRules() != "") {
            if(!preg_match(self::request()->getRules(), $value)) {
                board::notice(false, lang::get_phrase(289, $name, self::request()->getRules()));
            }
        }
    }


}
