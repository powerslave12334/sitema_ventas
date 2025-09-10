<?php
/**
 * Archivo: actualizar_categoria.php
 * Descripción: Actualiza el nombre de una categoría existente en la base de datos.
 *              - Recibe el nombre y el ID de la categoría vía GET
 *              - Actualiza la categoría y registra la fecha/hora de actualización
 *              - Redirige mostrando un mensaje de éxito o error
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal y conexión PDO

/* --------------------------------------------------------------------------
   🔹 Captura de datos enviados por GET
   -------------------------------------------------------------------------- */
/**
 * Nombre actualizado de la categoría.
 * @var string $nombre_categoria
 */
$nombre_categoria = $_GET['nombre_categoria'];

/**
 * ID de la categoría a actualizar.
 * @var int $id_categoria
 */
$id_categoria = $_GET['id_categoria'];

/* --------------------------------------------------------------------------
   🔹 Preparación de la consulta SQL para actualizar la categoría
   -------------------------------------------------------------------------- */
$sentencia = $pdo->prepare("UPDATE tb_categorias
    SET nombre_categoria = :nombre_categoria,
        fyh_actualizacion = :fyh_actualizacion 
    WHERE id_categoria = :id_categoria");

// Asignación de parámetros para prevenir inyección SQL
$sentencia->bindParam('nombre_categoria', $nombre_categoria);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_categoria', $id_categoria);

/* --------------------------------------------------------------------------
   🔹 Ejecución de la consulta y manejo de respuesta
   -------------------------------------------------------------------------- */
if ($sentencia->execute()) {
    // Actualización exitosa
    session_start();
    $_SESSION['mensaje'] = "Se actualizó la categoría correctamente";
    $_SESSION['icono'] = "success";

    // Redirección usando JavaScript
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/categorias";
    </script>
    <?php
} else {
    // Error al actualizar
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudo actualizar la categoría en la base de datos";
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
 * 1. Validar los datos recibidos por GET:
 *    - $id_categoria debe ser un número entero válido
 *    - $nombre_categoria no debe estar vacío ni contener caracteres peligrosos
 * 2. Considerar usar POST en lugar de GET para modificar datos en la base de datos.
 * 3. Usar try-catch para manejar posibles excepciones PDO.
 * 4. Evitar redirecciones con JavaScript si es posible; preferir header('Location: ...').
 * 5. Mantener un historial de cambios si se requiere auditoría de categorías.
 */
