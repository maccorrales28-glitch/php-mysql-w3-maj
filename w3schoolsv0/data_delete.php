<?php
include 'session_check.php';
include 'config_db.php';

// Borrar al usuario con código u00005
$sql = "DELETE FROM MyGuests
        WHERE usercode = 'u00005'";

if (mysqli_query($conn, $sql)) {
    echo "Registro borrado correctamente (si existía)";
} else {
    echo "Error al borrar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>