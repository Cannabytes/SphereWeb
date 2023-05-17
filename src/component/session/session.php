<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 14.08.2022 / 23:05:18
 */

namespace Ofey\Logan22\component\session;

use Ofey\Logan22\model\user\auth\auth;

class session {

    public static function init(){
        session_start([
            'cookie_lifetime' => 86400*365,
            'gc_maxlifetime' => 86400*365,
            'use_strict_mode' => true,
        ]);
        auth::user_auth();
    }

    public static function add($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function edit($key, $value): bool {
        if(isset($_SESSION[$key])) {
            $_SESSION[$key] = $value;
            return true;
        }
        return false;
    }

    public static function get($key){
        if(!isset($_SESSION[$key])) {
            return null;
        }
        return $_SESSION[$key];
    }

    public static function remove($key) {
        if(isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }

    public static function clear() {
        session_destroy();
    }
}