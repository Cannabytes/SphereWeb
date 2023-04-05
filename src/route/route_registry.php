<?php

use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\component\session\session;
use Ofey\Logan22\model\user\auth\auth as auth_model;
use Ofey\Logan22\template\tpl;

session::init();
lang::load_package();
auth_model::user_auth();

$route = new Ofey\Logan22\route\Route();

$route->get("/", 'Ofey\Logan22\controller\promo\promo::index');

$route->get("page/(\d+)", "Ofey\Logan22\controller\page\page::show");
$route->post("page/comment/add", '\Ofey\Logan22\controller\page\page::addComment');
$route->post("page/comment/delete", '\Ofey\Logan22\controller\admin\page::deleteComment');
$route->post("page/comment/edit", '\Ofey\Logan22\controller\admin\page::editComment');

$route->post("ajax/get/news", '\Ofey\Logan22\controller\page\page::get_news_ajax');
$route->get("main", 'Ofey\Logan22\controller\main\main::index')->alias("home")->alias("main");
$route->get("registration/account", 'Ofey\Logan22\controller\registration\account::newAccount')->alias("registration_account");
$route->get("registration/account/server/(\d+)", 'Ofey\Logan22\controller\registration\account::newAccount');
$route->post("registration/account", 'Ofey\Logan22\controller\registration\account::requestNewAccount');

$route->get("registration/user", 'Ofey\Logan22\controller\registration\user::show')->alias("registration_user");
$route->post("registration/user", 'Ofey\Logan22\controller\registration\user::add');
$route->get("registration/user/ref/{username}", 'Ofey\Logan22\controller\registration\user::show');

$route->post("generation/account", function() {
    echo \Ofey\Logan22\component\account\generation::word();
});
$route->post("generation/password", function() {
    echo \Ofey\Logan22\component\account\generation::password(mt_rand(4, 6), special: false);
});

$route->get("account/password/change/{login}/server/(\d+)", 'Ofey\Logan22\controller\account\password\change::show');
//TODO:Реквесты
//TODO:Пересмотреть логику смены пароля игровому аккаунту
$route->post("account/password/change", 'Ofey\Logan22\controller\account\password\change::password');
$route->get("account/comparison/server/(\d+)", 'Ofey\Logan22\controller\account\comparison\comparison::call');
$route->get("account/info/{account}/server/(\d+)", 'Ofey\Logan22\controller\account\info\info::player_list');
$route->post("account/info/change/characters/info", 'Ofey\Logan22\model\user\player\player_account::show_characters_info');
$route->get("registration/account/sync/server/(\d+)", 'Ofey\Logan22\controller\registration\account::sync');
$route->post("registration/account/sync", 'Ofey\Logan22\controller\registration\account::sync_add');
/**
 * Авторизация
 */
$route->get("auth", 'Ofey\Logan22\controller\user\auth\auth::index');
$route->post("auth", 'Ofey\Logan22\controller\user\auth\auth::auth_request');
$route->get("auth/logout", 'Ofey\Logan22\controller\user\auth\auth::logout');
$route->get("auth/forget", 'Ofey\Logan22\controller\user\auth\auth::forget');
$route->post("auth/forget/send/code", 'Ofey\Logan22\controller\user\auth\auth::send_email_forget');
$route->post("auth/forget/verification/code", 'Ofey\Logan22\controller\user\auth\auth::send_email_verification_forget');
$route->get("/auth/forget/code/{code}", 'Ofey\Logan22\controller\user\auth\auth::open_forget_page');
$route->post("/auth/forget/send/password", 'Ofey\Logan22\controller\user\auth\auth::send_password');

/**
 * Реферальная система
 */
$route->get("/referral", 'Ofey\Logan22\controller\referral\referral::show');
$route->post("/referral", 'Ofey\Logan22\controller\referral\referral::my_bonus');

/**
 * Пользовательское
 */
$route->get("user/change", '\Ofey\Logan22\controller\user\profile\change::show');
$route->post("user/change", '\Ofey\Logan22\controller\user\profile\change::save');
$route->get("user/change/lang/{lang}", 'Ofey\Logan22\component\lang\lang::set_lang');
$route->post("user/change/default/server", '\Ofey\Logan22\controller\user\default_server::change');
$route->get("user/change/avatar", 'Ofey\Logan22\controller\user\profile\change::show_avatar_page');
$route->post("user/change/avatar", 'Ofey\Logan22\controller\user\profile\change::save_avatar');
$route->get("user/change/avatar/background", 'Ofey\Logan22\controller\user\profile\change::show_background_avatar_page');
$route->post("user/change/avatar/background", 'Ofey\Logan22\controller\user\profile\change::set_avatar_background');

