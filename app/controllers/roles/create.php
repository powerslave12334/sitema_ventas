<?php
/**
 * Archivo: create_rol.php
 * Descripción: Registra un nuevo rol en el sistema.
 *              - Recibe el nombre del rol vía POST
 *              - Inserta el registro en la tabla tb_roles
 *              - Muestra mensaje de éxito o error y redirige a la lista de roles
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y PDO

/* --------------------------------------------------------------------------
   🔹 Captura del nombre del rol
   -------------------------------------------------------------------------- */
$rol = $_POST['rol'];

/* --------------------------------------------------------------------------
   🔹 Preparación de la consulta SQL para insertar
   -------------------------------------------------------------------------- */
$sentencia = $pdo->prepare("INSERT INTO tb_roles
       (rol, fyh_creacion) 
VALUES (:rol, :fyh_creacion)");

// Vincula los parámetros para prevenir inyección SQL
$sentencia->bindParam('rol', $rol);
$sentencia->bindParam('fyh_creacion', $fechaHora);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la consulta y manejo de respuesta
   -------------------------------------------------------------------------- */
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se registró el rol correctamente";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . '/roles/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/roles/create.php');
}

/* --------------------------------------------------------------------------
   🔹 Notas y buenas prácticas
   -------------------------------------------------------------------------- */
/**
 * 1. Validar que $rol no esté vacío antes de insertarlo.
 * 2. Considerar usar POST para recibir datos sensibles.
 * 3. Usar bindParam evita inyección SQL.
 * 4. Se pueden agregar validaciones adicionales, por ejemplo, longitud máxima del rol.
 */
