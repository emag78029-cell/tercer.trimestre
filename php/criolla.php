<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];


    $archivo = fopen("mensajes.txt", "a");
    fwrite($archivo, "Nombre: $nombre\nEmail: $email\nMensaje: $mensaje\n-------------------\n");
    fclose($archivo);

    echo "<h2>Gracias por contactarte, $nombre!</h2>";
    echo "<a href='index.html'>Volver</a>";
}
?>
