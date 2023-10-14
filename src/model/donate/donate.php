<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 05.09.2022 / 17:41:12
 */

namespace Ofey\Logan22\model\donate;

use Exception;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\image\client_icon;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\request\request;
use Ofey\Logan22\component\request\request_config;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;

class donate {

    /**
     * @return array
     * @throws Exception
     * История платежей пользователя
     */
    static public function donate_history() {
        $donate = sql::getRows("SELECT user_id, item_id, amount, cost, char_name, date FROM donate_history WHERE user_id = ? AND server_id = ? ORDER BY id DESC", [
            auth::get_id(),
            auth::get_default_server(),
        ]);

        if (empty($donate))
            return [];

        $item_id_list = array_column($donate, 'item_id');
        $lex = sql::getRows("SELECT * FROM items_data WHERE `item_id` IN (" . implode(',', $item_id_list) . ");");

        $items = [];
        foreach ($donate as $item) {
            $item_id = $item['item_id'];
            foreach ($lex as $row) {
                if ($item_id == $row['item_id']) {
                    $items[] = array_merge($item, $row);
                }
            }
        }
        return $items;
    }

    /**
     * Список товаров для покупки за донат очки
     *
     * @return array
     * @throws Exception
     */
    static public function products() {
        $server_id = auth::get_default_server();
        if (!$server_id) {
            tpl::display("error/not_server.html");
        }
        $donate = sql::run("SELECT * FROM `donate` WHERE server_id = ? ORDER BY id DESC" , [
            $server_id,
        ])->fetchAll();
        $item_id_list = [];
        foreach ($donate as $item) {
            $item_id_list[] = $item['item_id'];
        }
        if (empty($item_id_list))
            return $item_id_list;
        $list = implode(', ', $item_id_list);
        $lex = sql::getRows("SELECT * FROM items_data WHERE `item_id` IN ({$list}); ");

        $items = [];
        foreach ($donate as $item) {
            $item_id = $item['item_id'];
            foreach ($lex as $row) {
                if ($item_id == $row['item_id']) {
                    $items[] = array_merge($item, $row);
                }
            }
        }
        return $items;
    }

    /*
     * Покупка предмета, передача предмета игровому персонажу
     */
    static public function transaction() {
        $id = $_POST['id'];
        $server_id = filter_input(INPUT_POST, 'server_id', FILTER_VALIDATE_INT);
        $user_value = filter_input(INPUT_POST, 'user_value', FILTER_VALIDATE_INT);
        if ($user_value <= 0) {
            board::notice(false, lang::get_phrase(255));
        }
        $char_name = trim($_POST['char_name']);
        if ($char_name == "") {
            board::notice(false, lang::get_phrase(148));
        }
        $donat_info = self::donate_item_info($id, $server_id);
        if (!$donat_info) {
            board::notice(false, lang::get_phrase(152));
        }
        $donat_info_cost = $donat_info['cost'];

        $donateInfo = require_once 'src/config/donate.php';
        $procentDiscount = donate::getBonusDiscount(auth::get_id());
        //Стоимость товара * на количество
        $cost_product = $donat_info_cost * $user_value;
        $decrease_factor = 1 - ($procentDiscount / 100);
        $cost_product *= $decrease_factor;
        if ($cost_product > auth::get_donate_point()) {
            board::notice(false, lang::get_phrase(149, $cost_product, auth::get_donate_point()));
        }
        $addToUserItems = $donat_info['count'] * $user_value;

        $server_info = server::server_info($server_id);
        if (!$server_info) {
            board::notice(false, lang::get_phrase(150));
        }

        $player_info = player_account::is_player($server_info, [$char_name]);
        $player_info = $player_info->fetch();
        if (!$player_info)
            board::notice(false, lang::get_phrase(151, $char_name));
        $player_id = $player_info["player_id"];

        $is_stack = client_icon::is_stack($donat_info['item_id']);

        //Если для выдачи предмета, персонаж должен быть ВНЕ игры
        if ($server_info['collection_sql_base_name']::need_logout_player_for_item_add()) {
            /**
             * Проверка чтоб игрок был оффлайн для выдачи предмета
             */
            if ($player_info["online"]) {
                board::notice(false, lang::get_phrase(153, $char_name));
            }

            /**
             * Нужно определить, это стыкуемый ли предмет
             */

            /**
             * Если предмет стакуем
             * Есть ли на персонаже X предмет N
             * Если есть, добавим к числу N+N предметов
             */
            if ($is_stack) {
                $checkPlayerItem = player_account::check_item_player($server_info, [
                    $donat_info['item_id'],
                    $player_id,
                ]);
                $checkPlayerItem = $checkPlayerItem->fetch();
                //Если предмет есть у игрока
                if ($checkPlayerItem) {
                    player_account::update_item_count_player($server_info, [
                        ($checkPlayerItem['count'] + $addToUserItems),
                        $checkPlayerItem['object_id'],
                    ]);
                } else {
                    self::add_item_max_val_id($server_info, $player_id, $donat_info['item_id'], $addToUserItems);
                }
            } else {
                self::add_item_max_val_id($server_info, $player_id, $donat_info['item_id'], $addToUserItems);
            }
        } else { //Если персонаж может быть в игре для выдачи предмета
            player_account::add_item($server_info, [
                $player_id,
                $donat_info['item_id'],
                $addToUserItems,
                0,
            ]);
        }

        self::taking_money($cost_product, auth::get_id());
        auth::set_donate_point(auth::get_donate_point() - $cost_product);

        sql::run("INSERT INTO `donate_history` (`user_id`, `item_id`, `amount`, `cost`, `char_name`, `server_id`, `date`) VALUES (?, ?, ?, ?, ?, ?, ?)", [
            auth::get_id(),
            $donat_info['item_id'],
            $addToUserItems,
            $cost_product,
            $char_name,
            $server_id,
            time::mysql(),
        ]);

        board::alert([
            'ok' => true,
            'message' => lang::get_phrase(304),
            'donate_bonus' => auth::get_donate_point(),
        ]);
    }

