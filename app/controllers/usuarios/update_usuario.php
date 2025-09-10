<?php
/**
 * Archivo: get_usuario.php
 * Descripción: Obtiene los datos de un usuario específico a partir de su ID.
 *              - Recibe el ID del usuario vía GET
 *              - Realiza un INNER JOIN con la tabla tb_roles para obtener el nombre del rol
 *              - Devuelve los datos para ser usados en formularios de edición o visualización
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y PDO

/* --------------------------------------------------------------------------
   🔹 Captura del ID del usuario desde la URL
   -------------------------------------------------------------------------- */
$id_usuario_get = $_GET['id']; // ID del usuario a consultar

/* --------------------------------------------------------------------------
   🔹 Consulta SQL para obtener los datos del usuario y su rol
   -------------------------------------------------------------------------- */
$sql_usuarios = "
    SELECT 
        us.id_usuario as id_usuario, 
        us.nombres as nombres, 
        us.email as email, 
        rol.rol as rol
    FROM tb_usuarios as us
    INNER JOIN tb_roles as rol ON us.id_rol = rol.id_rol
    WHERE us.id_usuario = :id_usuario
";

$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->bindParam('id_usuario', $id_usuario_get, PDO::PARAM_INT);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la consulta
   -------------------------------------------------------------------------- */
$query_usuarios->execute();

/* --------------------------------------------------------------------------
   🔹 Obtención de resultados
   -------------------------------------------------------------------------- */
$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

/* --------------------------------------------------------------------------
   🔹 Asignación de valores del usuario
   -------------------------------------------------------------------------- */
foreach ($usuarios_datos as $usuarios_dato) {
    $nombres = $usuarios_dato['nombres'];
    $email = $usuarios_dato['email'];
    $rol = $usuarios_dato['rol'];
}

/* --------------------------------------------------------------------------
   🔹 Buenas prácticas
   -------------------------------------------------------------------------- */
/**
 * 1. Se usa bindParam para prevenir inyección SQL.
 * 2. Validar que $id_usuario_get sea un número válido antes de la consulta.
 * 3. Manejar el caso cuando la consulta no devuelve resultados para evitar errores en el frontend.
 */
