<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 11.02.2023 / 7:00:42
 */

namespace Ofey\Logan22\model\referral;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\character;

class referral {

    //true - вернет только незавершенные рефералы
    static public function player_list($unfinished = false) {
        $unfinishedSql = "";
        if($unfinished){
            $unfinishedSql = " referrals.done = 0 AND ";
        }
        $ref_users = sql::getRows("SELECT
                                referrals.id, 
                                referrals.user_id, 
                                referrals.done, 
                                users.email
                            FROM
                                referrals
                                INNER JOIN
                                users
                                ON 
                                    referrals.user_id = users.id
                            WHERE {$unfinishedSql}
                                referrals.leader_id = ?", [
            auth::get_id(),
        ]);

        $characters = [];
        foreach($ref_users as &$user) {
            $playerAccounts = sql::getRows("SELECT
                player_accounts.server_id, 
                player_accounts.login
            FROM
                player_accounts
            WHERE
                player_accounts.email = ?", [$user['email']]);
            foreach($playerAccounts as &$char) {
                $login = $char['login'];
                $server_id = $char['server_id'];
                $c = character::get_characters($login, $server_id);
                if($c) {
                    $characters[$user['email']]['characters'] = $c;
                }
            }
            $characters[$user['email']]['done'] = $user['done'];
            $characters[$user['email']]['referral_id'] = $user['id'];
        }
        return $characters;
    }

    static public function add_new_bonus() {
        $players_list = self::player_list(true);
        if(!$players_list) {
            board::notice(false, "Error");
        }
        require_once 'src/config/referral.php';
        $f = false;
        foreach($players_list as $players) {
            foreach($players["characters"] as $character) {
                if($character['level'] >= LEVEL and $character['pvp'] >= PVP and $character['pk'] >= PK and $character['time_in_game'] >= GAME_TIME) {
                    sql::run("UPDATE `referrals` SET `done` = 1 WHERE `id` = ?", [
                        $players['referral_id'],
                    ]);
                    auth::add_donate_self(DONATE_BONUS_AMOUNT);
                    $f = true;
                    break;
                }
            }
        }
        if($f){
            board::notice(true, lang::get_phrase(305));
        }
        board::notice(false, "Error");
    }
}