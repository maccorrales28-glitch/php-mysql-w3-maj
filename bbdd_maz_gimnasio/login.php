<?php
session_start();
include 'recoge.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario    = recoge("usuario");
    $contrasena = recoge("contrasena");

    if ($usuario == "admin" && $contrasena == "P4ssw0rd") {
        $_SESSION["usuario"] = "admin"; // Guardamos 'admin' en la sesión
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
    <title>Login - Gimnasio MAZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .login-card { max-width: 400px; margin: 100px auto; padding: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); background: white; border-radius: 10px; }
    </style>
</head>
<body>

<div class="container">
    <div class="login-card">
        <h2 class="text-center mb-4 text-primary">Gimnasio MAZ</h2>
        <h5 class="text-center text-muted mb-4">Acceso Privado</h5>

        <?php
        if ($mensaje != "") {
            echo "<div class=\"alert alert-danger\">" . $mensaje . "</div>";
        }
        ?>

        <form action="login.php" method="post">
            <div class="mb-3">
                <label class="form-label">Usuario:</label>
                <input class="form-control" type="text" name="usuario" placeholder="Usuario" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña:</label>
                <input class="form-control" type="password" name="contrasena" placeholder="Contraseña" required>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Entrar</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>