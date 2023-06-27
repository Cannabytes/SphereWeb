<?php

namespace Ofey\Logan22\model\bonus;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\image\client_icon;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\player_account;

class bonus {

    public static function addBonusPlayer($object_id, $char_name) {
        $bonusData = self::itemObjectData($object_id);
        if (!$bonusData) {
            board::notice(false, "Бонусный предмет не найден");
        }
        if ($bonusData['user_id'] != auth::get_id()) {
            board::notice(false, "Запрещенное действие");
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
            board::notice(false, "Получать бонус может только владелец аккаунта");
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
            player_account::add_item($server_info, [
                $player_id,
                $item_id,
                $item_count,
                $item_enchant,
            ]);
        }
        sql::run("UPDATE `bonus` SET `issued` = 1 WHERE `id` = ?", [$object_id]);
        board::notice(true, "Добавлено");
    }

    private static function itemObjectData($object_id) {
        return sql::getRow("SELECT * FROM bonus WHERE id = ?", [$object_id]);
    }

}