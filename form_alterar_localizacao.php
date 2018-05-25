<?php 
	include "conexao.php";
	include "funcao.php";
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Alterar Localização</title>
		<link rel="stylesheet" href="estilos.css"/>
	</head>
	<body class="corpo">
		<?php 
			menu();
			lista();
			
			include "conexao.php";
			
			$get = $_GET["ID_localizacao"];
			
			$sql = "select * from localizacao where ID_localizacao = $get";
			
			$resultado = mysqli_query($link, $sql) or die (mysqli_error($link));
			
			$linha= mysqli_fetch_array($resultado);
			
			$cod_localizacao = $linha["ID_localizacao"];
		?>
		<fieldset>
			<legend>Entrada de Dados</legend>
			
			<form action="altera_localizacao.php" method="post">				
				
				<label>Nome do País: </label>
				<input type="text" name="nomePais" value="<?= $linha["pais"]; ?>" />
				<br />
				<br />
				
				<label>Nome do Estado: </label>
				<input type="text" name="estado" value="<?= $linha["estado"]; ?>" />
				<br />
				<br />
				
				<label>Nome do Municipio: </label>
				<input type="text" name="municipio" value="<?= $linha["municipio"]; ?>" />
				<br />
				<br />
				
				
				<input type="hidden" name="ID_localizacao" value="<?=$linha["ID_localizacao"]; ?>" />
				<input type="submit" value="Enviar"/>
			</form>
		</fieldset>
	</body>
</html>