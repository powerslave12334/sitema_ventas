<?php
/**
 * Archivo: delete_rol.php
 * Descripción: Elimina un rol del sistema.
 *              - Recibe el ID del rol vía POST
 *              - Elimina el registro de la tabla tb_roles
 *              - Muestra mensaje de éxito o error y redirige al listado de roles
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y PDO

/* --------------------------------------------------------------------------
   🔹 Captura del ID del rol
   -------------------------------------------------------------------------- */
$id_rol = $_POST['id_rol']; // ID del rol a eliminar

/* --------------------------------------------------------------------------
   🔹 Preparación de la consulta SQL para eliminar
   -------------------------------------------------------------------------- */
$sentencia = $pdo->prepare("DELETE FROM tb_roles WHERE id_rol = :id_rol");
$sentencia->bindParam('id_rol', $id_rol);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la consulta y manejo de respuesta
   -------------------------------------------------------------------------- */
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se eliminó el rol exitosamente";
    $_SESSION['icono'] = "success"; // corregido typo de 'succcess'
    header('Location: ' . $URL . '/roles');
} else {
    session_start();
    $_SESSION['mensaje'] = "No se pudo eliminar el rol";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/roles');
}

/* --------------------------------------------------------------------------
   🔹 Buenas prácticas y notas
   -------------------------------------------------------------------------- */
/**
 * 1. Validar que $id_rol sea un número válido antes de ejecutar la consulta.
 * 2. Usar POST en lugar de GET para mayor seguridad.
 * 3. Usar bindParam para prevenir inyección SQL.
 * 4. Manejar errores con try-catch para capturar fallos de PDO.
 * 5. Considerar confirmar la eliminación con el usuario antes de ejecutar la operación.
 */
