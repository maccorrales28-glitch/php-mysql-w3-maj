<?php
include 'session_check.php';
// Datos de conexión
$servername = "localhost";
$username = "MAZ";
$password = "admin";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password);

// Comprobar conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully<br>";

// Create database
$sql = "CREATE DATABASE $dbname";
if (mysqli_query($conn, $sql)==false) {
   echo "Error creating database: " . mysqli_error($conn);
} else {
  echo "Database created successfully";
}

// Close connection
mysqli_close($conn);
?>