/**
 * Форум
 */
$route->get("channel", 'Ofey\Logan22\controller\channel\channel::all');
$route->get("channel/(\d)", 'Ofey\Logan22\controller\channel\channel::read');
$route->post("channel/(\d)", 'Ofey\Logan22\controller\channel\channel::writePost');
$route->get("channel/create", 'Ofey\Logan22\controller\channel\channel::create');
/**
 * Статистика
 */
$route->get("/statistic/class/{class_name}", 'Ofey\Logan22\controller\statistic\statistic::class');
$route->get("statistic/pvp", 'Ofey\Logan22\controller\statistic\statistic::pvp');
$route->post("statistic/pvp/ajax", 'Ofey\Logan22\controller\statistic\statistic::pvp_ajax');
$route->get("statistic/pk", 'Ofey\Logan22\controller\statistic\statistic::pk');
$route->post("statistic/pk/ajax", 'Ofey\Logan22\controller\statistic\statistic::pk_ajax');
$route->get("statistic/clan", 'Ofey\Logan22\controller\statistic\statistic::clan');
$route->post("statistic/clan/ajax", 'Ofey\Logan22\controller\statistic\statistic::clan_ajax');
$route->get("statistic/clan/{clan_name}", 'Ofey\Logan22\controller\statistic\statistic::clan_info');
$route->get("statistic/online/time", 'Ofey\Logan22\controller\statistic\statistic::online_time');
$route->post("statistic/player/ajax", 'Ofey\Logan22\controller\statistic\statistic::player_ajax');
$route->get("statistic/block", 'Ofey\Logan22\controller\statistic\statistic::block');
$route->get("statistic/heroes", 'Ofey\Logan22\controller\statistic\statistic::heroes');
$route->get("statistic/castle", 'Ofey\Logan22\controller\statistic\statistic::castle');
$route->post("statistic/castle/ajax", 'Ofey\Logan22\controller\statistic\statistic::castle_ajax');
$route->post("statistic/block/ajax", 'Ofey\Logan22\controller\statistic\statistic::block_ajax');
$route->post("statistic/heroes/ajax", 'Ofey\Logan22\controller\statistic\statistic::heroes_ajax');
$route->post("statistic/other/ajax", 'Ofey\Logan22\controller\statistic\statistic::other_ajax');

$route->get("/statistic/char/{char_name}", 'Ofey\Logan22\controller\statistic\statistic::char_info');

/**
 * Донат
 */
$route->get("donate/pay", '\Ofey\Logan22\controller\donate\pay::pay')->alias('donate_pay');
$route->get("donate", '\Ofey\Logan22\controller\donate\pay::shop')->alias('donate');

$route->post("donate/transaction", 'Ofey\Logan22\controller\donate\pay::transaction');
$route->post("donate/pay/success/freekassa", '\Ofey\Logan22\model\donate\freekassa::transaction');


/**
 * Галерея
 */
$route->get("gallery", 'Ofey\Logan22\controller\gallery\screenshot::show_page');
$route->get("gallery/screenshot", 'Ofey\Logan22\controller\gallery\screenshot::show_page');
$route->get("gallery/screenshot/my", 'Ofey\Logan22\controller\gallery\screenshot::my_page');
$route->post("gallery/screenshot/my/remove", 'Ofey\Logan22\controller\gallery\screenshot::my_remove');
$route->get("gallery/screenshot/add", 'Ofey\Logan22\controller\gallery\screenshot::show_add_page');
$route->post("gallery/screenshot/load", 'Ofey\Logan22\controller\gallery\screenshot::load_screen');
$route->get("gallery/movie", 'Ofey\Logan22\controller\gallery\movie::show_page');
$route->post("gallery/save", 'Ofey\Logan22\controller\gallery\screenshot::save_description');

//лаунчер
//Пока не используется, нужно создать красивые формы страницы или придумать как это должно работать
$route->get("/launcher/(\d+)", function($server_id) {
    if(!\Ofey\Logan22\model\server\server::get_server_info($server_id)){
        \Ofey\Logan22\component\redirect::location("/main");
    }
    tpl::addVar([
        "serverID" => $server_id,
    ]);
    tpl::display("launcher/launcher.html");
});
$route->get("/launcher/create", function(){
    tpl::display("launcher/create.html");
});

/**
 * ===========================================
 * Роутер админ панели
 * ===========================================
 */
