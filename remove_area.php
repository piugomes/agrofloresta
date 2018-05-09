<html>

	<head>
	
		<meta charset="utf-8" />
		<title>Remover Área</title>
		<link rel="stylesheet" href="estilos.css"/>
		
	</head>
	
	<body class="corpo">
	
		<?php 

			include "conexao.php";
			include "funcao.php";

			$id = $_GET["id"];
			
			$delete = "DELETE FROM localizacao WHERE ID_area = '$id'";
			
			menu();
			lista();
			
			if(mysqli_query($link, $delete)){
				
				echo "<h1>Removido!!</h1>";
				
			}else {
				
				die(mysqli_error($link));
				
			}
			
		?>

	</body>
	
</html>