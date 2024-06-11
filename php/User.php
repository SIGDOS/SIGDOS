<?php
include("php/conexion1.php");
if (isset($_POST['Guardar'])) {
    if (strlen($_POST['username']) >= 1 && strlen($_POST['fContrasena']) >= 1
    && strlen($_POST['fCorreo']) >= 1) {
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
 
        $query = mysqli_query($mysqli, "SELECT * FROM user  WHERE username = '$user' OR email='$email'");
        $resul = mysqli_fetch_array($query);
        if ($resul > 0) { ?>
            <h3 class="bad">!Ya Existe Este usuario!</h3>

        <?php
        }
        $consulta = "INSERT INTO `user`(`name`, `lastname`, `username`, `email`, `password`, `date`, `tlf`, `id_rol`, `id_cargo`, `departamento`, `id_hospital_loc`) VALUES ('$name','$lastname','$user','$email','$pass','$date','$tlf','$tipo','$post','$department','$hospital')";
        $resultado = mysqli_query($mysqli, $consulta);
        
        if ($resultado) {
        ?>
            <h3 class="ok">!Realizado con Exito!</h3>
        <?php
        } else {
        ?>
            <h3 class="bad">!Ups a ocurrido un error!</h3>

        <?php
        }
    } else {
        ?>
        <h3 class="bad">!Por favor completar los campos!</h3>

<?php }
} elseif (isset($_POST['Cancelar'])) {
    header('location: admin_user.php');
}
?>