<?php
/**
 * Archivo: obtener_producto.php
 * Descripción: Obtiene los datos completos de un producto específico
 *              desde la base de datos, incluyendo información de la categoría
 *              y del usuario que registró el producto.
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

/* --------------------------------------------------------------------------
   🔹 Captura del ID del producto enviado por GET
   -------------------------------------------------------------------------- */
/**
 * ID del producto que se desea consultar.
 * Es recibido vía URL: ejemplo obtener_producto.php?id=1
 * IMPORTANTE: debe validarse o filtrarse antes de usar en la consulta
 *             para prevenir inyecciones SQL.
 */
$id_producto_get = $_GET['id'];

/* --------------------------------------------------------------------------
   🔹 Consulta SQL para obtener los datos del producto
   -------------------------------------------------------------------------- */
/**
 * Se seleccionan todos los campos de la tabla tb_almacen (productos),
 * junto con:
 *   - nombre de la categoría desde tb_categorias
 *   - email e id del usuario desde tb_usuarios
 * La relación se realiza mediante INNER JOIN:
 *   - a.id_categoria = cat.id_categoria
 *   - u.id_usuario = a.id_usuario
 * La condición WHERE filtra por el producto específico.
 */
$sql_productos = "SELECT *,
                          cat.nombre_categoria as categoria,
                          u.email as email,
                          u.id_usuario as id_usuario
                   FROM tb_almacen as a
                   INNER JOIN tb_categorias as cat ON a.id_categoria = cat.id_categoria
                   INNER JOIN tb_usuarios as u ON u.id_usuario = a.id_usuario
                   WHERE id_producto = '$id_producto_get'";

// Preparar la consulta con PDO
$query_productos = $pdo->prepare($sql_productos);

// Ejecutar la consulta
$query_productos->execute();

/**
 * Obtener todos los resultados en un arreglo asociativo.
 * @var array $productos_datos
 */
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

/* --------------------------------------------------------------------------
   🔹 Recorrer los resultados y asignarlos a variables individuales
   -------------------------------------------------------------------------- */
foreach ($productos_datos as $productos_dato) {
    $codigo = $productos_dato['codigo'];                     // Código único del producto
    $nombre_categoria = $productos_dato['nombre_categoria']; // Nombre de la categoría
    $nombre = $productos_dato['nombre'];                     // Nombre del producto
    $email = $productos_dato['email'];                       // Email del usuario que lo registró
    $id_usuario = $productos_dato['id_usuario'];             // ID del usuario que lo registró
    $descripcion = $productos_dato['descripcion'];           // Descripción del producto
    $stock = $productos_dato['stock'];                       // Stock actual
    $stock_minimo = $productos_dato['stock_minimo'];         // Stock mínimo permitido
    $stock_maximo = $productos_dato['stock_maximo'];         // Stock máximo permitido
    $precio_compra = $productos_dato['precio_compra'];       // Precio de compra
    $precio_venta = $productos_dato['precio_venta'];         // Precio de venta
    $fecha_ingreso = $productos_dato['fecha_ingreso'];       // Fecha de ingreso del producto
    $imagen = $productos_dato['imagen'];                     // Nombre o ruta de la imagen del producto
}

/* --------------------------------------------------------------------------
   🔹 NOTAS DE SEGURIDAD
   -------------------------------------------------------------------------- */
/**
 * ⚠️ Advertencia: Actualmente el ID se inserta directamente en la consulta SQL.
 * Esto es vulnerable a inyección SQL.
 * Buenas prácticas:
 *   - Usar consultas preparadas con parámetros:
 *       $sql_productos = "SELECT ... WHERE id_producto = :id_producto";
 *       $query_productos = $pdo->prepare($sql_productos);
 *       $query_productos->bindParam(':id_producto', $id_producto_get, PDO::PARAM_INT);
 *       $query_productos->execute();
 *   - Validar que $id_producto_get sea un número entero antes de usarlo.
 */
