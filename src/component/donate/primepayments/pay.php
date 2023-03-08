<?php

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\user\auth\auth;

class primepayments {

    /**
     * Конфигурация
     * project_id - ID проекта
     * secret1 - секретный ключ №1
     * secret2 - секретный ключ №2
     */
    private $project_id = 1;
    private $secret1    = "######";
    private $secret2    = "######";
    /*
     * Список IP адресов, от которых может прити уведомление от платежной системы.
     */
    private $allowIP = [
        '136.243.38.108',
    ];

    /**
     * @return void
     * Проверка IP адреса
     */
    function allowIP(): void {
        if(!in_array($_SERVER['REMOTE_ADDR'], $this->allowIP)) {
            die("Forbidden: Your IP is not in the list of allowed");
        }
    }

    /**
     * @return void
     * Генерируем ссылку для перехода на сайт оплаты
     */
    function create_link(): void {
        auth::get_is_auth() ?: board::notice(false, lang::get_phrase(234));
        filter_input(INPUT_POST, 'count', FILTER_VALIDATE_INT) ?: board::notice(false, "Введите сумму цифрой");

        $data = [
            'action'     => 'initPayment',
            'project'    => $this->project_id,
            'sum'        => $_POST['count'],
            'currency'   => 'RUB',
            'innerID'    => auth::get_id(),
            'payWay'     => '1',
            'email'      => auth::get_email(),
            'returnLink' => 1,
        ];
        $data['sign'] = md5($this->secret1 . $data['action'] . $data['project'] . $data['sum'] . $data['currency'] . $data['innerID'] . $data['email'] . $data['payWay']);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://pay.primepayments.io/API/v2/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        $answer = json_decode($server_output, true);
        if(isset($answer['status']) && $answer['status'] == 'OK') {
            echo $answer['result'];
        } else {
            echo json_encode([
                'ok'      => false,
                'message' => "Error: " . $answer['result'],
            ]);
        }
    }

    //Получение информации об оплате
    function transfer(): void {
        $this->allowIP();
        $hash = md5($this->secret2 . $_POST['orderID'] . $_POST['payWay'] . $_POST['innerID'] . $_POST['sum'] . $_POST['webmaster_profit']);
        if($hash != $_POST['sign'])
            die('wrong sign');
        $user_id = $_POST['innerID'];
        //Зачисление на пользовательский аккаунт средств
        auth::change_donate_point($user_id, $_POST['sum']);
        echo 'YES';
    }
}
