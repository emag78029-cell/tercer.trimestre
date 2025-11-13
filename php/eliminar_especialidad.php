<?php
require 'conexion_mysqli.php';

$mensaje = '';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    if ($id > 0) {
        $stmt = $mysqli->prepare("DELETE FROM especialidades WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $mensaje = $stmt->affected_rows > 0 ? "<p>Especialidad eliminada.</p>" : "<p>No se encontró la especialidad.</p>";
            } else {
                $mensaje = "<p>Error: " . $stmt->error . "</p>";
            }
            $stmt->close();
        } else {
            $mensaje = "<p>Error en la consulta: " . $mysqli->error . "</p>";
        }
    } else {
        $mensaje = "<p>ID no válido.</p>";
    }
} else {
    $mensaje = "<p>No se especificó ID.</p>";
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Eliminar Especialidad</title>
</head>
<body>
<h1>Resultado</h1>
<?php echo $mensaje; ?>
<p><a href="listar_especialidades.php">Volver al listado</a></p>
</body>
</html>
