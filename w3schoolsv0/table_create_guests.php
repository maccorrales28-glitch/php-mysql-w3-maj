<?php
include 'session_check.php';
include 'config_db.php';

$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
phone VARCHAR(15),
usercode CHAR(6),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Tabla MyGuests creada correctamente";
} else {
    echo "Error al crear la tabla: " . mysqli_error($conn);
}

mysqli_close($conn);
?>