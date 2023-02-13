<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 20.09.2022 / 14:39:16
 */

namespace Ofey\Logan22\model\user\auth;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\player\player_account;

class registration {

    //Регистрация
    static public function add($email, $password, $ret = false) {
        $user_referral = null;
        if(isset($_POST['referral_name']) and !empty(trim($_POST['referral_name']))) {
            $user_referral = auth::exist_user_nickname(trim($_POST['referral_name']));
            if(!$user_referral){
                board::notice(false, "Проверьте ник пользователя «".trim($_POST['referral_name'])."», который Вас пригласил, такого у нас нет!");
            }
        }
        $insert = sql::run("INSERT INTO `users` (`email`, `password`, `ip`) VALUES (?, ?, ?)", [
            $email,
            $password,
            $_SERVER['REMOTE_ADDR'],
        ]);
        if($ret) {
            return $insert;
        }
        if($insert) {
            if($user_referral) {
                sql::run("INSERT INTO `referrals` (`user_id`, `leader_id`) VALUES (?, ?)", [
                    sql::lastInsertId(),
                    $user_referral['id'],
                ]);
            }
            board::notice(true, lang::get_phrase(177));
        } else {
            board::notice(false, lang::get_phrase(178));
        }
    }
}