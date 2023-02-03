<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 26.08.2022 / 18:12:47
 *
 * Класс актуальных игровых аккаунтов в реестре сервера
 */

namespace Ofey\Logan22\model\user\player;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\base\base;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\encrypt\encrypt;
use Ofey\Logan22\model\user\auth\auth;

class comparison {

    /*
    *  Сделать сверку аккаунтов, между внутренней БД аккаунтов, и внешней (сервера).
    *  Новые аккаунты добавить.
    *  Старые аккаунты, если их пароли единтичны (при хэшировании) - оставить, если другие обновить, статус видимого пароля на скрытый.
    */
    static public function start($server_id) {
        $server_info = server::server_info($server_id);
        if(!$server_info) {
            board::notice(false, lang::get_phrase(150));
        }

        $game_accounts = self::accounts_email($server_info, auth::get_email())->fetchAll();
        $show_all_account_player_site = player_account::show_all_account_player();

        foreach($show_all_account_player_site AS $k=>&$user_player_site){
            foreach($game_accounts AS $game_account){
                if($user_player_site['login']==$game_account['login']){
                    unset($show_all_account_player_site[$k]);
                    break;
                }
            }
        }

        foreach($show_all_account_player_site as $account) {
            //Если такой аккаунт у нас есть зарегистрированным во внутреннем реестре
            if(self::exist_account($account['login'], $show_all_account_player_site)) {
                sql::run("UPDATE `player_accounts` SET `password` = '', `password_hide` = 1 WHERE `login` = ? AND `server_id` = ?", [
                    $account['login'],
                    $server_id,
                ]);
            } else {
                sql::run("INSERT INTO `player_accounts` (`login`, `password`, `email`, `ip`, `server_id`, `password_hide`, `date_create`) VALUES (?, ?, ?, ?, ?, ?, ?)", [
                    $account['login'],
                    "",
                    auth::get_email(),
                    auth::get_ip(),
                    $server_id,
                    true,
                    time::mysql(),
                ]);
            }
        }
    }

    //Имеется ли в массиве аккаунтов, необходимый нам логин
    public static function exist_account($login, $accountsList): bool {
        foreach($accountsList as $account) {
            if($account['login'] == $login) {
                return true;
            }
        }
        return false;
    }

    public static function accounts_email($reQuest, $prepare) {
        $base = base::get_sql_source($reQuest['collection_sql_base_name'], "accounts_email");
        return player_account::extracted($base, $reQuest, $prepare);
    }
}