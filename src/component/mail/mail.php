<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 13.09.2022 / 17:13:31
 */

namespace Ofey\Logan22\component\mail;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class mail {

    static public function send(string $email, string $content, string $subject) {
        $mail = new PHPMailer(true);
        try {
            require_once 'src/config/email.php';
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = EMAIL_HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth = EMAIL_SMTP_AUTH;                                   //Enable SMTP authentication
            $mail->Username = EMAIL_USERNAME;                     //SMTP username
            $mail->Password = EMAIL_PASSWORD;                               //SMTP password
            $mail->SMTPSecure = EMAIL_ENCRYPT;            //Enable implicit TLS encryption
            $mail->Port = EMAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet = 'UTF-8';

            $mail->setFrom(EMAIL_USERNAME, $_SERVER["SERVER_NAME"]);
            $mail->addAddress($email, 'Email');

            //Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->msgHTML($content, "src/template/logan22/email_request/");
            $mail->AltBody = 'Enabled HTML';
            $mail->send();
            return [
                'ok' => true,
            ];
        } catch(Exception $e) {
            return [
                'ok'      => false,
                'message' => "{$mail->ErrorInfo}",
            ];
        }
    }
}