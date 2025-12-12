<?php
include 'session_check.php';
include 'config_db.php';

// Cambiar el teléfono del usuario con código u00001
$sql = "UPDATE MyGuests
        SET phone = '699000111'
        WHERE usercode = 'u00001'";

if (mysqli_query($conn, $sql)) {
    $mensaje = "Teléfono actualizado correctamente";
} else {
    $mensaje = "Error al actualizar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar teléfono (script directo)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Actualizar teléfono (script directo)</h1>
    <p><?php echo $mensaje; ?></p>
    <p><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>