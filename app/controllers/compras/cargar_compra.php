<?php
/**
 * Archivo: detalle_compra.php
 * Descripción: Obtiene los detalles de una compra específica, incluyendo
 *              información del producto, categoría, proveedor y usuario.
 *              - Recibe el ID de la compra vía GET
 *              - Realiza JOIN entre varias tablas para consolidar información
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

$id_compra_get = $_GET['id']; // ID de la compra a consultar

/* --------------------------------------------------------------------------
   🔹 Consulta SQL para obtener los detalles de la compra
   -------------------------------------------------------------------------- */
/**
 * Se realiza un SELECT con JOIN entre:
 *   - tb_compras (co)
 *   - tb_almacen (pro)
 *   - tb_categorias (cat)
 *   - tb_usuarios (us)
 *   - tb_proveedores (prov)
 * 
 * Se utilizan alias para evitar ambigüedad y facilitar el acceso a los datos.
 * IMPORTANTE: usar parámetros preparados para prevenir inyección SQL.
 */
$sql_compras = "SELECT *,
                       co.precio_compra as precio_compra, 
                       pro.codigo as codigo, 
                       pro.nombre as nombre_producto, 
                       pro.descripcion as descripcion, 
                       pro.stock as stock, 
                       pro.stock_minimo as stock_minimo, 
                       pro.stock_maximo as stock_maximo,
                       pro.precio_compra as precio_compra_producto,
                       pro.precio_venta as precio_venta_producto, 
                       pro.fecha_ingreso as fecha_ingreso,
                       pro.imagen as imagen,
                       cat.nombre_categoria as nombre_categoria,
                       us.nombres as nombre_usuarios_producto,
                       prov.nombre_proveedor as nombre_proveedor,
                       prov.celular as celular_proveedor, 
                       prov.telefono as telefono_proveedor,
                       prov.empresa as empresa_proveedor,
                       prov.email as email_proveedor,
                       prov.direccion as direccion_proveedor,
                       us.nombres as nombres_usuario 
                FROM tb_compras as co 
                INNER JOIN tb_almacen as pro ON co.id_producto = pro.id_producto 
                INNER JOIN tb_categorias as cat ON cat.id_categoria = pro.id_categoria
                INNER JOIN tb_usuarios as us ON co.id_usuario = us.id_usuario 
                INNER JOIN tb_proveedores as prov ON co.id_proveedor = prov.id_proveedor 
                WHERE co.id_compra = '$id_compra_get'";

$query_compras = $pdo->prepare($sql_compras);
$query_compras->execute();

/* --------------------------------------------------------------------------
   🔹 Obtener resultados
   -------------------------------------------------------------------------- */
/**
 * Se obtienen todos los registros como un arreglo asociativo.
 * Cada fila representa una compra con todos sus detalles relacionados.
 */
$compras_datos = $query_compras->fetchAll(PDO::FETCH_ASSOC);

/* --------------------------------------------------------------------------
   🔹 Asignación de variables para uso en la vista
   -------------------------------------------------------------------------- */
foreach ($compras_datos as $compras_dato) {
    $id_compra = $compras_dato['id_compra'];
    $id_producto = $compras_dato['id_producto'];
    $id_proveedor_tabla = $compras_dato['id_proveedor'];
    $nro_compra = $compras_dato['nro_compra'];
    $codigo = $compras_dato['codigo'];
    $nombre_categoria = $compras_dato['nombre_categoria'];
    $nombre_producto = $compras_dato['nombre_producto'];
    $nombres_usuario = $compras_dato['nombres_usuario'];
    $descripcion = $compras_dato['descripcion'];
    $stock = $compras_dato['stock'];
    $stock_minimo = $compras_dato['stock_minimo'];
    $stock_maximo = $compras_dato['stock_maximo'];
    $precio_compra_producto = $compras_dato['precio_compra_producto'];
    $precio_venta_producto = $compras_dato['precio_venta_producto'];
    $fecha_ingreso = $compras_dato['fecha_ingreso'];
    $imagen = $compras_dato['imagen'];
    $nombre_proveedor_tabla = $compras_dato['nombre_proveedor'];
    $celular_proveedor = $compras_dato['celular_proveedor'];
    $telefono_proveedor = $compras_dato['telefono_proveedor'];
    $empresa_proveedor = $compras_dato['empresa_proveedor'];
    $email_proveedor = $compras_dato['email_proveedor'];
    $direccion_proveedor = $compras_dato['direccion_proveedor'];
    $fecha_compra = $compras_dato['fecha_compra'];
    $comprobante = $compras_dato['comprobante'];
    $precio_compra = $compras_dato['precio_compra'];
    $cantidad = $compras_dato['cantidad'];
}

/* --------------------------------------------------------------------------
   🔹 NOTAS DE SEGURIDAD Y BUENAS PRÁCTICAS
   -------------------------------------------------------------------------- */
/**
 * 1. Evitar concatenar directamente $_GET en la consulta SQL. Usar parámetros preparados:
 *    $sql = "SELECT ... WHERE co.id_compra = :id_compra";
 *    $query->bindParam(':id_compra', $id_compra_get);
 * 2. Validar que $id_compra_get sea un número entero antes de usarlo.
 * 3. Considerar manejo de errores con try-catch para PDO.
 * 4. Si hay muchas columnas y tablas, revisar índices y relaciones para optimizar la consulta.
 */
