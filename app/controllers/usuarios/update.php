<?php
/**
 * Archivo: update_usuario.php
 * Descripción: Actualiza los datos de un usuario, incluyendo opcionalmente su contraseña.
 *              - Valida que las contraseñas coincidan si se envían
 *              - Actualiza solo la contraseña si se proporcionó
 *              - Actualiza el resto de los datos del usuario
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php');

$nombres = $_POST['nombres'];
$email = $_POST['email'];
$rol = $_POST['rol'];
$id_usuario = $_POST['id_usuario'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];

// Validar si se cambió la contraseña
$actualizar_contrasena = false;
if (!empty($password_user)) {
    if ($password_user === $password_repeat) {
        $password_user = password_hash($password_user, PASSWORD_DEFAULT);
        $actualizar_contrasena = true;
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error: las contraseñas no son iguales";
        $_SESSION['icono'] = "error";
        header('Location: ' . $URL . '/usuarios/update.php?id=' . $id_usuario);
        exit;
    }
}

// Construir la consulta de actualización
$sql = "UPDATE tb_usuarios
        SET nombres=:nombres,
            email=:email,
            id_rol=:id_rol,
            fyh_actualizacion=:fyh_actualizacion";

if ($actualizar_contrasena) {
    $sql .= ", password_user=:password_user";
}

$sql .= " WHERE id_usuario=:id_usuario";

$sentencia = $pdo->prepare($sql);
$sentencia->bindParam('nombres', $nombres);
$sentencia->bindParam('email', $email);
$sentencia->bindParam('id_rol', $rol);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_usuario', $id_usuario);

if ($actualizar_contrasena) {
    $sentencia->bindParam('password_user', $password_user);
}

// Ejecutar actualización
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se actualizó al usuario de manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . '/usuarios/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo actualizar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/usuarios/update.php?id=' . $id_usuario);
}
