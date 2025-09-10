<?php
/**
 * Archivo: listado_categorias.php
 * Descripción: Obtiene todas las categorías registradas en la base de datos.
 *              Los datos se almacenan en un arreglo asociativo para su uso
 *              en formularios, listados o filtros de productos.
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

/* --------------------------------------------------------------------------
   🔹 Consulta SQL para obtener todas las categorías
   -------------------------------------------------------------------------- */
/**
 * Selecciona todos los campos de la tabla tb_categorias.
 * @var string $sql_categorias
 */
$sql_categorias = "SELECT * FROM tb_categorias";

// Preparar la consulta con PDO
$query_categorias = $pdo->prepare($sql_categorias);

// Ejecutar la consulta
$query_categorias->execute();

/* --------------------------------------------------------------------------
   🔹 Obtener los resultados
   -------------------------------------------------------------------------- */
/**
 * Se obtienen todos los registros como un arreglo asociativo.
 * Cada elemento representa una categoría.
 * @var array $categorias_datos
 */
$categorias_datos = $query_categorias->fetchAll(PDO::FETCH_ASSOC);

/* --------------------------------------------------------------------------
   🔹 NOTAS DE BUENAS PRÁCTICAS
   -------------------------------------------------------------------------- */
/**
 * 1. Aunque no se usan parámetros externos, si se agregan filtros en el futuro
 *    (por ejemplo por nombre de categoría), usar parámetros preparados para prevenir inyección SQL.
 * 2. Si la tabla tiene muchos registros, considerar paginación o límites para mejorar rendimiento.
 * 3. Los datos obtenidos se pueden usar para:
 *    - Listar categorías en un dropdown de formulario
 *    - Mostrar nombres de categorías junto a productos
 */
