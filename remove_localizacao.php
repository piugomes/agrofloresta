<?php 
	include "conexao.php";
	include "funcao.php";

	$id = $_GET["ID_localizacao"];
	
	$delete = "delete from localizacao where ID_localizacao = '$id'";
	
	menu();
	lista();
	if(mysqli_query($link, $delete)){
		
		echo "<h1 class='h1'>Removido!!</h1>";
		
	}else {die(mysqli_error($link));}
?>