<?php 
	include "conexao.php";
	include "funcao.php";
?>
<html>

	<head>
	
		<meta charset="utf-8"/>
		<title>Alterar Cultura</title>
		<link rel="stylesheet" href="estilos.css"/>
		
	</head>
	
	<body class="corpo">
	
		<?php
		
			menu();
			lista();
			
			$id = $_GET["id"];
			
			$select = "SELECT * FROM cultura WHERE ID_cultura = $id";
			
			$resultado = mysqli_query($link, $select) or die (mysqli_error($link));
			
			$linha = mysqli_fetch_array($resultado);
			
		?>
		
		<fieldset>
		
			<legend>Entrada de Dados</legend>
			
			<form action="altera_cultura.php" method="post">				
				
				<label>Nome da Área: </label>
				<select name="area">
				
					<?php
					
						$select = "SELECT * FROM area";
						
						$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
						
						while( $linha1 = mysqli_fetch_array($resultado) ){
							
							echo "<option value='" . $linha1["cod_localizacao"] . "' ";
							
								if($linha1['ID_area'] == $linha['cod_area']){
									
									echo " selected ";
									
								}
							
							echo "> " . $linha1["nome"] . " </option>";
							
						}
					
					?>
				
				</select>
				<br />
				<br />
				
				<label>Tipo de cultura: </label>
				<input type="text" name="tipo" value="<?=$linha['tipo']?>" />
				<br />
				<br />
				
				<label>Nome: </label>
				<input type="text" name="nome" value="<?=$linha['nome_cul']?>" />
				<br />
				<br />
				
				<label>Renda (R$): </label>
				<input type="number" step="0.01" name="renda" value="<?=$linha['renda']?>" />
				<br />
				<br />
				
				<label>Gasto com a cultura (R$): </label>
				<input type="number" step="0.01" name="gasto" value="<?=$linha['gasto']?>" />
				<br />
				<br />
				
				<label>Quantidade produzida (Kg): </label>
				<input type="number" step="0.01" name="produzida" value="<?=$linha['q_produzida']?>" />
				<br />
				<br />
				
				<label>Quantidade esperada (Kg): </label>
				<input type="number" step="0.01" name="esperada" value="<?=$linha['q_esperada']?>" />
				<br />
				<br />
				
				<input type="hidden" name="id" value="<?=$linha["ID_cultura"]; ?>" />
				<input type="submit" value="Enviar"/>
				
			</form>
			
		</fieldset>
		
	</body>
	
</html>