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

$sql = "INSERT INTO MyGuests (firstname, lastname, email, phone, usercode)
VALUES ('John', 'Doe', 'john@example.com', '600123456', 'u00001')";

if (mysqli_query($conn, $sql)) {
    $mensaje = "Nuevo registro creado correctamente";
} else {
    $mensaje = "Error al insertar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insertar 1 registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Insertar 1 registro</h1>
    <p><?php echo $mensaje; ?></p>
    <p><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>