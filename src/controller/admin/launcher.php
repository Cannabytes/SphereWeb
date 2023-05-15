<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 26.03.2023 / 6:53:39
 */


namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\model\server\server;
use Ofey\Logan22\template\tpl;

class launcher {

    public static function add($serverLauncher): void {
        validation::user_protection("admin");
        tpl::addVar([
            'serverLauncher' => $serverLauncher,
        ]);
        tpl::display("admin/launcher/add.html");
    }

    public static function addNewServer(): void {
        validation::user_protection("admin");
        self::validateInput();
        $appication = trim($_POST['l2app']);
        $buttonphrase = trim($_POST['buttonphrase']) ?: "launch_game";
        $args = trim($_POST['args']);
        if(isset($_POST['serverId']) && filter_var($_POST['serverId'], FILTER_VALIDATE_INT)) {
            $serverId = (int)$_POST['serverId'];
        } else {
            board::notice(false, "Нет передан ID сервера");
        }
        $ok = \Ofey\Logan22\model\admin\launcher::add_new_launcher($appication, $buttonphrase, $args, $serverId);
        if ($ok) {
            board::notice(true, "Добавлено");
        } else {
            board::notice(false, "Произошла ошибка");
        }
    }

    public static function removeLauncher(){
        validation::user_protection("admin");
        self::validateField($_POST['launcherId'] ?? "", "Не передан индификатор удаляемого лаунчера");
        $ok = \Ofey\Logan22\model\admin\launcher::remove($_POST['launcherId']);
        if ($ok) {
            board::notice(true, "Удалено");
        } else {
            board::notice(false, "Произошла ошибка");
        }
    }

    private static function validateInput(): void {
        self::validateField($_POST['l2app'] ?? "", "Необходимо указать приложение для запуска игры. Обычно это /system/l2.exe");
    }

    private static function validateField(string $field, string $errorMsg): void {
        if (trim($field) == "") {
            board::notice(false, $errorMsg);
        }
    }

}
