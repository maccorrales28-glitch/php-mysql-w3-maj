<?php
include 'session_check.php';
include 'config_db.php';

// Contar cuántos usuarios tienen teléfono informado
$sql = "SELECT COUNT(*) AS total
        FROM MyGuests
        WHERE phone <> ''";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$total = $row ? $row["total"] : 0;

mysqli_free_result($result);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contar usuarios con teléfono</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Usuarios con teléfono informado</h1>
    <p>Número de usuarios con teléfono: <?php echo $total; ?></p>
    <p><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>