<?php
/**
 * Archivo: guardar_categoria.php
 * Descripción: Registra una nueva categoría en la tabla tb_categorias.
 *              - Recibe el nombre de la categoría vía GET
 *              - Inserta la categoría en la base de datos con fecha y hora de creación
 *              - Redirige mostrando un mensaje de éxito o error
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y PDO

/* --------------------------------------------------------------------------
   🔹 Captura del nombre de la categoría
   -------------------------------------------------------------------------- */
/**
 * Nombre de la categoría recibido vía GET
 * IMPORTANTE: validar antes de usar para evitar problemas de seguridad
 */
$nombre_categoria = $_GET['nombre_categoria'];

/* --------------------------------------------------------------------------
   🔹 Preparación de la consulta SQL para insertar la categoría
   -------------------------------------------------------------------------- */
$sentencia = $pdo->prepare("INSERT INTO tb_categorias
       (nombre_categoria, fyh_creacion) 
VALUES (:nombre_categoria, :fyh_creacion)");

// Asignación de parámetros para prevenir inyección SQL
$sentencia->bindParam('nombre_categoria', $nombre_categoria);
$sentencia->bindParam('fyh_creacion', $fechaHora);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la consulta y manejo de respuesta
   -------------------------------------------------------------------------- */
if ($sentencia->execute()) {
    // Registro exitoso
    session_start();
    $_SESSION['mensaje'] = "Se registró la categoría correctamente";
    $_SESSION['icono'] = "success";

    // Redirección usando JavaScript
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/categorias";
    </script>
    <?php
} else {
    // Error al registrar
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo registrar la categoría en la base de datos";
    $_SESSION['icono'] = "error";

    // Redirección usando JavaScript
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/categorias";
    </script>
    <?php
}

/* --------------------------------------------------------------------------
   🔹 NOTAS DE SEGURIDAD Y BUENAS PRÁCTICAS
   -------------------------------------------------------------------------- */
/**
 * 1. Validar el valor recibido por GET:
 *    - Asegurarse de que no esté vacío
 *    - Escapar caracteres peligrosos para prevenir inyección XSS
 * 2. Considerar usar POST en lugar de GET para enviar datos que modifican la base de datos.
 * 3. Usar try-catch para manejar posibles errores de PDO.
 * 4. Evitar redirecciones con JavaScript si es posible; usar header('Location: ...') es más seguro.
 */
