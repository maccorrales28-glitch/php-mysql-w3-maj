<?php
include 'session_check.php';
include 'config_db.php';

$mensaje = "";

$stmt = mysqli_prepare($conn,
    "INSERT INTO MyGuests (firstname, lastname, email, phone, usercode)
     VALUES (?, ?, ?, ?, ?)"
);

if (!$stmt) {
    die("Error al preparar la consulta: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssss",
    $firstname, $lastname, $email, $phone, $usercode
);

// Primer registro
$firstname = "Carlos";
$lastname  = "Ruiz";
$email     = "carlos@example.com";
$phone     = "655666777";
$usercode  = "u00006";
mysqli_stmt_execute($stmt);

// Segundo registro
$firstname = "Elena";
$lastname  = "Navas";
$email     = "elena@example.com";
$phone     = "666777888";
$usercode  = "u00007";
mysqli_stmt_execute($stmt);

$mensaje = "Registros insertados con prepared statements";

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insertar varios (prepared)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Insertar varios registros (prepared statements)</h1>
    <p><?php echo $mensaje; ?></p>
    <p><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>