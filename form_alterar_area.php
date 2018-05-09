<?php 
	include "conexao.php";
	include "funcao.php";
?>
<html>

	<head>
	
		<meta charset="utf-8"/>
		<title>Alterar Área</title>
		<link rel="stylesheet" href="estilos.css"/>
		
	</head>
	
	<body class="corpo">
	
		<?php
		
			menu();
			lista();
			
			$id = $_GET["id"];
			
			$select = "SELECT * FROM area WHERE ID_area = $id";
			
			$resultado = mysqli_query($link, $select) or die (mysqli_error($link));
			
			$linha = mysqli_fetch_array($resultado);
			
		?>
		
		<fieldset>
		
			<legend>Entrada de Dados</legend>
			
			<form action="altera_area.php" method="post">				
				
				<label>Locaçização da Área: </label>
				<select name="localizacao">
					<?php
						
						$select = "select * from localizacao";
						
						$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
						
						while($linha1 = mysqli_fetch_array($resultado)){
							
							echo "<option value='" . $linha1["ID_localizacao"] . "' ";
							if ( $linha1['ID_localizacao'] == $linha['cod_localizacao'] ){
								
								echo " selected ";
								
							}
							echo "> " . $linha1["pais"] . 
							" - " . $linha1["estado"] . " / " . $linha1["municipio"] . "</option>";
							
						}
					?> 
				</select>
				<br />
				<br />
				
				<label>Nome da Área: </label>
				<input type="text" value="<?=$linha['nome']?>" name="nomeArea"/>
				<br />
				<br />
				
				<label>Tamanho / Unidade de Medida: </label>
				<input type="number" value="<?=$linha['tamanho']?>" name="tamanho"/>
				
				<select name="unidade">
					<option value="Alqueires" <?php if($linha['uni_medida'] == "Alqueires"){
						
						echo "selected";
						
					} ?> >Alqueires</option>
					<option value="Hectare" <?php if($linha['uni_medida'] == "Hectare"){
						
						echo "selected";
						
					} ?> >Hectare</option>
					<option value="Ares" <?php if($linha['uni_medida'] == "Ares"){
						
						echo "selected";
						
					} ?>  >Ares</option>
				</select>
				<br />
				<br />
				
				<input type="hidden" name="id" value="<?=$linha["ID_area"]; ?>" />
				<input type="submit" value="Enviar"/>
				
			</form>
			
		</fieldset>
		
	</body>
	
</html>