<?php
/**
 * Archivo: update_rol.php
 * Descripción: Actualiza los datos de un rol específico en la base de datos.
 *              - Recibe el ID del rol y el nuevo nombre vía POST
 *              - Actualiza la tabla tb_roles
 *              - Muestra mensaje de éxito o error y redirige al listado o al formulario de edición
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y PDO

/* --------------------------------------------------------------------------
   🔹 Captura de datos desde POST
   -------------------------------------------------------------------------- */
$id_rol = $_POST['id_rol']; // ID del rol a actualizar
$rol = $_POST['rol'];       // Nuevo nombre del rol

/* --------------------------------------------------------------------------
   🔹 Preparación de la consulta SQL para actualizar el rol
   -------------------------------------------------------------------------- */
$sentencia = $pdo->prepare("UPDATE tb_roles
    SET rol=:rol,
        fyh_actualizacion=:fyh_actualizacion 
    WHERE id_rol = :id_rol");

$sentencia->bindParam('rol', $rol);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_rol', $id_rol);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la consulta y manejo de respuesta
   -------------------------------------------------------------------------- */
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el rol de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . '/roles/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo actualizar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/roles/update.php?id=' . $id_rol);
}

/* --------------------------------------------------------------------------
   🔹 Buenas prácticas y notas
   -------------------------------------------------------------------------- */
/**
 * 1. Validar que $id_rol sea un número entero antes de la consulta.
 * 2. Validar que $rol no esté vacío y cumpla con los requisitos de longitud.
 * 3. Usar bindParam para prevenir inyección SQL.
 * 4. Manejar errores de PDO usando try-catch si se desea más robustez.
 * 5. Se recomienda sanitizar la entrada antes de almacenarla en la base de datos.
 */
