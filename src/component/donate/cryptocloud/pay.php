<?php

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\user\auth\auth;

class cryptocloud extends \Ofey\Logan22\model\donate\pay_abstract {

    /****** SETTING *****/

    //Включена/отключена платежная система
    //Enabled/Disabled pay system
    protected static bool $enable = true;

    //Включить только для администратора
    //Enable for administrator only
    protected static bool $forAdmin = false;

    //Валюта по-умолчанию
    //Default currency
    protected string $currency_default = 'USD';

    //Описание
    //Description
    protected static array $description = [
        "ru" => "CryptoCloud",
        "en" => "CryptoCloud",
    ];

    private string $apiKey = '';
    private string $shopId = '';
	private string $secretKey = '';

    /*
     * Список IP адресов, от которых может прийти уведомление от платежной системы.
     * List of IP addresses from which notifications from the payment system can come.
     */
    private array $allowIP = [];

    /****** IMPLEMENTATION *****/


    /**
     * @return void
     * Генерируем ссылку для перехода на сайт оплаты
     */
    function create_link(): void {
        auth::get_is_auth() ?: board::notice(false, lang::get_phrase(234));
        donate::isOnlyAdmin(self::class);
        if(empty($this->shopId) OR empty($this->apiKey) OR empty($this->secretKey)){
            board::error('No set token api');
        }
        filter_input(INPUT_POST, 'count', FILTER_VALIDATE_INT) ?: board::notice(false, "Введите сумму цифрой");

        $donate = __config__donate;

        if ($_POST['count'] < $donate['min_donate_bonus_coin']) {
            board::notice(false, "Минимальное пополнение: " . $donate['min_donate_bonus_coin']  );
        }
		
        if ($_POST['count'] > $donate['max_donate_bonus_coin']) {
            board::notice(false, "Максимальная пополнение: " . $donate['max_donate_bonus_coin']  );
        }

        $order_amount = $_POST['count'] * ($donate['coefficient']['USD'] / $donate['quantity']);

		$response = $this->getResponse('https://api.cryptocloud.plus/v2/invoice/create', [
			'shop_id' => $this->shopId,
			'amount' => $order_amount, 
			'order_id' => auth::get_id() . '@' . time(),
			'currency' => $this->currency_default, 
			'email' => auth::get_email()
		]);
		
		$status = $response['status'] ?? 'fail';
		
		if ( $status <> 'success' ) {
			board::notice( false, $response['msg'] ?? $response['detail'] ?? 'Unknown error' );
		}
		
		echo $response['result']['link'];
    }

    //Получение информации об оплате
    function transfer() {
        \Ofey\Logan22\component\request\ip::allowIP($this->allowIP);
        if(empty($this->shopId) OR empty($this->apiKey) OR empty($this->secretKey)){
            board::error('No set token api');
        }

        $jwtParts = explode('.', $_REQUEST['token'] ?? '..');
        $signature = $jwtParts[2];

        $generatedSignature = hash_hmac('sha256', $jwtParts[0] . '.' . $jwtParts[1], $this->secretKey, true);
        $generatedSignature = strtr(rtrim(base64_encode($generatedSignature), '='), '+/', '-_');

        if ( !hash_equals( $signature, $generatedSignature ) ) {
            header( 'HTTP/1.1 400 Bad Request', true, 400 );
            die('Bad sign!');
        }

		$response = $this->getResponse('https://api.cryptocloud.plus/v2/invoice/merchant/info', [
			'uuids' => [
				$_REQUEST['invoice_id'] ?? ''
			],
		]);
        if(isset($response['detail'])){
            die($response['detail']);
        }
		if ( $response['status'] <> 'success' || $response['result'][0]['status'] <> 'paid' ) {
			header( 'HTTP/1.1 400 Bad Request', true, 400 );
			die('Not paid!');
		}

        donate::control_uuid($_REQUEST['invoice_id'], get_called_class());

		$orderId = explode( '@', $response['result'][0]['order_id'] );		
		$amount = $response['result'][0]['amount_in_fiat'] ?? 0;

        $user_id = $orderId[0];

        \Ofey\Logan22\model\admin\userlog::add("user_donate", 545, [$amount, $this->currency_default]);
        $amount = donate::currency($amount, $this->currency_default);

        auth::change_donate_point($user_id, $amount);
		donate::AddDonateItemBonus($user_id, $amount);

    }
	
	function getResponse($url, $postFields = []) {
		$ch = curl_init();

		curl_setopt_array($ch, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => json_encode($postFields),
			CURLOPT_HTTPHEADER => [
				'Authorization: Token ' . $this->apiKey,
				'Content-Type: application/json'
			]
		]);
		
		$response = json_decode(curl_exec($ch), true);
		curl_close($ch);
		
		return $response;
	}

}
