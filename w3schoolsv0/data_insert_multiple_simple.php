<?php
include 'session_check.php';
include 'config_db.php';

$sql  = "INSERT INTO MyGuests (firstname, lastname, email, phone, usercode) VALUES ";
$sql .= "('Luis', 'Martínez', 'luis@example.com', '622333444', 'u00003'),";
$sql .= "('María', 'García', 'maria@example.com', '633444555', 'u00004'),";
$sql .= "('Pedro', 'Santos', 'pedro@example.com', '644555666', 'u00005')";

if (mysqli_query($conn, $sql)) {
    echo "Registros múltiples creados correctamente";
} else {
    echo "Error al insertar múltiples registros: " . mysqli_error($conn);
}

mysqli_close($conn);
?>