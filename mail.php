<?php
$nombre = $_POST["name"]
$telf = $_POST["telf"]
$email = $_POST["email"]
$mensaje = $_POST["message"]
$body = "Correo del formulario blog.j0s3.com" . "<br>Nombre: " . $nombre . "<br>Teléfono: " . $telf . "<br>Correo: " . $email . "<br>Mensaje:<br> " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'usuario.php';

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'EMAIL_USER';                           // SMTP username
    $mail->Password   = 'EMAIL_PASSWORD';                       // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $nombre);
    $mail->addReplyTo('j0s3.com@gmail.com', 'j0s3.com');
    $mail->CharSet = "UTF-8";
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensaje desde el formulario de blog.j0s3.com';
    $mail->Body    = $body;
    $mail->AltBody = $body;

    $mail->send();
    //echo 'Message has been sent';
    echo '<script>
          aletr("El mensaje se envió correctamente");
          window.history.go(-1);
          </script>
          '
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
