<?php

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\user\auth\auth;

class monobank {

    // Описание платежки на сайте.
    private static array $description = [
        "ru" => "Платежная система MonoBank [Украина]",
        "en" => "Pay system MonoBank [Ukraine]",
    ];

    //Включена/отключена платежная система
    private static bool $enable = true;

    //Включить только для администратора
    private static bool $forAdmin = true;

    public static function isEnable(): bool{
        return self::$enable;
    }

    public static function forAdmin(): bool{
        return self::$forAdmin;
    }

    public static function getDescription(): ?array {
        return self::$description ?? null;
    }

    private $currency_default = 'UAH';

    /**
     * @return mixed
     * Генерируем ссылку для перехода на сайт оплаты
     */
    function create_link() {
        auth::get_is_auth() ?: board::notice(false, lang::get_phrase(234));
        donate::isOnlyAdmin(self::class);

        filter_input(INPUT_POST, 'count', FILTER_VALIDATE_INT) ?: board::notice(false, "Введите сумму цифрой");

        $donate = include 'src/config/donate.php';
        if ($_POST['count'] < $donate['min_donate_bonus_coin']) {
            board::notice(false, "Минимальное пополнение: " . $donate['min_donate_bonus_coin']  );
        }
        if ($_POST['count'] > $donate['max_donate_bonus_coin']) {
            board::notice(false, "Максимальная пополнение: " . $donate['max_donate_bonus_coin']  );
        }

        //Если отбрасываем дробную часть
        $order_amount = floor($_POST['count'] * ($donate['coefficient']['UAH'] / $donate['quantity']) );
        $jsonData = [
            "amount" => $order_amount * 100,
            "ccy" => 980,
            "merchantPaymInfo" => [
                "reference" => auth::get_id(),
                "comment" => "Помощь проекту",
            ],
            "redirectUrl" => "https://lk.sphereweb.net/donate/pay",
            "webHookUrl" => "https://lk.sphereweb.net/donate/webhook/monobank",
            "validity" => 3600,
            "paymentType" => "debit",
        ];
        $json = json_encode($jsonData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        $url = "https://api.monobank.ua/api/merchant/invoice/create";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'X-Token: uwaSNAPIO3pPn5JWbkMO4FAFJe2_uhZRfvGesTa3tdpA',  // Добавьте нужные вам заголовки здесь
        ]);

        $result = curl_exec($ch);
        curl_close($ch);
        if(!$result){
            board::error("Ошибка");
        }
        $jsonData = json_decode($result, true);
        echo $jsonData['pageUrl'];
        return true;
    }

    //Получение информации об оплате
    function webhook(): void {
        // Получаем данные из POST
        $postData = (file_get_contents('php://input'));

        $logData = json_decode($postData, true);
        $status = $logData['status'];
        if($status!='success'){
            return;
        }
        $invoiceId = $logData['invoiceId'];
        $url = "https://api.monobank.ua/api/merchant/invoice/status?invoiceId={$invoiceId}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'X-Token: uwaSNAPIO3pPn5JWbkMO4FAFJe2_uhZRfvGesTa3tdpA',  // Добавьте нужные вам заголовки здесь
        ]);

        $result = curl_exec($ch);
        curl_close($ch);
        $info = json_decode($result, true);

        $status = $info['status'];
        $user_id = $info['reference'];
        $amount = $info['amount'] / 100;
        if($status != 'success'){
            return;
        }

        \Ofey\Logan22\model\admin\userlog::add("user_donate", 545, [$amount, $this->currency_default]);
        auth::change_donate_point($user_id, $amount);
        donate::AddDonateItemBonus($user_id, $amount);

        echo 'YES';

    }


}
