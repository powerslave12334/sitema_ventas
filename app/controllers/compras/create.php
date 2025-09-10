<?php
/**
 * Archivo: guardar_compra.php
 * Descripción: Registra una nueva compra en la base de datos y actualiza el stock del producto.
 *              - Recibe los datos de la compra vía GET
 *              - Inserta el registro en tb_compras
 *              - Actualiza el stock en tb_almacen
 *              - Usa transacciones para garantizar integridad de datos
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y conexión PDO

/* --------------------------------------------------------------------------
   🔹 Captura de datos de la compra
   -------------------------------------------------------------------------- */
$id_producto = $_GET['id_producto'];   // ID del producto comprado
$nro_compra = $_GET['nro_compra'];    // Número de la compra
$fecha_compra = $_GET['fecha_compra'];  // Fecha de la compra
$id_proveedor = $_GET['id_proveedor'];  // ID del proveedor
$comprobante = $_GET['comprobante'];   // Comprobante de compra (archivo o número)
$id_usuario = $_GET['id_usuario'];    // Usuario que realiza la compra
$precio_compra = $_GET['precio_compra']; // Precio unitario de la compra
$cantidad_compra = $_GET['cantidad_compra']; // Cantidad comprada
$stock_total = $_GET['stock_total'];     // Stock total después de la compra

/* --------------------------------------------------------------------------
   🔹 Inicio de transacción
   -------------------------------------------------------------------------- */
$pdo->beginTransaction();

/* --------------------------------------------------------------------------
   🔹 Preparación de la consulta para insertar la compra
   -------------------------------------------------------------------------- */
$sentencia = $pdo->prepare("INSERT INTO tb_compras
       (id_producto, nro_compra, fecha_compra, id_proveedor, comprobante, id_usuario, precio_compra, cantidad, fyh_creacion) 
VALUES (:id_producto, :nro_compra, :fecha_compra, :id_proveedor, :comprobante, :id_usuario, :precio_compra, :cantidad, :fyh_creacion)");

$sentencia->bindParam('id_producto', $id_producto);
$sentencia->bindParam('nro_compra', $nro_compra);
$sentencia->bindParam('fecha_compra', $fecha_compra);
$sentencia->bindParam('id_proveedor', $id_proveedor);
$sentencia->bindParam('comprobante', $comprobante);
$sentencia->bindParam('id_usuario', $id_usuario);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('cantidad', $cantidad_compra);
$sentencia->bindParam('fyh_creacion', $fechaHora);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la inserción y actualización de stock
   -------------------------------------------------------------------------- */
if ($sentencia->execute()) {

    // Actualiza el stock del producto
    $sentencia = $pdo->prepare("UPDATE tb_almacen SET stock = :stock WHERE id_producto = :id_producto");
    $sentencia->bindParam('stock', $stock_total);
    $sentencia->bindParam('id_producto', $id_producto);
    $sentencia->execute();

    // Confirmar transacción
    $pdo->commit();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Se registró la compra correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/compras";
    </script>
    <?php
} else {
    // Revertir transacción si hay error
    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar la compra en la base de datos";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/compras/create.php";
    </script>
    <?php
}

/* --------------------------------------------------------------------------
   🔹 NOTAS DE SEGURIDAD Y BUENAS PRÁCTICAS
   -------------------------------------------------------------------------- */
/**
 * 1. Validar todos los datos recibidos por GET antes de usarlos:
 *    - $id_producto, $id_proveedor, $id_usuario y $cantidad_compra deben ser números válidos.
 *    - $nro_compra y $comprobante deben tener formato seguro.
 * 2. Considerar usar POST en lugar de GET para enviar datos que modifican la base de datos.
 * 3. Usar try-catch para manejar excepciones PDO y errores en la transacción.
 * 4. Confirmar que el stock total calculado no sea negativo antes de actualizar.
 * 5. Mantener integridad de datos usando transacciones, como ya se hace.
 */
