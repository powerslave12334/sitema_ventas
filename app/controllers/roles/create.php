<?php

include('../../config.php');

$rol = $_POST['rol'];


$sentencia = $pdo->prepare("INSERT INTO tb_roles
       (rol,fyh_creacion) 
VALUES (:rol, :fyh_creacion)");

$sentencia->bindParam('rol', $rol);
$sentencia->bindParam('fyh_creacion', $fechaHora);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Rol se registro de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location:' . $url . '/roles');

} else {
    session_start();
    $_SESSION['mensaje'] = "Error al registrar el rol";
    $_SESSION['icono'] = "error";
    header('Location: ' . $url . '/roles/create.php');
}






?>