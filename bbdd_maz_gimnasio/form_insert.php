<?php
include 'session_check.php';
include 'recoge.php';
include 'config_db.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$mensaje = "";

// Recogemos los campos del gimnasio
$nombre_socio     = recoge("nombre_socio");
$tipo_suscripcion = recoge("tipo_suscripcion");
$zona_actividad   = recoge("zona_actividad");
$duracion         = recoge("duracion_minutos");

// Validamos
if ($nombre_socio == "" || $duracion == "") {
    $mensaje = "Nombre y duración son obligatorios.";
} else {
    $sql = "INSERT INTO datos (nombre_socio, tipo_suscripcion, fecha_acceso, hora_entrada, duracion_minutos, zona_actividad)
            VALUES ('$nombre_socio', '$tipo_suscripcion', CURDATE(), CURTIME(), '$duracion', '$zona_actividad')";

    if (mysqli_query($conn, $sql)) {
        $mensaje = "Acceso registrado correctamente en la tabla 'datos'.";
    } else {
        $mensaje = "Error al insertar: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registrar Acceso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Registrar Nuevo Acceso</h1>

    <?php if ($mensaje != "") { echo "<div class=\"alert alert-info\">" . $mensaje . "</div>"; } ?>

    <form action="form_insert.php" method="post">
        <div class="mb-3">
            <label>Nombre del Socio:</label>
            <input class="form-control" type="text" name="nombre_socio" required>
        </div>
        <div class="mb-3">
            <label>Suscripción:</label>
            <select class="form-select" name="tipo_suscripcion">
                <option value="Basic">Basic</option>
                <option value="Gold">Gold</option>
                <option value="Platinum">Platinum</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Zona Actividad:</label>
            <input class="form-control" type="text" name="zona_actividad" placeholder="Ej: Pesas, Piscina">
        </div>
        <div class="mb-3">
            <label>Duración (minutos):</label>
            <input class="form-control" type="number" name="duracion_minutos" required>
        </div>
        <button class="btn btn-primary" type="submit">Registrar</button>
        <button class="btn btn-secondary" type="reset">Limpiar</button>
    </form>

    <p class="mt-3"><a href="index.php" class="btn btn-outline-secondary btn-sm">Volver al índice</a></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php mysqli_close($conn); ?>