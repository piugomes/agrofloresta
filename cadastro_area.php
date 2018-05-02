<?php 
	include "conexao.php";
?>
<html>
	<head>
		<title>Agrofloresta- Gravar</title>
	</head>
	<body>
		<?php
			
			$localizacao = $_POST["localizacao"];
			$nomeArea = $_POST["nomeArea"];
			$unidade = $_POST["unidade"];
			$tamanho = $_POST["tamanho"];
			
			$insert = "insert into area (cod_localizacao, nome, uni_medida, tamanho) values('$localizacao', '$nomeArea', 
			'$unidade', '$tamanho')";
	
			if (mysqli_query($link, $insert)){	//insere os dados acima no BD loja2
			
				echo "<h1>Cadastrado!!</h1>";
			}else{
				die(mysqli_error($link));
			}
		?>
	</body>
</html>