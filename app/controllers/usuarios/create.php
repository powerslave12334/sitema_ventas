<?php

include('../../config.php');

$nombres = $_POST['nombres'];
$email = $_POST['email'];
$rol = $_POST['rol'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];

if ($password_user == $password_repeat) {
       $password_user = password_hash($password_user, PASSWORD_DEFAULT);
       $sentencia = $pdo->prepare("INSERT INTO tb_usuarios
       (nombres, email, id_rol, password_use, FyH_creacion) 
VALUES (:nombres, :email, :id_rol, :password_use, :FyH_creacion)");

       $sentencia->bindParam('nombres', $nombres);
       $sentencia->bindParam('email', $email);
       $sentencia->bindParam('id_rol', $rol);
       $sentencia->bindParam('password_use', $password_user);
       $sentencia->bindParam('FyH_creacion', $fechaHora);
       $sentencia->execute();

       session_start();
       $_SESSION['mensaje'] = "Se registro usuario de la manera correcta";
       header('Location:' . $url . '/usuarios');
} else {

       // echo "Error de contraseña";
       session_start();
       $_SESSION['mensaje'] = "Error las contraseñas no son iguales";
       header('Location: ' . $url . '/usuarios/create.php');
}




?>