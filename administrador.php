<?php
session_start(); // Iniciar sesión

// Verificar si el usuario está logueado
if (!isset($_SESSION['username'])) {
    // Si no hay sesión de usuario, redirigir a la página de login
    echo '
      <script>
        alert("No has iniciado sesión");
        window.location = "index.php";
      </script>
    ';
    session_destroy();
    die();
  }
?>


<!DOCTYPE html>
<html>
<head>
  <link href="css/administrador.css" rel="stylesheet">
  <title>Sistema Administrador</title>
</head>
<body>
  <div class="page-container">
    <div class="page-title-box"><h1 class="page-title">Bienvenido al sistema SIGDOS</h1></div>
  </div>
<!-- Este es el contenedor de la seccion principal-->
<div class="main-container">
  <div class="main-box">
    <div class="main-title-box"><h1 class="main-title">Seccion Principal</h1></div>
      <section class="main-item-box">
        <div class="order-box-1">
          <div class="order-item">Orden 1</div>
          <div class="order-item">Orden 2</div>
          <div class="order-item">Orden 3</div>
        </div>

        <hr>

        <div class="order-box-2">
          <div class="order-item">Orden 1</div>
          <div class="order-item">Orden 2</div>
          <div class="order-item">Orden 3</div>
        </div>
      </section>
  </div>
</div>

<!-- Este es el contenedor del menu-->
<div class="menu-container">
  <div class="menu-box">
    <div class="title-box"><h2 class="menu-title">Menu de Navegacion</h2></div>
      <div class="item-box">
        <ul class="item-list">
          <li>
            <a href="#">Usuarios</a>
            <!-- Submenu para Gestionar Usuarios -->
            <ul class="submenu">
              <li><a href="reg_usuario.php">Registrar Usuarios</a></li>
              <li><a href="admin_user.php">Gestionar Usuarios</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Inventario</a>
            <!-- Submenu para Revisar Inventario -->
            <ul class="submenu">
              <li><a href="#">Verificar Inventario</a></li>
              <li><a href="#">Submenu 2</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Gestionar Servicios</a>
            <!-- Submenu para Revisar Inventario -->
            <ul class="submenu">
              <li><a href="#">Solicitar Servicio</a></li>
              <li><a href="#">Estado de Servicio</a></li>
            </ul>
          </li>
          <li><a href="php/salir.php">Salir</a></li> 
        </ul>
      </div>
  </div>
</div>

</body>
</html>