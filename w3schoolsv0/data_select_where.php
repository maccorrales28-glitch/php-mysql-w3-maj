<?php
include 'session_check.php';
include 'config_db.php';

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, firstname, lastname, email, phone, usercode
        FROM MyGuests
        WHERE usercode = 'u00003'";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Buscar usuario por usercode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Usuario con usercode = u00003</h1>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>";
            echo "ID: " . $row["id"] . "<br>";
            echo "Nombre: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
            echo "Teléfono: " . $row["phone"] . "<br>";
            echo "Usercode: " . $row["usercode"] . "<br>";
            echo "</p><hr>";
        }
    } else {
        echo "<p>No se ha encontrado el usuario con ese código</p>";
    }

    if ($result) {
        mysqli_free_result($result);
    }
    mysqli_close($conn);
    ?>

    <p><a href="index.php" class="btn btn-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>