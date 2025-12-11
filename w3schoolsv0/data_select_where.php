<?php
include 'session_check.php';
include 'config_db.php';

$sql = "SELECT id, firstname, lastname, email, phone, usercode
        FROM MyGuests
        WHERE usercode = 'u00003'";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
echo "id: "    . $row["id"] .
 " - Name: "   . $row["firstname"] . " " . $row["lastname"] .
 " - Phone: "  . $row["phone"] .
 " - Usercode: " . $row["usercode"] .
 "<br>";
  }
} else {
    echo "No se ha encontrado el usuario con ese código";
}

mysqli_close($conn);
?>