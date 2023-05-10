<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 26.08.2022 / 18:12:47
 *
 * Класс актуальных игровых аккаунтов в реестре сервера
 */

namespace Ofey\Logan22\model\user\player;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\base\base;
use Ofey\Logan22\component\captcha\captcha;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\encrypt\encrypt;
use Ofey\Logan22\model\user\auth\auth;
use SimpleCaptcha\Builder;

class comparison {

    /**
     * @return void
     * Процесс синхронизации или подвязки игрового аккаунта к ЛК.
     * Пользователь передает ID сервера, аккаунт и пароль от игры.
     * Проверяем существование такого аккаунта во внутренней БД, если такого нет, тогда
     * проверяем существование такого аккаунта, его пароль, если всё сходится, добавляем пользователя
     * в во внутренний реестр аккаунтов профиля.
     */
    static public function sync() {
        $server_id = $_POST['server'] ?? null;
        $account_name = $_POST['login'] ?? null;
        $password = $_POST['password'] ?? null;
        $password_hide = $_POST['password_hide'] ?? false;
        $captcha = $_POST['captcha'] ?? null;

        if($server_id == null) {
            board::notice(false, lang::get_phrase(327));
        }
        if($account_name == null) {
            board::notice(false, lang::get_phrase(328));
        }
        if($password == null) {
            board::notice(false, lang::get_phrase(329));
        }
        if($captcha == null){
            board::notice(false, lang::get_phrase(330));
        }

        $builder = new Builder;
        if (!$builder->compare($captcha, $_SESSION['captcha'])) {
            board::alert(['ok' => false, "message" => lang::get_phrase(295), "code" => 1]);
        }
        //Перегенерация капчи
        captcha::generation();


        $player_info = sql::getRow("SELECT id,login,password,email,server_id FROM `player_accounts` WHERE login=?", [
            $account_name,
        ]);
        //Если находим такой же аккаунт во внутреннем реестре, тогда уходим...
        if($player_info) {
            board::notice(false, lang::get_phrase(331));
        }

        //Теперь необходимо проверить аккаунт на сервере
        $server_info = server::server_info($server_id);
        if(!$server_info) {
            board::notice(false, lang::get_phrase(150));
        }
        $account = player_account::account_is_exist($server_info, $account_name);
        if(gettype($account) != "object") {
            if(!$account['ok']) {
                board::notice(false, $account['message']);
            }
        }
        $account_server_info = $account->fetch();
        if(!$account_server_info) {
            board::notice(false, lang::get_phrase(332));
        }

        //Проверка пароля
        if(encrypt::server_password($password, $server_info) != $account_server_info['password']){
            board::notice(false, lang::get_phrase(333));
        }

        //Добавление аккаунта во внутренюю БД
        $ok = player_account::add_inside_account($account_name, $password, auth::get_email(), auth::get_ip(), $server_id, $password_hide);
        if($ok){
            board::notice(true, lang::get_phrase(334));
        }
        board::notice(false, "Error");
    }

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
        $show_all_account_player_site = player_account::show_all_account_player($server_id);

        foreach($show_all_account_player_site as $k => &$user_player_site) {
            foreach($game_accounts as $game_account) {
                if($user_player_site['login'] == $game_account['login']) {
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