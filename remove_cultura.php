<html>

	<head>
	
		<meta charset="utf-8" />
		<title>Remover Cultura</title>
		<link rel="stylesheet" href="estilos.css"/>
		
	</head>
	
	<body class="corpo">
	
		<?php 

			include "conexao.php";
			include "funcao.php";

			$id = $_GET["id"];
			
			$delete = "DELETE FROM cultura WHERE ID_cultura = '$id'";
			
			menu();
			lista();
			
			if(mysqli_query($link, $delete)){
				
				header("Location: listar_cultura.php");
				
			}else {
				
				die(mysqli_error($link));
			
			}
			
		?>

	</body>
	
</html>