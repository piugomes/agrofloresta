<?php 
	include "conexao.php";
?>
<html>
	<head>
		<title>Exercicio de Teste- Gravar</title>
	</head>
	<body>
		<?php
			
			$nomePais = $_POST["nomePais"];
			$estado = $_POST["estado"];
			$municipio = $_POST["municipio"];
			
			$insert = "insert into localizacao (pais, estado, municipio) values('$nomePais', '$estado', '$municipio')";
	
			if (mysqli_query($link, $insert)){	//insere os dados acima no BD loja2
			
				echo "<h1>Cadastrado!!</h1>";
			}else{
				die(mysqli_error($link));
			}
		?>
	</body>
</html>