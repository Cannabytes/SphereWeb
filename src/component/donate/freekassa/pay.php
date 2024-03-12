<?php

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\user\auth\auth;

class freekassa extends \Ofey\Logan22\model\donate\pay_abstract {

    // Описание платежки на сайте.
    protected static array $description = [
        "ru" => "Freekassa [Россия / Беларусь]",
        "en" => "Freekassa [Russia / Belarus]",
    ];

    //Включена/отключена платежная система
    protected static bool $enable = true;

    //Включить только для администратора
    protected static bool $forAdmin = false;

    /**
     * Конфигурация
     * project_id - ID проекта
     * secret1 - секретный ключ №1
     * secret2 - секретный ключ №2
     */
    private $merchant_id      = 12345;
    private $secret_key_1     = '';
    private $secret_key_2     = '';
    private $currency_default = 'RUB';

    /*
     * Список IP адресов, от которых может прити уведомление от платежной системы.
     */
    private array $allowIP = [
        '168.119.157.136',
        '168.119.60.227',
        '138.201.88.124',
        '178.154.197.79',
        '136.243.38.147',
        '136.243.38.149',
        '136.243.38.150',
        '136.243.38.151',
        '136.243.38.189',
        '136.243.38.108',
    ];

    /**
     * @return void
     * Генерируем ссылку для перехода на сайт оплаты
     */
    function create_link(): void {
        auth::get_is_auth() ?: board::notice(false, lang::get_phrase(234));
        donate::isOnlyAdmin(self::class);
        if(empty($this->secret_key_1) OR empty($this->secret_key_2)){
            board::error("Freekassa token is empty");
        }
        filter_input(INPUT_POST, 'count', FILTER_VALIDATE_INT) ?: board::notice(false, "Введите сумму цифрой");

        $donate = __config__donate;

        if ($_POST['count'] < $donate['min_donate_bonus_coin']) {
            board::notice(false, "Минимальное пополнение: " . $donate['min_donate_bonus_coin']  );
        }
        if ($_POST['count'] > $donate['max_donate_bonus_coin']) {
            board::notice(false, "Максимальная пополнение: " . $donate['max_donate_bonus_coin']  );
        }

        $order_amount = $_POST['count'] * ($donate['coefficient']['RUB'] / $donate['quantity']);
        $merchant_id = $this->merchant_id;
        $order_id = auth::get_email();
        $secret_word = $this->secret_key_1;
        $currency = $this->currency_default;
        $sign = md5($merchant_id . ':' . $order_amount . ':' . $secret_word . ':' . $currency . ':' . $order_id);
        $params = [
            'm'         => $merchant_id,
            'oa'        => (string)$order_amount,
            "currency"  => $currency,
            's'         => $sign,
            'o'         => $order_id,
            'us_userid' => auth::get_id(),
        ];
        echo "https://pay.freekassa.ru/?" . http_build_query($params);
    }

    //Получение информации об оплате
    function transfer(): void {
        \Ofey\Logan22\component\request\ip::allowIP($this->allowIP);
        if(empty($this->secret_key_1) OR empty($this->secret_key_2)){
            board::error("Freekassa token is empty");
        }
        $user_id = $_REQUEST['us_userid'];
        $amount = $_REQUEST['AMOUNT'];
        $MERCHANT_ID = $_REQUEST['MERCHANT_ID'];
        $MERCHANT_ORDER_ID = $_REQUEST['MERCHANT_ORDER_ID'];

        $sign = md5($MERCHANT_ID . ':' . $_REQUEST['AMOUNT'] . ':' . $this->secret_key_2 . ':' . $MERCHANT_ORDER_ID);

        if($sign != $_REQUEST['SIGN']){
            die('wrong sign');
        }
        donate::control_uuid($_REQUEST['intid'], get_called_class());

        \Ofey\Logan22\model\admin\userlog::add("user_donate", 545, [$amount, $this->currency_default, get_called_class()]);
        $amount = donate::currency($amount, $this->currency_default);
        auth::change_donate_point($user_id, $amount, get_called_class());
        donate::AddDonateItemBonus($user_id, $amount);
        echo 'YES';
    }



}
