<?php

namespace Ofey\Logan22\model\encrypt;

class encrypt {

    //Хэширование пароля личного кабинета
    static public function user_password($password){
        return $password;
    }

    //Хэширование пароля игроков на сервере
    static public function server_password($password, $algo = 'sha1'){
        switch($algo){
            case 'whirlpool':
                return base64_encode(hash('whirlpool', $password, true));
            case 'sha1':
                return base64_encode(hash('sha1', $password, true));
        }
    }

}