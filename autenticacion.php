<?php
    session_start();
    sleep(2);

    // Variables para la BD
    $servidor = "localhost";
	$usuario = "root";
	$contraseña = "";
	$bd = "sigdos";
	
	$conexion = mysqli_connect($servidor, $usuario, $contraseña, $bd); // Variable de Conexion para la BD

	if (!$conexion){
		die("Error al conectar con la base de datos: " . mysqli_connect_error());
	}

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['email'];
    $password = $_POST['password'];

	$users = $conexion->query("SELECT name, email, id_rol FROM user WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."'");// Consulta la base de datos
	
	// Verifica que exista un dato valido en la BD
	if($users->num_rows == 1){
		$data = $users->fetch_assoc();
		$_SESSION['email']['id_rol'] = $data;
		// False error muestra el ID del rol
		echo json_encode(array('error' => false, 'rol' => $data['id_rol'], 'usuario' => $data['name']));
	} else {
		$error = json_encode(array('error' => true)); // Error true
		echo "Usuario y contraseña invalidos";
		}
	}

	$conexion->close();
 ?>