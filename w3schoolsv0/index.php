<?php include 'session_check.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manuel Adame Zaeva</title>
</head>
<body>

<p>Usuario conectado: admin</p>

<p>
    <a href="logout.php">Desconectar</a>
</p>

<ol>
    <li><a href="db_connect.php">Conectar</a></li>

    <li><a href="db_create.php">Crear la base de datos (conecto, creo, desconecto)</a></li>
    <li><a href="db_drop.php">Borrar la base de datos (conecto, borro, desconecto)</a></li>

    <li><a href="table_create_guests.php">
        Crear tabla MyGuests con teléfono y código de usuario (conecto, creo, desconecto)
    </a></li>

    <li><a href="table_check_exists.php">
        Verificar la existencia de la tabla MyGuests (conecto, consulto, desconecto)
    </a></li>

    <li><a href="table_drop.php">
        Borrar tabla MyGuests (conecto, borro, desconecto)
    </a></li>

    <li><a href="data_insert_single.php">
        Insertar datos (registro único con teléfono y código de usuario) (conecto, inserto, desconecto)
    </a></li>

    <li><a href="data_insert_single_get_last_id.php">
        Insertar datos (registro único con teléfono y código de usuario) y obtener último ID insertado
        (conecto, inserto, consulto último id, desconecto)
    </a></li>

    <li><a href="data_insert_multiple_simple.php">
        Insertar varios registros sin preparar (incluye teléfono y código de usuario)
        (conecto, ejecuto x3, desconecto)
    </a></li>

    <li><a href="data_insert_multiple_prepared.php">
        Insertar varios registros con prepared statements (incluye teléfono y código de usuario)
        (conecto, preparo, ejecuto x2/x3, desconecto)
    </a></li>

    <li><a href="data_count.php">
        Contar los usuarios que tienen teléfono informado (conecto, select count, desconecto)
    </a></li>

    <li><a href="data_select_all.php">
        Visualizar todos los datos (incluyendo teléfono y código de usuario)
        (conecto, select, desconecto)
    </a></li>

    <li><a href="data_select_where.php">
        Visualizar los datos del usuario cuyo código de usuario es u00003
        (conecto, select where usercode, desconecto)
    </a></li>

    <li><a href="data_select_orderby.php">
        Visualizar los datos ordenados por código de usuario (usercode)
        (conecto, select order by usercode, desconecto)
    </a></li>

    <li><a href="data_select_where_orderby_html_table.php">
        Visualizar en tabla HTML los usuarios que tienen teléfono, ordenados por apellido (lastname)
        (conecto, select where + order by, desconecto)
    </a></li>

    <li><a href="data_delete.php">
        Borrar el usuario cuyo código de usuario es u00005
        (conecto, delete where usercode, desconecto)
    </a></li>

    <li><a href="data_update.php">
        Actualizar el teléfono del usuario cuyo código de usuario es u00001
        (conecto, update phone donde usercode, desconecto)
    </a></li>
</ol>

<p>
    Repositorio del proyecto en GitHub:<br>
    <a href="https://github.com/tu-usuario/tu-repo-w3schoolsv0" target="_blank">
        https://github.com/tu-usuario/tu-repo-w3schoolsv0
    </a>
</p>

</body>
</html>