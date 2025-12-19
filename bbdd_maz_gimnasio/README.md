# 🏋️ Gestión de Gimnasio - Práctica PHP & MySQL

Este proyecto es una aplicación web sencilla desarrollada en **PHP nativo** para gestionar los accesos y socios de un gimnasio ficticio ("Gimnasio MAZ").

Permite realizar operaciones CRUD (Crear, Leer, Actualizar y Borrar), gestionar la estructura de la base de datos desde la propia web y realizar cargas masivas de datos de prueba.

## 📋 Características

* **Gestión de Base de Datos:** Scripts para crear la BBDD, la tabla y resetear los datos.
* **Carga Masiva:** Importación automática de datos desde un archivo SQL (`datos.sql`) generado con Mockaroo.
* **CRUD Completo:**
    * Registrar nuevos accesos manualmente.
    * Listar socios (con filtros y ordenación).
    * Modificar suscripciones.
    * Borrar registros.
* **Seguridad:** Sistema de Login/Logout básico con control de sesiones PHP.
* **Consultas Avanzadas:** Filtros específicos (ej. socios 'Gold' o entrenamientos de larga duración).
* **Diseño:** Interfaz limpia utilizando **Bootstrap 5**.

## 🚀 Instalación y Puesta en Marcha

Para ejecutar este proyecto en local (usando XAMPP, WAMP o MAMP):

1.  **Clonar/Descargar:**
    Copia todos los archivos del proyecto dentro de la carpeta pública de tu servidor (ej. `C:\xampp\htdocs\gimnasio`).

2.  **Base de Datos y Usuario:**
    El proyecto está configurado para usar un usuario específico. Debes crearlo en tu gestor de base de datos (phpMyAdmin o consola):

    ```sql
    -- Ejecuta esto en tu consola SQL o phpMyAdmin
    CREATE USER 'maz'@'localhost' IDENTIFIED BY 'maz';
    GRANT ALL PRIVILEGES ON *.* TO 'maz'@'localhost';
    FLUSH PRIVILEGES;
    ```

3.  **Configuración:**
    El archivo `config_db.php` ya está configurado con estos datos:
    * Server: `localhost`
    * User: `maz`
    * Pass: `maz`
    * DB: `bbdd_maz_gimnasio`

4.  **Iniciar la aplicación:**
    * Abre tu navegador y ve a: `http://localhost/gimnasio` (o la carpeta donde lo hayas puesto).
    * Si te pide login, usa las credenciales de abajo.

## 🔐 Credenciales de Acceso

Para acceder al panel de control:

* **Usuario:** `maz`
* **Contraseña:** `maz`

## ⚙️ Primeros Pasos (Importante)

Una vez dentro del panel de control:

1.  Si es la primera vez, verás avisos de que la base de datos no existe.
2.  Usa el menú **"Gestión de Base de Datos"** para crear la BBDD y la Tabla.
3.  **Recomendado:** Pulsa el botón amarillo **"⚠️ Ejecutar Carga Masiva"** en el inicio para rellenar la tabla con datos de prueba y poder probar los listados correctamente.

## 📂 Estructura del Proyecto

* `index.php`: Panel de control principal.
* `config_db.php`: Variables de conexión.
* `datos.sql`: Archivo fuente para la carga masiva.
* `data_*.php`: Scripts de manipulación de datos (Inserts, Selects, Updates).
* `form_*.php`: Formularios HTML para interactuar con la BBDD.
* `table_*.php` y `db_*.php`: Gestión de la estructura SQL (DDL).

---
*Práctica desarrollada para la asignatura de Desarrollo Web en Entorno Servidor.*