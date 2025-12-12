<?php
include 'session_check.php';
include 'config_db.php';

// Ordenar por código de usuario de menor a mayor
$sql = "SELECT id, firstname, lastname, email, phone, usercode
        FROM MyGuests
        ORDER BY usercode ASC";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listar usuarios ordenados por usercode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Usuarios ordenados por usercode</h1>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table class=\"table table-striped\">";
        echo "<tr><th>Usercode</th><th>Nombre</th><th>Teléfono</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["usercode"] . "</td>";
            echo "<td>" . $row["firstname"] . " " . $row["lastname"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Ningún resultado</p>";
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