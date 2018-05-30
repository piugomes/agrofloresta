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
			
			
			$delete = "DELETE FROM area WHERE ID_area = '$id'";
			
			echo $delete;
			menu();
			lista();
			
			if(mysqli_query($link, $delete)){
				
				header("Location: listar_area.php");
				
			}else {
				
				die(mysqli_error($link));
				
			}
			
		?>

	</body>
	
</html>