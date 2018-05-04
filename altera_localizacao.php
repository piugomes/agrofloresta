<?php 
	include "funcao.php";
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Alterar Localização</title>
	</head>
	<body>
		<?php 
			menu();
			lista();
			
			include "conexao.php";
			
			$nomePais = $_POST["nomePais"];
			$estado = $_POST["estado"];
			$municipio = $_POST["municipio"];
			$ID_localizacao = $_POST["ID_localizacao"];
			
			$update = "update localizacao set pais = '$nomePais', estado = '$estado', municipio = '$municipio' where ID_localizacao = '$ID_localizacao'";
			
	
			if (mysqli_query($link, $update)){
			
				echo "<h1>Alterado!!</h1>";
				
			}else{
				die(mysqli_error($link));
			}
		?>
	</body>
</html>