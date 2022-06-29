<?php
require '../config.php';

$numero = filter_input(INPUT_POST, 'numero');
$codigo = filter_input(INPUT_POST, 'codigo');
$name = filter_input(INPUT_POST, 'name');
$data = filter_input(INPUT_POST, 'data');
$codigop = filter_input(INPUT_POST, 'codigop');
$produto = filter_input(INPUT_POST, 'produto');
$preco = filter_input(INPUT_POST, 'preco');
$quantidade = filter_input(INPUT_POST, 'quantidade');
$qtdvenda = filter_input(INPUT_POST, 'qtdvenda');
$desconto = filter_input(INPUT_POST, 'desconto');
$totalvenda = filter_input(INPUT_POST, 'totalvenda');
$info = filter_input(INPUT_POST, 'info');



 if($numero && $codigo && $name  && $data && $codigop && $produto && $preco && $quantidade && $qtdvenda && $desconto && $totalvenda && $info) {

    $sql = $pdo->prepare("UPDATE vendas SET name = :name, codigo = :codigo, data = :data, codigop = :codigop, produto = :produto, preco = :preco, quantidade = :quantidade, qtdvenda = :qtdvenda, desconto = :desconto, totalvenda = :totalvenda, info = :info WHERE numero = :numero");
    $sql->bindValue(':numero', $numero);
    $sql->bindValue(':codigo', $codigo);
    $sql->bindValue(':name', $name);
    $sql->bindValue(':data', $data);
    $sql->bindValue(':codigop', $codigop);
    $sql->bindValue(':produto', $produto);
    $sql->bindValue(':preco', $preco);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':qtdvenda', $qtdvenda);
    $sql->bindValue(':desconto', $desconto);
    $sql->bindValue(':totalvenda', $totalvenda);
    $sql->bindValue(':info', $info);
    $sql ->execute();


    header("Location: listavenda.php");
    exit;

} else {

header("Location: listavenda.php");
exit;
}