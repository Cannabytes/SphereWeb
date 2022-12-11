<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 05.09.2022 / 21:03:45
 */

namespace Ofey\Logan22\component\itemgame;

use Ofey\Logan22\model\db\sql;

class itemgame {

    static private array $item_memory = [];

    static private function get_memory($item_id) {
        foreach(self::$item_memory as $row) {
            if($item_id == $row['item_id']) {
                return $row;
            }
        }
        return false;
    }

    static private function memory_add($item) {
        self::$item_memory[] = $item;
    }

    static public function get_item_info($item_id) {
        $get_memory = self::get_memory($item_id);
        if($get_memory)
            return $get_memory;
        $item = sql::run("SELECT * FROM `items_data` WHERE item_id = ? LIMIT 1", [$item_id])->fetch();
        if($item == false) {
            return [
                'item_id'           => 'null',
                'icon'              => 'null',
                'name_en'           => 'null',
                'additionalname_en' => 'null',
                'description_en'    => 'null',
                'name_ru'           => 'null',
                'additionalname_ru' => 'null',
                'description_ru'    => 'null',
                'is_trade'          => 'null',
                'is_drop'           => 'null',
                'is_destruct'       => 'null',
                'crystal_type'      => 'null',
                'consume_type'      => 'null',
            ];
        }
        self::memory_add($item);
        return $item;
    }

    static private array $item  = [];
    static private bool  $mined = false;

    //Диприкейтед
    static public function get_item($id) {
        if(self::$mined == false) {
            $ok = self::item_list();
            if($ok == false) {
                return false;
            }
        }
        foreach(self::$item as $item) {
            if($item['id'] == $id) {
                return $item;
            }
        }
        return false;
    }

    //Диприкейтед
    static private function item_list() {
        $jsondata = file_get_contents("src/component/itemgame/item.json");
        if($jsondata == false) {
            self::$mined = false;
            return false;
        }
        self::$item = json_decode($jsondata, true);
        self::$mined = true;
        return true;
    }
}