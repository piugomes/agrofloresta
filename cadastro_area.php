<?php 
	include "conexao.php";
	include "funcao.php";
?>

<html>

	<head>
	
		<meta charset="utf-8" />
		<title>Agrofloresta - Área</title>
		
	</head>
	
	<body>
		<?php
		
			menu();
			lista();
			
			$localizacao = $_POST["localizacao"];
			$nomeArea = $_POST["nomeArea"];
			$unidade = $_POST["unidade"];
			$tamanho = $_POST["tamanho"];
			
			$insert = "insert into area (cod_localizacao, nome, uni_medida, tamanho) values('$localizacao', '$nomeArea', 
			'$unidade', '$tamanho')";
	
			if (mysqli_query($link, $insert)){
			
				echo "<h1>Cadastrado!!</h1>";
			}else{
				die(mysqli_error($link));
			}
		?>
	</body>
</html>