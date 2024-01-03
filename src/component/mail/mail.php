<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 13.09.2022 / 17:13:31
 */

namespace Ofey\Logan22\component\mail;


use Ofey\Logan22\component\alert\board;
use Ofey\Logan22\component\lang\lang;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class mail {

    public static function send(string $email, string $content, string $subject) {

        $mail = new PHPMailer(true);
        try {
            if (empty(EMAIL_HOST) or empty(EMAIL_USERNAME) or empty(EMAIL_PASSWORD) or empty(EMAIL_PORT) or empty(EMAIL_SMTP_AUTH) or empty(EMAIL_ENCRYPT)) {
                board::error("Не заполнены данные для отправки почты. Проверьте файл src/config/email.php");
            }
            $mail->isSMTP();

            $mail->CharSet = "UTF-8";
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = function ($str, $level) {
                $GLOBALS['status'][] = $str;
            };

            $mail->SMTPAuth = EMAIL_SMTP_AUTH ?? true;
            $mail->Host = EMAIL_HOST; // SMTP сервера вашей почты
            $mail->Username = EMAIL_USERNAME;
            $mail->Password = EMAIL_PASSWORD;
            $mail->SMTPSecure = EMAIL_ENCRYPT;
            $mail->Port = EMAIL_PORT;

            $mail->setFrom(EMAIL_USERNAME, lang::get_phrase(67));
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $content;
            $mail->AltBody = 'Enabled HTML';
            if ($mail->send()) {
                board::response("notice", ["message" => "Письмо отправлено на почту {$email}", "ok" => true]);
            } else {
                board::error("Не удалось отправить письмо на почту {$email}. {$mail->ErrorInfo}");
            }
        } catch (Exception $e) {
            board::error("Не удалось отправить письмо на почту {$email}. {$mail->ErrorInfo}");
        }
    }
}