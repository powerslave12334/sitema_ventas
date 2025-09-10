<?php
/**
 * Archivo: update_proveedor.php
 * Descripción: Actualiza los datos de un proveedor en el sistema.
 *              - Recibe los datos del proveedor vía GET
 *              - Actualiza los campos correspondientes en la tabla tb_proveedores
 *              - Muestra mensaje de éxito o error y redirige al listado de proveedores
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y PDO

/* --------------------------------------------------------------------------
   🔹 Captura de datos del proveedor
   -------------------------------------------------------------------------- */
$id_proveedor = $_GET['id_proveedor'];    // ID del proveedor a actualizar
$nombre_proveedor = $_GET['nombre_proveedor'];
$celular = $_GET['celular'];
$telefono = $_GET['telefono'];
$empresa = $_GET['empresa'];
$email = $_GET['email'];
$direccion = $_GET['direccion'];

/* --------------------------------------------------------------------------
   🔹 Preparación de la consulta SQL para actualizar
   -------------------------------------------------------------------------- */
$sentencia = $pdo->prepare("UPDATE tb_proveedores
    SET nombre_proveedor = :nombre_proveedor,
        celular          = :celular,
        telefono         = :telefono,
        empresa          = :empresa,
        email            = :email,
        direccion        = :direccion,
        fyh_actualizacion = :fyh_actualizacion
    WHERE id_proveedor = :id_proveedor");

// Vincula los parámetros para prevenir inyección SQL
$sentencia->bindParam('nombre_proveedor', $nombre_proveedor);
$sentencia->bindParam('celular', $celular);
$sentencia->bindParam('telefono', $telefono);
$sentencia->bindParam('empresa', $empresa);
$sentencia->bindParam('email', $email);
$sentencia->bindParam('direccion', $direccion);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_proveedor', $id_proveedor);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la consulta y manejo de respuesta
   -------------------------------------------------------------------------- */
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se actualizó al proveedor correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo actualizar en la base de datos";
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
 * 1. Validar todos los datos antes de actualizarlos (ej. formatos de email y números de teléfono).
 * 2. Usar POST en lugar de GET para mayor seguridad y evitar exposición de datos en la URL.
 * 3. Las consultas preparadas con bindParam previenen inyección SQL.
 * 4. Manejar excepciones con try-catch para capturar errores de PDO.
 * 5. Mostrar mensajes de forma segura, evitando exponer información sensible del sistema.
 */
