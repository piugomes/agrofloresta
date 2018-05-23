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
				<label>Filtrar país pelo nome que comece com: </label>
				<input type="text" name="filtroLoc">
				
				<input type="submit" value="Enviar">
			</form>
			
			<form action="listar_localizacao.php" method="post" name="ordenarLoc">
				<select name="ordernacaoLoc" onchange="document.ordenarLoc.submit()">
					
					<option>:: Ordenar por ::</option>
					
					<option value="id_a_z">ID Localizacao (A->Z)</option>
					<option value="id_z_a">ID Localizacao (Z->A)</option>
					
					<option value="nome_a_z">Nome País (A->Z)</option>
					<option value="nome_z_a">Nome País (Z->A)</option>
					
					<option value="estado_a_z">Nome Estado (A->Z)</option>
					<option value="estado_z_a">Nome Estado (Z->A)</option>
					
					<option value="municipio_a_z">Nome Municipio (A->Z)</option>
					<option value="municipio_z_a">Nome Municipio (Z->A)</option>
					
				</select>
			</form>
		</fieldset>
		<?php 
			if(isset($_POST["filtroLoc"])){
				$select = "select * from localizacao where pais like '$_POST[filtroLoc]%'";
				//echo $select;
			}else{
				$select = "select * from localizacao";
			}
			
			session_start();
			
			if(isset($_POST["ordernacaoLoc"]) || isset($_SESSION["ordernacaoLoc"])){
				if(isset($_POST["ordernacaoLoc"])){
					$_SESSION["ordernacaoLoc"] = $_POST["ordernacaoLoc"];
				}
				
				switch($_SESSION["ordernacaoLoc"]){
					case "id_a_z":
						$select .= " order by ID_localizacao";
						break;
					case "id_z_a":
						$select .= " order by ID_localizacao desc";
						break;
						
						
					case "nome_a_z":
						$select .= " order by pais";
						break;
					case "nome_z_a":
						$select .= " order by pais desc";
						break;
						
						
					case "estado_a_z":
						$select .= " order by estado";
						break;
					case "estado_z_a":
						$select .= " order by estado desc";
						break;
						
						
					case "municipio_a_z":
						$select .= " order by municipio";
						break;
					case "municipio_z_a":
						$select .= " order by municipio desc";
						break;

				}
			}
		?>
		<table class="table">
			<thead>
				<tr>
					<th>ID localização</th>
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