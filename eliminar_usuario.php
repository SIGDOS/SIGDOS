<?php
include("php/conexion1.php");

if (isset($_POST['Desabilitar'])) {
    if ($_POST['iduser'] == 1) {
        header('location: admin_user.php');
        exit;
    }
    $idusuario = $_POST['iduser'];
    $usuario=$_POST['usuario'];
    
    $query_delet = mysqli_query($mysqli, "UPDATE user SET estatu=0 WHERE id= $idusuario");
   
    if ($query_delet) {
        header('location: admin_user.php');
    } else {
?>
        <h3 class="bad">!!Error al Eliminar!!</h3>
    <?php
    }
}
if (isset($_POST['Habilitar'])) {
    if ($_POST['iduser'] == 1) {
        header('location: admin_user.php');
        exit;
    }
    $idusuario = $_POST['iduser'];
    $usuario=$_POST['usuario'];
    $query_delet = mysqli_query($mysqli, "UPDATE user SET estatu=1 WHERE id= $idusuario");
        if ($query_delet) {
        header('location: admin_user.php');
    } else {
    ?>
        <h3 class="bad">!!Error al Eliminar!!</h3>
    <?php
    }
}elseif (isset($_POST['Cancelar'])) {
    header('location: admin_user.php');
}
if (empty($_REQUEST['id']) || $_REQUEST['id'] == 1) {
    header('location: admin_user.php');
} else {
    $idusuario = $_REQUEST['id'];
    $query = mysqli_query($mysqli, "SELECT  u.username,  email, r.rol, estatu FROM user u 
                                                INNER JOIN roles r ON u.id_rol=r.id WHERE u.id=$idusuario");
    $result = mysqli_num_rows($query);
}
if ($result > 0) {
    while ($data = mysqli_fetch_array($query)) {
        $username = $data['username'];
        $email = $data['email'];
        $rol = $data['rol'];
        $estatus = $data['estatu'];
    }
} else {
    header('location: admin_user.php');
}
?>
<!doctype html>
<html>

    <head>
        <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="CSS/registrar-us.css">

</head>

<body >

    <header>
        <span>
           <!--es para mostrar un mensaje o el usuario que esta conectado -->
        </span>

   </header>

    <div class="contenedor">
        <aside>
            <ul>
                <li id="ind"><a href="index.php">inicio</a></li>
                <li id="ind"><a href="admin_user.php">Administrar Usuarios</a></li>
            </ul>
        </aside>

        <section class="contenido">
            <div class="data_delete">
                <form method="post" action="">
                    <table>
                        <tr>
                            <td>
                                <h2>¿Esta seguro de eliminar el siguente registro?</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Nombre: <span><?php echo  $username; ?> </span></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Email: <span><?php echo  $email; ?> </span></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p> Tipo de Usuario: <span><?php echo  $rol; ?> </span></p>
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="iduser" value="<?php echo $idusuario ?>"></input>
                    <input type="hidden" name="usuario" value="<?php echo $username ?>"></input>
                    <BUTTON type="submit" name="Cancelar" value="">Cancelar</BUTTON>
                    <?php



                    if ($estatus == 1) { ?>
                        <BUTTON type="submit" name="Desabilitar" value="">Eliminar</BUTTON>
                    <?php } else { ?>
                        <BUTTON type="submit" name="Habilitar" value="">Habilitar</BUTTON>
                    <?php } ?>
                    

                </form>
            </div>


        </section>
        </form>
    </div>



    <footer>
        <section>
            <a href="#titulo">Ir al inicio </a>
            <a href="mailto:Enzoeliud1010@gmail.com "> Contactame Aqui</a>
        </section>
        <p>Copyright 2023</p>
    </footer>
</body>

</html>