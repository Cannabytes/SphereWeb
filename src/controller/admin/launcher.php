<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 26.03.2023 / 6:53:39
 */


namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\model\admin\validation;
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

        $clientdir = self::sanitizeInput($_POST['clientdir']);
        $patchlist = self::sanitizeInput($_POST['patchlist']);
        $appication = $_POST['l2app'];
        $buttonphrase = isset($_POST['buttonphrase']) ? trim($_POST['buttonphrase']) : 1;
        $serverId = (int)$_POST['serverId'];

        $ok = \Ofey\Logan22\model\admin\launcher::add_new_launcher($clientdir, $patchlist, $appication, $buttonphrase, $serverId);
        if ($ok) {
            board::notice(true, "Добавлено");
        } else {
            board::notice(false, "Произошла ошибка");
        }
    }

    private static function validateInput(): void {
        self::validateField($_POST['clientdir'], "Необходимо указать ссылки на месторасположение клиента");
        self::validateField($_POST['patchlist'], "Необходимо указать ссылки на месторасположение патчлиста");
        self::validateField($_POST['l2app'], "Необходимо указать приложение для запуска игры. Обычно это /system/l2.exe");

    }

    private static function validateField(string $field, string $errorMsg): void {
        if (trim($field) === "") {
            board::notice(false, $errorMsg);
        }
    }

    private static function sanitizeInput(string $input): string {
        $array = explode("\n", $input);
        $links = array_filter($array, function ($link) {
            if (filter_var(trim($link), FILTER_VALIDATE_URL) !== false) {
                return $link;
            } else {
                board::notice(false, "Невалидная ссылка: " . $link);
            }
        });

        return base64_encode(json_encode($links));
    }


}
