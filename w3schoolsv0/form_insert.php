<?php
include 'session_check.php';
include 'recoge.php';
include 'config_db.php';

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = recoge("firstname");
    $lastname  = recoge("lastname");
    $email     = recoge("email");
    $usercode  = recoge("usercode");

    if ($firstname == "" || $lastname == "" || $email == "" || $usercode == "") {
        $mensaje = "Todos los campos son obligatorios.";
    } else {
        $sql = "INSERT INTO MyGuests (firstname, lastname, email, usercode)
                VALUES ('$firstname', '$lastname', '$email', '$usercode')";

        if (mysqli_query($conn, $sql)) {
            $mensaje = "Usuario insertado correctamente.";
        } else {
            $mensaje = "Error al insertar: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insertar usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">
    <h1>Insertar usuario</h1>

    <?php
    if ($mensaje != "") {
        echo "<div class=\"alert alert-info\">" . $mensaje . "</div>";
    }
    ?>

    <form action="form_insert.php" method="post">
        <div class="mb-3">
            <label>Firstname:</label>
            <input class="form-control" type="text" name="firstname" required>
        </div>
        <div class="mb-3">
            <label>Lastname:</label>
            <input class="form-control" type="text" name="lastname" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input class="form-control" type="email" name="email" required>
        </div>
        <div class="mb-3">
            <label>Código usuario (ej: u00001):</label>
            <input class="form-control" type="text" name="usercode" required>
        </div>
        <button class="btn btn-primary" type="submit">Insertar</button>
        <button class="btn btn-secondary" type="reset">Borrar</button>
    </form>

    <p class="mt-3"><a href="index.php" class="btn btn-outline-secondary btn-sm">Volver al índice</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
mysqli_close($conn);
?>