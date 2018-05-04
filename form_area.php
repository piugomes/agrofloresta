<?php 
	include "conexao.php";
	include "funcao.php";
?>

<html>

	<head>
	
		<meta charset="utf-8"/>
		<title>Entrada de Dados da Àrea</title>
		
	</head>
	
	<body>
	
		<?php
		
			menu();
			lista();
			
		?>
	
		<fieldset>
		
			<legend>Entrada de Dados</legend>
			
			<form action="cadastro_area.php" method="post">
				
				<label>Locaçização da Área: </label>
				<select name="localizacao">
					<?php
						include "conexao.php";
						
						
						$select = "select * from localizacao";
						
						$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
						
						while($linha = mysqli_fetch_array($resultado)){
							
							echo "<option value='" . $linha["ID_localizacao"] . "'> " . $linha["pais"] . 
							" - " . $linha["estado"] . " / " . $linha["municipio"] . "</option>";
							
						}
					?> 
				</select>
				<br />
				<br />
				
				<label>Nome da Área: </label>
				<input type="text" name="nomeArea"/>
				<br />
				<br />
				
				<label>Unidade de Medida: </label>
				<select name="unidade">
					<option value="Alqueires">Alqueires</option>
					<option value="Hectare">Hectare</option>
					<option value="Ares">Ares</option>
				</select>
				<br />
				<br />
				
				<label>Tamanho: </label>
				<input type="number" name="tamanho"/>
				<br />
				<br />
				
				
				
				<input type="submit" value="Enviar"/>
			
			</form>
		</fieldset>
	</body>
</html>