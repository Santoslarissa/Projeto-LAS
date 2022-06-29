<?php
require '../config.php';


$produto = filter_input(INPUT_POST, 'produto');
$codigop = filter_input(INPUT_POST, 'codigop');
$categoria = filter_input(INPUT_POST, 'categoria');
$quantidade = filter_input(INPUT_POST, 'quantidade');
$preco = filter_input(INPUT_POST, 'preco');
$imagem = filter_input(INPUT_POST, 'imagem');
$descricao = filter_input(INPUT_POST, 'descricao');
$data = filter_input(INPUT_POST, 'data');



 if($produto && $codigop && $categoria && $quantidade && $preco && $descricao && $data) {

    $sql = $pdo->prepare("UPDATE produtos SET produto = :produto, categoria = :categoria, quantidade = :quantidade, 
    preco = :preco, imagem = :imagem, descricao = :descricao, data = :data WHERE codigop = :codigop");
    $sql->bindValue(':produto', $produto);
    $sql->bindValue(':codigop', $codigop);
    $sql->bindValue(':categoria', $categoria);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':preco', $preco);
    $sql->bindValue(':imagem', $imagem);
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':data', $data);
    $sql ->execute();


    header("Location: produto.php");
    exit;

} else {

header("Location: novoProduto.php");
exit;
}