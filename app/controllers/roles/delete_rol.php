<?php

include('../../config.php');

$id_rol = $_POST['id_rol'];

$sentencia = $pdo->prepare("DELETE FROM tb_roles 
WHERE id_rol = :id_rol");

$sentencia->bindParam('id_rol', $id_rol);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se elimino el rol exitosamente";
    $_SESSION['icono'] = "succcess";
    header('Location:' . $url . '/roles');
} else {
    session_start();
    $_SESSION['mensaje'] = "No se elimino el rol exitosamente";
    $_SESSION['icono'] = "error";
    header('Location:' . $url . '/roles');
}

?>