<?php
include 'session_check.php';
include 'recoge.php';
include 'config_db.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$mensaje   = "";
$resultado = null;

$nombre = recoge("nombre_socio");

if ($nombre == "") {
    $mensaje = "Escribe un nombre para buscar.";
} else {
    $sql = "SELECT socio_id, nombre_socio, tipo_suscripcion, zona_actividad, fecha_acceso
            FROM datos
            WHERE nombre_socio LIKE '%$nombre%'";

    $resultado = mysqli_query($conn, $sql);
    if (!$resultado) { $mensaje = "Error: " . mysqli_error($conn); }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Buscar Socio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Buscar por Nombre de Socio</h1>

    <?php if ($mensaje != "") { echo "<div class=\"alert alert-info\">" . $mensaje . "</div>"; } ?>

    <form action="form_select_lastname.php" method="post" class="mb-3">
        <div class="mb-3">
            <label>Nombre del Socio:</label>
            <input class="form-control" type="text" name="nombre_socio" required>
        </div>
        <button class="btn btn-primary" type="submit">Buscar</button>
    </form>

    <?php
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        echo "<h2>Resultados:</h2>";
        echo "<ul class=\"list-group\">";
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<li class=\"list-group-item\">";
            echo "<strong>ID:</strong> " . $fila["socio_id"] .
                 " | <strong>Socio:</strong> " . $fila["nombre_socio"] .
                 " | <strong>Nivel:</strong> " . $fila["tipo_suscripcion"] .
                 " | <strong>Zona:</strong> " . $fila["zona_actividad"];
            echo "</li>";
        }
        echo "</ul>";
    } elseif ($resultado) {
        echo "<p class='alert alert-warning'>No hay socios con ese nombre.</p>";
    }
    ?>

    <p class="mt-3"><a href="index.php" class="btn btn-outline-secondary btn-sm">Volver</a></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php if ($resultado) mysqli_free_result($resultado); mysqli_close($conn); ?>