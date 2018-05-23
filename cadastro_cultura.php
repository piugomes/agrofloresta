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
			
			$insert = "INSERT INTO cultura (cod_area, tipo, nome_cul, renda, gasto, q_produzida, q_esperada)
			values('$area', '$tipo', '$nome', '$renda', '$gasto', '$produzida', '$esperada')";
	
			if (mysqli_query($link, $insert)){
			
				echo "<h1 class='h1'>Cadastrado!!</h1>";
				
			}else{
				
				die(mysqli_error($link));
				
			}
			
		?>
		
	</body>
</html>