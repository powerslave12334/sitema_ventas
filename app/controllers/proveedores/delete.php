<?php
/**
 * Archivo: delete_proveedor.php
 * Descripción: Elimina un proveedor del sistema.
 *              - Recibe el ID del proveedor vía GET
 *              - Elimina el registro de la tabla tb_proveedores
 *              - Muestra mensaje de éxito o error y redirige al listado de proveedores
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y PDO

/* --------------------------------------------------------------------------
   🔹 Captura del ID del proveedor
   -------------------------------------------------------------------------- */
$id_proveedor = $_GET['id_proveedor']; // ID del proveedor a eliminar

/* --------------------------------------------------------------------------
   🔹 Preparación de la consulta SQL para eliminar
   -------------------------------------------------------------------------- */
$sentencia = $pdo->prepare("DELETE FROM tb_proveedores WHERE id_proveedor = :id_proveedor");
$sentencia->bindParam('id_proveedor', $id_proveedor);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la consulta y manejo de respuesta
   -------------------------------------------------------------------------- */
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se eliminó al proveedor correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo eliminar en la base de datos";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
}

/* --------------------------------------------------------------------------
   🔹 Notas de buenas prácticas y seguridad
   -------------------------------------------------------------------------- */
/**
 * 1. Validar que $id_proveedor sea un número válido antes de ejecutar la consulta.
 * 2. Considerar usar POST para eliminar registros para mayor seguridad.
 * 3. Usar consultas preparadas con bindParam para prevenir inyección SQL.
 * 4. Manejar excepciones con try-catch para capturar errores de PDO.
 * 5. Confirmar con el usuario antes de eliminar un registro crítico.
 */
