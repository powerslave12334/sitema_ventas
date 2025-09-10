<?php
/**
 * Archivo: delete_usuario.php
 * Descripción: Elimina un usuario específico de la base de datos.
 *              - Recibe el ID del usuario vía POST
 *              - Realiza la eliminación de la tabla tb_usuarios
 *              - Redirige con mensaje de éxito
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y PDO

/* --------------------------------------------------------------------------
   🔹 Captura del ID del usuario desde POST
   -------------------------------------------------------------------------- */
$id_usuario = $_POST['id_usuario'];

/* --------------------------------------------------------------------------
   🔹 Preparación y ejecución de la consulta SQL para eliminar usuario
   -------------------------------------------------------------------------- */
$sentencia = $pdo->prepare("DELETE FROM tb_usuarios WHERE id_usuario = :id_usuario");
$sentencia->bindParam('id_usuario', $id_usuario);
$sentencia->execute();

/* --------------------------------------------------------------------------
   🔹 Inicio de sesión y mensaje de confirmación
   -------------------------------------------------------------------------- */
session_start();
$_SESSION['mensaje'] = "Se eliminó al usuario de la manera correcta";
$_SESSION['icono'] = "success";

/* --------------------------------------------------------------------------
   🔹 Redirección al listado de usuarios
   -------------------------------------------------------------------------- */
header('Location: ' . $URL . '/usuarios/');

/* --------------------------------------------------------------------------
   🔹 Buenas prácticas y notas
   -------------------------------------------------------------------------- */
/**
 * 1. Considerar validaciones para evitar eliminar usuarios críticos o el propio usuario logueado.
 * 2. Usar try-catch para manejar posibles errores de PDO.
 * 3. Confirmar la existencia del ID del usuario antes de eliminar.
 * 4. Registrar en un log la acción de eliminación para auditoría.
 */
