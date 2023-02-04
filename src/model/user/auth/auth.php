<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 14.08.2022 / 23:29:35
 */

namespace Ofey\Logan22\model\user\auth;

use Exception;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\request\request;
use Ofey\Logan22\component\request\request_config;
use Ofey\Logan22\component\session\session;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\server\server;
use SimpleCaptcha\Builder;

class auth {

    static private bool   $is_auth      = false;
    static private int    $id;
    static private string $email;
    static private string $name;
    static private string $password;
    static private string $signature;
    static private string $ip_registration;
    static private string $ip;
    static private string $date_create;
    static private string $date_update;
    static private string $access_level = 'guest';
    static private int    $donate_point = 0;
    static private string $avatar;
    static private string $avatar_background;

    /**
     * @return false|mixed|void|null
     * @throws Exception
     *
     * Сервер по умолчанию (если нет, то последний)
     * иначе false
     */
    static public function get_default_server() {
        $server_id = session::get('default_server');
        $get_server_info = server::get_server_info();
        if(!$get_server_info) {
            return false;
        }
        if(!array_search($server_id, array_column($get_server_info, 'id'))) {
            $get_server_info = end($get_server_info);
            session::add('default_server', $get_server_info['id']);
            return $get_server_info['id'];
        }
        return $server_id;
    }

    static public function get_is_auth(): bool {
        return self::$is_auth;
    }

    static public function get_id(): string {
        return self::$id;
    }

    static public function get_email(): string {
        return self::$email;
    }

    static public function get_name(): string {
        return self::$name;
    }

    static public function get_password(): string {
        return self::$password;
    }

    static public function get_signature(): string {
        return self::$signature;
    }

    static public function get_ip_registration(): string {
        return self::$ip_registration;
    }

    static public function get_ip(): string {
        return self::$ip;
    }

    static public function get_date_create(): string {
        return self::$date_create;
    }

    static public function get_date_update(): string {
        return self::$date_update;
    }

    static public function get_access_level(): string {
        return self::$access_level;
    }

    static public function get_donate_point(): int {
        return self::$donate_point;
    }

    static public function get_avatar(): string {
        return self::$avatar;
    }

    static public function get_avatar_background(): string {
        return self::$avatar_background;
    }

    static public function set_is_auth($boolean) {
        self::$is_auth = $boolean;
    }

    static public function set_id($user_id) {
        self::$id = $user_id;
    }

    static public function set_email($email) {
        self::$email = $email;
    }

    static public function set_name($name = '') {
        self::$name = $name;
    }

    static public function set_password($password) {
        self::$password = $password;
    }

    /**
     * Применить пароль к текущей сессии
     */
    static public function apply_password() {
        session::edit("password", self::get_password());
    }

    static public function set_signature($signature = "") {
        self::$signature = $signature ?? "";
    }

    static public function set_ip_registration($ip_registration) {
        self::$ip_registration = $ip_registration ?? "0.0.0.0";
    }

    static public function set_ip($ip) {
        self::$ip = $ip;
    }

    static public function set_date_create($date_create = '') {
        self::$date_create = $date_create;
    }

    static public function set_date_update($date_update): void {
        self::$date_update = $date_update;
    }

    static public function set_access_level($access_level): void {
        self::$access_level = $access_level;
    }

    static public function set_donate_point($donate_point): void {
        self::$donate_point = $donate_point;
    }

    static public function set_avatar($avatar = null): void {
        if($avatar == null) {
            self::$avatar = 'none.jpeg';
            return;
        }
        self::$avatar = $avatar;
    }

    static public function set_avatar_background($avatar): void {
        self::$avatar_background = $avatar;
    }

