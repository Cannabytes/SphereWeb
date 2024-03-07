<?php

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\userlog;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\user\auth\auth;

class primepayments extends \Ofey\Logan22\model\donate\pay_abstract {
    /**
     * Конфигурация
     * project_id - ID проекта
     * secret1 - секретный ключ №1
     * secret2 - секретный ключ №2
     */
    private $project_id = 0000;
    private $secret1    = "";
    private $secret2    = "";

    protected static array $description = [
        "ru" => "Primepayments [Россия, Беларусь]",
        "en" => "Primepayments [Russia, Belarus]",
    ];

    //Включена/отключена платежная система
    protected static bool $enable = false;

    //Включить только для администратора
    protected static bool $forAdmin = false;

    /*
     * Список IP адресов, от которых может прити уведомление от платежной системы.
     */
    private array $allowIP = [
        '136.243.38.108',
        '37.1.217.38',
        '186.2.162.11',
    ];

    /**
     * @return void
     * Генерируем ссылку для перехода на сайт оплаты
     */
    function create_link(): void {
        auth::get_is_auth() ?: board::notice(false, lang::get_phrase(234));
        donate::isOnlyAdmin(self::class);

        filter_input(INPUT_POST, 'count', FILTER_VALIDATE_INT) ?: board::notice(false, "Введите сумму цифрой");

        $donate = __config__donate;

        if ($_POST['count'] < $donate['min_donate_bonus_coin']) {
            board::notice(false, "Минимальное пополнение: " . $donate['min_donate_bonus_coin']  );
        }
        if ($_POST['count'] > $donate['max_donate_bonus_coin']) {
            board::notice(false, "Максимальная пополнение: " . $donate['max_donate_bonus_coin']  );
        }
        $sum = $_POST['count'] * ($donate['coefficient']['RUB'] / $donate['quantity']);
        $data = [
            'action' => 'initPayment',
            'project' => $this->project_id,
            'sum' => $sum,
            'currency' => 'RUB',
            'innerID' => auth::get_id(),
            'payWay' => '1',
            'email' => auth::get_email(),
            'returnLink' => 1,
        ];

        $data['sign'] = md5($this->secret1 . $data['action'] . $data['project'] . $sum . $data['currency'] . $data['innerID'] . $data['email'] . $data['payWay']);
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
        \Ofey\Logan22\component\request\ip::allowIP($this->allowIP);

        $hash = md5($this->secret2 . $_POST['orderID'] . $_POST['payWay'] . $_POST['innerID'] . $_POST['sum'] . $_POST['webmaster_profit']);
        if($hash != $_POST['sign'])
            die('wrong sign');
        $user_id = $_POST['innerID'];
        donate::control_uuid($_POST['orderID'], get_called_class());
        //Зачисление на пользовательский аккаунт средств
        $amount = donate::currency($_POST['sum'], $_POST['currency']);
        userlog::add("user_donate", 545, [$_POST['sum'], $_POST['currency']]);
        auth::change_donate_point($user_id, $amount);
        donate::AddDonateItemBonus($user_id, $amount);
        echo 'YES';
    }

}
