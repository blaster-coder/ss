<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Recopila los datos del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Configura el objeto PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'adriancardenasranchal@gmail.com';                     //SMTP username
    $mail->Password   = 'qtae mtmv xzfy azsj';                               //SMTP password
    $mail->SMTPSecure = 'ssl'; // or 'tls'
    $mail->Port       = 465;         

    // Configuración del correo
    $mail->setFrom('adriancardenasranchal@gmail.com', 'Contacte Totenapps');
    $mail->addAddress($email, $name);
    $mail->addReplyTo($email, $name);

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = "Nombre: $name <br> Correo Electrónico: $email <br> Mensaje: $message";

    // Envía el correo
    $mail->send();
    echo 'Missatge enviat correctament.';
} catch (Exception $e) {
    echo "Error al enviar el missatge: {$mail->ErrorInfo}";
}
?>
