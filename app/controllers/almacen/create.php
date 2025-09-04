<?php

include('../../config.php');

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$categoria = $_POST['id_categoria'];
$stock = $_POST['stock'];
$stock_min = $_POST['stock_minimo'];
$stock_max = $_POST['stock_maximo'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$usuario = $_POST['usuario'];
$descripcion = $_POST['descripcion'];

$image = $_POST['image'];
$nombreDelArchivo = date("Y-m-d-h-i-s");
$filename = $nombreDelArchivo . "__" . $_FILES['image']['name'];
$location = "../../../almacen/img_productos/" . $filename;

move_uploaded_file($_FILES['image']['tmp_name'], $location);

$sentencia = $pdo->prepare("INSERT INTO tb_almacen
       (codigo,nombre,descripcion,stock,stock_minimo,stock_maximo,Precio_compra,precio_venta,fecha_ingreso,imagen,id_usuario,id_categoria,fyh_creacion) 
VALUES (:codigo,:nombre,:descripcion,:stock,:stock_minimo,:stock_maximo,:Precio_compra,:precio_venta,:fecha_ingreso,:imagen,:id_usuario,:id_categoria,:fyh_creacion)");

$sentencia->bindParam('codigo', $codigo);
$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('descripcion', $descripcion);
$sentencia->bindParam('stock', $stock);
$sentencia->bindParam('stock_minimo', $stock_min);
$sentencia->bindParam('stock_maximo', $stock_max);
$sentencia->bindParam('Precio_compra', $precio_compra);
$sentencia->bindParam('precio_venta', $precio_venta);
$sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
$sentencia->bindParam('imagen', $filename);
$sentencia->bindParam('id_usuario', $usuario);
$sentencia->bindParam('id_categoria', $categoria);
$sentencia->bindParam('fyh_creacion', $fechaHora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Rol se registro de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location:' . $url . '/almacen');

} else {
    session_start();
    $_SESSION['mensaje'] = "Error al registrar el rol";
    $_SESSION['icono'] = "error";
    header('Location: ' . $url . '/almacen/create.php');
}






?>