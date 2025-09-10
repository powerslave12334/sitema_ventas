<?php
/**
 * Archivo: create_usuario.php
 * Descripción: Registra un nuevo usuario en el sistema.
 *              - Recibe datos vía POST: nombres, email, rol, contraseña y repetición de contraseña
 *              - Valida que las contraseñas coincidan
 *              - Hashea la contraseña con password_hash
 *              - Inserta el usuario en la tabla tb_usuarios
 *              - Redirige con mensaje de éxito o error
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y PDO

/* --------------------------------------------------------------------------
   🔹 Captura de datos desde POST
   -------------------------------------------------------------------------- */
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$rol = $_POST['rol'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];

/* --------------------------------------------------------------------------
   🔹 Validación de contraseñas
   -------------------------------------------------------------------------- */
if ($password_user == $password_repeat) {

       // Hasheo de la contraseña
       $password_user = password_hash($password_user, PASSWORD_DEFAULT);

       /* ----------------------------------------------------------------------
          🔹 Preparación de la consulta SQL para insertar usuario
          ---------------------------------------------------------------------- */
       $sentencia = $pdo->prepare("INSERT INTO tb_usuarios
       (nombres, email, id_rol, password_user, fyh_creacion) 
       VALUES (:nombres, :email, :id_rol, :password_user, :fyh_creacion)");

       $sentencia->bindParam('nombres', $nombres);
       $sentencia->bindParam('email', $email);
       $sentencia->bindParam('id_rol', $rol);
       $sentencia->bindParam('password_user', $password_user);
       $sentencia->bindParam('fyh_creacion', $fechaHora);

       /* ----------------------------------------------------------------------
          🔹 Ejecución de la consulta
          ---------------------------------------------------------------------- */
       $sentencia->execute();

       session_start();
       $_SESSION['mensaje'] = "Se registró al usuario de la manera correcta";
       header('Location: ' . $URL . '/usuarios/');

} else {
       session_start();
       $_SESSION['mensaje'] = "Error: las contraseñas no son iguales";
       header('Location: ' . $URL . '/usuarios/create.php');
}

/* --------------------------------------------------------------------------
   🔹 Buenas prácticas y notas
   -------------------------------------------------------------------------- */
/**
 * 1. Validar que el email no exista previamente en la base de datos.
 * 2. Sanitizar todos los datos recibidos para prevenir inyección de código.
 * 3. Validar la longitud y formato de la contraseña.
 * 4. Considerar el uso de try-catch para capturar errores de PDO.
 * 5. Evitar exponer mensajes de error sensibles al usuario final.
 */
