<?php
include 'session_check.php';
include("config_db.php");
echo "Connected successfully<br>";

// sql to delete table
$sql = "DROP DATABASE IF EXISTS $dbname";


if (mysqli_query($conn, $sql)==false) {
  echo "Error deleting database: " . mysqli_error($conn);
} else {
  echo "Database (if it existed) deleted successfully";
}

// Close connection
mysqli_close($conn);
?> 
