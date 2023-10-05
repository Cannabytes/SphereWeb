<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 29.08.2022 / 12:36:26
 */

namespace Ofey\Logan22\controller\user\profile;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\session\session;
use Ofey\Logan22\component\time\timezone;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\notification\notification;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class change {

    public static function show_notification(): void {
        validation::user_protection();
        tpl::addVar([
            "notification" => notification::get_self_notification(true),
        ]);
        tpl::display("user/profile/notification.html");
    }

    public static function show() {
        validation::user_protection();
        tpl::addVar([
            "title" => lang::get_phrase(191),
            "name" => auth::get_name(),
            'timezone_list_default' => timezone::all(),
        ]);
        tpl::display("user/profile/setting.html");
    }

    public static function save() {
        validation::user_protection();
        \Ofey\Logan22\model\user\profile\change::set();
    }

    public static function show_avatar_page(): void {
        validation::user_protection();
        tpl::addVar([
            "title" => lang::get_phrase(192),
            "avatars" => fileSys::file_list('src/template/logan22/assets/images/navatar'),
        ]);
        tpl::addVar('server_list', server::get_server_info());
        tpl::display("user/profile/select_avatar.html");
    }

    public static function show_background_avatar_page(): void {
        validation::user_protection();
        tpl::addVar([
            "title" => lang::get_phrase(193),
            "avatars" => fileSys::file_list('src/template/logan22/assets/images/navatarback'),
        ]);
        tpl::addVar('server_list', server::get_server_info());
        tpl::display("user/option/select_background_avatar.html");
    }

    public static function save_avatar(): void {
        validation::user_protection();
        $avatar = $_POST['avatar'] ?? null;
        if ($avatar == null) {
            board::notice(false, lang::get_phrase(194));
        }
        if (62 < mb_strlen($avatar))
            board::notice(false, lang::get_phrase(195));
        if (!file_exists("src/template/logan22/assets/images/navatar/" . $avatar))
            board::notice(false, lang::get_phrase(196));
        \Ofey\Logan22\model\user\profile\change::set_avatar($avatar);
        board::alert([
            'ok' => true,
            'message' => lang::get_phrase(197),
            'src' => "/src/template/logan22/assets/images/navatar/" . $avatar,
        ]);
    }

    public static function set_avatar_background(): void {
        validation::user_protection();
        $avatar = $_POST['avatar'];
        if (62 < mb_strlen($avatar))
            board::notice(false, lang::get_phrase(198));
        if (!file_exists("src/template/logan22/assets/images/navatarback/" . $avatar))
            board::notice(false, lang::get_phrase(199));
        \Ofey\Logan22\model\user\profile\change::set_avatar_background($avatar);
        board::notice(true, lang::get_phrase(197));
    }

    public static function change_theme() {
        if (validation::user_protection(need_redirect: false)) {
            if($_POST['theme'] == "true"){
                $theme = "dark";
            }
            if($_POST['theme'] == "false"){
                $theme = "";
            }
            \Ofey\Logan22\model\user\profile\change::set_theme($theme);
        }else{
            if($_POST['theme'] == "true"){
                session::add("var_theme", "dark");
            }
            if($_POST['theme'] == "false"){
                session::add("var_theme", "");
            }
        }
    }

    public static function transfer_money(){
        validation::user_protection();
        if(!is_numeric($_POST['count']) || empty($_POST['count']) || str_contains($_POST['count'], '.')){
            board::notice(false, "Некорректное значение суммы");
        }
        $moneyCount = $_POST['count'] ?? 0;
        $user = trim($_POST['user']);
        if($moneyCount > auth::get_donate_point()){
            board::notice(false, "У Вас недостаточно денег");
        }
        $userInfo = auth::exist_user_nickname($user);
        if(!$userInfo){
            board::notice(false, "Пользователь не найден");
        }
        \Ofey\Logan22\model\user\profile\change::transfer_money($moneyCount, $userInfo['id']);
        sql::sql("INSERT INTO `log_transfer_spherecoin` (`user_sender`, `user_receiving`, `count`) VALUES (?, ?, ?)", [auth::get_id(), $userInfo['id'], $moneyCount]);
        board::notice(true, "Перевод успешно выполнен");
    }
}