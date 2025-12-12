<?php
include 'session_check.php';

// Datos de conexión
$servername = "localhost";
$username   = "MAZ";
$password   = "admin";
$dbname     = "bd_w3_maz"; // o el nombre que uses

$mensaje = "";

// Crear conexión SIN base de datos
$conn = mysqli_connect($servername, $username, $password);

// Comprobar conexión
if (!$conn) {
    $mensaje = "Connection failed: " . mysqli_connect_error();
} else {
    $mensaje = "Connected successfully<br>";

    // Crear base de datos
    $sql = "CREATE DATABASE $dbname";
    if (mysqli_query($conn, $sql) == false) {
        $mensaje .= "Error creating database: " . mysqli_error($conn);
    } else {
        $mensaje .= "Database created successfully";
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear base de datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Crear base de datos</h1>
    <p><?php echo $mensaje; ?></p>
    <p><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>