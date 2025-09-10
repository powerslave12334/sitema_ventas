<?php
/**
 * Archivo: logout.php
 * Descripción: Cierra la sesión del usuario en el sistema.
 *              - Verifica si el usuario tiene sesión activa
 *              - Destruye la sesión
 *              - Redirige a la página de inicio (login)
 * Autor: Alan Guzmán
 * Fecha: 2025-09-10
 */

include('../../config.php'); // Importa configuración principal (URL base, etc.)

/* --------------------------------------------------------------------------
   🔹 Inicio de sesión y verificación
   -------------------------------------------------------------------------- */
session_start(); // Inicia la sesión para poder manipular variables de sesión

if (isset($_SESSION['sesion_email'])) {
    // Destruye la sesión activa
    session_destroy();

    // Redirige a la página principal o login
    header('Location: ' . $URL . '/');
    exit(); // Termina la ejecución del script para asegurar la redirección
}

/* --------------------------------------------------------------------------
   🔹 Notas de buenas prácticas
   -------------------------------------------------------------------------- */
/**
 * 1. Siempre usar session_start() antes de manipular sesiones.
 * 2. session_destroy() elimina todos los datos de la sesión actual.
 * 3. Después de header('Location: ...') se recomienda usar exit() para detener
 *    la ejecución del script.
 * 4. Para seguridad adicional, se puede limpiar las cookies de sesión.
 */
