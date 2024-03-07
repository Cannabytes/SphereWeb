<?php

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\user\auth\auth;

class yookassa extends \Ofey\Logan22\model\donate\pay_abstract {

    private string $currency = 'RUB';

	private string $shopId = '';
	
	private string $secretKey = '';

    //Включена/отключена платежная система
    protected static bool $enable = false;

    //Включить только для администратора
    protected static bool $forAdmin = false;

    protected static array $description = [
        "ru" => "Система yookassa [Россия, Беларусь]",
        "en" => "Pay system yookassa [Россия, Беларусь]",
    ];


    /*
     * Список IP адресов, от которых может прити уведомление от платежной системы.
     */
    private array $allowIP = [
        '185.71.76.0/27',
        '185.71.77.0/27',
        '77.75.153.0/25',
		'77.75.156.11',
		'77.75.156.35',
		'77.75.154.128/25',
		'2a02:5180::/32',
    ];


    /**
     * @return void
     * Генерируем ссылку для перехода на сайт оплаты
     */
    function create_link(): void {
        auth::get_is_auth() ?: board::notice(false, lang::get_phrase(234));
        filter_input(INPUT_POST, 'count', FILTER_VALIDATE_INT) ?: board::notice(false, "Введите сумму цифрой");
        donate::isOnlyAdmin(self::class);
        if(empty($this->shopId) OR empty($this->secretKey)){
            board::error('No set token api');
        }
        $donate = __config__donate;
        if ($_POST['count'] < $donate['min_donate_bonus_coin']) {
            board::notice(false, "Минимальное пополнение: " . $donate['min_donate_bonus_coin'] );
        }
        if ($_POST['count'] > $donate['max_donate_bonus_coin']) {
            board::notice(false, "Максимальная пополнение: " . $donate['max_donate_bonus_coin'] );
        }
		$order_amount = $_POST['count'] * ($donate['coefficient']['RUB'] / $donate['quantity']);
		$userId = auth::get_id();
		$params = [
			'metadata' => [
				'userId' => $userId
			],
			'amount' => [
				'value' => $order_amount,
				'currency' => $this->currency
			],
			'capture' => true,
			'confirmation' => [
				'type' => 'redirect',
				'return_url' => \Ofey\Logan22\component\request\url::host("/donate/pay"),
			],
		];
		$ch = curl_init();
		curl_setopt_array($ch, [
			CURLOPT_URL => 'https://api.yookassa.ru/v3/payments',
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => json_encode( $params ),
			CURLOPT_HTTPHEADER => [
				'Authorization: Basic ' . base64_encode( $this->shopId . ':' . $this->secretKey ),
				'Idempotence-Key: ' . uniqid(),
				'Content-Type: application/json'
			]
		]);
		$response = json_decode( curl_exec( $ch ), true );
		curl_close($ch);
		if ( $response['confirmation']['confirmation_url'] )
			die( $response['confirmation']['confirmation_url'] );
		board::notice( false, $response['description'] );
    }

    //Получение информации об оплате
    function transfer(): void {
        \Ofey\Logan22\component\request\ip::allowIP($this->allowIP);
        if(empty($this->shopId) OR empty($this->secretKey)){
            board::error('No set token api');
        }
		$request = json_decode( file_get_contents( 'php://input' ), true );
		
		$event 		= $request['event'] 						?? '';
		$id 	    = $request['object']['id'] 			    	?? '';
		$status 	= $request['object']['status'] 				?? '';
		$amount		= $request['object']['amount']['value']		?? 0;
		$currency	= $request['object']['amount']['currency']	?? $this->currency;
		$userId 	= $request['object']['metadata']['userId']	?? -1;
		
		if ( $event <> 'payment.succeeded' || $status <> 'succeeded' ) {
			header( 'HTTP/1.1 400 Bad request', true, 400 );
			die( 'Bad request' );
		}
        donate::control_uuid($id, get_called_class());

		\Ofey\Logan22\model\admin\userlog::add("user_donate", 545, [$amount, $currency]);
        $amount = donate::currency($amount, $currency);
        auth::change_donate_point((int) $userId, $amount);		
    }
}
 