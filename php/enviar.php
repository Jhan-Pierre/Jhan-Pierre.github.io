<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];

    $destino = "jmunozmanayay@gmail.com";
    $asuntoCorreo = "Envio desde Web Page Personal";

    $cuerpoCorreo = "Nombre: $nombre\n";
    $cuerpoCorreo .= "Correo: $correo\n";
    $cuerpoCorreo .= "Teléfono: $telefono\n";
    $cuerpoCorreo .= "Asunto: $asunto\n";
    $cuerpoCorreo .= "Mensaje: $mensaje\n";

    if (mail($destino, $asuntoCorreo, $cuerpoCorreo)) {
        echo '<script>alert("Mensaje enviado correctamente."); window.location.href = "index.html";</script>';
    } else {
        echo '<script>alert("Hubo un problema al enviar el mensaje."); window.location.href = "index.html";</script>';
    }
}
?>