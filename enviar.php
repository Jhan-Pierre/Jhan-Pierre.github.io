<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'jmunozmanayay@gmail.com';
        $mail->Password = 'jmtkpmbebetyzybn';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->setFrom($correo, $nombre);
        $mail->addAddress('jhanpierre2003@gmail.com', 'Nombre Destinatario');
        $mail->Subject = $asunto;
        $mail->Body = "Nombre: $nombre\nCorreo: $correo\nTeléfono: $telefono\nMensaje: $mensaje";
        $mail->send();
        echo '<script>alert("Correo enviado correctamente."); window.location.href = "index.html";</script>';
    } catch (Exception $e) {
        echo '<script>alert("Hubo un error al enviar el correo."); window.location.href = "index.html";</script>';
    }
}
?>
