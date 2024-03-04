<?php

namespace Ofey\Logan22\controller\chat;

use DateTime;
use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\cache\cache;
use Ofey\Logan22\component\cache\dir;
use Ofey\Logan22\component\time\time;
use Ofey\Logan22\model\db\sql;

class chat {

    const COOLDOWN_SECONDS = 2;

    public static function show() {
        $lastUsage = $_SESSION['last_request_chat'] ?? 0;
        $currentTime = time();
        // Проверяем, прошло ли время задержки
        if ($currentTime - $lastUsage < self::COOLDOWN_SECONDS) {
           echo json_encode([]);
           return;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        $last_message_id = $data['last_message_id'] ?? 0;
        $server_id = $data['server_id'] ?? null;
        if ($server_id === null) {
            $server_id = $_POST['server_id'] ?? \Ofey\Logan22\model\user\auth\auth::get_default_server();
        }

        $actualCache = cache::read(dir::chat->show_dynamic($server_id), decode: true, second: 1);
        if ($actualCache) {
            $actualCache = self::getLatestRecords($actualCache, $last_message_id, 20);
            echo json_encode($actualCache);
            $_SESSION['last_request_chat'] = $currentTime;
            return;
        }
        $query = sql::run("SELECT *, TIMEDIFF(NOW(), date) AS time_difference FROM chat WHERE server = ? AND type IN ('ALL', 'GLOBAL', 'TRADE') ORDER BY id DESC LIMIT 15;", [
            $server_id,
        ])->fetchAll();
        foreach ($query as &$item) {
            $item['message'] = htmlspecialchars($item['message'], ENT_QUOTES, 'UTF-8');
            $item['timeAgo'] = time::secToHum($item['time_difference']);
        }
        cache::save(dir::chat->show_dynamic(server_id: $server_id), $query);
        $query = self::getLatestRecords($query, $last_message_id, 20);
        echo json_encode($query);
        $_SESSION['last_request_chat'] = $currentTime;

    }

    private static function getLatestRecords($cache, $startId, $count): array {
        $filteredData = array_filter($cache, function ($record) use ($startId) {
            return $record['id'] > $startId;
        });
        $sortedData = array_reverse($filteredData);
        return array_slice($sortedData, 0, $count);
    }



}