    //Проверка авторизации пользователя
    public static function user_auth(): void {
        if(isset($_SESSION['password'])) {
            $auth = self::exist_user($_SESSION['email']);
            if($auth) {
                if($auth['password'] == $_SESSION['password']) {
                    self::set_is_auth(true);
                    self::set_id($auth['id']);
                    self::set_email($auth['email']);
                    self::set_password($auth['password']);
                    self::set_name($auth['name'] ?: "");
                    self::set_signature($auth['signature']);
                    self::set_ip_registration($auth['ip']);
                    self::set_ip($_SERVER['REMOTE_ADDR']);
                    self::set_date_create($auth['date_create'] ?: date("Y-m-d H:i:s"));
                    self::set_date_update($auth['date_update']);
                    self::set_access_level($auth['access_level']);
                    self::set_donate_point($auth['donate_point']);
                    self::set_avatar($auth['avatar']);
                    self::set_avatar_background($auth['avatar_background']);
                    return;
                }
            }
        }
        self::set_is_auth(false);
        self::set_id(0);
        self::set_email("");
        self::set_password("");
        self::set_name("");
        self::set_signature("");
        self::set_ip_registration("");
        self::set_ip($_SERVER['REMOTE_ADDR']);
        self::set_date_create("");
        self::set_date_update("");
        self::set_access_level("guest");
        self::set_donate_point(0);
        self::set_avatar("none.jpeg");
        self::set_avatar_background("none.jpeg");
    }

    //TODO:Добавить в массив всех пользователей которых мы проверяем
    static public array $userInfo = [];
    //Проверка существования юзера
    //$nCheck = false вернет в случае неудачи false, если true выйдет в логаут из профиля
    static public function exist_user($email, $nCheck = true) {
        if(self::$userInfo != null) {
            return self::$userInfo;
        }
        $sql = 'SELECT * FROM `users` WHERE `email` = ?;';
        $userInfo = sql::run($sql, [$email])->fetch();
        if(!$nCheck) {
            return false;
        }
        if(!$userInfo) {
            self::logout();
        }
        self::$userInfo = $userInfo;
        return self::$userInfo;
    }

    /**
     * @param $email
     *
     * @return array|mixed
     * @throws Exception
     * Проверка существования пользователя по E-Mail
     */
    static public function is_user($email) {
        if(self::$userInfo != null) {
            return self::$userInfo;
        }
        $sql = 'SELECT 1 FROM `users` WHERE `email` = ?;';
        return sql::run($sql, [$email])->fetch();
    }

    //Проверка существования юзера
    static public function exist_user_id($id) {
        self::$userInfo['id'] ??= '';
        if(self::$userInfo['id'] == $id) {
            return self::$userInfo;
        }
        $sql = 'SELECT * FROM users WHERE id = ?';
        self::$userInfo = sql::run($sql, [$id])->fetch();
        return self::$userInfo;
    }

    static public function user_enter() {
        if(auth::get_is_auth()) {
            board::notice(false, lang::get_phrase(160));
        }
        $builder = new Builder;
        if (!$builder->compare(trim($_POST['captcha']), $_SESSION['phrase'])) {
            board::alert(['ok' => false, "message" => lang::get_phrase(295), "code" => 1]);
        }
        if(!isset($_POST['email']) or !isset($_POST['password'])) {
            board::notice(false, lang::get_phrase(161));
        }
        $email = request::setting('email', new request_config(isEmail: true));
        $password = request::setting('password', new request_config(max: 32));

        $user_info = self::exist_user($email);
        if(!$user_info) {
            board::notice(false, lang::get_phrase(164));
        }
        if($user_info['password'] == $password) {
            session::add('email', $email);
            session::add('password', $password);
            board::notice(true, lang::get_phrase(165));
        }else{
            board::alert(['ok' => false, "message" => lang::get_phrase(185) , "code" => 2]);
        }
        board::notice(false, lang::get_phrase(166));
    }

    static public function logout() {
        session::clear();
        header("Refresh: 0;");
        die();
    }

    static public function change_user_password($user_email, $password) {
        $update = sql::run("UPDATE `users` SET `password` = ? WHERE `email` = ?", [
            $password,
            $user_email,
        ]);
        if($update->rowCount() == 1) {
            auth::set_password($password);
            return true;
        }
        return false;
    }

    //Зачисление пользователю денег
    static public function change_donate_point($user_id, $amount) {
        $user = self::exist_user_id($user_id);
        if(!$user) {
            exit(lang::get_phrase(167));
        }
        $donate_point = $user['donate_point'] + $amount;
        sql::run("UPDATE `users` SET `donate_point` = ? WHERE `id` = ?", [
            $donate_point,
            $user_id,
        ]);
    }
}