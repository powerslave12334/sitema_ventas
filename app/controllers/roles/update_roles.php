<?php
/**
 * Archivo: get_rol.php
 * Descripción: Obtiene los datos de un rol específico a partir de su ID.
 *              - Recibe el ID del rol vía GET
 *              - Consulta la tabla tb_roles
 *              - Devuelve los datos para ser usados en formularios de edición o visualización
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y PDO

/* --------------------------------------------------------------------------
   🔹 Captura del ID del rol desde la URL
   -------------------------------------------------------------------------- */
$id_rol_get = $_GET['id']; // ID del rol a consultar

/* --------------------------------------------------------------------------
   🔹 Consulta SQL para obtener el rol específico
   -------------------------------------------------------------------------- */
$sql_roles = "SELECT * FROM tb_roles WHERE id_rol = :id_rol";
$query_roles = $pdo->prepare($sql_roles);
$query_roles->bindParam('id_rol', $id_rol_get);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la consulta
   -------------------------------------------------------------------------- */
$query_roles->execute();

/* --------------------------------------------------------------------------
   🔹 Obtención de resultados
   -------------------------------------------------------------------------- */
$roles_datos = $query_roles->fetchAll(PDO::FETCH_ASSOC);

/* --------------------------------------------------------------------------
   🔹 Asignación de valores del rol
   -------------------------------------------------------------------------- */
foreach ($roles_datos as $roles_dato) {
    $rol = $roles_dato['rol'];
}

/* --------------------------------------------------------------------------
   🔹 Buenas prácticas y notas
   -------------------------------------------------------------------------- */
/**
 * 1. Se recomienda usar bindParam para prevenir inyección SQL (modificado en esta versión).
 * 2. Validar que $id_rol_get sea un número válido antes de la consulta.
 * 3. Si la consulta no devuelve resultados, manejar la situación para evitar errores en el frontend.
 */
