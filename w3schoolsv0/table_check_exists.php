<?php
include 'session_check.php';
include 'config_db.php';

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$mensaje = "Connected successfully<br>";

$sql = "SHOW TABLES LIKE 'MyGuests'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 0) {
    $mensaje .= "Aviso: La tabla MyGuests no existe. No se puede visualizar.";
} elseif ($result && mysqli_num_rows($result) > 0) {
    $mensaje .= "Aviso: La tabla MyGuests existe.";
} else {
    $mensaje .= "Error al comprobar la tabla: " . mysqli_error($conn);
}

if ($result) {
    mysqli_free_result($result);
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Comprobar tabla MyGuests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Comprobar existencia de la tabla MyGuests</h1>
    <p><?php echo $mensaje; ?></p>
    <p><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>