<?php
/**
 * Archivo: sesion.php
 * Descripción: Control de sesión de usuario.
 *              Verifica si existe una sesión activa y obtiene los datos
 *              del usuario y su rol desde la base de datos.
 * Autor: Alan Guzmán
 * Fecha: 2025-09-09
 */

session_start(); // Inicia o reanuda la sesión actual

if (isset($_SESSION['sesion_email'])) {
    // ✅ Existe una sesión activa
    $email_sesion = $_SESSION['sesion_email'];

    /**
     * Consulta SQL para obtener la información del usuario logueado:
     * - ID de usuario
     * - Nombre completo
     * - Email
     * - Rol asignado
     */
    $sql = "SELECT 
                us.id_usuario AS id_usuario, 
                us.nombres AS nombres, 
                us.email AS email, 
                rol.rol AS rol 
            FROM tb_usuarios AS us
            INNER JOIN tb_roles AS rol 
                ON us.id_rol = rol.id_rol 
            WHERE us.email = :email";

    // Prepara la consulta evitando inyección SQL
    $query = $pdo->prepare($sql);
    $query->bindParam(':email', $email_sesion, PDO::PARAM_STR);
    $query->execute();

    // Obtiene los resultados como array asociativo
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

    // Asigna los valores del usuario logueado a variables de sesión
    foreach ($usuarios as $usuario) {
        $id_usuario_sesion = $usuario['id_usuario'];
        $nombres_sesion = $usuario['nombres'];
        $rol_sesion = $usuario['rol'];
    }

} else {
    // ❌ No existe sesión activa → redirigir al login
    // echo "No existe sesión"; // Solo para debug
    header('Location: ' . $URL . '/login');
    exit(); // Importante para detener la ejecución después de redirigir
}
