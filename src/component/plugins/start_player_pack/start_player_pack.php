<?php

namespace Ofey\Logan22\component\plugins\start_player_pack;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\image\client_icon;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\controller\page\error;
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;

class start_player_pack {

    private mixed $settings;
    private mixed $start_pack;
    private const COOLDOWN_SECONDS = 10; // Время задержки в секундах

    public function __construct() {
        $this->settings = include __DIR__ . "/settings.php";
        if (!$this->settings["PLUGIN_ENABLE"]) {
            error::error404("Плагин отключен");
        }
        $start_pack = include "config.php";
        if (!isset($start_pack[auth::get_default_server()])) {
            error::error404("Страница с стартовыми папками для данного сервера не найдена");
        }
        $this->start_pack = $start_pack[auth::get_default_server()];
    }


    public function show() {
        tpl::addVar("packs", $this->start_pack);
        tpl::displayPlugin("/start_player_pack/tpl/index.html");
    }

    public function buy() {
        validation::user_protection();
        $packName = $_POST['packName'] ?? board::error("Not name pack");
        $char_name = $_POST['player'] ?? board::error("Not player name");
        if(empty($char_name)){
          board::error("Не выбран ник персонажа");
        }
        $lastUsage = $_SESSION['last_pack_usage'] ?? 0;
        $currentTime = time();
        // Проверяем, прошло ли время задержки
        if ($currentTime - $lastUsage < self::COOLDOWN_SECONDS) {
            board::error("Повторное использование функции возможно только один раз в " . self::COOLDOWN_SECONDS . " секунд");
        }

        
        $pack = null;
        foreach($this->start_pack AS $data){
            if ($data['name'] == $packName){
                $pack = $data;
                break;
            }
        }
        if($pack==null){
            board::error("Покупаемый пак не найден");
        }
        //Проверяем стоимость пака и сколько денег есть у пользователя
        if(auth::get_donate_point() < $pack['cost']){
            board::error("У Вас нехватает денег");
        }

        $server_info = server::server_info(auth::get_default_server());
        if (!$server_info) {
            board::notice(false, lang::get_phrase(150));
        }

        $player_info = player_account::is_player($server_info, [$char_name]);
        $player_info = $player_info->fetch();

        if (!$player_info)
            board::notice(false, lang::get_phrase(151, $char_name));
        $player_id = $player_info["player_id"];
        foreach($pack['items'] AS $item_id => $item){
            $count = $item['count'] ?? 1;
            $enchant = $item['enchant'] ?? 0;
            $is_stack = client_icon::is_stack($item_id);

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
                    //Если предмет есть у игрока
                    if ($checkPlayerItem) {
                        player_account::update_item_count_player($server_info, [
                            $count,
                            $checkPlayerItem['object_id'],
                        ]);
                    } else {
                        donate::add_item_max_val_id($server_info, $player_id, $item_id, $count);
                    }
                } else {
                    donate::add_item_max_val_id($server_info, $player_id, $item_id, $count);
                }
            } else { //Если персонаж может быть в игре для выдачи предмета
                player_account::add_item($server_info, [
                    $player_id,
                    $item_id,
                    $count,
                    $enchant,
                ]);
            }

            sql::run("INSERT INTO `donate_history` (`user_id`, `item_id`, `amount`, `cost`, `char_name`, `server_id`, `date`) VALUES (?, ?, ?, ?, ?, ?, ?)", [
                auth::get_id(),
                $item_id,
                $count,
                $pack['cost'],
                $char_name,
                auth::get_default_server(),
                time::mysql(),
            ]);

        }

        donate::taking_money($pack['cost'], auth::get_id());
        auth::set_donate_point(auth::get_donate_point() - $pack['cost']);
        $_SESSION['last_pack_usage'] = $currentTime;
        board::alert([
            'type' => 'notice',
            'ok' => true,
            'message' => lang::get_phrase(304) . ": " . $packName . ". $packName отправлен на персонажа {$char_name}.",
            'donate_bonus' => auth::get_donate_point(),
        ]);

    }

}