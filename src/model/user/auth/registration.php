<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 20.09.2022 / 14:39:16
 */

namespace Ofey\Logan22\model\user\auth;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\component\time\timezone;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\player\player_account;

class registration {

    //Регистрация
    static public function add($email, $password, $ret = false) {
        $timezone = null;
        $get_timezone_ip = null;
        $user_referral = null;
        $insertArrays = [];
        if(isset($_POST['referral_name']) and !empty(trim($_POST['referral_name']))) {
            $user_referral = auth::exist_user_nickname(trim($_POST['referral_name']));
            if(!$user_referral) {
                board::notice(false, "Проверьте ник пользователя «" . trim($_POST['referral_name']) . "», который Вас пригласил, такого у нас нет!");
            }
        }
        /*
         * Пользователь по-умолчанию передает свой timezone (берется из браузера)
         * однако, на февраль 23 года, только 93% браузеров поддерживают timezone, да и пользователь может отправить
         * недостоверные данные.
         * По этому сравним со списоком возможных timezone.
         */
        if(isset($_POST['timezone'])) {
            $timezone = $_POST['timezone'];
            foreach(timezone::all() as $key => $val) {
                if($_POST['timezone'] == $key) {
                    $timezone = $key;
                    break;
                }
            }
        }
        $timezone = null;

        $insertUserSQL = "INSERT INTO `users` (`email`, `password`, `ip`, `timezone`) VALUES (?, ?, ?, ?)";
        $insertArrays = [
            $email,
            $password,
            $_SERVER['REMOTE_ADDR'],
            $timezone,
        ];

        /**
         * Если по каким-то причинам мы не определили ранее timezone пользователя,
         * тогда воспользуемся сторонними API для определения пользовательских данных по IP, в т.е. timezone
         */
        if($timezone == null) {
            $get_timezone_ip = timezone::get_timezone_ip($_SERVER['REMOTE_ADDR']);
            if($get_timezone_ip != null) {
                $insertUserSQL = "INSERT INTO `users` (`email`, `password`, `ip`, `timezone`, `country`, `city`) VALUES (?, ?, ?, ?, ?, ?)";
                $insertArrays = [
                    $email,
                    $password,
                    $_SERVER['REMOTE_ADDR'],
                    $get_timezone_ip['timezone'],
                    $get_timezone_ip['country'],
                    $get_timezone_ip['city'],
                ];
            }
        }
        $insert = sql::run($insertUserSQL, $insertArrays);
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