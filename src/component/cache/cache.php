<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 16.09.2022 / 21:46:09
 */

namespace Ofey\Logan22\component\cache;

use Ofey\Logan22\component\fileSys\fileSys;

/**
 * Класс для часто обращаемых запросов в БД
 * Запись и сохранение JSON данных.
 */
class cache {

    static public function read($dir, $decode = false, $second = 60) {
        $actual = fileSys::is_actual_stat_file($dir, $decode, $second);
        if($actual)
            return json_decode($actual, true);
        return false;
    }

    /**
     * Сохранение массива
     *
     * @param dir        $dir
     * @param bool|array $last_message
     */
    static public function save(string $dir, bool|array $last_message = []) {
        if(!$last_message)
            return;
        fileSys::put($dir, $last_message);
    }
}