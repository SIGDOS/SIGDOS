<?php
require_once 'php/conexion1.php';

// Función para hashear contraseña
function hash_password($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Función para verificar contraseña
function verify_password($password, $hashed_password) {
    return password_verify($password, $hashed_password);
}

// Procesar formulario
if (isset($_POST['Actualizar'])) {
    // Verificar campos obligatorios
    if (!isset($_POST['fNombre']) ||!isset($_POST['fCorreo']) ||!isset($_POST['tipos'])) {
        echo "<h3 class='bad'>Obligatorio rellenar los campos</h3>";
    } else {
        // Obtener datos del formulario
        $id = trim($_POST['idusuario']);
        $name = trim($_POST['fNombre']);
        $lastname = trim($_POST['fapellidos']);
        $user = trim($_POST['username']);
        $date = trim($_POST['fecha']);
        $tlf = trim($_POST['tlf']);
        $hospital = trim($_POST['centroh']);
        $post = trim($_POST['cargo']);
        $department = trim($_POST['departamento']);
        $pass = trim($_POST['fContrasena']);
        $email = trim($_POST['fCorreo']);
        $tipo = trim($_POST['tipos']);

        // Verificar si existe el usuario
        $stmt = $mysqli->prepare("SELECT * FROM user WHERE (username =? and id!=?) OR (email =? and id!=?)");
        $stmt->bind_param("sssi", $user, $id, $email, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<h3 class='bad'>Ya existe el usuario</h3>";
        } else {
            // Actualizar usuario
            if (empty($_POST['fContrasena'])) {
                $stmt = $mysqli->prepare("UPDATE user SET name =?, lastname =?, username =?, email =?, date =?, tlf =?, id_rol =?, id_cargo =?, id_departamento =?, id_hospital_loc =? WHERE id =?");
                $stmt->bind_param("ssssssssssi", $name, $lastname, $user, $email, $date, $tlf, $tipo, $post, $department, $hospital, $id);
            } else {
                $hashed_password = hash_password($pass);
                $stmt = $mysqli->prepare("UPDATE user SET name =?, lastname =?, username =?, email =?, date =?, tlf =?, id_rol =?, id_cargo =?, id_departamento =?, id_hospital_loc =?, password =? WHERE id =?");
                $stmt->bind_param("sssssssssssi", $name, $lastname, $user, $email, $date, $tlf, $tipo, $post, $department, $hospital, $hashed_password, $id);            }
            $stmt->execute();

            if ($stmt) {
                ?>
                <h3 class="ok">!Se han a actualizado los datos!</h3>
                <?php

            } else {
                echo "<h3 class='bad'>!Error no se ha podido modificar!</h3>";
            }
        }
    }
}else  if (isset($_POST['Cancelar'])) {
    header('location: admin_user.php');
}
//Mostrar datos
if (empty($_GET['id'])) {
    header('location: admin_user.php');
}
$iduser = $_GET['id'];
$stmt = $mysqli->prepare("SELECT u.id, u.name, u.lastname, u.username, u.email, u.date, u.tlf, u.id_cargo, u.id_departamento, u.id_hospital_loc,c.cargo, d.nombre_dpt, (u.id_rol) as id_rol, (r.rol) as rol FROM user u INNER JOIN roles r ON u.id_rol = r.id INNER JOIN cargo c ON u.id_cargo = c.id JOIN departamento d ON u.id_departamento = d.id WHERE u.id =$iduser");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header('location: admin_user.php');
} else {
    $option = '';
    while ($data = $result->fetch_assoc()) {
        $iduser = $data['id'];
        $name = $data['name'];
        $lastname = $data['lastname'];
        $username = $data['username'];
        $date = $data['date'];
        $tlf = $data['tlf'];
        $cargo = $data['id_cargo'];
        $departament = $data['id_departamento'];
        $departamento = $data['nombre_dpt'];
        $carg = $data['cargo'];
        $localidad = $data['id_hospital_loc'];
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

<body>
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
                        <th><label for="">Información del usuario</label></th>
                    </tr>
                    <tr>
                        <td><label for="fNombre">Nombre:</label></td>
                        <td><input type="text" id="fNombre" name="fNombre" value="<?php echo $name; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="fapellido">Apellidos:</label></td>
                        <td><input type="text" id="fapellido" name="fapellidos" value="<?php echo $lastname; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="fNombre">Nombre de usuario:</label></td>
                        <td><input type="text" id="username" name="username" value="<?php echo $username; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="fecha">Fecha de nacimiento:</label></td>
                        <td><input type="date" id="fecha" name="fecha" value="<?php echo $date; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="tlf">Teléfono:</label></td>
                        <td><input type="text" id="tlf" name="tlf" value="<?php echo $tlf; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="centroh">Centro Hospitalario:</label></td>
                        <td><input type="text" id="centroh" name="centroh" value="<?php echo $localidad; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="cargo">Cargo:</label></td>
                        <td>
                            <?php
                            include("php/conexion1.php");
                            $query_cargo = mysqli_query($mysqli, "SELECT * FROM cargo");
                            $result_cargo = mysqli_num_rows($query_cargo);
                            ?>
                            <select name="cargo" id="cargo" class="notItemOne">
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
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="fContrasena">Contraseña:</label></td>
                        <td><input type="password" id="fContrasena" name="fContrasena"></td>
                    </tr>
                    <tr>
                        <td><labelfor="fCorreo">Correo:</label></td>
                        <td><input type="email" id="fCorreo" name="fCorreo" value="<?php echo $email2?>"></td>
                    </tr>
                    <tr>
                        <td><label for="departamento">Departamento:</label></td>
                        <td>
                            <?php
                            $query_dpt = mysqli_query($mysqli, "SELECT * FROM departamento");
                            $result_dpt = mysqli_num_rows($query_dpt);
                           ?>
                            <select name="departamento" id="departamento" class="notItemOne">
                                <?php
                                echo $optiond;
                                if ($result_dpt > 0) {
                                    while ($dpt = mysqli_fetch_array($query_dpt)) {
                                       ?>
                                        <option value="<?php echo  $dpt["id"];?> "><?php echo $dpt["nombre_dpt"]?></option>
                                        <?php
                                    }
                                }
                               ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="rol">Rol:</label></td>
                        <td>
                            <?php
                            if ($iduser == 1) {
                                $query_role = mysqli_query($mysqli, "SELECT `id`, `rol`  FROM roles WHERE id ='admin'");
                                $result_rol = mysqli_num_rows($query_role);
                            } else {
                                $query_rol = mysqli_query($mysqli, "SELECT * FROM roles ");
                                $result_rol = mysqli_num_rows($query_rol);
                            }
                           ?>
                            <select id="tipos" name="tipos" class="notItemOne">
                                <?php
                                echo $option;
                                if ($result_rol > 0) {
                                    while ($rol = mysqli_fetch_array($query_rol)) {
                                       ?>
                                        <option value="<?php echo  $rol["id"];?> "><?php echo $rol["rol"]?></option>
                                        <?php
                                    }
                                }
                               ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <BUTTON type="submit" name="Cancelar" value="">Cancelar</BUTTON>
                <BUTTON type="submit" name="Actualizar" value="">actulaizar</BUTTON>
            </form>
        </section>
    </div>

    <footer>
        <section>
            <a href="mailto:sigdos2024@gmail.com ">Contactame Aqui</a>
        </section>
        <p>Copyright 2023</p>
    </footer>
</body>

</html>