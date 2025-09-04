<?php

include('../../config.php');

$id_producto = $_POST['id_producto'];
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$id_categoria = $_POST['id_categoria'];
$stock = $_POST['stock'];
$stock_minimo = $_POST['stock_minimo'];
$stock_maximo = $_POST['stock_maximo'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$usuario = $_POST['usuario'];
$descripcion = $_POST['descripcion'];
$image_text = $_POST['image_text'];

if ($_FILES['image']['name'] != null) {
    $nombreDelArchivo = date("Y-m-d-h-i-s");
    $image_text = $nombreDelArchivo . "__" . $_FILES['image']['name'];
    $location = "../../../almacen/img_productos/" . $image_text;

    move_uploaded_file($_FILES['image']['tmp_name'], $location);
} else {

}

$sentencia = $pdo->prepare("UPDATE tb_almacen 
    SET codigo = :codigo,
    nombre = :nombre,
    descripcion = :descripcion,
    stock = :stock,
    stock_minimo = :stock_minimo,
    stock_maximo = :stock_maximo,
    Precio_compra = :precio_compra,
    precio_venta = :precio_venta,
    fecha_ingreso = :fecha_ingreso,
    imagen = :image_text,
    id_usuario = :usuario,
    id_categoria = :id_categoria,
    fyh_creacion = :fecha_ingreso,
    fyh_actualizacion=:fyh_actualizacion
    WHERE id_producto = :id_producto");


$sentencia->bindParam('codigo', $codigo);
$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('descripcion', $descripcion);
$sentencia->bindParam('stock', $stock);
$sentencia->bindParam('stock_minimo', $stock_minimo);
$sentencia->bindParam('stock_maximo', $stock_maximo);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('precio_venta', $precio_venta);
$sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
$sentencia->bindParam('image_text', $image_text);
$sentencia->bindParam('usuario', $usuario);
$sentencia->bindParam('id_categoria', $id_categoria);
$sentencia->bindParam('fyh_creacion', $fecha_ingreso);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_producto', $id_producto);


if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Rol se actualizo correctamente";
    $_SESSION['icono'] = "succcess";
    header('Location:' . $url . '/almacen');
} else {
    // echo "Error de contraseña";
    session_start();
    $_SESSION['mensaje'] = "Error al actualizar el rol";
    $_SESSION['icono'] = "error";
    header('Location: ' . $url . '/alamcen/update.php?id=' . $id_producto);
}




?>