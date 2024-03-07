<?php

namespace Ofey\Logan22\component\plugins\api_chat_receiver;

use Ofey\Logan22\component\time\time;
use Ofey\Logan22\model\db\sql;
use Ofey\Logan22\model\user\auth\auth;

class api_chat {

    /**
     * Записываем новое сообщение
     */
    public function add_new_message(): void {
        self::check_verification_code($_POST['code'] ?? null);
        $type = $_POST['type'] ?? 'ALL';
        $message = $_POST['message'] ?? '';
        $player = $_POST['player'] ?? 'No Name';
        $date = $_POST['date'] ?? time::mysql();
        $server_id = $_POST['server'] ?? auth::get_id();
        sql::run("INSERT INTO `chat` (`type`, `message`, `player`, `date`, `server`) VALUES (?, ?, ?, ?, ?)", [
            $type, $message, $player, $date, $server_id
        ]);
        if ($e = sql::exception()) {
            exit(json_encode(['status' => 'fail', 'code' => $e->getCode(), 'message' => $e->getMessage()]));
        }
        echo json_encode(['status' => 'ok', 'lastInsertId' => (int)sql::lastInsertId()]);
    }

    private function check_verification_code($request_verification_code = null): void {
        if($request_verification_code==null){
            exit("Verification code not sent");
        }
        if(mb_strlen($request_verification_code) < 32){
            exit("The verification code must be more than 32 characters");
        }
        if(mb_strlen($request_verification_code) > 600){
            exit("The verification code must contain less than 600 characters.");
        }
        include __DIR__ . "/config.php";
        if(verification_code !== $request_verification_code){
            exit("Error verification code");
        }
    }

}