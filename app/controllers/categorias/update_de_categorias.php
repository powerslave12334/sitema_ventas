<?php

include('../../config.php');

$nombre_categoria = $_GET['nombre_categoria'];
$id_categoria = $_GET['id_categoria'];

$sentencia = $pdo->prepare("UPDATE tb_categoria 
    SET nombre_categoria =:nombre_categoria,
    fyh_actualizacion=:fyh_actualizacion 
    WHERE id_categoria = :id_categoria");

$sentencia->bindParam('nombre_categoria', $nombre_categoria);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_categoria', $id_categoria);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Rol se actualizo correctamente";
    $_SESSION['icono'] = "succcess";
    // header('Location:' . $url . '/roles');
    ?>

    <script>
        location.href = "<?php echo $url; ?>/categorias";
    </script>

    <?php
} else {
    // echo "Error de contraseña";
    session_start();
    $_SESSION['mensaje'] = "Error al actualizar el rol";
    $_SESSION['icono'] = "error";
    //     header('Location: ' . $url . '/roles/update.php?id=' . $id_usuario);
    ?>

    <script>
        location.href = "<?php echo $url; ?>/categorias";
    </script>

    <?php
}

?>