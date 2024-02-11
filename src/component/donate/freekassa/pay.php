<?php

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\user\auth\auth;

class freekassa {

    // Описание платежки на сайте.
    private static array $description = [
        "ru" => "Платежная система freekassa [Россия / Беларусь]",
        "en" => "Pay system freekass [Russia / Belarus]",
    ];

    //Включена/отключена платежная система
    private static bool $enable = true;

    public static function isEnable(): bool{
        return self::$enable;
    }

    public static function getDescription(): ?array {
        return self::$description ?? null;
    }

    /**
     * Конфигурация
     * project_id - ID проекта
     * secret1 - секретный ключ №1
     * secret2 - секретный ключ №2
     */
    private $merchant_id      = 12345;
    private $secret_key_1     = '#######';
    private $secret_key_2     = '#######';
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


        $donate = include 'src/config/donate.php';

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
        $this->allowIP();

        $user_id = $_REQUEST['us_userid'];
        $amount = $_REQUEST['AMOUNT'];
        $MERCHANT_ID = $_REQUEST['MERCHANT_ID'];
        $MERCHANT_ORDER_ID = $_REQUEST['MERCHANT_ORDER_ID'];

        $sign = md5($MERCHANT_ID . ':' . $_REQUEST['AMOUNT'] . ':' . $this->secret_key_2 . ':' . $MERCHANT_ORDER_ID);

        if($sign != $_REQUEST['SIGN']){
            die('wrong sign');
        }

        \Ofey\Logan22\model\admin\userlog::add("user_donate", 545, [$amount, $this->currency_default]);
        $amount = donate::currency($amount, $this->currency_default);
        auth::change_donate_point($user_id, $amount);
        donate::AddDonateItemBonus($amount);
        echo 'YES';
    }
}
