<?php
include 'session_check.php';
include 'recoge.php';
include 'config_db.php';

$mensaje   = "";
$resultado = null;
$orden     = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $orden = recoge("orden");

    if ($orden != "ASC" && $orden != "DESC") {
        $mensaje = "Debe elegir un orden válido.";
    } else {
        $sql = "SELECT id, firstname, lastname, email, usercode
                FROM MyGuests
                ORDER BY lastname $orden";

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
    <title>Listar usuarios ordenados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Listar usuarios ordenados por lastname</h1>

    <?php
    if ($mensaje != "") {
        echo "<div class=\"alert alert-info\">" . $mensaje . "</div>";
    }
    ?>

    <form action="form_select_order.php" method="post" class="mb-3">
        <div class="mb-3">
            <label>Orden:</label>
            <select class="form-select" name="orden" required>
                <option value="">-- Seleccione --</option>
                <option value="ASC">Ascendente</option>
                <option value="DESC">Descendente</option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Ver listado</button>
    </form>

    <?php
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        echo "<table class=\"table table-striped\">";
        echo "<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Usercode</th></tr>";
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila["id"] . "</td>";
            echo "<td>" . $fila["firstname"] . " " . $fila["lastname"] . "</td>";
            echo "<td>" . $fila["email"] . "</td>";
            echo "<td>" . $fila["usercode"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } elseif ($resultado) {
        echo "<p>No hay usuarios.</p>";
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