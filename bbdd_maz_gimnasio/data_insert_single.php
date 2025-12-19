<?php
include 'session_check.php';
include 'config_db.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$mensaje = "";

// CAMBIO: Insertar en 'datos' con las columnas correctas
$sql = "INSERT INTO datos (nombre_socio, tipo_suscripcion, fecha_acceso, hora_entrada, duracion_minutos, zona_actividad)
        VALUES ('Socio Prueba Single', 'Basic', '2025-01-01', '10:00 AM', 45, 'Cardio')";

if (mysqli_query($conn, $sql)) {
    $mensaje = "Nuevo registro insertado en 'datos'.";
} else {
    $mensaje = "Error al insertar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insertar 1 registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Insertar 1 registro (Script)</h1>
    <div class="alert alert-info"><?php echo $mensaje; ?></div>
    <p><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>