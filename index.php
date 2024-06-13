<?php
	$p="usuario";
	if(!empty($_GET['p'])){
		$p=$_GET['p'];
	}
	if(is_file("Controlador/".$p.".php")){
		require_once("Controlador/".$p.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}
?>