<?php
/**
 * Archivo: listado_proveedores.php
 * Descripción: Obtiene todos los proveedores registrados en el sistema.
 *              - Consulta la tabla tb_proveedores
 *              - Devuelve los datos como un arreglo asociativo para ser usados en el frontend
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */



/* --------------------------------------------------------------------------
   🔹 Consulta SQL para obtener todos los proveedores
   -------------------------------------------------------------------------- */
$sql_proveedores = "SELECT * FROM tb_proveedores";
$query_proveedores = $pdo->prepare($sql_proveedores);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la consulta
   -------------------------------------------------------------------------- */
$query_proveedores->execute();

/* --------------------------------------------------------------------------
   🔹 Obtención de resultados
   -------------------------------------------------------------------------- */
$proveedores_datos = $query_proveedores->fetchAll(PDO::FETCH_ASSOC);

/* --------------------------------------------------------------------------
   🔹 Notas y buenas prácticas
   -------------------------------------------------------------------------- */
/**
 * 1. Se puede aplicar paginación si la tabla tiene muchos registros para optimizar rendimiento.
 * 2. Para seguridad, siempre usar consultas preparadas (aunque aquí no hay parámetros).
 * 3. Se recomienda filtrar o sanitizar los datos antes de mostrarlos en la interfaz.
 * 4. $proveedores_datos será un arreglo de arreglos asociativos, donde cada elemento
 *    representa un proveedor con sus campos (id_proveedor, nombre_proveedor, email, etc.).
 */
