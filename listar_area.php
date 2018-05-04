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
				
					<td>ID da Área</td>
					<td>Localização</td>
					<td>Nome</td>
					<td>Unidade de Medida</td>
					<td>Tamanho</td>
				
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
						
						echo "</tr>";
						
					}
				
				?>
			
			</tbody>
		
		</table>
		
	</body>
	
</html>