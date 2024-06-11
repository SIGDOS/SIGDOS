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
	<select id="tipos" name="tipos">
		<option value="0">Seleccione:</option>
		<?php
		$query = $mysqli->query("SELECT * FROM roles");
		while ($valores = mysqli_fetch_array($query)) {
			echo '<option value="' . $valores['id'] . '">' . $valores['rol'] . '</option>';
		}
		?>
	</select>
</from>

<body>
</body>

</html>