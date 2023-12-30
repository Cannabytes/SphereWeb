<?php

namespace Ofey\Logan22\model\bonus;

use Exception;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\image\client_icon;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\template\async;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\player_account;

class bonus {

    //Создаем коды
    /**
     * @throws Exception
     */
    public static function genereateCode() {
        validation::user_protection("admin");
        $prefix = $_POST["prefix"] ?? "";
        $itemid = isset($_POST['itemid']) && $_POST['itemid'] !== "" ? $_POST['itemid'] : board::notice(false, "Не указан предмет");
        $enchant = $_POST["enchant"] ?? 0;
        $minCount = $_POST["minCount"] ?? 1;
        $maxCount = $_POST["maxCount"] ?? 1;
        $minCodeSymbols = $_POST["minCodeSymbols"] ?? 5;
        $maxCodeSymbols = $_POST["maxCodeSymbols"] ?? 8;
        $countGenBonusCode = $_POST["countGenBonusCode"] ?? 100;
        $start_date_code = isset($_POST['start_date_code']) && $_POST['start_date_code'] !== "" ? $_POST['start_date_code'] : board::notice(false, "Не указана начальная дата действия кода");
        $end_date_code = isset($_POST['end_date_code']) && $_POST['end_date_code'] !== "" ? $_POST['end_date_code'] : board::notice(false, "Не указана конечная дата действия кода");

        $server_id = auth::get_default_server();

        $arrCodeInDB = sql::getRows("SELECT code FROM bonus_code WHERE server_id = ?", [$server_id]);
        $listArray = array_column($arrCodeInDB, "code");
        $arrCode = self::generateRandomStrings($countGenBonusCode, $minCodeSymbols, $maxCodeSymbols, $listArray, $prefix);

        $insertValues = [];
        $valuePlaceholder = "(?, ?, ?, ?, ?, ?, ?)";
        $valuesPlaceholder = implode(", ", array_fill(0, count($arrCode), $valuePlaceholder));
        foreach ($arrCode as $code) {
            $count = mt_rand($minCount, $maxCount);
            $insertValues[] = $server_id;
            $insertValues[] = $code;
            $insertValues[] = $itemid;
            $insertValues[] = $count;
            $insertValues[] = $enchant;
            $insertValues[] = $start_date_code;
            $insertValues[] = $end_date_code;
        }
        $sql = "INSERT INTO `bonus_code` (`server_id`, `code`, `item_id`, `count`, `enchant`, `start_date_code`, `end_date_code`) VALUES $valuesPlaceholder";
        $ins = sql::run($sql, $insertValues);
        if (!$ins) {
            board::notice(false, "Не удалось добавить коды в базу");
        }
        echo json_encode($arrCode);
    }

