<?php include 'session_check.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manuel Adame Zaeva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">

    <p>Usuario conectado: admin</p>

    <p><a href="logout.php">Desconectar</a></p>

    <ol>
        <li><a href="db_connect.php">Conectar</a></li>
        <li><a href="db_create.php">Crear la base de datos</a></li>
        <li><a href="db_drop.php">Borrar la base de datos</a></li>
        <li><a href="table_create_guests.php">Crear tabla MyGuests</a></li>
        <li><a href="table_check_exists.php">Verificar existencia de la tabla MyGuests</a></li>
        <li><a href="table_drop.php">Borrar tabla MyGuests</a></li>
        <li><a href="data_insert_single.php">Insertar un registro (script directo)</a></li>
        <li><a href="data_insert_single_get_last_id.php">Insertar registro y mostrar último ID</a></li>
        <li><a href="data_insert_multiple_simple.php">Insertar varios registros (consulta simple)</a></li>
        <li><a href="data_insert_multiple_prepared.php">Insertar varios registros (prepared)</a></li>
        <li><a href="data_count.php">Contar usuarios</a></li>
        <li><a href="data_select_all.php">Listar todos los usuarios</a></li>
        <li><a href="data_select_where.php">Buscar usuario (script directo)</a></li>
        <li><a href="data_select_orderby.php">Listar usuarios ordenados (script directo)</a></li>
        <li><a href="data_select_where_orderby_html_table.php">Listado en tabla HTML</a></li>
        <li><a href="data_delete.php">Borrar usuario (script directo)</a></li>
        <li><a href="data_update.php">Actualizar usuario (script directo)</a></li>
    </ol>

    <h2>Formularios</h2>
    <ul>
        <li><a href="form_insert.php">Insertar un usuario mediante formulario</a></li>
        <li><a href="form_select_lastname.php">Buscar usuarios por lastname mediante formulario</a></li>
        <li><a href="form_select_order.php">Ver todos los usuarios ordenados (ASC/DESC) mediante formulario</a></li>
        <li><a href="form_delete_user.php">Borrar un usuario por ID mediante formulario</a></li>
        <li><a href="form_update_lastname.php">Actualizar el lastname de un usuario por ID mediante formulario</a></li>
    </ul>

    <p>
        Repositorio del proyecto en GitHub:<br>
        <a href="https://github.com/maccorrales28-glitch/php-mysql-w3-maj/tree/main" target="_blank">
        https://github.com/maccorrales28-glitch/php-mysql-w3-maj/tree/main
        </a>
    </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>