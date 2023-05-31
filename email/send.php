<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

$mail = new PHPMailer;
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = gethostbyname('smtp.office365.com');
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = '';
$mail->Password = '';

$mail->setFrom('raftasschimaia@hotmail.com', "Rafaela Projeto");

$mail->addAddress('mased28066@pgobo.com');
$mail->Subject = 'E-mail de teste';
$mail->CharSet = 'UTF-8';

$mail->msgHTML("<h1>Email enviado com sucesso</h1><p>Parabéns! Deu tudo certo.</p>");
$mail->AltBody = "Email enviado com sucesso. Parabéns! Deu tudo certo";

if ($mail->send()) {
    echo "E-mail enviado com sucesso!";
} else {
    echo "Falha ao enviar o e-mail";
}
