<?php
/**
 * Archivo: login.php
 * Descripción: Autentica al usuario en el sistema.
 *              - Recibe email y contraseña vía POST
 *              - Verifica que el email exista en la base de datos
 *              - Compara la contraseña usando password_verify
 *              - Inicia sesión y redirige al dashboard si es correcto
 *              - Redirige a login con mensaje de error si es incorrecto
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal (URL base y PDO)

/* --------------------------------------------------------------------------
   🔹 Captura de datos del formulario
   -------------------------------------------------------------------------- */
$email = $_POST['email'];               // Email ingresado por el usuario
$password_user = $_POST['password_user']; // Contraseña ingresada por el usuario

/* --------------------------------------------------------------------------
   🔹 Verificación del usuario en la base de datos
   -------------------------------------------------------------------------- */
// Inicializa contador de registros encontrados
$contador = 0;

// Consulta para obtener usuario por email
$sql = "SELECT * FROM tb_usuarios WHERE email = :email";
$query = $pdo->prepare($sql);
$query->bindParam(':email', $email);
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

// Recorre los resultados y obtiene datos necesarios
foreach ($usuarios as $usuario) {
    $contador++;
    $email_tabla = $usuario['email'];
    $nombres = $usuario['nombres'];
    $password_user_tabla = $usuario['password_user'];
}

/* --------------------------------------------------------------------------
   🔹 Validación de credenciales
   -------------------------------------------------------------------------- */
if (($contador > 0) && password_verify($password_user, $password_user_tabla)) {
    // Datos correctos: inicia sesión
    session_start();
    $_SESSION['sesion_email'] = $email;

    // Redirige al panel principal
    header('Location: ' . $URL . '/index.php');
    exit();
} else {
    // Datos incorrectos: inicia sesión para mostrar mensaje de error
    session_start();
    $_SESSION['mensaje'] = "Error: datos incorrectos";

    // Redirige al login
    header('Location: ' . $URL . '/login');
    exit();
}

/* --------------------------------------------------------------------------
   🔹 Notas de buenas prácticas y seguridad
   -------------------------------------------------------------------------- */
/**
 * 1. Usar consultas preparadas con bindParam (ya aplicado en este código)
 *    para prevenir inyección SQL.
 * 2. No mostrar mensajes de error detallados que revelen si el email existe.
 * 3. Usar password_hash y password_verify para manejo seguro de contraseñas.
 * 4. Usar exit() después de header() para asegurar la redirección.
 * 5. Considerar limitar intentos de login para evitar ataques de fuerza bruta.
 */
