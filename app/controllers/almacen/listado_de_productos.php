<?php
/**
 * Archivo: listado_productos.php
 * Descripción: Obtiene el listado completo de productos de la base de datos,
 *              incluyendo información de la categoría y del usuario que registró cada producto.
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

/* --------------------------------------------------------------------------
   🔹 Consulta SQL para obtener todos los productos
   -------------------------------------------------------------------------- */
/**
 * Selecciona todos los campos de la tabla tb_almacen (productos),
 * junto con:
 *   - nombre de la categoría desde tb_categorias (alias: categoria)
 *   - email del usuario desde tb_usuarios (alias: email)
 * Se utiliza INNER JOIN para relacionar las tablas:
 *   - a.id_categoria = cat.id_categoria
 *   - u.id_usuario = a.id_usuario
 */
$sql_productos = "SELECT *,
                          cat.nombre_categoria as categoria,
                          u.email as email
                   FROM tb_almacen as a
                   INNER JOIN tb_categorias as cat ON a.id_categoria = cat.id_categoria
                   INNER JOIN tb_usuarios as u ON u.id_usuario = a.id_usuario";

// Preparar la consulta con PDO
$query_productos = $pdo->prepare($sql_productos);

// Ejecutar la consulta
$query_productos->execute();

/* --------------------------------------------------------------------------
   🔹 Obtener los resultados
   -------------------------------------------------------------------------- */
/**
 * Se obtienen todos los registros como un arreglo asociativo
 * @var array $productos_datos
 */
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

/* --------------------------------------------------------------------------
   🔹 NOTAS DE BUENAS PRÁCTICAS
   -------------------------------------------------------------------------- */
/**
 * 1. Aunque en este caso no hay parámetros externos, si en el futuro se agregan filtros
 *    mediante GET o POST, se deben usar parámetros preparados para prevenir inyección SQL.
 * 2. Si la tabla tiene muchos registros, considerar paginación para mejorar rendimiento.
 * 3. Los alias (categoria, email) facilitan el acceso a los datos en el arreglo asociativo.
 */
