<?php
include 'session_check.php';
include 'config_db.php';

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
phone VARCHAR(15),
usercode CHAR(6),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    $mensaje = "Tabla MyGuests creada correctamente";
} else {
    $mensaje = "Error al crear la tabla: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear tabla MyGuests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Crear tabla MyGuests</h1>
    <p><?php echo $mensaje; ?></p>
    <p><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>