<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 20.09.2022 / 11:01:02
 */

namespace Ofey\Logan22\component\image;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sql;

class client_icon {

    /**
     * Возращает true если предмет стыкуемый
     * @return bool
     * @throws \Exception
     */
    public static function is_stack($item_id): bool {
        $consume_type = sql::run("SELECT `consume_type` FROM items_data WHERE item_id = ? LIMIT 1", [$item_id], true)->fetchColumn();
        if ($consume_type === "consume_type_asset" || $consume_type === "consume_type_stackable") {
            return true;
        }
        return false;
    }

    public static function get_item_info($item_id = 0, $json = true){
        validation::user_protection("admin");
        if($item_id === 0) {
            $item_id = $_POST['itemID'] ?? null;
            if($item_id === null) {
                board::notice(false, "Не передано значение ID предмета");
            }
        }
        $item = sql::run("SELECT * FROM items_data WHERE item_id = ? LIMIT 1", [$item_id], true)->fetch();
        if($item === false) {
            board::notice(false, "Предмет не найден");
        }
        $item['icon'] = self::icon($item['icon']);
        if($json){
            echo json_encode($item, JSON_UNESCAPED_UNICODE);
        }
        return $item;
    }

    public static function icon($fileIcon = null){
        return file_exists("uploads/images/icon/" . $fileIcon . ".webp") && $fileIcon != null ? "/uploads/images/icon/" . $fileIcon . ".webp" : "/uploads/images/icon/NOIMAGE.webp";
    }

}