<?php
use Ofey\Logan22\component\plugins\user_referer\referer;
$routes = [
    [
        "method"  => "GET",
        "pattern" => "/ref/add/{referer}",
        "file"    => "referer.php",
        "call"    => function($referer) {
            if(!isset($_SESSION['referer'])){
                (new referer())->append_view("$referer.txt", date("d-m-Y H-i-s") . " ". $_SERVER['REMOTE_ADDR']);
            }
            $_SESSION['referer'] = $referer;
            header("Location: https://acepvp.net/");
        },
    ],

    [
        "method"  => "GET",
        "pattern" => "/l2hop",
        "file"    => "referer.php",
        "call"    => function() {
            $_SESSION['referer'] = "l2hop";
            \Ofey\Logan22\component\redirect::location("/");
        },
    ],	

    /*
     * Ниже логика
     */
    //Реализация регистрации
    [
        "method"  => "POST",
        "pattern" => "/registration/account",
        "file"    => "referer.php",
        "call"    => function() {
            (new referer())->registration_account();
        },
    ],

    [
        "method"  => "POST",
        "pattern" => "/registration/user",
        "file"    => "referer.php",
        "call"    => function() {
            (new referer())->registration_user();
        },
    ],

    //Для админ панели вывода статистики
    [
        "method"  => "GET",
        "pattern" => "/admin/referer",
        "file"    => "referer.php",
        "call"    => function() {
            (new referer())->refererList();
        },
    ],
    [
        "method"  => "GET",
        "pattern" => "/admin/referer/sort/{sort}",
        "file"    => "referer.php",
        "call"    => function($sort) {
            (new referer())->refererList($sort);
        },
    ],
    [
        "method"  => "GET",
        "pattern" => "/admin/referer/location/{referer}",
        "file"    => "referer.php",
        "call"    => function($referer) {
            (new referer())->get_referer($referer);
        },
    ],
    [
        "method"  => "GET",
        "pattern" => "/admin/referer/user/char/{email}",
        "file"    => "referer.php",
        "call"    => function($email) {
            (new referer())->get_user_char_info($email);
        },
    ],
    [
        "method"  => "GET",
        "pattern" => "/admin/referer/clan/{clanName}",
        "file"    => "referer.php",
        "call"    => function($clanName) {
            (new referer())->get_clan_users($clanName);
        },
    ],

];
