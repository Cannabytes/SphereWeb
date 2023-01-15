<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 14.09.2022 / 12:05:07
 */

namespace Ofey\Logan22\controller\admin;

use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use Ofey\Logan22\model\admin\validation;
use Ofey\Logan22\template\tpl;

class mail {

    static public function setting() {
        validation::user_protection("admin");

        include_once 'src/config/email.php';
        tpl::addVar([
            'EMAIL_HOST' => EMAIL_HOST,
            'EMAIL_USERNAME' => EMAIL_USERNAME,
            'EMAIL_PASSWORD' => EMAIL_PASSWORD,
            'EMAIL_PORT' => EMAIL_PORT,
            'EMAIL_SMTP_AUTH' => EMAIL_SMTP_AUTH,
            'EMAIL_ENCRYPT' => EMAIL_ENCRYPT,
            'title' => lang::get_phrase(219)
        ]);
        tpl::display("admin/options/email.html");
    }

    public static function setting_save() {
        validation::user_protection("admin");
        $host = $_POST['host'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $port = $_POST['port'] ?: '';
        $encrypt = $_POST['encrypt'];
        $email_smtp_auth = $_POST['email_smtp_auth'] ? 'true' : 'false';;
        $saveTXT = "<?php
const EMAIL_HOST = '{$host}';
const EMAIL_USERNAME = '{$username}';
const EMAIL_PASSWORD = '{$password}';
const EMAIL_PORT = {$port};
const EMAIL_SMTP_AUTH = {$email_smtp_auth};
const EMAIL_ENCRYPT = '{$encrypt}';
";
        if(file_put_contents("src/config/email.php", $saveTXT)) {
            board::notice(true, lang::get_phrase(217));
        }
        board::notice(false, lang::get_phrase(218));
    }
}