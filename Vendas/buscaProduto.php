<?php
include_once("../conexao.php");

function buscaProduto($codigop, $pdo){
	$result_produto = "SELECT * FROM produtos WHERE codigop = '$codigop' LIMIT 1";
	$resultado_produto = mysqli_query($pdo, $result_produto);
	if($resultado_produto->num_rows){
		$row_produto = mysqli_fetch_assoc($resultado_produto);
		$valores['produto'] = $row_produto['produto'];
		$valores['preco'] = $row_produto['preco'];
		$valores['quantidade'] = $row_produto['quantidade'];
	}else{
		$valores['produto'] = 'Produto não encontrado';
	}
	return json_encode($valores);
}

if(isset($_GET['codigop'])){
	echo buscaProduto($_GET['codigop'], $pdo);
}
?>