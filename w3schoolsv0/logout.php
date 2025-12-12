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

<div class="container mt-4">
    <h1>Desconectar</h1>
    <p>¿Seguro que quiere desconectarse?</p>

    <form action="logout.php" method="post">
        <input class="btn btn-danger" type="submit" name="si" value="Sí">
        <input class="btn btn-secondary" type="submit" name="no" value="No">
    </form>

    <p class="mt-3"><a href="index.php" class="btn btn-outline-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>