    public static function generateRandomStrings($count, $minLength, $maxLength, $listArray, $prefix) {
        $strings = [];

        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $charactersLength = strlen($characters);

        while (count($strings) < $count) {
            $length = rand($minLength, $maxLength);
            $randomString = $prefix;

            for ($j = 0; $j < $length; $j++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            if (!in_array($randomString, $strings) && !in_array($randomString, $listArray)) {
                $strings[] = $randomString;
            }
        }

        return $strings;
    }



    public static function getCode($code) {
        $bonus = sql::getRow("SELECT * FROM bonus_code WHERE code = ?", [$code]);
        if (!$bonus) {
            board::notice(false, lang::get_phrase("code_not_found"));
        }
        //Проверка истечения времени даты бонуса
        if (time() > strtotime($bonus['end_date_code'])) {
            board::notice(false, lang::get_phrase("code_dead"));
        }

        self::addToInventory($bonus['server_id'], $bonus['item_id'], $bonus['count'], $bonus['enchant'], $bonus['phrase']);
        $itemInfo = client_icon::get_item_info($bonus['item_id'], false);
        sql::sql("DELETE FROM bonus_code WHERE id = ?", [$bonus['id']]);
        $name = $bonus['enchant'] ? $itemInfo['name'] . " +" . $bonus['enchant'] : $itemInfo['name'];
        board::response(
            "bonus",
            [
                "message" => lang::get_phrase("item_to_sphere_inventory"),
                "icon" => $itemInfo['icon'],
                "name" => $name,
                "count" => $bonus['count'],
            ]);
    }

    public static function addToInventory($server_id, $item_id, $count, $enchant, $phrase): void {
        $ins = sql::run("INSERT INTO `bonus` (`user_id`, `server_id`, `item_id`, `count`, `enchant`, `phrase`) VALUES (?, ?, ?, ?, ?, ?)", [
            auth::get_id(),
            $server_id,
            $item_id,
            $count,
            $enchant,
            $phrase,
        ]);
        if (!$ins) {
            board::notice(false, lang::get_phrase(487));
        }
    }

    public static function addBonusPlayer($object_id, $char_name = null) {
        if($char_name == null){
            board::notice(false, "Нет ника");
        }
        $bonusData = self::itemObjectData($object_id);
        if (!$bonusData) {
            board::notice(false, lang::get_phrase(488));
        }
        if ($bonusData['user_id'] != auth::get_id()) {
            board::notice(false, lang::get_phrase(489));
        }
        if($bonusData['issued']){
            board::notice(false, lang::get_phrase(174));
        }
        $server_id = $bonusData['server_id'];
        $item_id = $bonusData['item_id'];
        $item_count = $bonusData['count'];
        $item_enchant = $bonusData['enchant'];

        $server_info = server::server_info($server_id);
        if (!$server_info) {
            board::notice(false, lang::get_phrase(150));
        }

        $player_info = player_account::is_player($server_info, [$char_name]);
        $player_info = $player_info->fetch();
        //Проверяем что аккаунт пренадлежит пользователю
        //это нужно чтоб пользователь, не отправил "левым" бонус.
        $user = player_account::get_show_characters_info($player_info['login']);
        if ($user == null or $user["email"] != auth::get_email()) {
            board::notice(false, lang::get_phrase(490));
        }
        if (!$player_info) board::notice(false, lang::get_phrase(151, $char_name));
        $player_id = $player_info["player_id"];
        $is_stack = client_icon::is_stack($item_id);
        //Если для выдачи предмета, персонаж должен быть ВНЕ игры
        if ($server_info['collection_sql_base_name']::need_logout_player_for_item_add()) {
            if ($player_info["online"]) {
                board::notice(false, lang::get_phrase(153, $char_name));
            }
            if ($is_stack) {
                $checkPlayerItem = player_account::check_item_player($server_info, [
                    $item_id,
                    $player_id,
                ]);
                $checkPlayerItem = $checkPlayerItem->fetch();
                if ($checkPlayerItem) {
                    player_account::update_item_count_player($server_info, [
                        ($checkPlayerItem['count'] + $item_count),
                        $checkPlayerItem['object_id'],
                    ]);
                } else {
                    donate::add_item_max_val_id($server_info, $player_id, $item_id, $item_count);
                }
            } else {
                donate::add_item_max_val_id($server_info, $player_id, $item_id, $item_count);
            }
        } else {
            $ok = player_account::add_item($server_info, [
                $player_id,
                $item_id,
                $item_count,
                $item_enchant,
            ]);
            if (!$ok) {
                board::notice(false, lang::get_phrase("Отправка не произошла"));
            }
        }
        sql::run("UPDATE `bonus` SET `issued` = 1 WHERE `id` = ?", [$object_id]);
//        sql::run("UPDATE `bonus` SET `issued` = 1 WHERE `id` = ?", [$object_id]);
        auth::setBonus();
        $async = new async("basic/base.html");
        $async->block("inventory", "inventory", "replace", true);
        $async->block("title", "title");
        $async->send();

        board::notice(true, lang::get_phrase(243));
    }

    private static function itemObjectData($object_id) {
        return sql::getRow("SELECT * FROM bonus WHERE id = ?", [$object_id]);
    }

}