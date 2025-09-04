<?php
include('../../config.php');

$nombre_categoria = $_GET['nombre_categoria'];

$sentencia = $pdo->prepare("INSERT INTO tb_categoria
       (nombre_categoria,fyh_creacion) 
VALUES (:nombre_categoria, :fyh_creacion)");

$sentencia->bindParam('nombre_categoria', $nombre_categoria);
$sentencia->bindParam('fyh_creacion', $fechaHora);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Categoria se registro de la manera correcta";
    $_SESSION['icono'] = "success";
    // header('Location:' . $url . '/categorias');
    ?>

    <script>
        location.href = "<?php echo $url; ?>/categorias";
    </script>

    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error al registrar la categoriia";
    $_SESSION['icono'] = "error";
    // header('Location: ' . $url . '/categorias');
}






?>