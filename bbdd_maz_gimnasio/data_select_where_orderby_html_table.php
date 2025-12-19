<?php
include 'session_check.php';
include 'config_db.php';

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT socio_id, nombre_socio, tipo_suscripcion, fecha_acceso, zona_actividad 
        FROM datos
        WHERE tipo_suscripcion = 'Gold'
        ORDER BY nombre_socio ASC";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Socios Gold</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h3>🏆 Listado de Socios GOLD</h3>
    <p class="text-muted">Mostrando exclusivamente los socios con suscripción Gold.</p>

    <table class="table table-striped table-hover">
        <thead class="table-warning">
            <tr>
                <th>ID</th>
                <th>Nombre Socio</th>
                <th>Suscripción</th>
                <th>Fecha Acceso</th>
                <th>Zona</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["socio_id"] . "</td>";
                echo "<td><strong>" . $row["nombre_socio"] . "</strong></td>";
                echo "<td>" . $row["tipo_suscripcion"] . "</td>";
                echo "<td>" . $row["fecha_acceso"] . "</td>";
                echo "<td>" . $row["zona_actividad"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay socios Gold registrados.</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <p><a href="index.php" class="btn btn-outline-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
if ($result) {
    mysqli_free_result($result);
}
mysqli_close($conn);
?>