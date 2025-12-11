<?php
include 'session_check.php';
include 'config_db.php';

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

echo "Registros insertados con prepared statements";

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>