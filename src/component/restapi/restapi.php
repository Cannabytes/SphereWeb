<?php

namespace Ofey\Logan22\component\restapi;

class restapi {

    public static function Send($server, $nameRequest, $args = []): bool|string {
        $serverID = $server['id'];
        $key = $server['rest_api_key'];
        $host = $server['rest_api_hostname'];
        $port = $server['rest_api_port'];

        if (gettype($args) != "array") {
            $args = [$args];
        }
        $data = [
            "key" => $key,
            "request" => [
                "server" => (int)$serverID,
                "name" => $nameRequest,
                "args" => $args,
            ],
        ];
        $jsonData = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $host . ":" . $port);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        if (curl_errno($ch)) {
            echo 'Ошибка cURL: ' . curl_error($ch);
        } else {
            return $response;
        }
        return "NONE";
    }

}