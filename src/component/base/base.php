<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 20.08.2022 / 21:46:47
 */

namespace Ofey\Logan22\component\base;

class base {

    /**
     * @return array
     */
    static public function sql_base_source($filename = "*.php"): array {
        $filelist = glob("src/component/base/source/{$filename}");
        $arrFilename = [];
        foreach($filelist as $file) {
            $arrFilename[] = basename($file);
        }
        return $arrFilename;
    }

    //    static public array $base = [];

    //Возвращает запрос, и его параметры
    //TODO: сделать только чтение PHP файлов
    static public function get_sql_source($filename, $name) {
        require("src/component/base/source/{$filename}");
        return $collection[$name] ?? false;
    }
}