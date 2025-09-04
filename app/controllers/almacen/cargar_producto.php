<?php

$id_producto_get = $_GET['id'];

$sql_productos = "SELECT *, cat.nombre_categoria as categoria, u.email as email
FROM tb_almacen as a INNER JOIN tb_categoria as cat ON a.id_categoria = cat.id_categoria
INNER JOIN tb_usuarios as u ON u.id_usuario = a.id_usuario WHERE id_producto ='$id_producto_get'";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($productos_datos as $productos_dato) {
    $codigo = $productos_dato['codigo'];
    $nombre = $productos_dato['nombre'];
    $descripcion = $productos_dato['descripcion'];
    $stock = $productos_dato['stock'];
    $stock_min = $productos_dato['stock_minimo'];
    $stock_max = $productos_dato['stock_maximo'];
    $precio_compra = $productos_dato['Precio_compra'];
    $precio_venta = $productos_dato['precio_venta'];
    $fecha_ingreso = $productos_dato['fecha_ingreso'];
    $image = $productos_dato['imagen'];
    $usuario = $productos_dato['id_usuario'];
    $categoria = $productos_dato['id_categoria'];
    $nombre_categoria = $productos_dato['nombre_categoria'];

}

?>