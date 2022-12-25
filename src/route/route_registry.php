<?php

use Ofey\Logan22\model\user\auth\auth as auth_model;
auth_model::user_auth();

$router = new Ofey\Logan22\route\Route();
$router->get("/", 'Ofey\Logan22\controller\promo\promo::index');
$router->get("page", 'Ofey\Logan22\controller\page\page::all_news');
$router->get("page/(\d+)", "Ofey\Logan22\controller\page\page::show");
$router->post("page/comment/add", '\Ofey\Logan22\controller\page\page::add_comment');
$router->post("ajax/get/news", '\Ofey\Logan22\controller\page\page::get_news_ajax');
$router->get("main", 'Ofey\Logan22\controller\main\main::index')->alias("home")->alias("main");
$router->get("registration/account", 'Ofey\Logan22\controller\registration\account::newAccount')->alias("registration_account");
$router->get("registration/account/server/(\d+)", 'Ofey\Logan22\controller\registration\account::newAccount');
$router->post("registration/account", 'Ofey\Logan22\controller\registration\account::requestNewAccount');
$router->post("registration/user", 'Ofey\Logan22\controller\registration\user::add');

$router->post("generation/account", function() {
    echo \Ofey\Logan22\component\account\generation::word();
});
$router->post("generation/password", function() {
    echo \Ofey\Logan22\component\account\generation::password();
});

$router->get("registration/user", 'Ofey\Logan22\controller\registration\user::show')->alias("registration_user");
$router->get("account/password/change/{login}/server/(\d+)", 'Ofey\Logan22\controller\account\password\change::show');
$router->post("account/password/change", 'Ofey\Logan22\controller\account\password\change::password');
$router->get("account/comparison/server/(\d+)", 'Ofey\Logan22\controller\account\comparison\comparison::call');
$router->get("account/info/([a-zA-Z0-9]+)/player/{char_name}/server/(\d+)", 'Ofey\Logan22\controller\account\info\info::player');
$router->get("about/(\d+)", 'Ofey\Logan22\controller\about\about::show');

/**
 * Авторизация
 */
$router->get("auth", 'Ofey\Logan22\controller\user\auth\auth::index');
$router->post("auth", 'Ofey\Logan22\controller\user\auth\auth::auth_request');
$router->get("auth/logout", 'Ofey\Logan22\controller\user\auth\auth::logout');
$router->get("auth/forget", 'Ofey\Logan22\controller\user\auth\auth::forget');
$router->post("auth/forget/send/code", 'Ofey\Logan22\controller\user\auth\auth::send_email_forget');
$router->post("auth/forget/verification/code", 'Ofey\Logan22\controller\user\auth\auth::send_email_verification_forget');
$router->get("/auth/forget/code/{code}", 'Ofey\Logan22\controller\user\auth\auth::open_forget_page');
$router->post("/auth/forget/send/password", 'Ofey\Logan22\controller\user\auth\auth::send_password');

/**
 * Пользовательское
 */
$router->get("user/change", '\Ofey\Logan22\controller\user\profile\change::show');
$router->post("user/change", '\Ofey\Logan22\controller\user\profile\change::save');
$router->get("user/change/lang/{lang}", 'Ofey\Logan22\component\lang\lang::set_lang');
$router->post("user/change/default/server", '\Ofey\Logan22\controller\user\default_server::change');
$router->get("user/change/avatar", 'Ofey\Logan22\controller\user\profile\change::show_avatar_page');
$router->post("user/change/avatar", 'Ofey\Logan22\controller\user\profile\change::save_avatar');
$router->get("user/change/avatar/background", 'Ofey\Logan22\controller\user\profile\change::show_background_avatar_page');
$router->post("user/change/avatar/background", 'Ofey\Logan22\controller\user\profile\change::set_avatar_background');

/**
 * Форум
 */
