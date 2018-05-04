<?php 
	include "conexao.php";
	include "funcao.php";
?>

<html>

	<head>
	
		<meta charset="utf-8" />
		<title>Agrofloresta - Listar Cultura</title>
		
	</head>
	
	<body>
	
		<?php
		
			menu();
			lista();
		
		?>
	
		<table>
		
			<thead>
			
				<tr>
				
					<td>ID da Cultura</td>
					<td>Localização</td>
					<td>Nome da Área</td>
					<td>Tipo</td>
					<td>Nome</td>
					<td>Renda</td>
					<td>Gasto com a produção</td>
					<td>Quantidade Produzida</td>
					<td>Quantidade Estimada</td>
				
				</tr>
			
			</thead>
			
			<tbody>
			
				<?php
				
					$select = "SELECT * FROM cultura
					INNER JOIN area ON area.ID_area = cultura.cod_area";
					
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
						
						echo "</tr>";
						
					}
				
				?>
			
			</tbody>
		
		</table>
		
	</body>
	
</html>