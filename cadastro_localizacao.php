<?php 
	include "conexao.php";
	include "funcao.php";
?>

<html>

	<head>
	
		<meta charset="utf-8" />
		<title>Agrofloresta - Localização</title>
		<link rel="stylesheet" href="estilos.css"/>
	</head>
	
	<body class="corpo">
		<?php
		
			menu();
			lista();
			
			$nomePais = $_POST["nomePais"];
			$estado = $_POST["estado"];
			$municipio = $_POST["municipio"];
			
			$insert = "insert into localizacao (pais, estado, municipio) values('$nomePais', '$estado', '$municipio')";
	
			if (mysqli_query($link, $insert)){
			
				echo "<h1 class='h1'>Cadastrado!!</h1>";
			}else{
				die(mysqli_error($link));
			}
		?>
	</body>
</html>