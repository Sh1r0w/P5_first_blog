<?php

namespace Controllers\Mail;


class sendEmail
{

    function sendEmail($id)
    {
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