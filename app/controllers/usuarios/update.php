<?php

include('../../config.php');

$nombres = $_POST['nombres'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];
$id_usuario = $_POST['id_usuario'];
$rol = $_POST['rol'];

if ($password_user == "") {
    if ($password_user == $password_repeat) {
        $password_user = password_hash($password_user, PASSWORD_DEFAULT);
        $sentencia = $pdo->prepare("UPDATE tb_usuarios 
    SET nombres =:nombres,
    email=:email,
    id_rol=:id_rol,
    FyH_actualizacion=:FyH_actualizacion 
    WHERE id_usuario = :id_usuario");

        $sentencia->bindParam('nombres', $nombres);
        $sentencia->bindParam('email', $email);
        $sentencia->bindParam('id_rol', $rol);
        $sentencia->bindParam('FyH_actualizacion', $fechaHora);
        $sentencia->bindParam('id_usuario', $id_usuario);
        $sentencia->execute();

        session_start();
        $_SESSION['mensaje'] = "Usuario se actualizo correctamente";
        $_SESSION['icono'] = "succcess";
        header('Location:' . $url . '/usuarios');
    } else {

        // echo "Error de contraseña";
        session_start();
        $_SESSION['mensaje'] = "Error las contraseñas no son iguales";
        $_SESSION['icono'] = "error";
        header('Location: ' . $url . '/usuarios/update.php?id=' . $id_usuario);
    }
} else {
    if ($password_user == $password_repeat) {
        $password_user = password_hash($password_user, PASSWORD_DEFAULT);
        $sentencia = $pdo->prepare("UPDATE tb_usuarios 
    SET nombres =:nombres,
    email=:email,
    id_rol=:id_rol,
    password_use=:password_user,
    FyH_actualizacion=:FyH_actualizacion 
    WHERE id_usuario = :id_usuario");

        $sentencia->bindParam('nombres', $nombres);
        $sentencia->bindParam('email', $email);
        $sentencia->bindParam('id_rol', $rol);
        $sentencia->bindParam('password_user', $password_user);
        $sentencia->bindParam('FyH_actualizacion', $fechaHora);
        $sentencia->bindParam('id_usuario', $id_usuario);
        $sentencia->execute();

        session_start();
        $_SESSION['mensaje'] = "Usuario se actualizo correctamente";
        $_SESSION['icono'] = "succcess";
        header('Location:' . $url . '/usuarios');
    } else {

        // echo "Error de contraseña";
        session_start();
        $_SESSION['mensaje'] = "Error las contraseñas no son iguales";
        $_SESSION['icono'] = "error";
        header('Location: ' . $url . '/usuarios/update.php?id=' . $id_usuario);
    }
}



?>