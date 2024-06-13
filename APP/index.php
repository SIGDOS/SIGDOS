<?php
require_once __DIR__. '/Controllers/AuthController.php';
// Incluimos el autoload para cargar las clases
require_once 'vendor/autoload.php';

// Iniciamos la sesión
session_start();

// Comprobamos si el usuario está autenticado
if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
    // Redirige a index
    header("Location: index.php");
    exit();
}

// Llama al controlador del login

$authController = new App\Controllers\AuthController();
$authController->login();

?>