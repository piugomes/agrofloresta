<?php 

	include "conexao.php";
	include "funcao.php";
	
?>

<html>

	<head>
	
		<meta charset="utf-8" />
		<title>Agrofloresta - Cultura</title>
		<link rel="stylesheet" href="estilos.css"/>
		
	</head>
	
	<body class="corpo">
	
		<?php
		
			menu();
			lista();
		
			$area = $_POST["area"];
			$nome = $_POST["nome"];
			$tipo = $_POST["tipo"];
			$renda = $_POST["renda"];
			$gasto = $_POST["gasto"];
			$produzida = $_POST["produzida"];
			$esperada = $_POST["esperada"];
			$id = $_POST["id"];
			
			$insert = "UPDATE cultura SET cod_area = '$area', tipo = '$tipo', nome_cul = '$nome',
			renda = '$renda', gasto = '$gasto', q_produzida = '$produzida', q_esperada = '$esperada'
			WHERE ID_cultura = '$id'";
	
			if (mysqli_query($link, $insert)){
			
				echo "<h1>Alterado!!</h1>";
				
			}else{
				
				die(mysqli_error($link));
				
			}
			
		?>
		
	</body>
</html>