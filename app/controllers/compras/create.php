<?php

include('../../config.php');

$id_producto = $_GET['id_producto'];
$numero_compra = $_GET['numero_compra'];
$fecha_compra = $_GET['fecha_compra'];
$id_proveedor = $_GET['id_proveedor'];
$comprobante = $_GET['comprobante'];
$usuario = $_GET['usuario'];
$precio_compra = $_GET['precio_compra'];
$cantidad_compra = $_GET['cantidad_compra'];
$stock_total = $_GET['stock_total'];

$pdo->beginTransaction();


$sentencia = $pdo->prepare("INSERT INTO tb_compras
       (id_producto,nro_compra,fecha_compra,id_proveedor,comprobante,id_usuario,precio_compra,cantidad,fyh_creacion) 
VALUES (:id_producto,:numero_compra,:fecha_compra,:id_proveedor,:comprobante,:usuario,:precio_compra,:cantidad_compra,:fyh_creacion)");

$sentencia->bindParam('id_producto', $id_producto);
$sentencia->bindParam('numero_compra', $numero_compra);
$sentencia->bindParam('fecha_compra', $fecha_compra);
$sentencia->bindParam('id_proveedor', $id_proveedor);
$sentencia->bindParam('comprobante', $comprobante);
$sentencia->bindParam('usuario', $usuario);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('cantidad_compra', $cantidad_compra);
$sentencia->bindParam('fyh_creacion', $fechaHora);

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
    $_SESSION['mensaje'] = "Compra se registro de la manera correcta";
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
    $_SESSION['mensaje'] = "Error al registrar la Compra";
    $_SESSION['icono'] = "error";
    // header('Location: ' . $url . '/proveedores');
    ?>

    <script>
        location.href = "<?php echo $url; ?>/compras/create.php";
    </script>

    <?php
}

?>