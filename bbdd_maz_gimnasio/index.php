<?php include 'session_check.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gimnasio MAZ - Inicio</title>
    <link rel="icon" type="image/x-icon" href="gym.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'cabecera.html'; ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-4">
        <h3>Panel de Control</h3>
        <div>
            <span class="text-muted me-3">Usuario: <b><?php echo $_SESSION["usuario"]; ?></b></span>
            <a href="logout.php" class="btn btn-danger btn-sm">Salir</a>
        </div>
    </div>

    <div class="mb-5">
        <p>Si es la primera vez que entras o quieres reiniciar los datos:</p>
        <a href="data_load_sql.php" class="btn btn-warning">⚠️ Ejecutar Carga Masiva (Resetear Datos)</a>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h4>1. Configuración Base de Datos</h4>
            <p class="text-muted small">Scripts para crear/borrar la estructura.</p>
            <ul>
                <li><a href="db_connect.php">Probar conexión</a></li>
                <li><a href="db_create.php">Crear Base de Datos</a></li>
                <li><a href="table_create_guests.php">Crear Tabla 'datos'</a></li>
                <li><a href="table_check_exists.php">Verificar si existe tabla</a></li>
                <li><a href="table_drop.php" class="text-danger">Borrar tabla 'datos' (DROP TABLE)</a></li>
                <li><a href="db_drop.php" class="text-danger fw-bold">Borrar Base de Datos Completa (DROP DB)</a></li>
            </ul>

            <h4 class="mt-4">2. Scripts de Prueba (Sin formulario)</h4>
            <p class="text-muted small">Inserciones y consultas directas.</p>
            <ul>
                <li><a href="data_insert_single.php">Insertar 1 registro fijo</a></li>
                <li><a href="data_insert_single_get_last_id.php">Insertar y ver ID</a></li>
                <li><a href="data_insert_multiple_simple.php">Insertar 3 registros (Simple)</a></li>
                <li><a href="data_insert_multiple_prepared.php">Insertar 2 registros (Prepared)</a></li>
                <li><a href="data_count.php">Contar total de filas</a></li>
                <li><a href="data_delete.php">Borrar registro (ID fijo)</a></li>
                <li><a href="data_update.php">Actualizar registro (ID fijo)</a></li>
            </ul>
        </div>

        <div class="col-md-6">
            <h4>3. Gestión del Gimnasio (Formularios)</h4>
            <p class="text-muted small">Aquí es donde se gestionan los socios.</p>
            
            <div class="list-group">
                <a href="data_select_all.php" class="list-group-item list-group-item-action fw-bold">
                    >> Ver Listado Completo de Socios
                </a>
                <a href="form_insert.php" class="list-group-item list-group-item-action">
                    Registrar Nuevo Acceso
                </a>
                <a href="form_select_lastname.php" class="list-group-item list-group-item-action">
                    Buscar Socio por Nombre
                </a>
                <a href="form_select_order.php" class="list-group-item list-group-item-action">
                    Listar Ordenado (A-Z)
                </a>
                <a href="data_select_where_orderby_html_table.php" class="list-group-item list-group-item-action">
                    Ver Socios GOLD (Filtro)
                </a>
                <a href="form_update_lastname.php" class="list-group-item list-group-item-action">
                    Modificar Suscripción
                </a>
                <a href="form_delete_user.php" class="list-group-item list-group-item-action text-danger">
                    Borrar Socio (por ID)
                </a>
            </div>
            
            <br>
            
            <div class="alert alert-light border">
                <strong>Consulta especial:</strong><br>
                <a href="data_select_where.php">Ver entrenamientos largos (> 100 min)</a>
            </div>
        </div>
    </div>

    <hr class="mt-5">
    <p class="text-center text-muted small">Práctica PHP & MySQL - Gimnasio MAZ</p>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>