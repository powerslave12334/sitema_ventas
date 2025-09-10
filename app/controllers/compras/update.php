<?php
/**
 * Archivo: actualizar_compra.php
 * Descripción: Actualiza un registro de compra existente y ajusta el stock del producto.
 *              - Recibe los datos de la compra vía GET
 *              - Actualiza el registro en tb_compras
 *              - Ajusta el stock correspondiente en tb_almacen
 *              - Usa transacciones para garantizar la integridad de los datos
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y conexión PDO

/* --------------------------------------------------------------------------
   🔹 Captura de datos de la compra
   -------------------------------------------------------------------------- */
$id_compra = $_GET['id_compra'];      // ID de la compra a actualizar
$id_producto = $_GET['id_producto'];    // ID del producto comprado
$nro_compra = $_GET['nro_compra'];     // Número de la compra
$fecha_compra = $_GET['fecha_compra'];   // Fecha de la compra
$id_proveedor = $_GET['id_proveedor'];   // ID del proveedor
$comprobante = $_GET['comprobante'];    // Comprobante de compra
$id_usuario = $_GET['id_usuario'];     // Usuario que realiza la actualización
$precio_compra = $_GET['precio_compra'];  // Precio unitario de la compra
$cantidad_compra = $_GET['cantidad_compra']; // Cantidad comprada
$stock_total = $_GET['stock_total'];    // Nuevo stock total del producto

/* --------------------------------------------------------------------------
   🔹 Inicio de transacción
   -------------------------------------------------------------------------- */
$pdo->beginTransaction();

/* --------------------------------------------------------------------------
   🔹 Preparación de la consulta para actualizar la compra
   -------------------------------------------------------------------------- */
$sentencia = $pdo->prepare("UPDATE tb_compras 
SET id_producto = :id_producto,
    nro_compra = :nro_compra,
    fecha_compra = :fecha_compra,
    id_proveedor = :id_proveedor,
    comprobante = :comprobante,
    id_usuario = :id_usuario,
    precio_compra = :precio_compra,
    cantidad = :cantidad,
    fyh_actualizacion = :fyh_actualizacion
WHERE id_compra = :id_compra");

$sentencia->bindParam('id_producto', $id_producto);
$sentencia->bindParam('nro_compra', $nro_compra);
$sentencia->bindParam('fecha_compra', $fecha_compra);
$sentencia->bindParam('id_proveedor', $id_proveedor);
$sentencia->bindParam('comprobante', $comprobante);
$sentencia->bindParam('id_usuario', $id_usuario);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('cantidad', $cantidad_compra);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_compra', $id_compra);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la actualización y ajuste de stock
   -------------------------------------------------------------------------- */
if ($sentencia->execute()) {

    // Actualiza el stock en tb_almacen
    $sentencia = $pdo->prepare("UPDATE tb_almacen SET stock = :stock WHERE id_producto = :id_producto");
    $sentencia->bindParam('stock', $stock_total);
    $sentencia->bindParam('id_producto', $id_producto);
    $sentencia->execute();

    // Confirma la transacción
    $pdo->commit();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Se actualizó la compra correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/compras";
    </script>
    <?php
} else {
    // Revertir la transacción si ocurre un error
    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo actualizar la compra";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/compras";
    </script>
    <?php
}

/* --------------------------------------------------------------------------
   🔹 Notas de buenas prácticas y seguridad
   -------------------------------------------------------------------------- */
/**
 * 1. Validar todos los datos recibidos por GET:
 *    - $id_compra, $id_producto, $id_proveedor, $id_usuario y $cantidad_compra deben ser números válidos.
 *    - $nro_compra y $comprobante deben tener formato seguro.
 * 2. Considerar usar POST en lugar de GET para modificar registros.
 * 3. Usar try-catch para manejo de excepciones PDO.
 * 4. Verificar que $stock_total no sea negativo antes de actualizar.
 * 5. Mantener la integridad de los datos usando transacciones.
 */
