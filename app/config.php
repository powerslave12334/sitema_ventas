<?php
/**
 * Archivo: config.php
 * Descripción: Configuración principal del sistema de ventas.
 *              Define constantes de conexión a la base de datos,
 *              crea la instancia de PDO, establece la zona horaria
 *              y define variables globales.
 * Autor: Alan Guzmán
 * Fecha: 2025-09-09
 */

/* --------------------------------------------------------------------------
   🔹 Definición de constantes para la conexión a la base de datos
   -------------------------------------------------------------------------- */
/**
 * Nombre del servidor de base de datos.
 * @var string
 */
define('SERVIDOR', 'localhost');

/**
 * Usuario para acceder a la base de datos.
 * @var string
 */
define('USUARIO', 'root');

/**
 * Contraseña del usuario de la base de datos.
 * @var string
 */
define('PASSWORD', '');

/**
 * Nombre de la base de datos utilizada por el sistema.
 * @var string
 */
define('BD', 'sistemadeventas');

/* --------------------------------------------------------------------------
   🔹 Configuración de PDO para la conexión
   -------------------------------------------------------------------------- */

/**
 * Cadena de conexión para PDO.
 * Formato: mysql:dbname=nombre_base;host=nombre_servidor
 * @var string
 */
$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;

try {
    /**
     * Instancia PDO para la conexión a la base de datos.
     * Se define UTF-8 como charset por defecto.
     * @var PDO
     */
    $pdo = new PDO(
        $servidor,
        USUARIO,
        PASSWORD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );

    // Mensaje opcional para depuración
    // echo "La conexión a la base de datos fue exitosa";

} catch (PDOException $e) {
    // Manejo de error en la conexión
    // print_r($e); // Útil para depuración
    echo "Error al conectar a la base de datos";
}

/* --------------------------------------------------------------------------
   🔹 Variables globales del sistema
   -------------------------------------------------------------------------- */

/**
 * URL base del sistema.
 * Se utiliza para construir enlaces, redirecciones e incluir recursos.
 * IMPORTANTE: cambiar en producción al dominio real.
 * @var string
 */
$URL = "http://localhost/sistemasv2";

/**
 * Configuración de la zona horaria del sistema.
 * Ejemplo: América/Caracas (GMT-4)
 */
date_default_timezone_set("America/Caracas");

/**
 * Variable con la fecha y hora actual del sistema.
 * Formato: YYYY-MM-DD HH:MM:SS
 * @var string
 */
$fechaHora = date('Y-m-d H:i:s');
