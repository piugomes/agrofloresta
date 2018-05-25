<?php 

	include "conexao.php";
	include "funcao.php";
	
?>
<html>
	<head>
	
		<meta charset="utf-8"/>
		<title>Listar localização</title>
		<link rel="stylesheet" href="estilos.css"/>
		
	</head>
	
	<body class="corpo">
	
		<?php 
		
			menu();
			lista();
		?>
		
		<fieldset class="fieldset">
		
			<legend>Filtro de Dados</legend>
			
			<form action="listar_localizacao.php" method="post">
				<label>Filtrar por País: </label>
				<input type="text" name="filtroPais"><br />
				
				<br />
				
				<label>Filtrar por Estado: </label>
				<input type="text" name="filtroEst"><br/>
				
				<br />
				
				<label>Filtrar por Municipio: </label>
				<input type="text" name="filtroMun">
				
				<br /><br />
				
				<input type="submit" value="Enviar">
				
			</form>

			<br />
			
			<form action="listar_localizacao.php" method="post" name="ordenarLoc">
			
				<label class="ordenar">Ordernar </label>
			
				<select name="ordernacaoLoc" onchange="document.ordenarLoc.submit()">
					
					<option value="">:: Ordenar por ::</option>
					
					<option value="id_a_z">ID (Crescente)</option>
					<option value="id_z_a">ID (Decrescente)</option>
					
					<option value="pais_a_z">País (A->Z)</option>
					<option value="pais_z_a">País (Z->A)</option>
					
					<option value="estado_a_z">Estado (A->Z)</option>
					<option value="estado_z_a">Estado (Z->A)</option>
					
					<option value="municipio_a_z">Municipio (A->Z)</option>
					<option value="municipio_z_a">Municipio (Z->A)</option>
					
				</select>
				
			</form>
			
		</fieldset>
		
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
				
				$cidade = $_POST['filtroMun'];
				
				if( $where != '' ){
					
					$where .= " AND municipio LIKE '$cidade%'";
					
				}else{
					
					$where = "WHERE municipio LIKE '$cidade%'";
					
				}
				
			}
			
			$select = "SELECT * FROM localizacao $where";
			
			session_start();
			
			if(isset($_POST["ordernacaoLoc"]) || isset($_SESSION["localizacao"])){
				
				if(isset($_POST["localizacao"])){
					
					$_SESSION["localizacao"] = $_POST["ordernacaoLoc"];
					
				}
				
				switch($_SESSION["localizacao"]){
					
					case "id_a_z":
						$select .= " order by ID_localizacao";
						break;
					case "id_z_a":
						$select .= " order by ID_localizacao DESC";
						break;
						
				//---------------------------------------------------------//
					case "pais_a_z":
						$select .= " order by pais";
						break;
					case "pais_z_a":
						$select .= " order by pais DESC";
						break;
						
				//---------------------------------------------------------//
					case "estado_a_z":
						$select .= " order by estado";
						break;
					case "estado_z_a":
						$select .= " order by estado DESC";
						break;
						
				//---------------------------------------------------------//
					case "municipio_a_z":
						$select .= " order by municipio";
						break;
					case "municipio_z_a":
						$select .= " order by municipio DESC";
					break;

				}
				
				//echo $select;
				
			}
		?>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome País</th>
					<th>Nome Estado</th>
					<th>Nome Municipio</th>
					<th colspan="2">Ação</th>
				</tr>
			</thead>
			
			<tbody>
			
				<?php
				
					include "conexao.php";
		 
					$resultado = mysqli_query($link, $select) or die(mysqli_error($link));
					
					while($linha = mysqli_fetch_array($resultado)){
						echo "<tr class='tr'>";
							echo "<td>" . $linha["ID_localizacao"] . "</td>";			
							echo "<td>" . $linha["pais"] . "</td>";			
							echo "<td>" . $linha["estado"] . "</td>";
							echo "<td>" . $linha["municipio"] . "</td>";
							echo "<td><a href='form_alterar_localizacao.php?ID_localizacao=". $linha["ID_localizacao"] . "'>Alterar</a></td>";
							echo "<td><a href='remove_localizacao.php?ID_localizacao=". $linha["ID_localizacao"] . "'>Deletar</a></td>";
						echo "</tr>";
						
					}
				?>
				
			</tbody>
			
		</table>
		
	</body>
	
</html>