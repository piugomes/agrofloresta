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
	
		<table class="table">
		
			<thead>
			
				<tr>
				
					<th>ID da Área</th>
					<th>Localização</th>
					<th>Nome</th>
					<th>Unidade de Medida</th>
					<th>Tamanho</th>
					<th colspan="2">Ação</th>
				
				</tr>
			
			</thead>
			
			<tbody>
			
				<?php
				
					$select = "SELECT * FROM area
					INNER JOIN localizacao ON area.cod_localizacao = localizacao.ID_localizacao
					ORDER BY ID_area";
					
					$resultado = mysqli_query($link, $select) or die( mysqli_error($link));
					
					while( $linha = mysqli_fetch_array($resultado) ){
						
						echo "<tr>";
						
							echo "<td>" . $linha['ID_area'] . "</td>";
							echo "<td>" . $linha['pais'] . " / " . $linha['estado'] . " - " . $linha['municipio'] . "</td>";
							echo "<td>" . $linha['nome'] . "</td>";
							echo "<td>" . $linha['uni_medida'] . "</td>";
							echo "<td>" . $linha['tamanho'] . "</td>";
							echo "<td> <a href='form_alterar_area.php?id=" . $linha['ID_area'] . "'> Alterar </a></td>";
							echo "<td> <a href='remove_area.php?id=" . $linha['ID_area'] . "'> Excluir </a></td>";
						
						echo "</tr>";
						
					}
				
				?>
			
			</tbody>
		
		</table>
		
	</body>
	
</html>