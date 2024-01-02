<?php

namespace Ofey\Logan22\component\plugins\start_player_pack;

use Ofey\Logan22\model\user\auth\auth;

class custom_twig {

    public function start_player_select_pack() {
        $start_pack = include "config.php";
        return $start_pack[auth::get_default_server()] ?? null;
    }

}