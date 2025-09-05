<?php

$id_compra_get = $_GET['id'];

$sql_compras = "SELECT *,
                pro.codigo as codigo,
                pro.nombre as nombre_producto,
                pro.descripcion as descripcion,
                pro.stock as stock, 
                pro.stock_minimo as stock_minimo,
                pro.stock_maximo as stock_maximo,
                pro.Precio_compra as precio_compra_producto, 
                pro.precio_venta as precio_venta_producto,
                pro.fecha_ingreso as fecha_ingreso,
                pro.imagen as imagen, 
                pro.id_usuario as id_usuario,
                cat.id_categoria as id_categoria,
                us.nombres as nombre_usuarios_producto,
                prov.nombre_proveedor as nombre_proveedor,
                prov.celular as celular_proveedor,
                prov.telefono as telefono_proveedor,
                prov.empresa as empresa,
                prov.email as email_proveedor,
                prov.direccion as direccion
                FROM tb_compras as co 
                INNER JOIN tb_almacen as pro ON co.id_producto = pro.id_producto 
                INNER JOIN tb_categoria as cat ON cat.id_categoria = pro.id_categoria
                INNER JOIN tb_usuarios as us ON co.id_usuario = us.id_usuario
                INNER JOIN tb_proveedores as prov ON co.id_proveedor = prov.id_proveedor
                WHERE co.id_compra = '$id_compra_get' ";

$query_compras = $pdo->prepare($sql_compras);
$query_compras->execute();
$compras_datos = $query_compras->fetchAll(PDO::FETCH_ASSOC);

foreach ($compras_datos as $compras_dato) {
    $id_producto = $compras_dato['id_producto'];
    $id_compra = $compras_dato['id_compra'];
    $nro_compra = $compras_dato['nro_compra'];
    $codigo = $compras_dato['codigo'];
    $nombre = $compras_dato['nombre_producto'];
    $nombre_categoria = $compras_dato['nombre_categoria'];
    $stock = $compras_dato['stock'];
    $stock_minimo = $compras_dato['stock_minimo'];
    $stock_maximo = $compras_dato['stock_maximo'];
    $precio_compra_producto = $compras_dato['precio_compra_producto'];
    $precio_venta = $compras_dato['precio_venta_producto'];
    $fecha_ingreso = $compras_dato['fecha_ingreso'];
    $usuario = $compras_dato['nombre_usuarios_producto'];
    $descripcion = $compras_dato['descripcion'];
    $img_producto = $compras_dato['imagen'];

    $id_proveedor_tabla = $compras_dato['id_proveedor'];
    $P_Nombre_tabla = $compras_dato['nombre_proveedor'];
    $P_Celular = $compras_dato['celular_proveedor'];
    $P_Telefono = $compras_dato['telefono_proveedor'];
    $P_Empresa = $compras_dato['empresa'];
    $P_Correo = $compras_dato['email_proveedor'];
    $P_Direccion = $compras_dato['direccion'];

    $fecha_compra = $compras_dato['fecha_compra'];
    $comprobante = $compras_dato['comprobante'];
    $precio_compra = $compras_dato['precio_compra'];

    $cantidad_compra = $compras_dato['cantidad'];
}

?>