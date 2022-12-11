<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 29.08.2022 / 12:36:26
 */

namespace Ofey\Logan22\controller\user\profile;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\fileSys\fileSys;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class change {

    static public function show() {
        validation::user_protection();
        tpl::addVar([
            "title" => "Смена параметров профиля",
            "name"  => auth::get_name(),
        ]);
        tpl::addVar('server_list', server::get_server_info());
        tpl::display("user/option/change_self.html");
    }

    static public function save() {
        validation::user_protection();
        \Ofey\Logan22\model\user\profile\change::set();
    }

    static public function show_avatar_page(): void {
        validation::user_protection();
        tpl::addVar([
            "title"   => "Выбрать аватар",
            "avatars" => fileSys::file_list('template/cabinet/assets/images/navatar'),
        ]);
        tpl::addVar('server_list', server::get_server_info());
        tpl::display("user/option/select_avatar.html");
    }

    static public function show_background_avatar_page(): void {
        validation::user_protection();
        tpl::addVar([
            "title"   => "Выбрать фон аватара",
            "avatars" => fileSys::file_list('template/cabinet/assets/images/navatarback'),
        ]);
        tpl::addVar('server_list', server::get_server_info());
        tpl::display("user/option/select_background_avatar.html");
    }

    public static function save_avatar(): void {
        validation::user_protection();
        $avatar = $_POST['avatar'] ?? null;
        if($avatar==null){
            board::notice(false, "Аватар не изменен");
        }
        if(62 < mb_strlen($avatar))
            board::notice(false, "Слишком длинное название");
        if(!file_exists("template/cabinet/assets/images/navatar/" . $avatar))
            board::notice(false, 'Аватар не найден');
        \Ofey\Logan22\model\user\profile\change::set_avatar($avatar);
        board::alert([
            'ok'      => true,
            'message' => 'Ваш аватар обновлен',
            'src'     => "/template/cabinet/assets/images/navatar/" . $avatar,
        ]);
    }

    public static function set_avatar_background(): void {
        validation::user_protection();
        $avatar = $_POST['avatar'];
        if(62 < mb_strlen($avatar))
            board::notice(false, "Слишком длинное название");
        if(!file_exists("template/cabinet/assets/images/navatarback/" . $avatar))
            board::notice(false, 'Фон для аватара не найден');
        \Ofey\Logan22\model\user\profile\change::set_avatar_background($avatar);
        board::notice(true, 'Ваш аватар обновлен');
    }
}