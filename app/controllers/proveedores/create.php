<?php
/**
 * Archivo: create_proveedor.php
 * Descripción: Registra un nuevo proveedor en el sistema.
 *              - Recibe los datos del proveedor vía GET
 *              - Inserta los datos en la tabla tb_proveedores
 *              - Muestra mensaje de éxito o error y redirige
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y PDO

/* --------------------------------------------------------------------------
   🔹 Captura de datos del proveedor
   -------------------------------------------------------------------------- */
$nombre_proveedor = $_GET['nombre_proveedor']; // Nombre del proveedor
$celular = $_GET['celular'];          // Número de celular
$telefono = $_GET['telefono'];         // Número de teléfono fijo
$empresa = $_GET['empresa'];          // Nombre de la empresa
$email = $_GET['email'];            // Email de contacto
$direccion = $_GET['direccion'];        // Dirección física

/* --------------------------------------------------------------------------
   🔹 Preparación de la consulta SQL
   -------------------------------------------------------------------------- */
$sentencia = $pdo->prepare("INSERT INTO tb_proveedores
       (nombre_proveedor, celular, telefono, empresa, email, direccion, fyh_creacion) 
VALUES (:nombre_proveedor, :celular, :telefono, :empresa, :email, :direccion, :fyh_creacion)");

// Vincula parámetros para prevenir inyección SQL
$sentencia->bindParam('nombre_proveedor', $nombre_proveedor);
$sentencia->bindParam('celular', $celular);
$sentencia->bindParam('telefono', $telefono);
$sentencia->bindParam('empresa', $empresa);
$sentencia->bindParam('email', $email);
$sentencia->bindParam('direccion', $direccion);
$sentencia->bindParam('fyh_creacion', $fechaHora);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la consulta y manejo de respuesta
   -------------------------------------------------------------------------- */
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se registró al proveedor correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos";
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
 * 1. Validar todos los datos recibidos antes de insertarlos (ej. formatos de email y números de teléfono).
 * 2. Considerar usar POST en lugar de GET para mayor seguridad.
 * 3. Las consultas preparadas con bindParam previenen inyección SQL.
 * 4. Se puede agregar manejo de excepciones con try-catch para capturar errores de PDO.
 * 5. Mostrar mensajes al usuario de forma segura, evitando filtrar información sensible.
 */
