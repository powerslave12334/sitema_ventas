<?php

include('../../config.php');

$id_compra = $_GET['id_compra'];
$id_producto = $_GET['id_producto'];
$numero_compra = $_GET['numero_compra'];
$fecha_compra = $_GET['fecha_compra'];
$id_proveedor_tabla = $_GET['id_proveedor'];
$comprobante = $_GET['comprobante'];
$usuario = $_GET['usuario'];
$precio_compra = $_GET['precio_compra'];
$cantidad_compra = $_GET['cantidad_compra'];
$stock_total = $_GET['stock_total'];

$pdo->beginTransaction();


$sentencia = $pdo->prepare("UPDATE tb_compras SET
id_producto=:id_producto,
nro_compra=:nro_compra,
fecha_compra=:fecha_compra,
id_proveedor=:id_proveedor,
comprobante=:comprobante,
id_usuario=:id_usuario,
precio_compra=:precio_compra,
cantidad=:cantidad,
fyh_actualizacion=:fyh_actualizacion
WHERE id_compra=:id_compra");

$sentencia->bindParam(':id_producto', $id_producto);
$sentencia->bindParam(':nro_compra', $numero_compra);
$sentencia->bindParam(':fecha_compra', $fecha_compra);
$sentencia->bindParam(':id_proveedor', $id_proveedor_tabla);
$sentencia->bindParam(':comprobante', $comprobante);
$sentencia->bindParam(':id_usuario', $usuario);
$sentencia->bindParam(':precio_compra', $precio_compra);
$sentencia->bindParam(':cantidad', $cantidad_compra);
$sentencia->bindParam(':fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id_compra', $id_compra);

if ($sentencia->execute()) {

    $sentencia = $pdo->prepare("UPDATE tb_almacen 
    SET 
    stock = :stock
    WHERE id_producto = :id_producto");

    $sentencia->bindParam('stock', $stock_total);
    $sentencia->bindParam('id_producto', $id_producto);
    $sentencia->execute();

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Compra se actualizo de la manera correcta";
    $_SESSION['icono'] = "success";
    // header('Location:' . $url . '/proveedores');
    ?>

    <script>
        location.href = "<?php echo $url; ?>/compras";
    </script>

    <?php
} else {

    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error al actualizar la Compra";
    $_SESSION['icono'] = "error";
    // header('Location: ' . $url . '/proveedores');
    ?>

    <script>
        location.href = "<?php echo $url; ?>/compras/create.php";
    </script>

    <?php
}

?>