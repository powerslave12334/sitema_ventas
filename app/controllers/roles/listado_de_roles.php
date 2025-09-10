<?php
/**
 * Archivo: listado_roles.php
 * Descripción: Obtiene todos los roles registrados en el sistema.
 *              - Consulta la tabla tb_roles
 *              - Devuelve los datos como un arreglo asociativo para ser usados en el frontend
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y PDO

/* --------------------------------------------------------------------------
   🔹 Consulta SQL para obtener todos los roles
   -------------------------------------------------------------------------- */
$sql_roles = "SELECT * FROM tb_roles";
$query_roles = $pdo->prepare($sql_roles);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la consulta
   -------------------------------------------------------------------------- */
$query_roles->execute();

/* --------------------------------------------------------------------------
   🔹 Obtención de resultados
   -------------------------------------------------------------------------- */
$roles_datos = $query_roles->fetchAll(PDO::FETCH_ASSOC);

/* --------------------------------------------------------------------------
   🔹 Notas y buenas prácticas
   -------------------------------------------------------------------------- */
/**
 * 1. Se puede implementar paginación si la tabla tiene muchos registros.
 * 2. Aunque aquí no hay parámetros, siempre es recomendable usar consultas preparadas.
 * 3. $roles_datos será un arreglo de arreglos asociativos, donde cada elemento
 *    representa un rol con sus campos (id_rol, rol, fyh_creacion, fyh_actualizacion).
 * 4. Validar los datos antes de mostrarlos en la interfaz para evitar problemas de seguridad.
 */
