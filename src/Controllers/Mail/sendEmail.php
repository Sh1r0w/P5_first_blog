<?php

namespace Controllers\Mail;

class SendEmail
{
    public function sendEmail(int $id): void
    {
        if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $mail = new \PHPMailer\PHPMailer\PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'bbb29c81198d66';
            $mail->Password = 'fa01dcd7c60410';

            $mail->From       = trim($_POST["email_from"]);

            $mail->AddAddress(trim($_POST["email_to"]));

            $mail->Subject    =  $_POST["object"];
            $mail->WordWrap   = 50;
            $mail->AltBody = $_POST["body"];
            $mail->IsHTML(false);
            $mail->MsgHTML($_POST["body"]);

            if (!$mail->send()) {
                echo $mail->ErrorInfo;
            } else {
                header('location: profil?id=' . $id);
            }
        }
    }
}
