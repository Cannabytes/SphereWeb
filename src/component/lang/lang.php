<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 30.08.2022 / 20:15:10
 */

namespace Ofey\Logan22\component\lang;

use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\component\session\session;
use Ofey\Logan22\config\config;

class lang {

    static private array $lang_array = [];

    //Загрузка языкового пакета шаблона
    static public function load_template_lang_packet($tpl) {
        $lang_name = self::lang_user_default();
        $langs_array = require $tpl;
        if(array_key_exists($lang_name, $langs_array)) {
            self::$lang_array = array_merge(self::$lang_array, $langs_array[$lang_name]);
        }
    }

    //Смена языка
    static public function set_lang($lang): void {
        $allowLang = include 'src/config/lang.php';
        if (in_array($lang, $allowLang)) {
            if (self::name($lang)) {
                session::add("lang", $lang);
            }
        }
        redirect::location($_SERVER['HTTP_REFERER'] ?? "/main");
    }

    static private function name($lang = 'ru') {
        if(empty($lang)) {
            error_log("Language name is empty");
            return null;
        }
        $filename = $_SERVER['DOCUMENT_ROOT'] . "/src/component/lang/package/{$lang}.php";
        if(!empty($filename) && file_exists($filename)) {
            $lang_array = include $filename;
            return $lang_array['lang_name'] ?? null;
        }
        error_log("File $filename not found");
        return null;
    }

    static public function load_package(): void {
        $lang = $_SESSION['lang'] ?? 'ru';
        self::$lang_array = require $_SERVER['DOCUMENT_ROOT'] . "/src/component/lang/package/{$lang}.php";
    }

    /**
     * Возвращается массив языков с параметрами
     * $remove_lang = название языка, которое удалим из списка
     *
     * @return array
     */
    static public function lang_list($remove_lang = null, $onlyLang = false): array {
        $lngs = fileSys::get_dir_files("src/component/lang/package/", [
            'basename' => false,
            'suffix'   => '.php',
            'fetchAll' => true,
        ]);
        if($onlyLang) {
            return $lngs;
        }
        $lang_name = self::lang_user_default();
        $langs = [];
        $allowLang = include 'src/config/lang.php';
        foreach(array_intersect($lngs, $allowLang) as $lng) {
            if($lng == $remove_lang) {
                continue;
            }
            $isActive = $lng == $lang_name;
            $langs[] = [
                'lang'     => $lng,
                'name'     => self::name($lng),
                'isActive' => $isActive,
            ];
        }
        array_multisort(array_column($langs, 'isActive'), SORT_DESC, $langs);
        return $langs;
    }

    static protected array $cache = [];

    /**
     * @param $key - передаем название строки (индикатор/ключ)
     * @param $values - список заменяющих слов
     *
     * @return string
     *
     * Получение языковой фразы
     */
    static public function get_phrase($key, ...$values): string {
        if(!array_key_exists($key, self::$lang_array)) {
            return "[Not phrase «{$key}»]";
        }

        if(array_key_exists($key, self::$cache)) {
            return sprintf(self::$cache[$key], ...$values);
        }

        $string = self::$lang_array[$key];
        $result = sprintf($string, ...$values);
        self::$cache[$key] = $result;
        return $result;
    }

    //Язык пользователя по умолчанию
    static public function lang_user_default(): string {
        $lang_name = $_SESSION['lang'] ?? config::get_language_default();
        $_SESSION['lang'] = $lang_name;
        return $lang_name;
    }
}