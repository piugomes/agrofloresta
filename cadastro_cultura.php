<?php 
	include "conexao.php";
	include "funcao.php";
?>

<html>

	<head>
	
		<meta charset="utf-8" />
		<title>Agrofloresta - Cultura</title>
		
	</head>
	
	<body>
	
		<?php
		
			menu();
		
			$area = $_POST["area"];
			$tipo = $_POST["tipo"];
			$renda = $_POST["renda"];
			$gasto = $_POST["gasto"];
			$produzida = $_POST["produzida"];
			$esperada = $_POST["esperada"];
			
			$insert = "INSERT INTO cultura (cod_area, tipo, nome, renda, gasto, q_produzida, q_esperada)
			values('$local', '$tipo', '$renda', '$gasto', '$produzida', '$esperada')";
	
			if (mysqli_query($link, $insert)){
			
				echo "<h1>Cadastrado!!</h1>";
				
			}else{
				
				die(mysqli_error($link));
				
			}
			
		?>
		
	</body>
</html>