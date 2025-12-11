<?php
include 'session_check.php';
include 'config_db.php';

$sql = "INSERT INTO MyGuests (firstname, lastname, email, phone, usercode)
VALUES ('John', 'Doe', 'john@example.com', '600123456', 'u00001')";

if (mysqli_query($conn, $sql)) {
    echo "Nuevo registro creado correctamente";
} else {
    echo "Error al insertar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>