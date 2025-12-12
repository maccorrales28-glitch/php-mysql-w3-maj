<?php
session_start();
include 'recoge.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario    = recoge("usuario");
    $contrasena = recoge("contrasena");

    if ($usuario == "admin" && $contrasena == "P4ssw0rd") {
        $_SESSION["usuario"] = "admin";
        header("Location: index.php");
        exit;
    } else {
        $_SESSION["usuario"] = "";
        $mensaje = "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login aplicación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width: 400px;">
    <h1 class="mb-4">Login</h1>

    <p>Escriba su nombre de usuario y contraseña:</p>

    <?php
    if ($mensaje != "") {
        echo "<div class=\"alert alert-danger\">" . $mensaje . "</div>";
    }
    ?>

    <form action="login.php" method="post">
        <div class="mb-3">
            <label>Usuario:</label>
            <input class="form-control" type="text" name="usuario">
        </div>
        <div class="mb-3">
            <label>Contraseña:</label>
            <input class="form-control" type="password" name="contrasena">
        </div>
        <button class="btn btn-primary" type="submit">Identificar</button>
        <button class="btn btn-secondary" type="reset">Borrar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
