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
			
			<form action="listar_area.php" method="post">
			
				<label>Filtrar por País: </label>
				<input type="text" name="filtroPais"><br />
				
				<br />
				
				<label>Filtrar por Estado: </label>
				<input type="text" name="filtroEst"><br/>
				
				<br />
				
				<label>Filtrar por Municipio: </label>
				<input type="text" name="filtroMun"><br />
				
				<br />
				
				<label>Filtrar por Nome da Área: </label>
				<input type="text" name="filtroNome"><br />
				
				<br />
				
				<label>Filtrar por Tamanho da Área: </label>
				<input type="text" name="filtroTam">
				
				<select name="selectTam">
					
					<option value="al" selected>Alqueires</option>
					<option value="he">Hectares</option>
					<option value="ar">Ares</option>
				
				</select><br />
				
				<br />
				
				<input type="submit" value="Enviar">
				
			</form>

			<br />
			
			<form action="listar_area.php" method="post" name="ordenarAre">
			
				<label class="ordenar">Ordernar</label>
			
				<select name="ordenacaoAre" onchange="document.ordenarAre.submit()">
					
					<option value="">:: Ordenar por ::</option>
					
					<option value="id_a_z">ID (Crescente)</option>
					<option value="id_z_a">ID (Decrescente)</option>
					
					<option value="pais_a_z">País (A->Z)</option>
					<option value="pais_z_a">País (Z->A)</option>
					
					<option value="estado_a_z">Estado (A->Z)</option>
					<option value="estado_z_a">Estado (Z->A)</option>
					
					<option value="municipio_a_z">Municipio (A->Z)</option>
					<option value="municipio_z_a">Municipio (Z->A)</option>
					
					<option value="nome_a_z">Nome da Área(A->Z)</option>
					<option value="nome_z_a">Nome da Área (Z->A)</option>
					
					<option value="tamanho_a">Tamanho (Crescente)</option>
					<option value="tamanho_a">Tamanho (Decrescente)</option>
					
				</select>
				
			</form>
			
		</fieldset>
	
		<table class="table">
		
			<thead>
			
				<tr>
				
					<th>ID</th>
					<th>Localização</th>
					<th>Nome</th>
					<th>Tamanho - Unidade de Medida</th>
					<th colspan="2">Ação</th>
				
				</tr>
			
			</thead>
			
			<tbody>
			
				<?php
				
					$where = '';
		
					if( !empty($_POST["filtroPais"]) ){
					
						$letra = $_POST['filtroPais'];
					
						$where = "WHERE pais LIKE '$letra%'";
					
					}
					
					if( !empty($_POST["filtroEst"]) ){
						
						$letra = $_POST['filtroEst'];
						
						if( $where != '' ){
							
							$where .= " AND estado LIKE '$letra%'";
							
						}else{
							
							$where = "WHERE estado LIKE '$letra%'";
							
						}
						
					}
					
					if( !empty($_POST["filtroMun"]) ){
						
						$letra = $_POST['filtroMun'];
						
						if( $where != '' ){
							
							$where .= " AND municipio LIKE '$letra%'";
							
						}else{
							
							$where = "WHERE municipio LIKE '$letra%'";
							
						}
						
					}
					
					if( !empty($_POST["filtroNome"]) ){
						
						$letra = $_POST['filtroNome'];
						
						if( $where != '' ){
							
							$where .= " AND nome LIKE '%$letra%'";
							
						}else{
							
							$where = "WHERE nome LIKE '%$letra%'";
							
						}
						
					}
					
					if( !empty($_POST["filtroTam"]) ){
						
						$letra = $_POST['filtroTam'];
						$unidade = $_POST['selectTam'];
						
						if( $where != '' ){
							
							$where .= " AND tamanho LIKE '%$letra%' AND uni_medida LIKE '$unidade%'";
							
						}else{
							
							$where = "WHERE tamanho LIKE '%$letra%' AND uni_medida LIKE '$unidade%'";
							
						}
						
					}
					
					
					
					//#################################################################################################//
					//#################################################################################################//
				
				
				
					$order = '';
					
					if( isset($_POST["ordenacaoAre"]) || isset($_SESSION["area"]) ){
					
						if( isset($_POST["ordenacaoAre"]) ){
						
							$_SESSION["area"] = $_POST["ordenacaoAre"];
						
						}
						
						switch($_SESSION["area"]){
						
							case "id_a_z":
								$order = " ORDER BY ID_area";
							break;
							
							case "id_z_a":
								$order = " ORDER BY ID_area DESC";
							break;
								
						//---------------------------------------------------------//
							case "pais_a_z":
								$order = " ORDER BY pais";
							break;
							
							case "pais_z_a":
								$order = " ORDER BY pais DESC";
							break;
								
						//---------------------------------------------------------//
							case "estado_a_z":
								$order = " ORDER BY estado";
							break;
								
							case "estado_z_a":
								$order = " ORDER BY estado DESC";
							break;
								
						//---------------------------------------------------------//
							case "municipio_a_z":
								$order = " ORDER BY municipio";
							break;
							
							case "municipio_z_a":
								$order = " ORDER BY municipio DESC";
							break;
							
						//---------------------------------------------------------//
							case "nome_a_z":
								$order = " ORDER BY nome";
							break;
							
							case "nome_z_a":
								$order = " ORDER BY nome DESC";
							break;
							
						//---------------------------------------------------------//
							case "tamanho_a":
								$order = " ORDER BY tamanho";
							break;
							
							case "tamanho_a":
								$order = " ORDER BY tamanho";
							break;
							
						}
						
					}
				
					$select = "SELECT * FROM area 
					INNER JOIN localizacao ON 
					area.cod_localizacao = localizacao.ID_localizacao 
					$where 
					$order";
					
					echo $select;
					
					$resultado = mysqli_query($link, $select) or die( mysqli_error($link));
					
					while( $linha = mysqli_fetch_array($resultado) ){
						
						echo "<tr>";
						
							echo "<td>" . $linha['ID_area'] . "</td>";
							echo "<td>" . $linha['pais'] . " / " . $linha['estado'] . " - " . $linha['municipio'] . "</td>";
							echo "<td>" . $linha['nome'] . "</td>";
							echo "<td>" . $linha['tamanho'] . " " . $linha['uni_medida'] . "</td>";
							
							echo "<td> <a href='form_alterar_area.php?id=" . $linha['ID_area'] . "'> Alterar </a></td>";
							echo "<td> <a href='remove_area.php?id=" . $linha['ID_area'] . "'> Excluir </a></td>";
						
						echo "</tr>";
						
					}
				
				?>
			
			</tbody>
		
		</table>
		
	</body>
	
</html>