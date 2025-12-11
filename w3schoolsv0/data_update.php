<?php
include 'session_check.php';
include 'config_db.php';

// Cambiar el teléfono del usuario con código u00001
$sql = "UPDATE MyGuests
        SET phone = '699000111'
        WHERE usercode = 'u00001'";

if (mysqli_query($conn, $sql)) {
    echo "Teléfono actualizado correctamente";
} else {
    echo "Error al actualizar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>