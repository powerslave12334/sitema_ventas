<?php
/**
 * Archivo: eliminar_compra.php
 * Descripción: Elimina un registro de compra y actualiza el stock del producto correspondiente.
 *              - Recibe los datos de la compra vía GET
 *              - Elimina la compra de tb_compras
 *              - Actualiza el stock en tb_almacen
 *              - Usa transacciones para garantizar la integridad de los datos
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y conexión PDO

/* --------------------------------------------------------------------------
   🔹 Captura de datos de la compra
   -------------------------------------------------------------------------- */
$id_compra = $_GET['id_compra'];       // ID de la compra a eliminar
$id_producto = $_GET['id_producto'];     // ID del producto comprado
$cantidad_compra = $_GET['cantidad_compra']; // Cantidad comprada a restar del stock
$stock_actual = $_GET['stock_actual'];    // Stock actual antes de eliminar la compra

/* --------------------------------------------------------------------------
   🔹 Inicio de transacción
   -------------------------------------------------------------------------- */
$pdo->beginTransaction();

/* --------------------------------------------------------------------------
   🔹 Preparación de la consulta para eliminar la compra
   -------------------------------------------------------------------------- */
$sentencia = $pdo->prepare("DELETE FROM tb_compras WHERE id_compra = :id_compra");
$sentencia->bindParam('id_compra', $id_compra);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la eliminación y actualización de stock
   -------------------------------------------------------------------------- */
if ($sentencia->execute()) {

    // Calcula el nuevo stock restando la cantidad de la compra eliminada
    $stock = $stock_actual - $cantidad_compra;

    // Actualiza el stock en la tabla tb_almacen
    $sentencia = $pdo->prepare("UPDATE tb_almacen SET stock = :stock WHERE id_producto = :id_producto");
    $sentencia->bindParam('stock', $stock);
    $sentencia->bindParam('id_producto', $id_producto);
    $sentencia->execute();

    // Confirma la transacción
    $pdo->commit();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Se eliminó la compra correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/compras";
    </script>
    <?php
} else {
    // Revertir la transacción en caso de error
    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo eliminar la compra";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/compras";
    </script>
    <?php
}

/* --------------------------------------------------------------------------
   🔹 NOTAS DE SEGURIDAD Y BUENAS PRÁCTICAS
   -------------------------------------------------------------------------- */
/**
 * 1. Validar todos los datos recibidos por GET:
 *    - $id_compra, $id_producto y $cantidad_compra deben ser números válidos
 *    - $stock_actual debe ser un número mayor o igual a $cantidad_compra
 * 2. Considerar usar POST en lugar de GET para eliminar datos en la base de datos.
 * 3. Usar try-catch para manejar excepciones PDO y errores en la transacción.
 * 4. Confirmar que el nuevo stock no sea negativo antes de actualizar.
 * 5. Mantener integridad de datos usando transacciones, como ya se hace.
 */
