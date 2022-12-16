<?php

namespace Ofey\Logan22\model\encrypt;

use Ofey\Logan22\component\base\source\L2JMobiusHomunculus;

class encrypt {

    //Хэширование пароля личного кабинета
    static public function user_password($password){
        return $password;
    }

    //Хэширование пароля игроков на сервере
    static public function server_password($password, $server_info){
        $algo = $server_info['collection_sql_base_name']::hash();
        switch($algo){
            case 'whirlpool':
                return base64_encode(hash('whirlpool', $password, true));
            case 'sha1':
                return base64_encode(hash('sha1', $password, true));
        }
    }

}