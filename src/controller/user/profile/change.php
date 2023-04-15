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
use Ofey\Logan22\component\time\timezone;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class change {

    static public function show() {
        validation::user_protection();
        tpl::addVar([
            "title" => lang::get_phrase(191),
            "name"  => auth::get_name(),
            'timezone_list_default'   => timezone::all(),
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
            "title"   => lang::get_phrase(192),
            "avatars" => fileSys::file_list('src/template/cabinet/assets/images/navatar'),
        ]);
        tpl::addVar('server_list', server::get_server_info());
        tpl::display("user/option/select_avatar.html");
    }

    static public function show_background_avatar_page(): void {
        validation::user_protection();
        tpl::addVar([
            "title"   => lang::get_phrase(193),
            "avatars" => fileSys::file_list('src/template/cabinet/assets/images/navatarback'),
        ]);
        tpl::addVar('server_list', server::get_server_info());
        tpl::display("user/option/select_background_avatar.html");
    }

    public static function save_avatar(): void {
        validation::user_protection();
        $avatar = $_POST['avatar'] ?? null;
        if($avatar == null) {
            board::notice(false, lang::get_phrase(194));
        }
        if(62 < mb_strlen($avatar))
            board::notice(false, lang::get_phrase(195));
        if(!file_exists("src/template/cabinet/assets/images/navatar/" . $avatar))
            board::notice(false, lang::get_phrase(196));
        \Ofey\Logan22\model\user\profile\change::set_avatar($avatar);
        board::alert([
            'ok'      => true,
            'message' => lang::get_phrase(197),
            'src'     => "/src/template/cabinet/assets/images/navatar/" . $avatar,
        ]);
    }

    public static function set_avatar_background(): void {
        validation::user_protection();
        $avatar = $_POST['avatar'];
        if(62 < mb_strlen($avatar))
            board::notice(false, lang::get_phrase(198));
        if(!file_exists("src/template/cabinet/assets/images/navatarback/" . $avatar))
            board::notice(false, lang::get_phrase(199));
        \Ofey\Logan22\model\user\profile\change::set_avatar_background($avatar);
        board::notice(true, lang::get_phrase(197));
    }
}