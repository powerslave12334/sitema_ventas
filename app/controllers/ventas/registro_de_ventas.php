<?php

include('../../config.php'); // Importa configuración principal y conexión PDO

$nro_venta = $_GET['nro_venta'];   // ID del producto comprado
$id_cliente = $_GET['id_cliente'];    // Número de la compra
$total_a_cancelar = $_GET['total_a_cancelar'];  // Fecha de la compra

$pdo->beginTransaction();

$sentencia = $pdo->prepare("INSERT INTO tb_ventas
       (nro_venta, id_cliente, total_pagado, fyh_creacion) 
VALUES (:nro_venta, :id_cliente, :total_a_cancelar, :fyh_creacion)");

$sentencia->bindParam('nro_venta', $nro_venta);
$sentencia->bindParam('id_cliente', $id_cliente);
$sentencia->bindParam('total_a_cancelar', $total_a_cancelar);
$sentencia->bindParam('fyh_creacion', $fechaHora);

if ($sentencia->execute()) {

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Se registró la compra correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas";
    </script>
    <?php
} else {

    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar la compra en la base de datos";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas";
    </script>
    <?php
}


