<?php
// include('app/config.php');
session_start();
if (isset($_SESSION['sesion_email'])) {
    $email_sesion = $_SESSION['sesion_email'];
    $sql = "SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.email as email, rol.rol as rol 
                 FROM tb_usuarios as us INNER JOIN tb_roles as rol ON us.id_rol = rol.id_rol";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $id_usuario_session = $usuario['id_usuario'];
        $nombres_session = $usuario['nombres'];
        $rol_session = $usuario['rol'];
    }
} else {
    echo "session nop existe";
    header('location: ' . $url . '/login');
}
?>