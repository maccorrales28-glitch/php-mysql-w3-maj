<?php
include 'session_check.php';
include 'config_db.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Nombre de tu archivo SQL subido
$archivo_sql = 'datos.sql'; 

$mensaje = "";

if (file_exists($archivo_sql)) {
    // Leemos el contenido del archivo SQL
    $sql_content = file_get_contents($archivo_sql);
    
    if (mysqli_multi_query($conn, $sql_content)) {
        do {
            if ($result = mysqli_store_result($conn)) {
                mysqli_free_result($result);
            }
        } while (mysqli_more_results($conn) && mysqli_next_result($conn));
        
        $mensaje = "Carga Masiva completada. La tabla 'datos' ha sido reiniciada con la información del archivo SQL.";
    } else {
        $mensaje = "Error SQL al procesar el archivo: " . mysqli_error($conn);
    }
} else {
    $mensaje = "El archivo 'datos.sql' no se encuentra en la carpeta. Súbelo primero.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carga Masiva SQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'cabecera.html'; ?>
    
    <div class="container mt-5 text-center">
        <h1>Resultado de Carga Masiva</h1>
        <div class="alert alert-info mt-4">
            <?php echo $mensaje; ?>
        </div>
        <a href="index.php" class="btn btn-primary btn-lg mt-3">Volver al Panel Principal</a>
    </div>
</body>
</html>