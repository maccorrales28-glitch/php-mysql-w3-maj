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

// Borrar al socio con ID 10
$sql = "DELETE FROM datos
        WHERE socio_id = 10";

if (mysqli_query($conn, $sql)) {
    $filas = mysqli_affected_rows($conn);
    if ($filas > 0) {
        $mensaje = "Registro borrado correctamente (se ha eliminado al socio con ID 10).";
    } else {
        $mensaje = "No se borró nada: No existía ningún socio con ID 10 (o ya fue borrado antes).";
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
    <title>Borrar Socio (Script)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Borrar Socio por ID Fijo (Script Directo)</h1>
    
    <div class="alert alert-light border shadow-sm">
        <p>Intentando borrar al socio con <strong>ID = 10</strong>...</p>
        <hr>
        <h5 class="card-title"><?php echo $mensaje; ?></h5>
    </div>

    <p class="mt-3"><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>