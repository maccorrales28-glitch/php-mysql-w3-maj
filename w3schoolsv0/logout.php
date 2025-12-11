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
</head>
<body>

<p>¿Seguro que quiere desconectarse?</p>

<form action="logout.php" method="post">
    <input type="submit" name="si" value="Sí">
    <input type="submit" name="no" value="No">
</form>

</body>
</html>