    /**
     * Получение информации о предмете из БД
     */
    static private function donate_item_info($item_id, $server_id) {
        return sql::run("SELECT id, item_id, count, cost FROM donate WHERE id = ? AND server_id = ?", [
            $item_id,
            $server_id,
        ])->fetch();
    }

    public static function add_item_max_val_id($server_info, $player_id, $donat_item_id, $addToUserItems, $enchantLevel = 0) {
        $max_obj_id = player_account::max_value_item_object($server_info)->fetch()['max_object_id'];
        player_account::add_item($server_info, [
            $player_id,
            time() - $max_obj_id - $player_id,
            $donat_item_id,
            $addToUserItems,
            $enchantLevel,
            "INVENTORY",
        ]);
    }

    //Уменьшение коинов
    public static function taking_money($dp, $user_id) {
        sql::run("UPDATE `users` SET `donate_point` = `donate_point`-? WHERE `id` = ?", [
            $dp,
            $user_id,
        ]);
    }

    public static function donate_history_pay_self() {
        $pays = sql::getRows("SELECT
                                donate_history_pay.point, 
                                donate_history_pay.pay_system, 
                                donate_history_pay.date
                            FROM
                                donate_history_pay
                            WHERE
                                donate_history_pay.user_id = ?
                            ORDER BY
                                donate_history_pay.id DESC", [
            auth::get_id(),
        ]);
        $trs = sql::getRows("SELECT
                                        log_transfer_spherecoin.*, 
                                        sender.`name` AS sender_name,
                                        receiver.`name` AS receiver_name
                                    FROM
                                        log_transfer_spherecoin
                                    LEFT JOIN
                                        users AS sender
                                        ON log_transfer_spherecoin.user_sender = sender.id
                                    LEFT JOIN
                                        users AS receiver
                                        ON log_transfer_spherecoin.user_receiving = receiver.id
                                    WHERE
                                        user_sender = ? OR
                                        user_receiving = ?
                                    ORDER BY
                                        log_transfer_spherecoin.id DESC", [auth::get_id(), auth::get_id()]);
        $result = array_merge($pays, $trs);
        usort($result, function ($a, $b) {
            return $a['date'] <=> $b['date'];
        });
        return array_reverse($result);
    }

    //Сумма зачисления денег с учетом курса валют конфига
    public static function currency(int|float $sum, string $currency): float|int {
        $config = require 'src/config/donate.php';
        return match ($currency) {
            "RUB" => ($sum / $config['coefficient']['RUB']) * $config['quantity'],
            "UAH" => ($sum / $config['coefficient']['UAH']) * $config['quantity'],
            "EUR" => ($sum / $config['coefficient']['EUR']) * $config['quantity'],
            default => $sum * $config['quantity'],
        };
    }


    //Возвращает процент скидки
    public static function getBonusDiscount($user_id) {
        $table = require 'src/config/donate.php';
        $amount = sql::run("SELECT SUM(point) AS `count` FROM donate_history_pay WHERE user_id = ? and sphere=0", [$user_id])->fetch()['count'] ?? 0;
        $rangeKey = null;
        $discountValue = null;
        $lastValue = null;
        $table = $table["discount"]['table'];
        $keys = array_keys($table);
        $firstKey = reset($keys);
        if ($amount < $firstKey) {
            return 0;
        } else {
            $reversedTable = array_reverse($table, true);
            foreach ($reversedTable as $key => $value) {
                if ($amount >= $key) {
                    $rangeKey = $key;
                    $discountValue = $value;
                    break;
                }
                $lastValue = $value;
            }
            if ($rangeKey && $discountValue) {
                return $discountValue;
            } else {
                return $lastValue;
            }
        }
    }

}