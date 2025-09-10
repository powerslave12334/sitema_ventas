<?php
/**
 * Archivo: get_usuarios.php
 * Descripción: Obtiene todos los usuarios registrados en el sistema junto con su rol.
 *              - Realiza un INNER JOIN con la tabla tb_roles para obtener el nombre del rol
 *              - Devuelve un array asociativo con los datos de los usuarios
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y PDO

/* --------------------------------------------------------------------------
   🔹 Consulta SQL para obtener los usuarios y su rol
   -------------------------------------------------------------------------- */
$sql_usuarios = "
    SELECT 
        us.id_usuario as id_usuario, 
        us.nombres as nombres, 
        us.email as email, 
        rol.rol as rol 
    FROM tb_usuarios as us 
    INNER JOIN tb_roles as rol ON us.id_rol = rol.id_rol
";

/* --------------------------------------------------------------------------
   🔹 Preparación y ejecución de la consulta
   -------------------------------------------------------------------------- */
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();

/* --------------------------------------------------------------------------
   🔹 Obtención de resultados
   -------------------------------------------------------------------------- */
$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

/* --------------------------------------------------------------------------
   🔹 Buenas prácticas y notas
   -------------------------------------------------------------------------- */
/**
 * 1. Usar FETCH_ASSOC permite acceder a los datos por nombre de columna.
 * 2. Para grandes volúmenes de datos, considerar paginación.
 * 3. Validar que la tabla tb_usuarios y tb_roles existan y tengan las columnas necesarias.
 */
