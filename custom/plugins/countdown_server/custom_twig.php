<?php

namespace Ofey\Logan22\custom\plugins\countdown_server;

use DateTime;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\server;
use Ofey\Logan22\model\user\auth\auth;

class custom_twig {

    public function different_start_server() {
        $server_id = auth::get_default_server();
        $info = server::server_info($server_id);
        if(empty($info['data_start_server'])){
            return null;
        }
        $date1 = new DateTime('now');
        $date2 = new DateTime($info['date_start_server']);
        $interval = $date1->diff($date2);
        $days_total = $interval->format('%a'); // Общее количество прошедших дней
        $timeUntilStart = ($date1->getTimestamp() - $date2->getTimestamp());
        if($date1 >= $date2){
            $isStartServer = 1;
        }else{
            $isStartServer = 0;
        }
        return [
            'days_total' => $days_total,
            'hours' => $interval->h,
            'minutes' => $interval->i,
            'seconds' => $interval->s,
            'timeUntilStart' => abs($timeUntilStart),
            'isStartServer' => $isStartServer ,
        ];
    }

    function getDayWord($number) {
        $lastDigit = $number % 10;
        $lastTwoDigits = $number % 100;
        if ($lastTwoDigits >= 11 && $lastTwoDigits <= 19) {
            return lang::get_phrase("_days");
        } elseif ($lastDigit == 1) {
            return lang::get_phrase("_day");
        } elseif ($lastDigit >= 2 && $lastDigit <= 4) {
            return lang::get_phrase("_dayI");
        } else {
            return lang::get_phrase("_days");
        }
    }

    function getHourWord($number) {
        $lastDigit = $number % 10;
        $lastTwoDigits = $number % 100;
        if ($lastTwoDigits >= 11 && $lastTwoDigits <= 19) {
            return lang::get_phrase("_hours");
        } elseif ($lastDigit == 1) {
            return lang::get_phrase("_hour");
        } elseif ($lastDigit >= 2 && $lastDigit <= 4) {
            return lang::get_phrase("_hourI");
        } else {
            return lang::get_phrase("_hours");
        }
    }

}