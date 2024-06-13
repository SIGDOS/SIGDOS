<?php
	
	session_start();

	include "conexion1.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['email'];
    $password = $_POST['password'];

	$validar = $mysqli->query("SELECT * FROM user WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."'");// Consulta la base de datos
	
	// Verifica que exista un dato valido en la BD
	if(mysqli_num_rows($validar) > 0){
		$_SESSION['username'] = $username;
		header("Location: ../administrador.php");
		exit;
		// False error muestra el ID del rol
		//echo json_encode(array('error' => false, 'rol' => $data['id_rol'], 'name' => $data['name'], 'username' => $data['username']));
	} else {
		//$error = json_encode(array('error' => true)); // Error true
		echo '
			<script>
				alert("Usuario o contraseña invalidos");
				window.location = "../login.php";
			</script>
		';
		exit;
		}
	}
 ?>