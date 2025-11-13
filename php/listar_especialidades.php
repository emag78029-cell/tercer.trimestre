<?php
require 'conexion_mysqli.php';

$especialidades = [];
$mensaje = '';

$resultado = $mysqli->query("SELECT id, nombre, img, descripcion FROM especialidades ORDER BY nombre ASC");

if ($resultado) {
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $especialidades[] = $fila;
        }
    } else {
        $mensaje = "<p>No hay especialidades.</p>";
    }
    $resultado->free();
} else {
    $mensaje = "<p>Error en la consulta: " . $mysqli->error . "</p>";
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Listado de Especialidades</title>
</head>
<body>
<h1>Listado de Especialidades</h1>
<?php echo $mensaje; ?>

<?php if (!empty($especialidades)): ?>
<table border="1" cellpadding="8">
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Imagen</th>
<th>Descripción</th>
<th>Acciones</th>
</tr>
<?php foreach ($especialidades as $esp): ?>
<tr>
<td><?php echo $esp['id']; ?></td>
<td><?php echo htmlspecialchars($esp['nombre']); ?></td>
<td>
<?php if (!empty($esp['img'])): ?>
<img src="<?php echo htmlspecialchars($esp['img']); ?>" width="100" alt="<?php echo htmlspecialchars($esp['nombre']); ?>">
<?php else: ?>
Sin imagen
<?php endif; ?>
</td>
<td><?php echo nl2br(htmlspecialchars($esp['descripcion'])); ?></td>
<td><a href="eliminar_especialidad.php?id=<?php echo $esp['id']; ?>" onclick="return confirm('¿Eliminar?');">Eliminar</a></td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>

<p><a href="cargar_especialidad.php">Agregar nueva especialidad</a></p>
</body>
</html>
