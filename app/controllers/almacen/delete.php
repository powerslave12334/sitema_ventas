<?php
/**
 * Archivo: eliminar_producto.php
 * Descripción: Procesa la eliminación de un producto de la base de datos.
 *              - Recibe el ID del producto vía POST
 *              - Ejecuta la eliminación usando PDO con parámetros
 *              - Redirige con mensaje de éxito o error
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Incluye configuración principal y conexión PDO

/* --------------------------------------------------------------------------
   🔹 Captura del ID del producto
   -------------------------------------------------------------------------- */
/**
 * ID del producto que se desea eliminar.
 * Debe provenir de un formulario POST.
 * IMPORTANTE: validar que sea un número entero antes de usarlo.
 */
$id_producto = $_POST['id_producto'];

/* --------------------------------------------------------------------------
   🔹 Preparación de la consulta SQL para eliminar
   -------------------------------------------------------------------------- */
/**
 * Se utiliza PDO con parámetros preparados para prevenir inyección SQL
 */
$sentencia = $pdo->prepare("DELETE FROM tb_almacen WHERE id_producto = :id_producto");

// Asignación del parámetro
$sentencia->bindParam('id_producto', $id_producto);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la consulta y manejo de respuesta
   -------------------------------------------------------------------------- */
if ($sentencia->execute()) {
    // Si se elimina correctamente, iniciar sesión y setear mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Se eliminó el producto correctamente";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . '/almacen/');
} else {
    // Si ocurre un error, iniciar sesión y setear mensaje de error
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo eliminar el producto en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/almacen/delete.php?id=' . $id_producto);
}

/* --------------------------------------------------------------------------
   🔹 NOTAS DE SEGURIDAD Y BUENAS PRÁCTICAS
   -------------------------------------------------------------------------- */
/**
 * 1. Validar que $id_producto sea un número entero antes de ejecutar la consulta.
 * 2. Considerar usar try-catch para manejar posibles excepciones PDO:
 *       try {
 *           $sentencia->execute();
 *       } catch (PDOException $e) {
 *           // Manejo del error
 *       }
 * 3. Verificar que el usuario tenga permisos para eliminar productos antes de ejecutar.
 * 4. Evitar eliminar registros críticos sin respaldo. En sistemas grandes, 
 *    se recomienda usar "eliminación lógica" (marcar como inactivo) en lugar de borrado físico.
 */
