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

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id       = recoge("id");
    $lastname = recoge("lastname");

    if ($id == "" || $lastname == "") {
        $mensaje = "ID y lastname son obligatorios.";
    } else {
        $sql = "UPDATE MyGuests
                SET lastname = '$lastname'
                WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            $filas = mysqli_affected_rows($conn);
            if ($filas > 0) {
                $mensaje = "Apellido actualizado correctamente.";
            } else {
                $mensaje = "No existe ningún usuario con ese ID.";
            }
        } else {
            $mensaje = "Error al actualizar: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar lastname</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Actualizar lastname por ID</h1>

    <?php
    if ($mensaje != "") {
        echo "<div class=\"alert alert-info\">" . $mensaje . "</div>";
    }
    ?>

    <form action="form_update_lastname.php" method="post" class="mb-3">
        <div class="mb-3">
            <label>ID del usuario:</label>
            <input class="form-control" type="number" name="id" min="1" required>
        </div>
        <div class="mb-3">
            <label>Nuevo lastname:</label>
            <input class="form-control" type="text" name="lastname" required>
        </div>
        <button class="btn btn-primary" type="submit">Actualizar</button>
        <button class="btn btn-secondary" type="reset">Borrar formulario</button>
    </form>

    <p><a href="index.php" class="btn btn-outline-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
mysqli_close($conn);
?>