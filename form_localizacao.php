<?php 
	include "conexao.php";
	include "funcao.php";
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Entrada de Dados da Localização</title>
	</head>
	
	<body>
	
		<?php
		
			menu();
			lista();
			
		?>
		
		<fieldset>
			<legend>Entrada de Dados</legend>
			
			<form action="cadastro_localizacao.php" method="post">				
				
				<label>Nome do País: </label>
				<input type="text" name="nomePais"/>
				<br />
				<br />
				
				<label>Nome do Estado: </label>
				<input type="text" name="estado"/>
				<br />
				<br />
				
				<label>Nome do Municipio: </label>
				<input type="text" name="municipio"/>
				<br />
				<br />
				
				
				
				<input type="submit" value="Enviar"/>
			</form>
		</fieldset>
	</body>
</html>