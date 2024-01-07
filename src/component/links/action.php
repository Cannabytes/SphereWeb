<?php

namespace Ofey\Logan22\component\links;

use Ofey\Logan22\component\fileSys\fileSys;

class action {

    private static array $actions = [
        'auth' => '/auth',
        'auth_forget' => '/auth/forget',
        'forget_send_code' => '/auth/forget/send/code',
        'forget_send_password' => '/auth/forget/send/password',

        //base menu
        'main' => '/main',
        'page' => '/page',
        'registration_user' => '/registration/user',
        'menu_donate_pay' => '/donate/pay',
        'menu_donate' => '/donate',
        'menu_ticket' => '/ticket',
        'menu_referral' => '/referral',
        'menu_notification' => '/user/notification',
        'menu_change_avatar' => '/user/change/avatar',
        'menu_change_avatar_self' => '/user/change/avatar/self',
        'menu_change' => '/user/change',
        'logout' => '/auth/logout',
        'user_lang' => '/user/change/lang/%s',
        'menu_bonus_inventory_add' => '/bonus/inventory/addplayer',


        //forum
        'forum' => '/forum',
        'forum_threads' => '/forum/threads/%s',
        'get_topic' => '/forum/threads/%s/%s',
        'add_topic' => '/forum/topic/add/%s',
        'create_topic' => '/forum/topic/add',
        'forum_pagination' => '/forum/threads/%s/%s/%s',
        'post_add' => '/forum/topic/post/add',
        'post_like' => '/forum/post/like',

        //accounts
        'accounts' => '/accounts',
        'account_info' => '/account/info/%s',
        'account_change_password' => 'account/password/change/%s/server/%s',
        'account_change' => 'account/password/change',
        'account_statistic_player' => '/statistic/char/%s',
        'account_registration' => '/registration/account',

        //page
        'get_page' => '/page/%s',

        //statistic
        'statistic_get_clan' => '/statistic/clan/%s',
        'statistic_pvp' => '/statistic/pvp',
        'statistic_pk' => '/statistic/pk',
        'statistic_clan' => '/statistic/clan',
        'statistic_castle' => '/statistic/castle',
        'statistic_heroes' => '/statistic/heroes',
        'statistic_online_time' => '/statistic/online/time',
        'statistic_block' => '/statistic/block',
        'statistic_class' => '/statistic/class/%s',

        'page_comment_add' => '/page/comment/add',

        //donate
        'donate_transfer' => '/user/money/transfer',

        //ticket
        'get_ticket' => '/ticket/%s',
        'add_ticket' => '/ticket/add',
        'add_ticket_comment' => '/ticket/add/comment',

        //referral
        'referral' => '/referral',



        'admin' => '/admin',
        'admin_bonus' => '/admin/bonuscode',
        'admin_bonus_code_show' => '/admin/bonuscode/show',
        'admin_cache' => '/admin/options/server/cache',
        'admin_template_save' => '/admin/template/save',
        'admin_donate_edit' => '/admin/donate/edit',
        'admin_donate_pack_edit' => '/admin/donate/edit/pack',
        'admin_forum_category_add' => '/admin/forum/add/category',
        'admin_forum_category_edit' => '/admin/forum/edit/category',
        'admin_forum_category_remove' => '/admin/forum/remove/category',
        'admin_forum_section_add' => '/admin/forum/add/section',
        'admin_forum_section_edit' => '/admin/forum/edit/section',
        'admin_forum_section_remove' => '/admin/forum/remove/section',
        'admin_pages' => '/admin/pages',
        'admin_page_create' => '/admin/pages/create',
        'admin_page_edit' => '/admin/pages/edit',
        'admin_page_edit_N' => '/admin/pages/edit/%s',
        'admin_page_trash_N' => '/admin/pages/trash/%s',
        'admin_options' => '/admin/options',
        'admin_options_server_list' => '/admin/options/server/list',
        'admin_template' => '/admin/template',
        'admin_plugin' => '/admin/plugin',
        'admin_chat' => '/admin/chat',
        'admin_donate' => '/admin/donate',
        'admin_users' => '/admin/users',
        'admin_gallery' => '/admin/gallery',
        'admin_forum' => '/admin/forum',
        'admin_support' => '/admin/support',
        'admin_add_donate' => '/admin/users/add/donate',
        'admin_users_edit' => '/admin/users/edit',
        'admin_donate_add' => '/admin/donate/add',
        'admin_log_user' => '/admin/logs/user',

        'install_admin' => '/install/admin',
        'install_connect_test_db' => '/install/db/connect/test',

    ];

    public static function get($name, ...$params) {
        $link = self::$actions[$name] ?? false;
        if ($link !== false && count($params) > 0) {
            $link = vsprintf($link, $params);
        }
        $link = sprintf("%s/%s", fileSys::getSubDir(), $link);
        return str_replace(['//', '\\'], '/', $link);
    }


}