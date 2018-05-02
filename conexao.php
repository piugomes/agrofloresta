<?php 
	$senha = "usbw";	//paramentro que contem o usuario de SGBD que tem acesso a um determinado BD
	$usuario = "root";
	$bd = "lojaexercicio";	//contem o nome do BD
	$servidor = "localhost";	//parametro que contem o caminho do servidor
	
	$link = mysqli_connect($servidor, $usuario, $senha, $bd);
?>