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