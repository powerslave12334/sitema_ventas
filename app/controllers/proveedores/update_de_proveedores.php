<?php

include('../../config.php');

$id_proveedor = $_GET['id_proveedor'];
$Nombre = $_GET['Nombre'];
$Celular = $_GET['Celular'];
$Telefono = $_GET['Telefono'];
$Empresa = $_GET['Empresa'];
$Correo = $_GET['Correo'];
$Direccion = $_GET['Direccion'];

$sentencia = $pdo->prepare("UPDATE tb_proveedores 
    SET nombre_proveedor =:Nombre,
    celular =:Celular,
    telefono =:Telefono,
    empresa =:Empresa,
    email =:Correo,
    direccion =:Direccion,
    fyh_actualizacion=:fyh_actualizacion 
    WHERE id_proveedor = :id_proveedor");

$sentencia->bindParam('Nombre', $Nombre);
$sentencia->bindParam('Celular', $Celular);
$sentencia->bindParam('Telefono', $Telefono);
$sentencia->bindParam('Empresa', $Empresa);
$sentencia->bindParam('Correo', $Correo);
$sentencia->bindParam('Direccion', $Direccion);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_proveedor', $id_proveedor);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Proveedor se actualizo correctamente";
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
    $_SESSION['mensaje'] = "Error al actualizar el Proveedor";
    $_SESSION['icono'] = "error";
    //     header('Location: ' . $url . '/roles/update.php?id=' . $id_usuario);
    ?>

    <script>
        location.href = "<?php echo $url; ?>/proveedores";
    </script>

    <?php
}

?>