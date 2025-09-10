<?php
/**
 * Archivo: listado_compras.php
 * Descripción: Obtiene un listado completo de todas las compras, incluyendo información
 *              del producto, categoría, proveedor y usuario que realizó la compra.
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

/* --------------------------------------------------------------------------
   🔹 Consulta SQL para obtener todas las compras con sus detalles
   -------------------------------------------------------------------------- */
/**
 * Se realiza un SELECT con JOIN entre:
 *   - tb_compras (co)
 *   - tb_almacen (pro)
 *   - tb_categorias (cat)
 *   - tb_usuarios (us)
 *   - tb_proveedores (prov)
 * 
 * Se utilizan alias para las columnas para evitar ambigüedad y facilitar
 * su uso en vistas o reportes.
 */
$sql_compras = "SELECT *,
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
                prov.empresa as empresa,
                prov.email as email_proveedor,
                prov.direccion as direccion_proveedor, 
                us.nombres as nombres_usuario 
                FROM tb_compras as co 
                INNER JOIN tb_almacen as pro ON co.id_producto = pro.id_producto 
                INNER JOIN tb_categorias as cat ON cat.id_categoria = pro.id_categoria
                INNER JOIN tb_usuarios as us ON co.id_usuario = us.id_usuario 
                INNER JOIN tb_proveedores as prov ON co.id_proveedor = prov.id_proveedor";

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
   🔹 Notas de buenas prácticas
   -------------------------------------------------------------------------- */
/**
 * 1. Para consultas grandes o con muchas columnas, considerar usar SELECT
 *    explícito solo con los campos necesarios para mejorar el rendimiento.
 * 2. Se pueden agregar filtros con WHERE para limitar resultados, por ejemplo
 *    por fecha, proveedor o usuario.
 * 3. Si esta consulta se va a usar en vistas públicas, considerar paginación.
 * 4. Validar los datos antes de mostrarlos en la interfaz para prevenir XSS.
 */
