<?php
    
    session_start();

    if(isset($_SESSION['username'])){
      header("Location: administrador.php");
      exit;
    }

    session_destroy();

?>


<!doctype html>
<html lang="en">
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico">
  <title>Index</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="CSS/login.css" rel="stylesheet">
</head>
<body>
  <div class="login-box">
    <h2>Iniciar Sesion</h2>
    <form action="php/autenticacion.php" method="POST">
      
      <div class="user-box">
        <input type="text" name="email" required>
        <label>Correo Electrónico</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" value="" required>
       <label>Contraseña</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form-checkbox" checked />
        <label class="form-check-label" for="form-checkbox" style="color: #fff;">Recuerdame</label>

        <a href="#!" style="color: #fff; float:right; text-decoration: none;">Contraseña Olvidada?</a>
      </div>
        <div class="user-box">
        </div>
      <button type="submit">Iniciar</button>
    </form>
  </div>
    </body>
</html>