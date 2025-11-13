<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "especialidades";

$mysqli = new mysqli($host, $usuario, $clave, $bd);

if ($mysqli->connect_errno) {
    die("Error de conexión: " . $mysqli->connect_error);
}
?>
