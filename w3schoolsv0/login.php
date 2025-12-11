<?php
session_start();
include 'recoge.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario    = recoge("usuario");
    $contrasena = recoge("contrasena");

    if ($usuario == "admin" && $contrasena == "admin") {
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
</head>
<body>

<h1>Login</h1>

<p>Escriba su nombre de usuario y contraseña:</p>

<?php
if ($mensaje != "") {
    echo "<p style=\"color:red;\">" . $mensaje . "</p>";
}
?>

<form action="login.php" method="post">
    <p>
        <label>Usuario:</label>
        <input type="text" name="usuario">
    </p>
    <p>
        <label>Contraseña:</label>
        <input type="password" name="contrasena">
    </p>
    <p>
        <input type="submit" value="Identificar">
        <input type="reset" value="Borrar">
    </p>
</form>

</body>
</html>