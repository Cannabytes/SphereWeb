<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 19.09.2022 / 14:11:12
 */

namespace Ofey\Logan22\model\donate;

use Ofey\Logan22\component\time\time;
use Ofey\Logan22\config\config;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;

class freekassa {

    //IP адреса фрикассы
    static private array $allowIP = [
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

    //Проверка соответствия IP адреса
    static private function checkAllowIP() {
        if(!in_array($_SERVER['REMOTE_ADDR'], self::$allowIP)) {
            die("hacking attempt!");
        }
    }

    // сигнатура
    static public function signature($merchant_id, $amount, $merchant_secret, $MERCHANT_ORDER_ID): string {
        return md5($merchant_id . ':' . $amount . ':' . $merchant_secret . ':' . $MERCHANT_ORDER_ID);
    }

    static public function transaction() {
        self::checkAllowIP();
        $user_id = $_POST['us_userid'];
        $amount = $_POST['AMOUNT'];
        $MERCHANT_ID = $_POST['MERCHANT_ID'];
        $MERCHANT_ORDER_ID = $_POST['MERCHANT_ORDER_ID'];
        $P_EMAIL = $_POST['P_EMAIL'];
        $P_PHONE = $_POST['P_PHONE'];
        $commission = $_POST['commission'];
        $SIGN = $_POST['SIGN'];
        include_once 'src/config/donate.php';

        $genSign = self::signature(FREEKASSE['merchant_id'], $amount, FREEKASSE['secret_key_2'], $MERCHANT_ORDER_ID);

        ob_start();
        var_dump($_REQUEST);
        $output = ob_get_clean();
        $dir = 'uploads/log/donate';
        if(!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        file_put_contents($dir . '/' . time() . '.txt', $output, FILE_APPEND);

        if($genSign == $SIGN) {
            auth::change_donate_point($user_id, $amount);

            //Запись логов
            sql::run("INSERT INTO `donate_history` (`user_id`, `point`, `pay_system`, `date`) VALUES (?, ?, ?, ?)", [
                $user_id,
                $amount,
                'Пожертвование через Free-Kassa',
                time::mysql(),
            ]);

            if(config::getDonationBonusPayout() > 0) {
                $bonus = $amount * (100 + config::getDonationBonusPayout()) * 0.01 - $amount;
                auth::change_donate_point($user_id, $bonus);
                sql::run("INSERT INTO `donate_history` (`user_id`, `point`, `pay_system`, `date`) VALUES (?, ?, ?, ?)", [
                    $user_id,
                    $bonus,
                    'Бонус за пожертвование',
                    time::mysql(),
                ]);
            }

            echo 'YES';
        }
    }
}