$router->get("channel", 'Ofey\Logan22\controller\channel\channel::all');
$router->get("channel/(\d)", 'Ofey\Logan22\controller\channel\channel::read');
$router->post("channel/(\d)", 'Ofey\Logan22\controller\channel\channel::writePost');
$router->get("channel/create", 'Ofey\Logan22\controller\channel\channel::create');
/**
 * Статистика
 */
$router->get("/statistic/class/{class_name}", 'Ofey\Logan22\controller\statistic\statistic::class');
$router->get("statistic/pvp", 'Ofey\Logan22\controller\statistic\statistic::pvp');
$router->post("statistic/pvp/ajax", 'Ofey\Logan22\controller\statistic\statistic::pvp_ajax');
$router->get("statistic/pk", 'Ofey\Logan22\controller\statistic\statistic::pk');
$router->post("statistic/pk/ajax", 'Ofey\Logan22\controller\statistic\statistic::pk_ajax');
$router->get("statistic/clan", 'Ofey\Logan22\controller\statistic\statistic::clan');
$router->post("statistic/clan/ajax", 'Ofey\Logan22\controller\statistic\statistic::clan_ajax');
$router->get("statistic/clan/{clan_name}", 'Ofey\Logan22\controller\statistic\statistic::clan_info');
$router->get("statistic/online/time", 'Ofey\Logan22\controller\statistic\statistic::online_time');
$router->post("statistic/player/ajax", 'Ofey\Logan22\controller\statistic\statistic::player_ajax');
$router->get("statistic/block", 'Ofey\Logan22\controller\statistic\statistic::block');
$router->get("statistic/heroes", 'Ofey\Logan22\controller\statistic\statistic::heroes');
$router->get("statistic/castle", 'Ofey\Logan22\controller\statistic\statistic::castle');
$router->post("statistic/castle/ajax", 'Ofey\Logan22\controller\statistic\statistic::castle_ajax');
$router->post("statistic/block/ajax", 'Ofey\Logan22\controller\statistic\statistic::block_ajax');
$router->post("statistic/heroes/ajax", 'Ofey\Logan22\controller\statistic\statistic::heroes_ajax');
$router->post("statistic/other/ajax", 'Ofey\Logan22\controller\statistic\statistic::other_ajax');

$router->get("/statistic/char/{char_name}", 'Ofey\Logan22\controller\statistic\statistic::char_info');

/**
 * Донат
 */
$router->get("donate", '\Ofey\Logan22\controller\donate\pay::show')->alias('donate');
$router->post("donate/sign/freekassa", '\Ofey\Logan22\controller\donate\pay::sign_freekassa');
$router->post("donate/transaction", 'Ofey\Logan22\controller\donate\pay::transaction');
$router->post("donate/pay/success/freekassa", '\Ofey\Logan22\model\donate\freekassa::transaction');

/**
 * Галерея
 */
$router->get("gallery", 'Ofey\Logan22\controller\gallery\screenshot::show_page');
$router->get("gallery/screenshot", 'Ofey\Logan22\controller\gallery\screenshot::show_page');
$router->get("gallery/screenshot/my", 'Ofey\Logan22\controller\gallery\screenshot::my_page');
$router->post("gallery/screenshot/my/remove", 'Ofey\Logan22\controller\gallery\screenshot::my_remove');
$router->get("gallery/screenshot/add", 'Ofey\Logan22\controller\gallery\screenshot::show_add_page');
$router->post("gallery/screenshot/load", 'Ofey\Logan22\controller\gallery\screenshot::load_screen');
$router->get("gallery/movie", 'Ofey\Logan22\controller\gallery\movie::show_page');
$router->post("gallery/save", 'Ofey\Logan22\controller\gallery\screenshot::save_description');

/**
 * ===========================================
 * Роутер админ панели
 * ===========================================
 */
