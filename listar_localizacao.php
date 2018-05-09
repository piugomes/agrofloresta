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
					
					$select = "select * from localizacao order by ID_localizacao";
		 
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