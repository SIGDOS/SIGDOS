
<!doctype html>
<html>

    <head>
        <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico">
    <title>Usuario</title>
    <link rel="stylesheet" href="CSS/registrar-us.css">
    <link rel="stylesheet" href="CSS/menu.css">
</head>

<body >

    <header>
   <!-- <span>
            <h1><?php echo $_SESSION['name']; ?></h1>
        </span>-->

    </header>

    <div class="contenedor">
        <aside>
            <ul>
                <li id="ind"><a href="index.php">inicio</a></li>
                <li id="ind"><a href="admin_user.php">Administrar Usuarios</a></li>

            </ul>
        </aside>
        <section class="contenido">
            <form method="post">
                <table>
                    <tr>
                        <td>Nombre</td>
                        <td> <input type="text" id="fNombre" name="fNombre"> </input> </td>
                    </tr>
                    <tr>
                        <td>Apellidos </td>
                        <td> <input type="text" id="fapellido" name="fapellidos"> </input> </td>
                    </tr>
                    <tr>
                        <td>Nombre de usuario</td>
                        <td> <input type="text" id="username" name="username"> </input> </td>
                    </tr>
                    <tr>
                        <td>Fecha de nacimiento </td>
                        <td> <input type="date" id="fecha" name="fecha"> </input> </td>
                    </tr>
                    <tr>
                        <td>Telefono </td>
                        <td> <input type="text" id="tlf" name="tlf"> </input> </td>
                    </tr>
                    <tr>
                        <td>Centro Hospitalario </td>
                        <td><input type="text" id="centroh" name="centroh"> </input> </td>
                    </tr>
                    <tr>
                        <td>Cargo</td>
                       <td> <?php
                            include("php/cargo.php");
                            ?></td></tr>
                 
                    <tr>
                        <td>Correo</td>
                        <td><input type="email" id="fCorreo" name="fCorreo"> </input> </td>
                    </tr>
                    
                    <tr>
                        <td>Contrase&ntilde;a</td>
                        <td><input type="password" id="fContrasena" name="fContrasena"> </input> </td>
                    </tr>
                    <tr>
                        <td>Departamento</td>
                        <td>
                            <?php
                            include("php/departamento.php");
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Rol</td>
                        <td>
                            <?php
                            include("php/tipo_user.php");
                            ?>
                        </td>
                    </tr>

                </table>
                <button type="submit" name="Cancelar">Cancelar</button>
                <button type="submit" name="Guardar">Guardar</button>
        </section>
        </form>
    </div>
    <?php
    include("php/User.php");
    ?>


    <footer>
        <section>
            <a href="#titulo">Ir al inicio </a>
            <a href="mailto:sigdos2024@gmail.com "> Contactame Aqui</a>
        </section>
        <p>Copyright 2023</p>
    </footer>
</body>

</html>