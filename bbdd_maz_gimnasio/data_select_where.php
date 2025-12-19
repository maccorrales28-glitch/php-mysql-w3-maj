<?php
include 'session_check.php';
include 'config_db.php';

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT socio_id, nombre_socio, tipo_suscripcion, duracion_minutos, zona_actividad
        FROM datos
        WHERE duracion_minutos > 100
        ORDER BY duracion_minutos DESC";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Entrenamientos Intensos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h3>Entrenamientos Intensos (> 100 min)</h3>
    <p class="text-muted">Mostrando socios que han entrenado más de 100 minutos en una sesión.</p>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<div class='list-group'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='list-group-item list-group-item-action'>";
            echo "<div class='d-flex w-100 justify-content-between'>";
            echo "<h5 class='mb-1'>" . $row["nombre_socio"] . "</h5>";
            echo "<small class='text-danger fw-bold'>⏱️ " . $row["duracion_minutos"] . " min</small>";
            echo "</div>";
            echo "<p class='mb-1'>Actividad: <strong>" . $row["zona_actividad"] . "</strong></p>";
            echo "<small class='text-muted'>Suscripción: " . $row["tipo_suscripcion"] . "</small>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<div class='alert alert-warning'>No hay entrenamientos superiores a 100 minutos registrados o la tabla 'datos' está vacía.</div>";
    }

    if ($result) {
        mysqli_free_result($result);
    }
    mysqli_close($conn);
    ?>

    <p class="mt-3"><a href="index.php" class="btn btn-outline-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>