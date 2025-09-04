<?php
include('../../config.php');

$Nombre = $_GET['Nombre'];
$Celular = $_GET['Celular'];
$Telefono = $_GET['Telefono'];
$Empresa = $_GET['Empresa'];
$Correo = $_GET['Correo'];
$Direccion = $_GET['Direccion'];

$sentencia = $pdo->prepare("INSERT INTO tb_proveedores
       (nombre_proveedor,celular,telefono,empresa,email,direccion,fyh_creacion) 
VALUES (:Nombre,:Celular,:Telefono,:Empresa,:Correo,:Direccion, :fyh_creacion)");

$sentencia->bindParam('Nombre', $Nombre);
$sentencia->bindParam('Celular', $Celular);
$sentencia->bindParam('Telefono', $Telefono);
$sentencia->bindParam('Empresa', $Empresa);
$sentencia->bindParam('Correo', $Correo);
$sentencia->bindParam('Direccion', $Direccion);
$sentencia->bindParam('fyh_creacion', $fechaHora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Categoria se registro de la manera correcta";
    $_SESSION['icono'] = "success";
    // header('Location:' . $url . '/proveedores');
    ?>

    <script>
        location.href = "<?php echo $url; ?>/proveedores";
    </script>

    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error al registrar la categoriia";
    $_SESSION['icono'] = "error";
    // header('Location: ' . $url . '/proveedores');
    ?>

    <script>
        location.href = "<?php echo $url; ?>/proveedores";
    </script>
    
    <?php
}
?>