$route->get("/admin/pages", 'Ofey\Logan22\controller\admin\page::list');
$route->get("/admin/pages/create", 'Ofey\Logan22\controller\admin\page::create');
$route->post("/admin/pages/create", 'Ofey\Logan22\controller\admin\page::create_news');
$route->get("/admin/pages/edit/(\d+)", 'Ofey\Logan22\controller\admin\page::edit_news');
$route->post("/admin/pages/edit", 'Ofey\Logan22\controller\admin\page::update_news');
$route->get("/admin/pages/trash/(\d+)", 'Ofey\Logan22\controller\admin\page::trash_send');
$route->get("/admin/options", 'Ofey\Logan22\controller\admin\options::server_show');
$route->post("/admin/option/server/save", 'Ofey\Logan22\controller\admin\options::new_server_save');
$route->post("/admin/option/server/update", 'Ofey\Logan22\controller\admin\options::update_server_save');
$route->post("/admin/option/server/remove", 'Ofey\Logan22\controller\admin\options::remove_server');
$route->post("/admin/option/server/db/connect", 'Ofey\Logan22\controller\admin\options::test_connect_db');
$route->post("/admin/options/server/client/protocol", '\Ofey\Logan22\component\chronicle\client::get_base_collection_class');

$route->get("/admin/options/server/cache", 'Ofey\Logan22\controller\admin\options::cache_page');
$route->post("/admin/options/server/cache", 'Ofey\Logan22\controller\admin\options::cache_save');

$route->get("/admin/options/server/list", 'Ofey\Logan22\controller\admin\options::server_list');
$route->get("/admin/options/server/edit/(\d+)", 'Ofey\Logan22\controller\admin\options::edit_server_show');
$route->get("/admin/options/server/description/(\d+)", 'Ofey\Logan22\controller\admin\options::description_create');
$route->post("/admin/options/server/description", 'Ofey\Logan22\controller\admin\options::description_save');
$route->post("/admin/options/server/description/default", 'Ofey\Logan22\controller\admin\options::description_default_page_save');

$route->get("/admin/options/server/launcher/add/(\d+)", "Ofey\Logan22\controller\admin\launcher::add");
$route->post("/admin/options/server/launcher", "Ofey\Logan22\controller\admin\launcher::addNewServer");

$route->get("/admin/gallery/screen", 'Ofey\Logan22\controller\admin\screen::all');
$route->post("/admin/gallery/screen/enable", 'Ofey\Logan22\controller\admin\screen::add_enable');
$route->post("/admin/gallery/screen/remove", 'Ofey\Logan22\controller\admin\screen::remove');
$route->get("/admin/gallery/screen/options", 'Ofey\Logan22\controller\admin\screen::show_options');
$route->post("/admin/gallery/screen/options/save", 'Ofey\Logan22\controller\admin\screen::options_save');
$route->get("/admin/template", '\Ofey\Logan22\controller\admin\template::show_design');
$route->post("/admin/template/save", '\Ofey\Logan22\controller\admin\template::save_template');
$route->post("/admin/template/readme", '\Ofey\Logan22\controller\admin\template::get_readme');
$route->get("/admin/template/email/forget", '\Ofey\Logan22\controller\admin\template::email_forget');
$route->get("/admin/template/email/password", '\Ofey\Logan22\controller\admin\template::new_password');
$route->get("/admin/options/email", 'Ofey\Logan22\controller\admin\mail::setting');
$route->post("/admin/options/email", 'Ofey\Logan22\controller\admin\mail::setting_save');
$route->get("/admin/donate/config", 'Ofey\Logan22\controller\admin\donate::config');
$route->get("/admin/donate", 'Ofey\Logan22\controller\admin\donate::show');
$route->get("/admin/donate/add", 'Ofey\Logan22\controller\admin\donate::add');
$route->post("/admin/donate/add", 'Ofey\Logan22\controller\admin\donate::add_item');
$route->post("/admin/donate/remove", 'Ofey\Logan22\controller\admin\donate::remove_item');
$route->get("/admin/manual", '\Ofey\Logan22\controller\admin\manual::index');
$route->get("/admin/manual/{name}", '\Ofey\Logan22\controller\admin\manual::get');
$route->get("/admin/forum", 'Ofey\Logan22\controller\admin\forum::index');
$route->post("/admin/forum", 'Ofey\Logan22\controller\admin\forum::save');
$route->get("/admin/chat", '\Ofey\Logan22\controller\admin\chat::show');

$route->post("/captcha", 'Ofey\Logan22\component\captcha\captcha::defence');

$route->set404(function() {
    \Ofey\Logan22\controller\page\error::error404();
});

$route->run();