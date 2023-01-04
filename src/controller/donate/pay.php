<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 30.08.2022 / 0:33:14
 */

namespace Ofey\Logan22\controller\donate;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\template\tpl;

class pay {

    static public function show() {
        tpl::addVar('server_list', server::get_server_info());
        tpl::addVar("products", donate::products());
        tpl::addVar("title", lang::get_phrase(233));
        tpl::display("/donate/donate.html");
    }

    public static function transaction() {
        if(!auth::get_is_auth()) {
            return board::notice(false, lang::get_phrase(234));
        }
        donate::transaction();
    }

    /**
     * Формирование сигнатуры и редиректим пользователя на оплату
     */
    public static function sign_freekassa() {
        if(!auth::get_is_auth()) {
            board::notice(false, lang::get_phrase(234));
        }
        require_once 'src/config/donate.php';
        $order_amount = (float)$_POST['count'];
        $merchant_id = FREEKASSE['merchant_id'];
        $order_id = 1663235344;
        $secret_word = FREEKASSE['secret_key_1'];
        $currency = FREEKASSE['currency_default'];
        $sign = md5($merchant_id . ':' . $order_amount . ':' . $secret_word . ':' . $currency . ':' . $order_id);
        echo json_encode([
            'm'         => $merchant_id,
            'oa'        => (string)$order_amount,
            "currency"   => $currency,
            's'         => $sign,
            'o'         => $order_id,
            'us_userid' => auth::get_id(),
        ]);
    }
}