<?php
include 'session_check.php';
include 'config_db.php';

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE datos (
    socio_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_socio VARCHAR(50) NOT NULL,
    tipo_suscripcion VARCHAR(20),
    fecha_acceso DATE,
    hora_entrada VARCHAR(20),
    duracion_minutos INT(3),
    zona_actividad VARCHAR(30)
)";

if (mysqli_query($conn, $sql)) {
    $mensaje = "Tabla 'datos' creada correctamente";
} else {
    $mensaje = "Error al crear la tabla: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear tabla Gimnasio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Crear Tabla 'datos'</h1>
    <div class="alert alert-info"><?php echo $mensaje; ?></div>
    <p><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>