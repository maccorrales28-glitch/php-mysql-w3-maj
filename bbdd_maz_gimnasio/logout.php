<?php
session_start();
include 'recoge.php';

if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"] != "admin") {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $si = recoge("si");
    $no = recoge("no");

    if ($si != "") {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit;
    }

    if ($no != "") {
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Desconectar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-5 text-center">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h2 class="card-title text-danger">Cerrar Sesión</h2>
            <p class="card-text">¿Estás seguro de que quieres salir del sistema?</p>

            <form action="logout.php" method="post">
                <input class="btn btn-danger btn-lg me-2" type="submit" name="si" value="Sí, salir">
                <input class="btn btn-secondary btn-lg" type="submit" name="no" value="No, volver">
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>