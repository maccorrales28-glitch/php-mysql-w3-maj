<?php
include 'session_check.php';
include 'config_db.php';

// Crear conexión usando las variables de config_db.php (maz/maz/bbdd_maz_gimnasio)
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Consultamos el total de filas en la tabla del gimnasio
$sql = "SELECT COUNT(*) AS total FROM datos";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Obtenemos el valor, o 0 si falla algo
$total = $row ? $row["total"] : 0;

mysqli_free_result($result);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Total de Accesos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Contador de Accesos</h1>
    
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Resumen de Actividad</h5>
            <p class="card-text">
                Actualmente hay <strong><?php echo $total; ?></strong> accesos registrados en la base de datos.
            </p>
        </div>
    </div>

    <p class="mt-3"><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>