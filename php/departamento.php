<?php
include("conexion1.php");
?>
<!doctype html>
<html>

    <head>
        <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico">
	<meta charset="utf-8">
	<title>Documento sin título</title>
</head>
<from>
	<select id="departmento" name="departmento">
		<option value="0">Seleccione:</option>
		<?php
		$query = $mysqli->query("SELECT * FROM departamento");
		while ($valores = mysqli_fetch_array($query)) {
			echo '<option value="' . $valores['id'] . '">' . $valores['nombre_dpt'] . '</option>';
		}
		?>
	</select>
</from>

<body>
</body>

</html>