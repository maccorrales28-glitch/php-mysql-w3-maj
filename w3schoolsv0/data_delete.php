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

// Borrar al usuario con código u00005
$sql = "DELETE FROM MyGuests
        WHERE usercode = 'u00005'";

if (mysqli_query($conn, $sql)) {
    $filas = mysqli_affected_rows($conn);
    if ($filas > 0) {
        $mensaje = "Registro borrado correctamente (se ha eliminado al usuario con usercode u00005).";
    } else {
        $mensaje = "No existía ningún usuario con usercode u00005.";
    }
} else {
    $mensaje = "Error al borrar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Borrar usuario (script directo)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Borrar usuario por usercode (script directo)</h1>
    <p><?php echo $mensaje; ?></p>
    <p><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>