<?php
include 'session_check.php';
include 'config_db.php';

// Ordenar por código de usuario de menor a mayor
$sql = "SELECT id, firstname, lastname, email, phone, usercode
        FROM MyGuests
        ORDER BY usercode ASC";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
  echo "Usercode: " . $row["usercode"] .
 " - Name: "  . $row["firstname"] . " " . $row["lastname"] .
 " - Phone: " . $row["phone"] .
 "<br>";
  }
} else {
  echo "Ningún resultado";
}

mysqli_close($conn);
?>