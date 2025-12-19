<?php
include 'session_check.php';
include 'config_db.php';

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT socio_id, nombre_socio, tipo_suscripcion, fecha_acceso, zona_actividad, hora_entrada 
        FROM datos 
        ORDER BY socio_id DESC LIMIT 100";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listado Completo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h3>Listado de Accesos al Gimnasio</h3>
    <p class="text-muted">Mostrando los últimos 100 registros de la tabla 'datos'.</p>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table class=\"table table-striped table-hover\">";
        echo "<thead class='table-dark'>";
        echo "<tr>
                <th>ID</th>
                <th>Socio</th>
                <th>Suscripción</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Zona</th>
              </tr>";
        echo "</thead>";
        echo "<tbody>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["socio_id"] . "</td>";
            echo "<td>" . $row["nombre_socio"] . "</td>";
            
            $badge = "secondary";
            if($row["tipo_suscripcion"] == 'Gold') $badge = "warning text-dark";
            if($row["tipo_suscripcion"] == 'Platinum') $badge = "info text-dark";
            
            echo "<td><span class='badge bg-$badge'>" . $row["tipo_suscripcion"] . "</span></td>";
            echo "<td>" . $row["fecha_acceso"] . "</td>";
            echo "<td>" . $row["hora_entrada"] . "</td>";
            echo "<td>" . $row["zona_actividad"] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<div class='alert alert-warning'>No hay datos. Asegúrate de ejecutar la <a href='data_load_sql.php'>Carga Masiva</a> primero.</div>";
    }

    if ($result) {
        mysqli_free_result($result);
    }
    mysqli_close($conn);
    ?>

    <p><a href="index.php" class="btn btn-outline-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>