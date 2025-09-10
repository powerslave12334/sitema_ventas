<?php
/**
 * Archivo: guardar_producto.php
 * Descripción: Procesa el formulario de registro de un nuevo producto.
 *              - Captura datos enviados vía POST
 *              - Maneja la subida de imagen del producto
 *              - Inserta los datos en la base de datos tb_almacen
 *              - Redirige con mensaje de éxito o error
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa la configuración principal, PDO y variables globales

/* --------------------------------------------------------------------------
   🔹 Captura de datos enviados por POST
   -------------------------------------------------------------------------- */
$codigo = $_POST['codigo'];                  // Código único del producto
$id_categoria = $_POST['id_categoria'];      // ID de la categoría del producto
$nombre = $_POST['nombre'];                  // Nombre del producto
$id_usuario = $_POST['id_usuario'];          // ID del usuario que registra el producto
$descripcion = $_POST['descripcion'];        // Descripción del producto
$stock = $_POST['stock'];                    // Stock actual
$stock_minimo = $_POST['stock_minimo'];      // Stock mínimo permitido
$stock_maximo = $_POST['stock_maximo'];      // Stock máximo permitido
$precio_compra = $_POST['precio_compra'];    // Precio de compra
$precio_venta = $_POST['precio_venta'];      // Precio de venta
$fecha_ingreso = $_POST['fecha_ingreso'];    // Fecha de ingreso del producto

/* --------------------------------------------------------------------------
   🔹 Manejo de la imagen del producto
   -------------------------------------------------------------------------- */
/**
 * Se genera un nombre único usando la fecha y hora actual
 * para evitar colisiones de nombres de archivo.
 */
$nombreDelArchivo = date("Y-m-d-h-i-s");
$filename = $nombreDelArchivo . "__" . $_FILES['image']['name'];

/**
 * Directorio donde se guardará la imagen
 * IMPORTANTE: El directorio debe tener permisos de escritura
 */
$location = "../../../almacen/img_productos/" . $filename;

/**
 * Mueve la imagen temporal subida por el usuario al directorio final
 */
move_uploaded_file($_FILES['image']['tmp_name'], $location);

/* --------------------------------------------------------------------------
   🔹 Preparación de la consulta SQL usando PDO
   -------------------------------------------------------------------------- */
$sentencia = $pdo->prepare("INSERT INTO tb_almacen
       (codigo, nombre, descripcion, stock, stock_minimo, stock_maximo, 
        precio_compra, precio_venta, fecha_ingreso, imagen, 
        id_usuario, id_categoria, fyh_creacion) 
VALUES (:codigo, :nombre, :descripcion, :stock, :stock_minimo, :stock_maximo, 
        :precio_compra, :precio_venta, :fecha_ingreso, :imagen, 
        :id_usuario, :id_categoria, :fyh_creacion)");

// Asignación de parámetros para evitar inyección SQL
$sentencia->bindParam('codigo', $codigo);
$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('descripcion', $descripcion);
$sentencia->bindParam('stock', $stock);
$sentencia->bindParam('stock_minimo', $stock_minimo);
$sentencia->bindParam('stock_maximo', $stock_maximo);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('precio_venta', $precio_venta);
$sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
$sentencia->bindParam('imagen', $filename);
$sentencia->bindParam('id_usuario', $id_usuario);
$sentencia->bindParam('id_categoria', $id_categoria);
$sentencia->bindParam('fyh_creacion', $fechaHora);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la consulta y manejo de respuesta
   -------------------------------------------------------------------------- */
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se registró el producto correctamente";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . '/almacen/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar el producto en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/almacen/create.php');
}

/* --------------------------------------------------------------------------
   🔹 NOTAS DE SEGURIDAD Y BUENAS PRÁCTICAS
   -------------------------------------------------------------------------- */
/**
 * 1. Validar los datos recibidos por POST antes de insertarlos en la base de datos:
 *    - Números deben ser enteros o floats según corresponda
 *    - Texto no debe contener caracteres peligrosos
 * 2. Validar el archivo de imagen antes de moverlo:
 *    - Tipo de archivo permitido (jpg, png, gif)
 *    - Tamaño máximo permitido
 * 3. Usar try-catch para manejar posibles excepciones PDO y errores de subida de archivos
 * 4. Escapar nombres de archivo y eliminar caracteres especiales para mayor seguridad
 */
