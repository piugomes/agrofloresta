<?php 
	include "conexao.php";
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Entrada de Dados da Àrea</title>
	</head>
	
	<body>
		<form action="cadastro_localizacao.php" method="post">
			<fieldset>
				<legend>Entrada de Dados</legend>
				
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
			</fieldset>
		</form>
	</body>
</html>