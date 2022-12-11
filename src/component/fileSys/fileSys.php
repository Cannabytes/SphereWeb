<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 08.09.2022 / 12:41:20
 */

namespace Ofey\Logan22\component\fileSys;

use Ofey\Logan22\config\config;

class fileSys {

    /**
     * @param $file
     * @param $content
     *
     * @return false|int
     *
     * Запись в JSON массива в файл
     */
    static public function put(string $dir, array $content) {
        $path = $dir . "/" . time() . ".json";
        if(!file_exists(dirname($path)))
            mkdir(dirname($path), 0777, true);
        return file_put_contents($path, json_encode($content, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    /**
     * Получает пути всех файлов и папок в указанной папке.
     *
     * @param string $dir Путь до папки (на конце со слэшем или без).
     * @param array  $options Опции директории.
     * Передаваемые данные в $options
     * bool basename - Возвращать путь только имя файла
     * string suffix - Суффикс из стройки, который будет удален
     * bool include_folders - Включить ли в список пути на папки?
     * bool recursive - Включить вложенные папки или нет?
     * string sort - DESC или ASC (по аналогии с SQL)
     * Параметр ASC (по умолчанию) устанавливает порядок сортирования во возрастанию, от меньших значений к большим.
     * Параметр DECS устанавливает порядок сортирования по убыванию, от больших значений к меньшим.
     * bool fetchAll - True Возвращает все результаты, False возвращает первый результат в выборке
     *
     * @return array Вернет массив путей до файлов/папок.
     */
    public static function get_dir_files(string $dir, array $options = []): array|string|int|false {
        //TODO: fetchAll переделать
        $options = [
            'basename' => $options['basename'] ?? false,
            'suffix' => $options['suffix'] ?? '',
            'include_folders' => $options['include_folders'] ?? false,
            'recursive' => $options['recursive'] ?? false,
            'sort' => $options['sort'] ?? false,
            'fetchAll' => (bool)$options['fetchAll'],
        ];
        if(is_dir($dir) == false) {
            $dir = dirname($dir);
        }
        $files = [];
        $dir = rtrim($dir, '/\\'); // удалим слэш на конце
        foreach(glob("$dir/{,.}[!.,!..]*", GLOB_BRACE) as $file) {
            if(is_dir($file)) {
                if($options['include_folders'])
                    $files[] = $file;
                if($options['recursive'])
                    $files = array_merge($files, call_user_func(__FUNCTION__, $file, $options['recursive'], $options['include_folders']));
            } else
                $files[] = $file;
        }
        if(empty($files)) {
            return false;
        }
        if($options['basename'] == true) {
            foreach($files as &$file) {
                $file = basename($file);
            }
        }
        if($options['suffix'] != null) {
            foreach($files as &$file) {
                $file = basename($file, $options['suffix']);
            }
        }
        if($options['sort'] == 'ASC') {
            krsort($files, SORT_NUMERIC);
        } else {
            ksort($files, SORT_NUMERIC);
        }
        if($options['fetchAll'] == false) {
            return array_shift($files);
        }
        return $files;
    }

    /**
     * Функция проверка отсчета времени
     *
     * @param          $eventTime - ЮниксТайм исходного события
     * @param int|null $second - Кол-во секунд
     *
     * @return bool
     */
    static public function is_timeout(int $eventTime, int $second = null): bool {
        return abs(time() - $eventTime) > $second;
    }

    /**
     * @param       $pathDir - Рабочая директория
     * @param false $decode - True JSON возвращается массивом, False - возвращается массив JSON как есть
     *
     * @return bool|string
     */
    static public function is_actual_stat_file($pathDir, bool $decode = false, $second = 60): bool|string {
        $statInfo = self::get_dir_files($pathDir, [
            'basename' => false,
            'suffix'   => '.json',
            'sort'     => 'ASC',
            'fetchAll' => false,
        ]);
        if(!self::is_timeout($statInfo, $second)) {
            $file_path = $pathDir . "/" . $statInfo . ".json";
            if(!file_exists($file_path)) {
                return false;
            }
            $jsonFile = file_get_contents($file_path);
            if(!$jsonFile) {
                echo 'Не удалось загрузить';
                return false;
            }
            if($decode) {
                return json_decode($jsonFile, true);
            }
            return $jsonFile;
        }
        return false;
    }

    /**
     * Список папок
     */
    static public function dir_list($dir = null): array|false {
        if($dir == null) {
            return false;
        }
        $dirList = [];
        if(is_dir($dir)) {
            if($dh = opendir($dir)) {
                while($dirName = readdir($dh)) {
                    if($dirName == '.' or $dirName == '..')
                        continue;
                    $dirList[] = $dirName;
                }
                closedir($dh);
            }
        }
        return $dirList;
    }

    /**
     * Список файлов в папке
     */
    static public function file_list($dir) {
        if($dir == null)
            return false;
        $skip = [
            '.',
            '..',
        ];
        $files = scandir($dir);
        $arr = [];
        foreach($files as $file) {
            if(!in_array($file, $skip))
                $arr[] =  $file;
        }
        return $arr;
    }
}