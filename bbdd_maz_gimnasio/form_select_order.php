<?php
include 'session_check.php';
include 'recoge.php';
include 'config_db.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$mensaje   = "";
$resultado = null;
$orden     = recoge("orden");

if ($orden != "ASC" && $orden != "DESC") {
    $mensaje = "Selecciona un orden.";
} else {
    $sql = "SELECT socio_id, nombre_socio, tipo_suscripcion, zona_actividad 
            FROM datos 
            ORDER BY nombre_socio $orden";
    $resultado = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listado Ordenado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Listado de Socios (Ordenado por Nombre)</h1>
    
    <form action="form_select_order.php" method="post" class="mb-3">
        <div class="mb-3">
            <label>Orden:</label>
            <select class="form-select" name="orden" required>
                <option value="">-- Seleccione --</option>
                <option value="ASC">Ascendente (A-Z)</option>
                <option value="DESC">Descendente (Z-A)</option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Ver listado</button>
    </form>

    <?php
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        echo "<table class=\"table table-striped\">";
        echo "<thead><tr><th>ID</th><th>Nombre</th><th>Suscripción</th><th>Zona</th></tr></thead>";
        echo "<tbody>";
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila["socio_id"] . "</td>";
            echo "<td>" . $fila["nombre_socio"] . "</td>";
            echo "<td>" . $fila["tipo_suscripcion"] . "</td>";
            echo "<td>" . $fila["zona_actividad"] . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } elseif ($resultado) {
        echo "<p>No hay datos.</p>";
    }
    ?>
    <p class="mt-3"><a href="index.php" class="btn btn-outline-secondary btn-sm">Volver</a></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php if ($resultado) mysqli_free_result($resultado); mysqli_close($conn); ?>