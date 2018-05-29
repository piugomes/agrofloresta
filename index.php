<?php 
	include "conexao.php";
	include "funcao.php";
?>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Pagina de Inicio</title>
		<link rel="stylesheet" href="estilos.css"/>
	</head>
	<body class="corpo">
		<h1 class="h1">Seja Bem Vindo(a)!</h1>
		<?php 
			menu();
			lista();
		?>
	</body>
</html>