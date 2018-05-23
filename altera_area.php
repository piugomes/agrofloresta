<?php

	include "conexao.php";
	include "funcao.php";
	
?>

<html>

	<head>
	
		<meta charset="utf-8" />
		<title>Alterar Área</title>
		<link rel="stylesheet" href="estilos.css"/>
		
	</head>
	
	<body class="corpo">
	
		<?php
		
			menu();
			lista();
			
			$localizacao = $_POST["localizacao"];
			$nomeArea = $_POST["nomeArea"];
			$unidade = $_POST["unidade"];
			$tamanho = $_POST["tamanho"];
			$id = $_POST["id"];
			
			$update = "UPDATE area SET nome = '$nomeArea', cod_localizacao = '$localizacao', uni_medida = '$unidade', tamanho = '$tamanho'
			where ID_area = '$id'";
			
	
			if (mysqli_query($link, $update)){
			
				echo "<h1 class='h1'>Alterado!!</h1>";
			}else{
				die(mysqli_error($link));
			}
		?>
	</body>
</html>