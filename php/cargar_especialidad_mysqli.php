<?php
require 'conexion_mysqli.php'; // Solo nombre del archivo si está en la misma carpeta

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $img = trim($_POST['img']);
    $descripcion = trim($_POST['descripcion']);

    if (!empty($nombre)) {
        $stmt = $mysqli->prepare("INSERT INTO especialidades (nombre, img, descripcion) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $nombre, $img, $descripcion);
            if ($stmt->execute()) {
                $mensaje = "<p style='color:green;'>Especialidad '$nombre' agregada con éxito.</p>";
            } else {
                $mensaje = "<p style='color:red;'>Error: " . $stmt->error . "</p>";
            }
            $stmt->close();
        } else {
            $mensaje = "<p style='color:red;'>Error en la consulta: " . $mysqli->error . "</p>";
        }
    } else {
        $mensaje = "<p style='color:orange;'>Debe ingresar el nombre.</p>";
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Cargar Especialidad</title>
</head>
<body>
<h1>Agregar Especialidad</h1>
<?php echo $mensaje; ?>
<form method="POST">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>
    <label>Imagen (URL o ruta):</label><br>
    <input type="text" name="img"><br><br>
    <label>Descripción:</label><br>
    <textarea name="descripcion" rows="4"></textarea><br><br>
    <button type="submit">Guardar</button>
</form>
<p><a href="listar_especialidades.php">Ver listado</a></p>
</body>
</html>
