<?php
include 'session_check.php';
include 'config_db.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$mensaje = "";

$sql = "INSERT INTO datos (nombre_socio, tipo_suscripcion, fecha_acceso, hora_entrada, duracion_minutos, zona_actividad)
        VALUES ('Socio ID Check', 'Gold', '2025-01-02', '11:00 AM', 60, 'Pesas')";

if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    $mensaje = "Registro creado. El ID asignado ha sido: <strong>" . $last_id . "</strong>";
} else {
    $mensaje = "Error al insertar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insertar y obtener ID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Insertar y obtener último ID</h1>
    <div class="alert alert-success"><?php echo $mensaje; ?></div>
    <p><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>