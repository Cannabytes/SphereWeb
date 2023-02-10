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

    static public function pay() {
        tpl::addVar("donate_history_pay_self", donate::donate_history_pay_self());
        tpl::addVar("title", lang::get_phrase(233));
        tpl::display("/donate/pay.html");
    }

    static public function shop() {
        tpl::addVar("donate_history", donate::donate_history());
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
            "currency"  => $currency,
            's'         => $sign,
            'o'         => $order_id,
            'us_userid' => auth::get_id(),
        ]);
    }

    /**
     * Формирование сигнатуры и редиректим пользователя на оплату
     */
    public static function sign_primepayments() {
        if(!auth::get_is_auth()) {
            board::notice(false, lang::get_phrase(234));
        }
        require_once 'src/config/donate.php';

        $data = [
            'action'     => 'initPayment',
            'project'    => '1',
            // ID проекта
            'sum'        => 1000,
            // сумма
            'currency'   => 'RUB',
            // валюта
            'innerID'    => "innerID",
            // innerID
            'payWay'     => '1',
            // например 1 для карт, 5 для qiwi
            'email'      => "user@site.com",
            // e-mail
            'returnLink' => 1,
        ];
        $secret1 = '######'; // секретное слово 1
        $data['sign'] = md5($secret1 . $data['action'] . $data['project'] . $data['sum'] . $data['currency'] . $data['innerID'] . $data['email'] . $data['payWay']);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://pay.primepayments.io/API/v2/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);

        $answer = json_decode($server_output, true);
        var_dump($answer);
        if(isset($answer['status']) && $answer['status'] == 'OK') {
            // в переменной link будет ссылка
            // на этот адрес вам нужно перенаправить пользователя
            $link = $answer['result'];
        } else {
            echo "Произошла ошибка: " . $answer['result'];
        }
    }
}