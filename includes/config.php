<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'roalca');

// Configuración del sitio
define('SITE_NAME', 'RoalcaDesign');
define('SITE_DESC', 'Diseño de interiores y decoración de lujo');
define('SITE_URL', 'http://localhost/roalcaDecor');

// Configuración de correo
define('CONTACT_EMAIL', 'adrianroalca06@gmail.com');

// Configuración de rutas
define('ROOT_PATH', dirname(__DIR__));
define('IMAGES_PATH', ROOT_PATH . '/imágenes');

// Configuración de errores
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', ROOT_PATH . '/logs/error.log');

// Zona horaria
date_default_timezone_set('Europe/Madrid');

// Configuración de sesión
session_start();

// Funciones de utilidad
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

function formatPrice($price) {
    return number_format($price, 2, ',', '.') . ' €';
}

function getImageUrl($filename) {
    return SITE_URL . '/imágenes/' . $filename;
}

// Manejo de errores personalizado
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    $error = date('Y-m-d H:i:s') . ": [$errno] $errstr in $errfile on line $errline\n";
    error_log($error, 3, ROOT_PATH . '/logs/error.log');
    
    if (defined('DEVELOPMENT_MODE') && DEVELOPMENT_MODE) {
        echo "Error: $errstr";
    } else {
        echo "Ha ocurrido un error. Por favor, inténtelo más tarde.";
    }
}

set_error_handler('customErrorHandler');