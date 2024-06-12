<?php
include("php/conexion1.php");


if (isset($_POST['Actualizar'])) {

    if (!isset($_POST['fNombre']) || !isset($_POST['fCorreo']) || !isset($_POST['tipos'])) {
        ?>
        <h3 class="bad">Obligatorio rellenar los campos</h3>
        <?php
    } else {
        $id = trim($_POST['idusuario']);
        $name = trim($_POST['fNombre']);
        $lastname=trim($_POST['fapellidos']);
        $user=trim($_POST['username']);
        $date=trim($_POST['fecha']);
        $tlf=trim($_POST['tlf']);
        $hospital=trim($_POST['centroh']);
        $post=trim($_POST['cargo']);
        $department=trim($_POST['departmento']);
        $pass = trim($_POST['fContrasena']);
        $email = trim($_POST['fCorreo']);
        $tipo = trim($_POST['tipos']);
 
        $query = mysqli_query($mysqli, "SELECT * FROM user  
         WHERE (username = '$user'
             and id!=$id)
         OR (email ='$email' and id!=$id )");
        $resul = mysqli_fetch_array($query);

        if ($resul > 0) {
            ?>
            <h3 class="bad">Ya existe el usuario</h3>
            <?php
        } else {
            if (empty($_POST['fContrasena'])) {
                $sql_update = mysqli_query($mysqli, "UPDATE `user` SET `name`='$name',`lastname`='$lastname',`username`='$user',`email`='$email',`date`='$date',`tlf`='$tlf',`id_rol`='$tipo',`id_cargo`='$post',`id_departamento`='$department',`id_hospital_loc`='$hospital' WHERE='$id'");
                

            } else {
                $sql_update = mysqli_query($mysqli, "UPDATE `user` SET `name`='$name',`lastname`='$lastname',`username`='$user',`email`='$email',`date`='$date',`tlf`='$tlf',`id_rol`='$tipo',`id_cargo`='$post',`id_departamento`='$department',`password`='$pass',`id_hospital_loc`='$hospital' WHERE='$id'");
               

            }

            if ($sql_update) {
                ?>
                <h3 class="ok">!Se han a actualizado los datos!</h3>
                <?php

            } else {
                ?>
                <h3 class="bad">!Error no se a podido modificar!</h3>
                <?php
            }
        }
    }
} else  if (isset($_POST['Cancelar'])) {
    header('location: admin_user.php');
}
//Mostrar datos
if (empty($_GET['id'])) {
    header('location: admin_user.php');
}
$iduser = $_GET['id'];
$sql = mysqli_query($mysqli, "SELECT u.id, u.name, u.lastname,  u.username, u.email, u.date, 
                                     u.tlf, u.id_cargo, u.id_departamento, u.id_hospital_loc, c.cargo, 
                                    d.nombre_dpt,   (u.id_rol) as id_rol,   (r.rol) as rol FROM   user u 
                                    INNER JOIN roles r ON u.id_rol = r.id 
                                    INNER JOIN cargo c ON u.id_cargo = c.id 
                                    JOIN departamento d ON u.id_departamento = d.id 
                                      WHERE u.id =$iduser");
$resul_sql = mysqli_num_rows($sql);
if ($resul_sql == 0) {
    header('location: admin_user.php');
} else {
    $option = '';
    while ($data = mysqli_fetch_array($sql)) {
        $iduser = $data['id'];
        $name=$data['name'];
        $lastname=$data['lastname'];
        $username = $data['username'];
        $date=$data['date'];
        $tlf=$data['tlf'];
        $cargo=$data['id_cargo'];
        $departament=$data['id_departamento'];
        $departamento=$data['nombre_dpt'];
        $carg=$data['cargo'];
        $localidad=$data['id_hospital_loc'];
        $email2 = $data['email'];
        $rol = $data['id_rol'];
        $roles = $data['rol'];
        if ($departament == 1) {
            $optionc = '<option value="' . $departament . '"select>' . $departamento . '</option>';
        } elseif ($departament == 2) {
            $optiond = '<option value="' . $departament . '"select>' . $departamento . '</option>';
        }
        if ($cargo == 1) {
            $optionc = '<option value="' . $cargo . '"select>' . $carg . '</option>';
        } elseif ($cargo == 2) {
            $optionc = '<option value="' . $cargo . '"select>' . $carg . '</option>';
        }
    }
        if ($rol == 1) {
            $option = '<option value="' . $rol . '"select>' . $roles . '</option>';
        } elseif ($rol == 2) {
            $option = '<option value="' . $rol . '"select>' . $roles . '</option>';
        }
    }

?>
<!doctype html>
<html>

<head>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="CSS/registrar-us.css">
    <link rel="stylesheet" href="CSS/menu.css">
</head>

<body >

<header>
    
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
                    <td><input type="hidden" name="idusuario" value="<?php echo $iduser; ?>"></td>
                </tr>
                <tr>
                        <td>Nombre</td>
                        <td> <input type="text" id="fNombre" name="fNombre" value="<?php echo $name; ?>"> </input> </td>
                    </tr>
                    <tr>
                        <td>Apellidos </td>
                        <td> <input type="text" id="fapellido" name="fapellidos"value="<?php echo $lastname; ?>"> </input> </td>
                    </tr>
                <tr>
                    <td>Nombre de usuario</td>
                    <td> <input type="text" id="fNombre" name="fNombre" value="<?php echo $username; ?>  "> </input> </td>
                </tr>
                <tr>
                        <td>Fecha de nacimiento </td>
                        <td> <input type="date" id="fecha" name="fecha"value="<?php echo $date; ?>"> </input> </td>
                    </tr>
                    <tr>
                        <td>Telefono </td>
                        <td> <input type="text" id="tlf" name="tlf"value="<?php echo $tlf; ?>"> </input> </td>
                    </tr>
                    <tr>
                        <td>Centro Hospitalario </td>
                        <td><input type="text" id="centroh" name="centroh"value="<?php echo $localidad; ?>"> </input> </td>
                    </tr>
                    <tr>
                        <td>Cargo</td>
                       <td> <?php
                            include("php/conexion1.php");
                            $query_cargo = mysqli_query($mysqli, "SELECT * FROM cargo");
                            $result_cargo = mysqli_num_rows($query_cargo);
                            ?>
                            <select name="n_personal" class="notItemOne">
                                <?php
                                echo $optionc;
                                if ($result_cargo > 0) {
 
                                    while ($cargo = mysqli_fetch_array($query_cargo)) {
                                        ?>
                                        <option value="<?php echo  $cargo["id"]; ?> "><?php echo $cargo["cargo"] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select></td>
                <tr>
                    <td>Contrase&ntilde;a</td>
                    <td><input type="password" id="fContrasena" name="fContrasena"> </input> </td>
                </tr>
                <tr>
                    <td>Correo</td>
                    <td><input type="email" id="fCorreo" name="fCorreo" value="<?php echo $email2 ?>"> </input> </td>
                </tr>
                <tr>
                        <td>Departamento</td>
                        <td> <?php
                            $query_dpt = mysqli_query($mysqli, "SELECT * FROM departamento");
                            $result_dpt = mysqli_num_rows($query_dpt);
                            ?>
                            <select name="n_personal" class="notItemOne">
                                <?php
                                echo $optiond;
                                if ($result_dpt > 0) {
 
                                    while ($dpt = mysqli_fetch_array($query_dpt)) {
                                        ?>
                                        <option value="<?php echo  $dpt["id"]; ?> "><?php echo $dpt["nombre_dpt"] ?></option>
                                        <?php
                                    }
                                }?>
                        </td>
                <tr>
                    <td>Rol</td>
                    <td>
                        <?php
                                                if($iduser==1){
                        $query_role = mysqli_query($mysqli, "SELECT `id`, `rol`  FROM roles WHERE id ='admin'");
                        $result_rol = mysqli_num_rows($query_role);

                        ?>
                        <select id="tipos" name="tipos" class="notItemOne">
                            <?php
                            echo $option;
                            if ($result_rol > 0) {

                                while ($rol = mysqli_fetch_array($query_rol)) {
                                    ?>
                                    <option value="<?php echo  $rol["id"]; ?> "><?php echo $rol["rol"] ?></option>
                                    <?php
                                }
                            }
                            }
                            else{
                            $query_rol = mysqli_query($mysqli, "SELECT * FROM roles ");
                            $result_rol = mysqli_num_rows($query_rol);
                            ?>
                            <select id="tipos" name="tipos" class="notItemOne">
                                <?php
                                echo $option;
                                if ($result_rol > 0) {

                                    while ($rol = mysqli_fetch_array($query_rol)) {
                                        ?>
                                        <option value="<?php echo  $rol["id"]; ?> "><?php echo $rol["rol"] ?></option>
                                        <?php
                                    }
                                }
                                }
                                ?>
                            </select>

                    </td>
                </tr>

            </table>
            <BUTTON type="submit" name="Cancelar" value="">Cancelar</BUTTON>
            <BUTTON type="submit" name="Actualizar" value="">actulaizar</BUTTON>
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