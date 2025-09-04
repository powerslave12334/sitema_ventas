<?php

include('../../config.php');

$id_producto = $_POST['id_producto'];

$sentencia = $pdo->prepare("DELETE FROM tb_almacen 
WHERE id_producto = :id_producto");

$sentencia->bindParam('id_producto', $id_producto);


if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se elimino el producto exitosamente";
    $_SESSION['icono'] = "success";
    header('Location:' . $url . '/almacen');
} else {
    session_start();
    $_SESSION['mensaje'] = "Se elimino el producto exitosamente";
    $_SESSION['icono'] = "succcess";
    header('Location:' . $url . '/almacen/delete.php?id=' . $id_producto_get);
}



?>