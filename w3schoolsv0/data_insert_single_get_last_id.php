<?php
include 'session_check.php';
include 'config_db.php';

$sql = "INSERT INTO MyGuests (firstname, lastname, email, phone, usercode)
VALUES ('Ana', 'López', 'ana@example.com', '611222333', 'u00002')";

if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    echo "Nuevo registro creado. Último ID: " . $last_id;
} else {
    echo "Error al insertar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>