$router->get("/admin/pages", 'Ofey\Logan22\controller\admin\page::list');
$router->get("/admin/pages/create", 'Ofey\Logan22\controller\admin\page::create');
$router->post("/admin/pages/create", 'Ofey\Logan22\controller\admin\page::create_news');
$router->get("/admin/pages/edit/(\d+)", 'Ofey\Logan22\controller\admin\page::edit_news');
$router->post("/admin/pages/edit", 'Ofey\Logan22\controller\admin\page::update_news');
$router->get("/admin/pages/trash", 'Ofey\Logan22\controller\admin\page::trash');
$router->get("/admin/pages/trash/(\d+)", 'Ofey\Logan22\controller\admin\page::trash_send');
$router->get("/admin/pages/remove/(\d+)", 'Ofey\Logan22\controller\admin\page::remove');
$router->get("/admin/pages/remove/all", 'Ofey\Logan22\controller\admin\page::remove_all');
$router->get("/admin/options", 'Ofey\Logan22\controller\admin\options::server_show');
$router->post("/admin/option/server/save", 'Ofey\Logan22\controller\admin\options::new_server_save');
$router->post("/admin/option/server/update", 'Ofey\Logan22\controller\admin\options::update_server_save');
$router->post("/admin/option/server/remove", 'Ofey\Logan22\controller\admin\options::remove_server');
$router->post("/admin/option/server/db/connect", 'Ofey\Logan22\controller\admin\options::test_connect_db');
$router->get("/admin/options/server/list", 'Ofey\Logan22\controller\admin\options::server_list');
$router->get("/admin/options/server/edit/(\d+)", 'Ofey\Logan22\controller\admin\options::edit_server_show');
$router->get("/admin/options/server/description/(\d+)", 'Ofey\Logan22\controller\admin\options::description_create');
$router->post("/admin/options/server/description", 'Ofey\Logan22\controller\admin\options::description_save');
$router->post("/admin/options/server/description/default", 'Ofey\Logan22\controller\admin\options::description_default_page_save');
$router->get("/admin/gallery/screen", 'Ofey\Logan22\controller\admin\screen::all');
$router->post("/admin/gallery/screen/enable", 'Ofey\Logan22\controller\admin\screen::add_enable');
$router->post("/admin/gallery/screen/remove", 'Ofey\Logan22\controller\admin\screen::remove');
$router->get("/admin/gallery/screen/options", 'Ofey\Logan22\controller\admin\screen::show_options');
$router->post("/admin/gallery/screen/options/save", 'Ofey\Logan22\controller\admin\screen::options_save');
$router->get("/admin/template", '\Ofey\Logan22\controller\admin\template::show_design');
$router->post("/admin/template/save", '\Ofey\Logan22\controller\admin\template::save_template');
$router->post("/admin/template/readme", '\Ofey\Logan22\controller\admin\template::get_readme');
$router->get("/admin/template/email/forget", '\Ofey\Logan22\controller\admin\template::email_forget');
$router->get("/admin/template/email/password", '\Ofey\Logan22\controller\admin\template::new_password');
$router->get("/admin/options/email", 'Ofey\Logan22\controller\admin\mail::setting');
$router->post("/admin/options/email", 'Ofey\Logan22\controller\admin\mail::setting_save');
$router->get("/admin/donate", 'Ofey\Logan22\controller\admin\donate::show');
$router->get("/admin/donate/add", 'Ofey\Logan22\controller\admin\donate::add');
$router->post("/admin/donate/add", 'Ofey\Logan22\controller\admin\donate::add_item');
$router->get("/admin/donate/remove/(\d+)", 'Ofey\Logan22\controller\admin\donate::remove_item');
$router->get("/admin/manual", '\Ofey\Logan22\controller\admin\manual::index');
$router->get("/admin/manual/{name}", '\Ofey\Logan22\controller\admin\manual::get');
$router->get("/admin/forum", 'Ofey\Logan22\controller\admin\forum::index');
$router->post("/admin/forum", 'Ofey\Logan22\controller\admin\forum::save');

$router->set404(function() {
    \Ofey\Logan22\controller\page\error::error404();
});
$router->run();