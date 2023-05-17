<?php

namespace Ofey\Logan22\controller\chat;

use Ofey\Logan22\component\cache\cache;
use Ofey\Logan22\component\cache\dir;
use Ofey\Logan22\model\db\sql;

class chat
{
    public static function show(){
        $data = json_decode(file_get_contents('php://input'), true);
        $last_message_id = $data['last_message_id'];
        $server_id = $data['server_id'];

        $actualCache = cache::read(dir::chat->show_dynamic($server_id), decode: true, second: 1);
        if($actualCache){
            $actualCache = self::getLatestRecords($actualCache, $last_message_id, 20);
            echo json_encode($actualCache);
            return;
        }
        $query = sql::run("SELECT * FROM chat WHERE server=? AND type IN (1, 2, 3, 6) ORDER BY id ASC LIMIT 50", [
            $server_id,
        ])->fetchAll();
        foreach($query AS &$item){
            $item['message'] = htmlspecialchars($item['message'], ENT_QUOTES, 'UTF-8');
        }
        cache::clear(dir::chat->show_dynamic(server_id: $server_id));
        cache::save(dir::chat->show_dynamic(server_id: $server_id), $query);
        $query = array_reverse(self::getLatestRecords($query, $last_message_id, 20));
        echo json_encode($query);
    }

    private static function getLatestRecords($cache, $startId, $count) {
        $filteredData = array_filter($cache, function($record) use ($startId) {
            return $record['id'] > $startId;
        });
        $sortedData = array_reverse($filteredData);
        return array_slice($sortedData, 0, $count);
    }

}