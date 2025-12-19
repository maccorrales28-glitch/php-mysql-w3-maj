<?php
include 'session_check.php';
include 'recoge.php';
include 'config_db.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$mensaje = "";

$id   = recoge("id");
$tipo = recoge("tipo_suscripcion");

if ($id == "" || $tipo == "") {
    $mensaje = "Indica el ID y la nueva suscripción.";
} else {
    $sql = "UPDATE datos
            SET tipo_suscripcion = '$tipo'
            WHERE socio_id = $id";

    if (mysqli_query($conn, $sql)) {
        $filas = mysqli_affected_rows($conn);
        if ($filas > 0) {
            $mensaje = "Suscripción actualizada correctamente.";
        } else {
            $mensaje = "No se encontró el ID o el socio ya tenía esa suscripción.";
        }
    } else {
        $mensaje = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Suscripción</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Cambiar Nivel de Suscripción</h1>
    <?php if ($mensaje != "") { echo "<div class=\"alert alert-info\">" . $mensaje . "</div>"; } ?>

    <form action="form_update_lastname.php" method="post" class="mb-3">
        <div class="mb-3">
            <label>ID del Socio:</label>
            <input class="form-control" type="number" name="id" min="1" required>
        </div>
        <div class="mb-3">
            <label>Nueva Suscripción:</label>
            <select class="form-select" name="tipo_suscripcion">
                <option value="Basic">Basic</option>
                <option value="Gold">Gold</option>
                <option value="Platinum">Platinum</option>
            </select>
        </div>
        <button class="btn btn-warning" type="submit">Actualizar</button>
    </form>
    <p><a href="index.php" class="btn btn-outline-secondary btn-sm">Volver</a></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php mysqli_close($conn); ?>