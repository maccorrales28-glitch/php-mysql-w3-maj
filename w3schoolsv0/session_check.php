<?php
session_start();

if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"] != "admin") {
    header("Location: login.php");
    exit;
}
?>