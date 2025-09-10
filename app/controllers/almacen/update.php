<?php
/**
 * Archivo: actualizar_producto.php
 * Descripción: Procesa la actualización de un producto existente en la base de datos.
 *              - Captura datos enviados vía POST
 *              - Maneja la posible actualización de la imagen del producto
 *              - Actualiza los datos en la tabla tb_almacen
 *              - Redirige con mensaje de éxito o error
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y PDO

/* --------------------------------------------------------------------------
   🔹 Captura de datos enviados por POST
   -------------------------------------------------------------------------- */
$codigo = $_POST['codigo'];                  // Código único del producto (puede no actualizarse)
$id_categoria = $_POST['id_categoria'];      // ID de la categoría
$nombre = $_POST['nombre'];                  // Nombre del producto
$id_usuario = $_POST['id_usuario'];          // ID del usuario que actualiza
$descripcion = $_POST['descripcion'];        // Descripción del producto
$stock = $_POST['stock'];                    // Stock actual
$stock_minimo = $_POST['stock_minimo'];      // Stock mínimo permitido
$stock_maximo = $_POST['stock_maximo'];      // Stock máximo permitido
$precio_compra = $_POST['precio_compra'];    // Precio de compra
$precio_venta = $_POST['precio_venta'];      // Precio de venta
$fecha_ingreso = $_POST['fecha_ingreso'];    // Fecha de ingreso del producto
$id_producto = $_POST['id_producto'];        // ID del producto a actualizar
$image_text = $_POST['image_text'];          // Nombre de la imagen actual

/* --------------------------------------------------------------------------
   🔹 Manejo de la imagen del producto
   -------------------------------------------------------------------------- */
if ($_FILES['image']['name'] != null) {
    // Se sube una nueva imagen si el usuario envió una
    $nombreDelArchivo = date("Y-m-d-h-i-s");
    $image_text = $nombreDelArchivo . "__" . $_FILES['image']['name'];
    $location = "../../../almacen/img_productos/" . $image_text;

    // Mover la imagen temporal al directorio final
    move_uploaded_file($_FILES['image']['tmp_name'], $location);
} else {
    // No se envió imagen nueva, se mantiene la existente
}

/* --------------------------------------------------------------------------
   🔹 Preparación de la consulta SQL para actualizar el producto
   -------------------------------------------------------------------------- */
$sentencia = $pdo->prepare("UPDATE tb_almacen
    SET nombre=:nombre,
        descripcion=:descripcion,
        stock=:stock,
        stock_minimo=:stock_minimo,
        stock_maximo=:stock_maximo,
        precio_compra=:precio_compra,
        precio_venta=:precio_venta,
        fecha_ingreso=:fecha_ingreso,
        imagen=:imagen,
        id_usuario=:id_usuario,
        id_categoria=:id_categoria,
        fyh_actualizacion=:fyh_actualizacion 
    WHERE id_producto = :id_producto ");

// Asignación de parámetros para proteger contra inyección SQL
$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('descripcion', $descripcion);
$sentencia->bindParam('stock', $stock);
$sentencia->bindParam('stock_minimo', $stock_minimo);
$sentencia->bindParam('stock_maximo', $stock_maximo);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('precio_venta', $precio_venta);
$sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
$sentencia->bindParam('imagen', $image_text);
$sentencia->bindParam('id_usuario', $id_usuario);
$sentencia->bindParam('id_categoria', $id_categoria);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_producto', $id_producto);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la consulta y manejo de respuesta
   -------------------------------------------------------------------------- */
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el producto correctamente";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . '/almacen/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo actualizar el producto en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/almacen/update.php?id=' . $id_producto);
}

/* --------------------------------------------------------------------------
   🔹 NOTAS DE SEGURIDAD Y BUENAS PRÁCTICAS
   -------------------------------------------------------------------------- */
/**
 * 1. Validar todos los datos recibidos por POST antes de usarlos:
 *    - Stock, precios y IDs deben ser números válidos.
 *    - Textos no deben contener caracteres peligrosos.
 * 2. Validar la imagen antes de moverla:
 *    - Tipo permitido: jpg, png, gif
 *    - Tamaño máximo permitido
 * 3. Considerar usar try-catch para manejar errores de PDO y subida de archivos.
 * 4. Escapar o limpiar el nombre de archivo para evitar problemas de seguridad.
 * 5. Mantener la imagen actual si no se envía una nueva, como ya se hace.
 */
