<?php
include 'session_check.php';
include 'recoge.php';
include 'config_db.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = recoge("id");

    if ($id == "") {
        $mensaje = "El campo ID es obligatorio.";
    } else {
        $sql = "DELETE FROM MyGuests WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            $filas = mysqli_affected_rows($conn);
            if ($filas > 0) {
                $mensaje = "Usuario borrado correctamente.";
            } else {
                $mensaje = "No existe ningún usuario con ese ID.";
            }
        } else {
            $mensaje = "Error al borrar: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Borrar usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Borrar usuario por ID</h1>

    <?php
    if ($mensaje != "") {
        echo "<div class=\"alert alert-info\">" . $mensaje . "</div>";
    }
    ?>

    <form action="form_delete_user.php" method="post" class="mb-3">
        <div class="mb-3">
            <label>ID del usuario:</label>
            <input class="form-control" type="number" name="id" min="1" required>
        </div>
        <button class="btn btn-danger" type="submit">Borrar</button>
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