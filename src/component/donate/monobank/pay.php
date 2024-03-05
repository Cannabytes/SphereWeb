<?php

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\user\auth\auth;

class monobank extends \Ofey\Logan22\model\donate\pay_abstract {

    private string $monobank_token = '';
    private string $currency_default = 'UAH';

    //Включена/отключена платежная система
    protected static bool $enable = false;

    //Включить только для администратора
    protected static bool $forAdmin = false;

    // Описание платежки на сайте.
    protected static array $description = [
        "ru" => "MonoBank [Украина]",
        "en" => "MonoBank [Ukraine]",
    ];

    /**
     * @return mixed
     * Генерируем ссылку для перехода на сайт оплаты
     */
    function create_link() {
        auth::get_is_auth() ?: board::notice(false, lang::get_phrase(234));
        donate::isOnlyAdmin(self::class);
        if(empty($this->monobank_token)){
            board::error("Monobank token is empty");
        }

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
            "redirectUrl" => \Ofey\Logan22\component\request\url::host('/donate/pay'),
            "webHookUrl" => \Ofey\Logan22\component\request\url::host('/donate/webhook/monobank'),
            "validity" => 3600,
            "paymentType" => "debit",
        ];
        $json = json_encode($jsonData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        $url = "https://web.monobank.ua/api/merchant/invoice/create";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            "X-Token: {$this->monobank_token}",  // Добавьте нужные вам заголовки здесь
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
        if(empty($this->monobank_token)){
            board::error("Monobank token is empty");
        }
        // Получаем данные из POST
        $postData = (file_get_contents('php://input'));

        $logData = json_decode($postData, true);
        $status = $logData['status'] ?? '';
        if($status!='success'){
            return;
        }
        $invoiceId = $logData['invoiceId'];

        $url = "https://web.monobank.ua/api/merchant/invoice/status?invoiceId={$invoiceId}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "X-Token: {$this->monobank_token}",  // Добавьте нужные вам заголовки здесь
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
        donate::control_uuid($invoiceId, get_called_class());
        \Ofey\Logan22\model\admin\userlog::add("user_donate", 545, [$amount, $this->currency_default]);
        auth::change_donate_point($user_id, $amount);
        donate::AddDonateItemBonus($user_id, $amount);

        echo 'YES';

    }


}
