<?php
include_once("../conexao.php");

function buscaCliente($codigo, $pdo){
	$result_cliente = "SELECT * FROM cliente WHERE codigo = '$codigo' LIMIT 1";
	$resultado_cliente = mysqli_query($pdo, $result_cliente);
	if($resultado_cliente->num_rows){
		$row_cliente = mysqli_fetch_assoc($resultado_cliente);
		$valores['name'] = $row_cliente['name'];
	}else{
		$valores['name'] = 'Cliente não encontrado';
	}
	return json_encode($valores);
}

if(isset($_GET['codigo'])){
	echo buscaCliente($_GET['codigo'], $pdo);
}
?>