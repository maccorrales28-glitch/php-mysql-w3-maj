<?php
include 'session_check.php';
include 'recoge.php';
include 'config_db.php';

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$mensaje   = "";
$resultado = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $lastname = recoge("lastname");

    if ($lastname == "") {
        $mensaje = "El campo lastname es obligatorio.";
    } else {
        $sql = "SELECT id, firstname, lastname, email, usercode
                FROM MyGuests
                WHERE lastname = '$lastname'";

        $resultado = mysqli_query($conn, $sql);

        if (!$resultado) {
            $mensaje = "Error en la consulta: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Buscar por lastname</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Buscar usuarios por lastname</h1>

    <?php
    if ($mensaje != "") {
        echo "<div class=\"alert alert-info\">" . $mensaje . "</div>";
    }
    ?>

    <form action="form_select_lastname.php" method="post" class="mb-3">
        <div class="mb-3">
            <label>Lastname:</label>
            <input class="form-control" type="text" name="lastname" required>
        </div>
        <button class="btn btn-primary" type="submit">Buscar</button>
        <button class="btn btn-secondary" type="reset">Borrar</button>
    </form>

    <?php
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        echo "<h2>Resultados:</h2>";
        echo "<ul class=\"list-group\">";
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<li class=\"list-group-item\">";
            echo "ID: "         . $fila["id"] .
                 " - Name: "    . $fila["firstname"] . " " . $fila["lastname"] .
                 " - Email: "   . $fila["email"] .
                 " - Usercode: ". $fila["usercode"];
            echo "</li>";
        }
        echo "</ul>";
    } elseif ($resultado) {
        echo "<p>No hay usuarios con ese lastname.</p>";
    }
    ?>

    <p class="mt-3"><a href="index.php" class="btn btn-outline-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
if ($resultado) {
    mysqli_free_result($resultado);
}
mysqli_close($conn);
?>