<?php

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\donate\donate;
use Ofey\Logan22\model\user\auth\auth;
use Ofey\Logan22\model\bonus\bonus;

class unitpay extends \Ofey\Logan22\model\donate\pay_abstract {

    //Включена/отключена платежная система
    protected static bool $enable = false;

    //Включить только для администратора
    protected static bool $forAdmin = false;

    protected static array $description = [
        "ru" => "Unitpay [Россия, Беларусь]",
        "en" => "Unitpay [Russia, Belarus]",
    ];

    private string $currency_default = 'RUB';

	private string $publicKey = '';
	
	private string $secretKey = '';
	
	private string $desc = 'Консультационные услуги';

    //Включить тест режим
    private const TESTMODE = false;
    private static string $test_key = '';
    private static $test_email = 'example@gmail.com';


    /*
     * Список IP адресов, от которых может прити уведомление от платежной системы.
     */
    private array $allowIP = [];

    /**
     * @return void
     * Генерируем ссылку для перехода на сайт оплаты
     */
    function create_link(): void {
        auth::get_is_auth() ?: board::notice(false, lang::get_phrase(234));
        filter_input(INPUT_POST, 'count', FILTER_VALIDATE_INT) ?: board::notice(false, "Введите сумму цифрой");

        $donate = __config__donate;

        if ($_POST['count'] < $donate['min_donate_bonus_coin']) {
            board::notice(false, "Минимальное пополнение: " . $donate['min_donate_bonus_coin']  );
        }
		
        if ($_POST['count'] > $donate['max_donate_bonus_coin']) {
            board::notice(false, "Максимальная пополнение: " . $donate['max_donate_bonus_coin']  );
        }

		$order_amount = $_POST['count'] * ($donate['coefficient']['RUB'] / $donate['quantity']);
	
		$account = auth::get_id();
		
		$signature = hash( 'sha256', $account . '{up}' . $this->currency_default . '{up}' . $this->desc . '{up}' . $order_amount . '{up}' . $this->secretKey );

		$params = [
			'account' => $account,
			'currency' => $this->currency_default,
			'desc' => $this->desc,
			'sum' => $order_amount,
			'paymentType' => 'card',			
			'cashItems' => base64_encode(json_encode([
				[
					'name' => $this->desc,
					'count' => 1,
					'price' => $order_amount,
					//'currency' => $this->currency_default,
				]
			])),
			'customerEmail' => auth::get_email(),			
			'projectId' => $this->publicKey,
			'resultUrl' => \Ofey\Logan22\component\request\url::host('/donate'),
			'secretKey' => self::TESTMODE ? self::$test_key : $this->secretKey,
			'signature' => $signature
		];
		
		if ( self::TESTMODE ) {
			$params['test'] = 1;
			$params['login'] = self::$test_email;
		}
		
		$requestUrl = 'https://unitpay.ru/api?' . http_build_query([
			'method' => 'initPayment',
			'params' => $params
		], null, '&', PHP_QUERY_RFC3986);
		
		$response = json_decode( file_get_contents( $requestUrl ), true );

		if ( $response['error']['message'] ) {
			board::notice( false, $response['error']['message'] );
		}

		if ($response['result']['redirectUrl']) {
			echo $response['result']['redirectUrl'];
		}
    }

    //Получение информации об оплате
    function transfer(): void {
        \Ofey\Logan22\component\request\ip::allowIP($this->allowIP);
		
        if(empty($this->secretKey)){
            board::error("Unitpay token is empty");
        }

		$method = $_REQUEST['method'] ?? '';
		$userId = $_REQUEST['params']['account'] ?? -1;
		$amount = $_REQUEST['params']['orderSum'] ?? '';
		$crc = $_REQUEST['params']['signature'] ?? '';
		
		unset( $_REQUEST['params']['signature'] );
		ksort( $_REQUEST['params'] );
		$params = implode( '{up}', $_REQUEST['params'] );
		
		$sign = hash( 'sha256', $method . '{up}' . $params . '{up}' . $this->secretKey );
		
		header( 'Content-type: application/json' );
		if ( $crc <> $sign ) {
			die(json_encode([
				'error' => [ 'message' => 'Wrong signature!' ]
			]));
        }
		
		if ( $method <> 'pay' ) {
			die(json_encode([
				'result' => [ 'message' => "Запрос [{$method}] успешно обработан!" ]
			]));
		}
        donate::control_uuid($_REQUEST['unitpayId'], get_called_class());

        if ( !is_numeric( $userId ) ) {
			die(json_encode([
				'error' => [ 'message' => 'Bad request!' ]
			]));
		}

        \Ofey\Logan22\model\admin\userlog::add("user_donate", 545, [$amount, $this->currency_default, get_called_class()]);
        $amount = donate::currency($amount, $this->currency_default);

        auth::change_donate_point((int) $userId, $amount, get_called_class());
		donate::AddDonateItemBonus($userId, $amount);
		echo json_encode([ 'result' => [ 'message' => 'Запрос успешно обработан' ] ]);
    }
}
 