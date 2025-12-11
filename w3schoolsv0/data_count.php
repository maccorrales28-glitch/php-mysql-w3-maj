<?php
include 'session_check.php';
include 'config_db.php';

// Contar cuántos usuarios tienen teléfono informado
$sql = "SELECT COUNT(*) AS total
        FROM MyGuests
        WHERE phone <> ''";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo "Número de usuarios con teléfono: " . $row["total"];

mysqli_close($conn);
?>