<?php

include('../../config.php');

$id_proveedor = $_GET['id_proveedor'];

$sentencia = $pdo->prepare("DELETE FROM tb_proveedores 
WHERE id_proveedor = :id_proveedor");

$sentencia->bindParam('id_proveedor', $id_proveedor);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Proveedor se elimino correctamente";
    $_SESSION['icono'] = "succcess";
    // header('Location:' . $url . '/roles');
    ?>

    <script>
        location.href = "<?php echo $url; ?>/proveedores";
    </script>

    <?php
} else {
    // echo "Error de contraseña";
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar el Proveedor";
    $_SESSION['icono'] = "error";
    //     header('Location: ' . $url . '/roles/update.php?id=' . $id_usuario);
    ?>

    <script>
        location.href = "<?php echo $url; ?>/proveedores";
    </script>

    <?php
}

?>