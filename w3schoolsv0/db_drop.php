<?php
include 'session_check.php';
include 'config_db.php';

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$mensaje = "";

// Borrar base de datos (si existe)
$sql = "DROP DATABASE IF EXISTS $dbname";

if (mysqli_query($conn, $sql) == false) {
    $mensaje .= "Error deleting database: " . mysqli_error($conn);
} else {
    $mensaje .= "Database (if it existed) deleted successfully";
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Borrar base de datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Borrar base de datos</h1>
    <p><?php echo $mensaje; ?></p>
    <p><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>