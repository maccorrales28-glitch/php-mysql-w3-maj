<?php
include 'session_check.php';
include 'config_db.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$mensaje = "";

// Preparar sentencia para 'datos'
$stmt = mysqli_prepare($conn,
    "INSERT INTO datos (nombre_socio, tipo_suscripcion, fecha_acceso, hora_entrada, duracion_minutos, zona_actividad)
     VALUES (?, ?, ?, ?, ?, ?)"
);

if (!$stmt) {
    die("Error al preparar: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssssis",
    $nombre, $suscripcion, $fecha, $hora, $duracion, $zona
);

$nombre = "Pedro Prepared 1"; $suscripcion = "Gold"; $fecha = "2025-03-01"; $hora = "08:30 AM"; $duracion = 50; $zona = "Pesas";
mysqli_stmt_execute($stmt);

$nombre = "Lucia Prepared 2"; $suscripcion = "Basic"; $fecha = "2025-03-02"; $hora = "09:30 AM"; $duracion = 40; $zona = "Cardio";
mysqli_stmt_execute($stmt);

$mensaje = "Registros insertados usando Prepared Statements.";

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insertar varios (Prepared)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Insertar varios (Prepared Statements)</h1>
    <div class="alert alert-success"><?php echo $mensaje; ?></div>
    <p><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>