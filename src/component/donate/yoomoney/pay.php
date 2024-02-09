<?php

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\user\auth\auth;

class yoomoney {

    // Описание платежки на сайте.
    private static array $description = [
        "ru" => "Yoomoney [Россия, Беларусь, Казахстан]",
        "en" => "Yoomoney [Russia, Belarus, Kazakhstan]",
    ];

    //Включена/отключена платежная система
    private static bool $enable = true;

    /**
     * Конфигурация
     * $receiver - Номер кошелька ЮMoney, на который нужно зачислять деньги отправителей.
     * $secret_key - секретный ключ
     */
    private $receiver = '';
    private $secret_key = '';
    private $currency_default = 'RUB';
    private array $allowIP = [];


    public static function isEnable(): bool{
        return self::$enable;
    }

    public static function getDescription(): ?array {
        return self::$description ?? null;
    }

    /*
     * Список IP адресов, от которых может прити уведомление от платежной системы.
     */

    /**
     * @return void
     * Проверка IP адреса
     */
    function allowIP(): void {
        if (!in_array($_SERVER['REMOTE_ADDR'], $this->allowIP)) {
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

        if(empty($this->receiver)){
            board::error("Admin is not set self CARD number");
        }

        $donate = include 'src/config/donate.php';

        if ($_POST['count'] < $donate['min_donate_bonus_coin']) {
            board::notice(false, "Минимальное пополнение: " . $donate['min_donate_bonus_coin']);
        }
        if ($_POST['count'] > $donate['max_donate_bonus_coin']) {
            board::notice(false, "Максимальная пополнение: " . $donate['max_donate_bonus_coin']);
        }

        $order_amount = $_POST['count'] * ($donate['coefficient']['RUB'] / $donate['quantity']);
        $params = [
            'receiver' => $this->receiver,
            'sum' => (string)$order_amount,
            "quickpay-form" => 'donate',
            'label' => auth::get_id(),
            'paymentType' => 'AC',
            'successURL' => "/xyu",
        ];
        echo "https://yoomoney.ru/quickpay/confirm.xml?" . http_build_query($params);
    }

    //Получение информации об оплате
    function transfer(): void {
        $notification_type = $_POST['notification_type'] ?? "";
        if($notification_type != "card-incoming"){
//            $requestData = $_REQUEST;
//            $logData = json_encode($requestData) . PHP_EOL;
//            $logFile = 'err_1_api_requests.log';
//            file_put_contents($logFile, $logData, FILE_APPEND | LOCK_EX);
            exit();
        }
        $request_hash = $_POST['sha1_hash'] ?? "";
        $withdraw_amount = $_POST['withdraw_amount'] ?? 0;
        $operation_id = $_POST['operation_id']  ?? 0;
        $amount = $_POST['amount'] ?? 0;
        $currency = $_POST['currency']  ?? 0;
        $datetime = $_POST['datetime']  ?? "";
        $sender = $_POST['sender'] ?? "";
        $codepro = $_POST['codepro'] ?? "";
        $user_id = $_POST['label'] ?? "";
        $notification_secret = $this->secret_key;
        $hash = sha1("{$notification_type}&{$operation_id}&{$amount}&{$currency}&{$datetime}&{$sender}&{$codepro}&{$notification_secret}&{$user_id}");
        if($hash !== $request_hash){
//            $requestData = $_REQUEST;
//            $logData = json_encode($requestData) . PHP_EOL;
//            $logFile = 'hash_err_api_requests.log';
//            file_put_contents($logFile, $logData, FILE_APPEND | LOCK_EX);
            exit();
        }
        \Ofey\Logan22\model\admin\userlog::add("user_donate", 545, [$withdraw_amount, $this->currency_default], json_encode($_REQUEST) . PHP_EOL);
        $amount = donate::currency($withdraw_amount, $this->currency_default);
        auth::change_donate_point($user_id, $amount);
        exit();
    }
}
