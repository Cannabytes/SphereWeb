<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 11.02.2023 / 7:00:42
 */

namespace Ofey\Logan22\model\referral;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\cache\cache;
use Ofey\Logan22\component\cache\dir;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\user\player\character;


class referral {

    /**
     * Возвращаем ID пользователя, который завлек человека
     */
    public static function has_leader($user_id){
        return sql::getRow('SELECT `leader_id` FROM `referrals` WHERE user_id = ?', [$user_id]);
    }

    /**
     * Даем N бобло от доната лидеру реферала
     */
    public static function add_sphere_coin($user_id, $amount){
        if(!REFERRAL_LEADER_BONUS_ENABLE){
            return;
        }
        $leader = self::has_leader($user_id);
        if(!$leader){
            return;
        }
        $leader_id = $leader['leader_id'];
        $percent = round($amount * REFERRAL_LEADER_BONUS_VALUE / 100, 2);
        //Выдаем лидеру бонус от пополняшки пользователя
        sql::run("UPDATE `users` SET `donate_point` = `donate_point` + ? WHERE `id` = ?", [
            $percent,
            $leader_id,
        ]);
        $user = auth::get_user_info($user_id);
        $email = $user['email'];
        $name = $user['name'];
        //Создадим лог
        \Ofey\Logan22\model\admin\userlog::expanded($leader_id, auth::get_default_server(), "donate_referral", "donate_percent_referral", [$percent, $email, $name]);
    }

    //true - вернет только незавершенные рефералы
    public static function add_new_bonus() {
        $players_list = self::player_list(true, false);
        if (!$players_list) {
            board::notice(false, "Error");
        }
        $f = false;
        foreach ($players_list as $players) {
            foreach ($players["characters"] as $character) {
                if ($character['level'] >= LEVEL and $character['pvp'] >= PVP and $character['pk'] >= PK and $character['time_in_game'] >= GAME_TIME) {
                    sql::run("UPDATE `referrals` SET `done` = 1 WHERE `id` = ?", [
                        $players['referral_id'],
                    ]);
                    auth::add_donate_self(DONATE_BONUS_AMOUNT);
                    $f = true;
                    break;
                }
            }
        }
        if ($f) {
            board::notice(true, lang::get_phrase(305));
        }
        board::notice(false, "Error");
    }

    public static function player_list($unfinished = false, $readCache = true) {
        if ($readCache) {
            $json = cache::read(dir::referral->show_dynamic(name: auth::get_id()), second: 60);
            if ($json) {
                return $json;
            }
        }
        $unfinishedSql = "";
        if ($unfinished) {
            $unfinishedSql = " referrals.done = 0 AND ";
        }
        $ref_users = sql::getRows(
            "SELECT
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
                                referrals.leader_id = ?",
            [
                auth::get_id(),
            ]
        );
        $characters = [];
        foreach ($ref_users as &$user) {
            $playerAccounts = sql::getRows(
                "SELECT
                player_accounts.server_id, 
                player_accounts.login
            FROM
                player_accounts
            WHERE
                player_accounts.email = ?",
                [$user['email']]
            );

            foreach ($playerAccounts as &$char) {
                $login = $char['login'];
                $server_id = $char['server_id'];
                $c = character::get_characters($login, $server_id);
                if ($c) {
                    $characters[$user['email']]['characters'] = $c;
                }
            }
            $characters[$user['email']]['done'] = $user['done'];
            $characters[$user['email']]['referral_id'] = $user['id'];
        }

        cache::save(dir::referral->show_dynamic(name: auth::get_id()), $characters);

        return $characters;
    }
}