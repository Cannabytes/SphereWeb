<?php

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\template\async;
use Ofey\Logan22\model\user\auth\user;
use Ofey\Logan22\template\tpl;

class users {
    public static function showAll(): void {
        validation::user_protection("admin");
        tpl::addVar("users", user::All());
        tpl::display("/admin/users/users.html");
    }

    public static function edit(): void {
        validation::user_protection("admin");
        $id = $_POST["id"];
        $email = $_POST["email"] ?? "";
        $name = $_POST["name"] ?? "";
        $donate = $_POST["donate"] ?? "";
        $password = $_POST["password"] ?? "";
        $group = $_POST["group"] ?? "user";
        if(user::edit($id, $email, $name, $donate, $password, $group)){
            tpl::addVar("users", user::All());
            $async = new async("admin/users/users.html");
            $async->block("main-container", "content", "update", true);
            $async->block("title", "title");
            $async->send();
        }else{
            board::notice(false, "Failed to edit user");
        }

    }
}