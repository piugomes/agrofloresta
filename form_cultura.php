<?php 
	include "conexao.php";
	include "funcao.php";
?>
<html>

	<head>
	
		<meta charset="utf-8"/>
		<title>Entrada de Dados da Cultura</title>
		
	</head>
	
	<body>
	
		<?php
		
			menu();
			lista();
			
		?>
	
		<fieldset>
			
			<legend>Entrada de Dados</legend>
	
			<form action="cadastro_cultura.php" method="post">
				
				<label>Nome da Área: </label>
				<select name="area">
				
					<?php
					
						$select = "SELECT * FROM area";
						
						$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
						
						while( $linha = mysqli_fetch_array($resultado) ){
							
							echo "<option value='" . $linha["cod_localizacao"] . "' > " . $linha["nome"] . " </option>";
							
						}
					
					?>
				
				</select>
				<br />
				<br />
				
				<label>Tipo de cultura: </label>
				<input type="text" name="tipo"/>
				<br />
				<br />
				
				<label>Nome: </label>
				<input type="text" name="nome"/>
				<br />
				<br />
				
				<label>Renda: </label>
				<input type="text" name="renda"/>
				<br />
				<br />
				
				<label>Gasto com a cultura: </label>
				<input type="text" name="gasto"/>
				<br />
				<br />
				
				<label>Quantidade produzida: </label>
				<input type="text" name="produzida"/>
				<br />
				<br />
				
				<label>Quantidade esperada: </label>
				<input type="text" name="esperada"/>
				<br />
				<br />
				
				
				<input type="submit" value="Enviar"/>
				
			</form>
			
		</fieldset>
		
	</body>
	
</html>