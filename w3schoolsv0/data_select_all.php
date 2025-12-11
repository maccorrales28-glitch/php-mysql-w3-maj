<?php
include 'session_check.php';
include 'config_db.php';

$sql = "SELECT id, firstname, lastname, email, phone, usercode FROM MyGuests";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
  echo "id: "  . $row["id"] .
 " - Name: "   . $row["firstname"] . " " . $row["lastname"] .
 " - Email: "  . $row["email"] .
 " - Phone: "  . $row["phone"] .
 " - Usercode: " . $row["usercode"] .
 "<br>";
 }
} else {
  echo "Ningún resultado";
}

mysqli_close($conn);
?>