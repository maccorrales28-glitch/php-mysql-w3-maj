<?php

// Datos de conexión
$servername = "localhost";
$username = "MAZ";
$password = "admin";
$dbname = "bd_w3_maz";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>