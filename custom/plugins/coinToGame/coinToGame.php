<?php

namespace coinToGame;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\image\client_icon;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\userlog;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\player_account;
use Ofey\Logan22\template\tpl;

class coinToGame {

    private function isEnabled(): void {
        $settingFile = __DIR__ . "/settings.php";
        if(!file_exists($settingFile)){
            return;
        }
        $setting = include $settingFile;
        if(!$setting['PLUGIN_ENABLE']){
            board::error("Plugin off");
        }
    }

    public function show() {
        tpl::displayPlugin("/coinToGame/tpl/button.html");
    }

    public function buy() {
        validation::user_protection();
        self::isEnabled();
        $char_name = $_POST['player_name'] ?? board::error("No player name");
        $count = $_POST['count'] ?? board::error("Not count");
        $count = intval($count);
        if (!is_int($count)) {
            board::error(lang::get_phrase('enter an integer'));
        }
        if($count <= 0){
            board::error(lang::get_phrase('enter a value greater than 0'));
        }
        $player_info = player_account::is_player(server::server_info(auth::get_default_server()), [$char_name]);
        $player_info = $player_info->fetch();
        if(!$player_info){
            board::error(lang::get_phrase('character not found'));
        }
        $config = include __DIR__ . "/config.php";
        donate::taking_money(1 * $count, auth::get_id());
        self::addItem(auth::get_default_server(), $config['item_id'], $count * $config['count'], 0, $char_name);
        userlog::add("coinToGame", "coinToGamePhrase", [$char_name, $count * $config['count'], client_icon::get_item_info($config['item_id'])['name'], $count ]);
        board::alert([
            'type'=>'notice',
            'ok' => true,
            'message' => lang::get_phrase('send to player', $char_name),
            'donate_bonus' => auth::get_donate_point()
        ]);
    }


    public static function addItem($server_id,$item_id,$item_count,$item_enchant, $char_name = null) {
        if($char_name == null){
            board::notice(false, lang::get_phrase('no nickname'));
        }
        $server_info = server::server_info($server_id);
        if (!$server_info) {
            board::notice(false, lang::get_phrase(150));
        }
        $player_info = player_account::is_player($server_info, [$char_name]);
        $player_info = $player_info->fetch();
        if(!$player_info){
            board::error(lang::get_phrase('character not found'));
        }
        $user = player_account::get_show_characters_info($player_info['login']);
        if ($user == null or $user["email"] != auth::get_email()) {
            board::notice(false, lang::get_phrase(490));
        }
        if (!$player_info) board::notice(false, lang::get_phrase(151, $char_name));
        $player_id = $player_info["player_id"];
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
                board::notice(false, lang::get_phrase(lang::get_phrase('sending failed')));
            }
        }
    }


}