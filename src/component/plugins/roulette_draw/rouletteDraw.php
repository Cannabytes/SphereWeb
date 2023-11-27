<?php

namespace Ofey\Logan22\component\plugins\roulette_draw;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\image\client_icon;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\controller\page\error;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\bonus\bonus;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\auth\user;
use Ofey\Logan22\template\tpl;

class rouletteDraw {

    public function show_roulette_draw() {
        validation::user_protection();
        if (!server::get_server_info()) {
            tpl::display("error/not_server.html");
        }
        $config = include __DIR__ . "/config.php";

        $item_id_list = [];
        $list_of_draws = [];
        foreach ($config['list_of_draws'] as $draw) {
            if ($draw['server_id'] == auth::get_default_server()) {
                $list_of_draws = $draw['items'];
                break;
            }
        }
        if(empty($list_of_draws)){
            error::error404("Не настроен розыгрыш на этом сервере");
        }

        $rouletteDraw_count = $config['number_of_attempts_per_day'];
        $vRD = auth::get_user_variables("rouletteDraw");
        if ($vRD) {
            $rouletteDraw_count -= $vRD["val"];
            if (date("Y-m-d", strtotime($vRD["date_update"])) != date("Y-m-d")) {
                $rouletteDraw_count = $config['number_of_attempts_per_day'];
            }
        }

        foreach ($list_of_draws as $item) {
            $item_id_list[] = $item['item_id'];
        }
        if (empty($item_id_list))
            return $item_id_list;

        $list = implode(', ', $item_id_list);
        $lex = sql::getRows("SELECT * FROM items_data WHERE `item_id` IN ({$list}); ");

        $full_item_info_draws = [];
        foreach ($list_of_draws as $item) {
            $item_id = $item['item_id'];
            foreach ($lex as $row) {
                if ($item_id == $row['item_id']) {
                    $full_item_info_draws[] = array_merge($item, $row);
                }
            }
        }

        tpl::addVar("attempts_left", $rouletteDraw_count);
        tpl::addVar("list_of_draws", $full_item_info_draws);
        tpl::addVar("config", $config);
        tpl::displayPlugin("/roulette_draw/tpl/show.html");
    }

    //Начать розыгрыш
    public function start_roulette_draw() {
        validation::user_protection();

        $config = include __DIR__ . "/config.php";

        $rouletteDraw_count = 0;
        $vRD = auth::get_user_variables("rouletteDraw");
        if ($vRD) {
            $rouletteDraw_count = $vRD["val"];
            if (date("Y-m-d", strtotime($vRD["date_update"])) != date("Y-m-d")) {
                $rouletteDraw_count = $config['number_of_attempts_per_day'];
            }
        }
        if ($rouletteDraw_count >= $config['number_of_attempts_per_day']) {
            board::alert([
                'type' => 'notice',
                'ok' => false,
                'message' => "Вы уже использовали все попытки на сегодня",
                'attempts_left' => 0,
            ]);
            return;
        }
        $rouletteDraw_count++;
        user::set_variable("rouletteDraw", $rouletteDraw_count, auth::get_default_server());

        $list_of_draws = [];
        foreach ($config['list_of_draws'] as $draw) {
            if ($draw['server_id'] == auth::get_default_server()) {
                $list_of_draws = $draw['items'];
                break;
            }
        }
        if(empty($list_of_draws)){
            board::alert([
                'type' => 'notice',
                'ok' => false,
                'message' => "Не настроен розыгрыш на этом сервере",
            ]);
        }

        //Выбери случайный предмет из массива list_of_draws в config.php используй вероятность указанную в change
        $item = $this->get_random_item($list_of_draws);
        if ($item === false) {
            board::alert([
                'type' => 'notice',
                'ok' => false,
                'message' => "Удача не на Вашей стороне. Ничего не выиграно.",
                'attempts_left' => $config['number_of_attempts_per_day'] - $rouletteDraw_count,
            ]);
            return;
        }
        $min = $item['item_count']['min'];
        $max = $item['item_count']['max'];
        if ($min == $max) {
            $item['count'] = $min;
        } else {
            $item['count'] = mt_rand($min, $max);
        }

        $itemInfo = client_icon::get_item_info($item['item_id'], false);
        $item = array_merge($item, $itemInfo);
        $count = $item['count'] > 1 ? $item['count'] : "";
        $enchant = isset($item['enchant']) && $item['enchant'] > 0 ? " +" . $item['enchant'] . " " : "";
        $itemName = $enchant . $item['name'];

        bonus::addToInventory(auth::get_default_server(), $item['item_id'], $item['count'], $item['enchant'] ?? 0, "Победа в рулетке");

        board::alert([
            'type' => 'notice',
            'ok' => true,
            'message' => "Вы выиграли " . $count . " {$itemName}",
            'data' => $item,
            "attempts_left" => $config['number_of_attempts_per_day'] - $rouletteDraw_count,
        ]);

    }

    //Расчет вероятностей и выбор случайного предмета
    private function get_random_item(mixed $list_of_draws) {
        $totalChance = 0;
        $randomNumber = mt_rand(0, 10000) / 100;
        foreach ($list_of_draws as $index => $item) {
            $totalChance += $item['chance'];
            if ($randomNumber <= $totalChance) {
                $item['index'] = $index;
                return $item;
            }
        }
        return false;
    }


}