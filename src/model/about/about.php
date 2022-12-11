<?php

namespace Ofey\Logan22\model\about;

use Ofey\Logan22\model\db\sql;

class about {

    static public function get_about_server($id) {
        return sql::run("SELECT `server_id`, `description`, `date_create`, `date_update` FROM `server_description` WHERE server_id=?", [$id])->fetch();
    }


}