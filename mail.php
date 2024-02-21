<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'ssl://smtp.mail.ru';
    $mail->SMTPAuth = true;
    $mail->Username = 'ashimprint_lead@mail.ru';
    $mail->Password = 'LR2BPkkCdwBeC9FGaaHt';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('ashimprint_lead@mail.ru');
    $mail->addAddress('diablo0015@mail.ru');

    $mail->CharSet = 'UTF-8';

    $mail->isHTML(true);
    $mail->Subject = 'Новая заявка с сайта';
    $timestamp = date("Y-m-d H:i:s");
    $mail->Body = 'Имя: ' . $_POST['name'] . '<br>Номер: ' . $_POST['number'] . '<br>Сообщение: ' . $_POST['message'] . '<br>Дата заявки: ' . $timestamp;

    $mail->send();
    http_response_code(200);
    echo 'Message has been sent';
} catch (Exception $e) {
    http_response_code(500);
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>