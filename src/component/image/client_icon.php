<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 20.09.2022 / 11:01:02
 */

namespace Ofey\Logan22\component\image;

use Exception;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\model\admin\validation;

class client_icon {
    private static array $arrItems;

    /**
     * Возращает true если предмет стыкуемый
     * @return bool
     * @throws Exception
     */
    public static function is_stack($item_id): bool {
//        $consume_type = sql::run("SELECT `consume_type` FROM items_data WHERE item_id = ? LIMIT 1", [$item_id], true)->fetchColumn();
        $consume_type = self::get_item_info($item_id);
        if ($consume_type === "consume_type_asset" || $consume_type === "consume_type_stackable") {
            return true;
        }
        return false;
    }

    public static function get_skill_info($skill_id = 0, $protected = true) {
        if ($protected) {
            validation::user_protection();
        }
        if ($skill_id === 0) {
            board::notice(false, "Не передано значение ID предмета");
        }
        $file = self::includeFileByRange($skill_id, "skills");
        if (!$file) {
            return [
                "skill_id" => $skill_id,
                "name" => "NoSkillName",
                "icon" => fileSys::localdir("/uploads/images/icon/NOIMAGE.webp"),
            ];
        }
        $itemArr = require $file;
        if (isset($itemArr[$skill_id])) {
            $item = $itemArr[$skill_id];
            $item['icon'] = self::icon($item['icon'], "skills");
            self::$arrItems = $itemArr;
            return $item;
        } else {
            return [
                "skill_id" => $skill_id,
                "name" => "NoSkillName",
                "icon" => fileSys::localdir("/uploads/images/icon/NOIMAGE.webp"),
            ];
        }
    }

    public static function get_item_info($item_id = 0, $json = true, $protected = true) {
        if ($protected) {
            validation::user_protection();
        }
        if ($item_id === 0) {
            $item_id = $_POST['itemID'] ?? null;
            if ($item_id === null) {
                board::notice(false, "Не передано значение ID предмета");
            }
        }
        if (isset($itemArr[$item_id])) {
            $item = $itemArr[$item_id];
            if ($json) {
                echo json_encode($item, JSON_UNESCAPED_UNICODE);
            }
            return $item;
        }
        $file = self::includeFileByRange($item_id);
        if (!$file) {
            if ($json) {
                board::notice(false, "Файл с информацией об предмете не найден");
            } else {
                return false;
            }
        }
        $itemArr = require $file;
        if (isset($itemArr[$item_id])) {
            $item = $itemArr[$item_id];
            $item['icon'] = self::icon($item['icon']);
            self::$arrItems = $itemArr;
            if ($json) {
                echo json_encode($item, JSON_UNESCAPED_UNICODE);
            }
            return $item;
        } else {
            if ($json) {
                board::notice(false, "Предмет не найден");
            } else {
                return [
                    "item_id" => $item_id,
                    "name" => "NoItemName",
                    "icon" => fileSys::localdir("/uploads/images/icon/NOIMAGE.webp"),
                ];
            }
        }
    }

    public static function icon($fileIcon = null, $object = "icon") {
        return file_exists(fileSys::get_dir("/uploads/images/{$object}/" . $fileIcon . ".webp")) && $fileIcon != null ? fileSys::localdir("/uploads/images/{$object}/" . $fileIcon . ".webp") : fileSys::localdir("/uploads/images/icon/NOIMAGE.webp");
    }

    private static function includeFileByRange($number, $object = "items"): string|false {
        $range = floor(($number - 1) / 100) * 100;
        if ($range < 0) {
            $range = 0;
        }
        $file = "{$range}-" . ($range + 99) . ".php";
        $file = fileSys::get_dir("/src/component/image/icon/{$object}/{$file}");
        if (file_exists($file)) {
            return $file;
        } else {
            return false;
        }
    }


}