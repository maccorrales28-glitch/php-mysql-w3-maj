<?php
include 'session_check.php';
include 'config_db.php';

$sql = "SELECT id, firstname, lastname, email, phone, usercode
        FROM MyGuests
        WHERE phone <> ''
        ORDER BY lastname ASC";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listado de usuarios</title>
</head>
<body>
<h1>Listado de usuarios con teléfono</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Código usuario</th>
    </tr>
    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["firstname"] . " " . $row["lastname"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["usercode"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No hay resultados</td></tr>";
    }
    ?>
</table>
</body>
</html>
<?php
mysqli_close($conn);
?>