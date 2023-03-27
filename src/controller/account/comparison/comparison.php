<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 26.08.2022 / 18:14:01
 */

namespace Ofey\Logan22\controller\account\comparison;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\model\admin\validation;

class comparison {

    public static function call($server_id){
        validation::user_protection();
        /**
         * TODO:
         * Проблема теперь что в функции start есть
         * $game_accounts = self::accounts_email($server_info, auth::get_email())->fetchAll();
         * self::accounts_email ищет эмайл на стороне сервера, однона, на некоторых сборках нет графы email, к примеру такой как first team
         * Наверное стоит просто переделать методом ввода логина и пароля
         * TODO: Хотя мне кажется что эта функция вообще уже не рабочая. нужно будет посмотреть по исходникам и удалить
         */
        board::notice(false, 'Отключено, требует теперь переработки');
//
//        \Ofey\Logan22\model\user\player\comparison::start($server_id);
//        header('Location: /main');
        die();
    }

}