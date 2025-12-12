<?php
include 'session_check.php';
include 'config_db.php';

$mensaje = "";

$sql = "INSERT INTO MyGuests (firstname, lastname, email, phone, usercode)
VALUES ('Ana', 'López', 'ana@example.com', '611222333', 'u00002')";

if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    $mensaje = "Nuevo registro creado. Último ID: " . $last_id;
} else {
    $mensaje = "Error al insertar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insertar 1 registro + último ID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Insertar 1 registro y mostrar último ID</h1>
    <p><?php echo $mensaje; ?></p>
    <p><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>