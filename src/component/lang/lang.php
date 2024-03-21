<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 30.08.2022 / 20:15:10
 */

namespace Ofey\Logan22\component\lang;

use Ofey\Logan22\component\config\config;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\component\redirect;
use Ofey\Logan22\component\session\session;

class lang {

    private static array $lang_array = [];

    //Загрузка языкового пакета шаблона
    private static array $pluginCache = [];

    public static function load_template_lang_packet($tpl) {
        $lang_name = self::lang_user_default();
        $langs_array = require $tpl;
        if(array_key_exists($lang_name, $langs_array)) {
            self::$lang_array = array_merge(self::$lang_array, $langs_array[$lang_name]);
        }
    }

    //Смена языка
    public static function set_lang($lang): void {
        if (in_array($lang, LANG_USE)) {
            if (self::name($lang)) {
                session::add("lang", $lang);
            }
        }
        redirect::location($_SERVER['HTTP_REFERER'] ?? "/main");
    }

    private static function name($lang = LANG_DEFAULT) {
        if(empty($lang)) {
            error_log("Language name is empty");
            return null;
        }
        $filename = fileSys::get_dir("/src/component/lang/package/{$lang}.php");
        if(!empty($filename) && file_exists($filename)) {
            $lang_array = include $filename;
            return $lang_array['lang_name'] ?? null;
        }
        error_log("File $filename not found");
        return null;
    }

    public static function load_package($dir = null): void {
        $lang = $_SESSION['lang'] ?? LANG_DEFAULT;
        if ($dir == null) {
            self::$lang_array = require fileSys::get_dir("/src/component/lang/package/{$lang}.php");
        }
    }

    /**
     * Возвращается массив языков с параметрами
     * $remove_lang = название языка, которое удалим из списка
     *
     * @return array
     */
    public static function lang_list($remove_lang = null, $onlyLang = false): array {
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
        foreach(array_intersect($lngs, LANG_USE) as $lng) {
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

    protected static array $cache = [];

    /**
     * @param $key - передаем название строки (индикатор/ключ)
     * @param $values - список заменяющих слов
     *
     * @return string
     *
     * Получение языковой фразы
     */
    public static function get_phrase($key, ...$values): string {
        $is_plugin = false;
        if (!array_key_exists($key, self::$lang_array)) {
            $phrase = self::get_phrase_plugin($key);
            if (!$phrase) {
                return "[Not phrase «{$key}»]";
            }
            $is_plugin = true;
        }
        if (!$is_plugin) {
            if (array_key_exists($key, self::$cache)) {
                return sprintf(self::$cache[$key], ...$values);
            }
            $phrase = self::$lang_array[$key];
        }

        // Проверяем, достаточно ли аргументов передано
        $missing_values_count = max(0, substr_count($phrase, '%s') - count($values));
        $default_values = array_fill(0, $missing_values_count, ''); // Заполняем массив значениями по умолчанию

        // Дополняем массив значений по умолчанию переданными значениями
        $values = array_merge($values, $default_values);

        $result = vsprintf($phrase, $values);
        if (empty($values)) {
            self::$cache[$key] = $result;
        }
        return $result;
    }


    public static function get_phrase_plugin($key) {
        if(!empty(self::$pluginCache)){
            if (array_key_exists($key, self::$pluginCache)) {
                return self::$pluginCache[$key];
            }
        }
        $customs = fileSys::dir_list("custom/plugins");
        foreach ($customs as $custom) {
            $file = fileSys::localdir("custom/plugins/" . $custom . "/lang/" . self::lang_user_default() . ".php");
            if (file_exists($file)) {
                $langArray = include $file;
                self::$pluginCache = array_merge(self::$pluginCache, $langArray);
            }
        }
        $components = fileSys::dir_list("src/component/plugins");
        foreach ($components as $component) {
            $file = fileSys::localdir("src/component/plugins/" . $component . "/lang/" . self::lang_user_default() . ".php");
            if (file_exists($file)) {
                $langArray = include $file;
                self::$pluginCache = array_merge(self::$pluginCache, $langArray);
            }
        }
        if(!empty(self::$pluginCache)){
            if (array_key_exists($key, self::$pluginCache)) {
                return self::$pluginCache[$key];
            }
        }
        return false;
    }

    //Язык пользователя по умолчанию
    public static function lang_user_default(): string {
        $lang_name = $_SESSION['lang'] ?? LANG_DEFAULT;
        $_SESSION['lang'] = mb_strtolower($lang_name);
        return $_SESSION['lang'];
    }

    public static function show_all_lang_package() {
        return require "src/component/lang/package/" . self::lang_user_default() . ".php";
    }
}