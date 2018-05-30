<?php 
	include "conexao.php";
	include "funcao.php";
?>

<html>

	<head>
	
		<meta charset="utf-8" />
		<title>Agrofloresta - Listar Cultura</title>
		<link rel="stylesheet" href="estilos.css"/>
	</head>
	
	<body class="corpo">
	
		<?php
		
			menu();
			lista();
		
		?>
		<fieldset class="fieldset">
			<legend>Filtro de Dados</legend>
			<form action="listar_cultura.php" method="post">
				<label>Filtrar por País: </label>
				<input type="text" name="filtroPais"/>
				<br />
				<br />
				
				<label>Filtrar por Estado: </label>
				<input type="text" name="filtroEst"/>
				<br />
				<br />
				
				<label>Filtrar por Municipio: </label>
				<input type="text" name="filtroMun"/>
				<br />
				<br />
				
				<label>Filtrar por Nome da Area: </label>
				<select name="filtroNomeArea">
					<?php 
						$select = "select * from info_cultura";
						$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
						while($linha = mysqli_fetch_array($resultado)){
							echo "<option value='" .$linha["ID_cultura"] . "'>" . $linha["nome"] . "</option>";
						}
					?>
				</select>
				<br />
				<br />
				
				<label>Filtrar por Tipo: </label>
				<input type="text" name="filtroTipo"/>
				<br />
				<br />
				
				<label>Filtrar por Nome: </label>
				<input type="text" name="filtroNome"/>
				<br />
				<br />
				
				<label>Filtrar por Renda: </label>
				<input type="text" name="filtroRenda"/>
				<br />
				<br />
				
				<label>Filtrar por Gasto: </label>
				<input type="text" name="filtroGasto"/>
				<br />
				<br />
				
				<label>Filtrar por Quantidade Produzida: </label>
				<input type="text" name="filtroQuanProd"/>
				<br />
				<br />
				
				<label>Filtrar por Quantidade Estimada: </label>
				<input type="text" name="filtroQuanEst"/>
				<br />
				<br />
				
				<input type="submit" value="Enviar"/>
			</form>
		</fieldset>
		<table class="table">
		
			<thead>
			
				<tr>
				
					<th>ID da Cultura</th>
					<th>Localização</th>
					<th>Nome da Área</th>
					<th>Tipo</th>
					<th>Nome</th>
					<th>Renda</th>
					<th>Gasto com a produção</th>
					<th>Quantidade Produzida</th>
					<th>Quantidade Estimada</th>
					<th colspan="2">Ação</th>
				
				</tr>
			
			</thead>
			
			<tbody>
			
				<?php
					$where = '';
		
					if(!empty($_POST["filtroPais"]) ){
					
						$letra = $_POST['filtroPais'];					
						if($where != ''){
							$where .= "and pais LIKE '$letra%'";
						}else{
							$where = "WHERE pais LIKE '$letra%'";
						}
					}
					
					if(!empty($_POST["filtroEst"]) ){
						
						$letra = $_POST['filtroEst'];
						if( $where != '' ){
							
							$where .= " AND estado LIKE '$letra%'";							
						}else{							
							$where .= "WHERE estado LIKE '$letra%'";
							
						}
						
					}

					if(!empty($_POST["filtroMun"])){
						$letra = $_POST['filtroMun'];
						if($where != ''){
							$where .= " and municipio like '$letra%'";
						}else{
							$where .= " where municipio like '$letra%'";
						}
					}
					
					if(!empty($_POST["filtroNomeArea"])){
						$letra = $_POST['filtroNomeArea'];
						if($where != ''){
							$where .= " and nome like '$letra%'"; 
						}else{
							$where .= " where nome like '$letra%'"; 
						}
					}
					
					if(!empty($_POST["filtroTipo"])){
						$letra = $_POST['filtroTipo'];
						if($where != ''){
							$where .= "and tipo like '$letra%'";
						}else{
							$where .= "where tipo like '$letra%'";
						}
					}
					
					if(!empty($_POST["filtroNome"])){
						$letra = $_POST['filtroNome'];
						if($where != ''){
							$where .= "and nome like '$letra%'";
						}else{
							$where .= "where nome like '$letra%'";
						}
					}
					
					
					if(!empty($_POST["filtroRenda"])){}
					
					
					if(!empty($_POST["filtroGasto"])){}
					
					
					if(!empty($_POST["filtroQuanProd"])){}
					
					
					if(!empty($_POST["filtroQuanEst"])){}
					
					
					
					
					// ######################################################################################
					
					$select = "SELECT * FROM cultura
					INNER JOIN area ON area.ID_area = cultura.cod_area
					INNER JOIN localizacao ON localizacao.ID_localizacao = area.cod_localizacao";
					
					$resultado = mysqli_query($link, $select) or die( mysqli_error($link));
					
					
					while( $linha = mysqli_fetch_array($resultado) ){
						
						echo "<tr>";
						
							echo "<td>" . $linha['ID_cultura'] . "</td>";
							echo "<td>" . $linha['pais'] . " / " . $linha['estado'] . " - " . $linha['municipio'] . "</td>";
							echo "<td>" . $linha['nome'] . "</td>";
							echo "<td>" . $linha['tipo'] . "</td>";
							echo "<td>" . $linha['nome_cul'] . "</td>";
							echo "<td>" . $linha['renda'] . "</td>";
							echo "<td>" . $linha['gasto'] . "</td>";
							echo "<td>" . $linha['q_produzida'] . "</td>";
							echo "<td>" . $linha['q_esperada'] . "</td>";
							echo "<td> <a href='form_alterar_cultura.php?id=" . $linha['ID_cultura'] . "'> Alterar </a></td>";
							echo "<td> <a href='remove_cultura.php?id=" . $linha['ID_cultura'] . "'> Excluir </a></td>";
						
						echo "</tr>";
						
					}
				
				?>
			
			</tbody>
		
		</table>
		
	</body>
	
</html>