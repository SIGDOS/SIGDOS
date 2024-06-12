<?php
include("php/conexion1.php");
if (isset($_POST['Guardar'])) {
    if (strlen($_POST['username']) >= 1 && strlen($_POST['fContrasena']) >= 1 && strlen($_POST['fCorreo']) >= 1) {
        $name = trim($_POST['fNombre']);
        $lastname = trim($_POST['fapellidos']);
        $user = trim($_POST['username']);
        $date = trim($_POST['fecha']);
        $tlf = trim($_POST['tlf']);
        $hospital = trim($_POST['centroh']);
        $post = trim($_POST['cargo']);
        $department = trim($_POST['departmento']);
        $pass = trim($_POST['fContrasena']);
        $email = trim($_POST['fCorreo']);
        $tipo = trim($_POST['tipos']);

        // Verificar si el usuario ya existe
        $query = "SELECT * FROM user WHERE username =? OR email =?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ss", $user, $email);
        $stmt->execute();
        $resul = $stmt->get_result();
        if ($resul->num_rows > 0) {?>
            <h3 class="bad">!Ya Existe Este usuario!</h3>
        <?php
        } else {
            // Hash de contraseña
            $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

            // Insertar datos
            $query = "INSERT INTO `user`(`name`, `lastname`, `username`, `email`, `password`, `date`, `tlf`, `id_rol`, `id_cargo`, `id_departamento`, `id_hospital_loc`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("sssssssssss", $name, $lastname, $user, $email, $pass_hash, $date, $tlf, $tipo, $post, $department, $hospital);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
               ?>
                <h3 class="ok">!Realizado con Exito!</h3>
            <?php
            } else {
               ?>
                <h3 class="bad">!Ups a ocurrido un error!</h3>
            <?php
            }
        }
    } else {
       ?>
        <h3 class="bad">!Por favor completar los campos!</h3>
    <?php
    }
} elseif (isset($_POST['Cancelar'])) {
    header('location: admin_user.php');
    exit;
}
?>