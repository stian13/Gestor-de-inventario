<?php
require('../../vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function enviarCorreo($sujeto, $body, $correo, $nombre, $html = false){
    //configuracion del servidor de mensajes de prueba
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '6a68a2ba8c8651';
    $phpmailer->Password = 'dcabc7f9ad8f0b';

    //añadiendo destinatario
    $phpmailer->setFrom('servicioRecuperacio@inventario.com', 'inventarios equipos');
    $phpmailer->addAddress($correo, $nombre);

    //contenido del correo
    $phpmailer->isHTML($html); 
    $phpmailer->Subject = $sujeto;
    $phpmailer->Body    = $body;
    //$phpmailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //eviar el correo XD SEXO ANAL
    $phpmailer->send();
};
?>