<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "projeto_las";
	
	///A função mysqli_connect() estabelece uma conexão com o servidor MySQL e retorna a conexão como um objeto
	$pdo = mysqli_connect($servidor, $usuario, $senha, $dbname);
?>