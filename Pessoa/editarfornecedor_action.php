<?php
require '../config.php';


$name = filter_input(INPUT_POST, 'name');
$codigo = filter_input(INPUT_POST, 'codigo');
$data = filter_input(INPUT_POST, 'data');
$cpf = filter_input(INPUT_POST, 'cpf');
$telefone1 = filter_input(INPUT_POST, 'telefone1');
$telefone2 = filter_input(INPUT_POST, 'telefone2');
$estado = filter_input(INPUT_POST, 'estado');
$cidade = filter_input(INPUT_POST, 'cidade');
$cep = filter_input(INPUT_POST, 'cep');
$endereco = filter_input(INPUT_POST, 'endereco');
$complemento = filter_input(INPUT_POST, 'complemento');
$email = filter_input(INPUT_POST, 'email');
$abertura = filter_input(INPUT_POST, 'abertura');
$descricao = filter_input(INPUT_POST, 'descricao');



 if($name && $cpf && $telefone1 && $telefone2 && $estado && $cidade && $cep && $endereco  && $complemento && $email && $abertura && $descricao && $data) {

    $sql = $pdo->prepare(" UPDATE fornecedor SET name = :name, data = :data, cpf = :cpf, telefone1 = :telefone1, telefone2 = :telefone2, estado = :estado, cidade = :cidade, cep = :cep, endereco = :endereco, complemento = :complemento, email = :email, abertura = :abertura, descricao = :descricao WHERE codigo = :codigo");
    $sql->bindValue(':name', $name);
    $sql->bindValue(':codigo', $codigo);
    $sql->bindValue(':data', $data);
    $sql->bindValue(':cpf', $cpf);
    $sql->bindValue(':telefone1', $telefone1);
    $sql->bindValue(':telefone2', $telefone2);
    $sql->bindValue(':estado', $estado);
    $sql->bindValue(':cidade', $cidade);
    $sql->bindValue(':cep', $cep);
    $sql->bindValue(':endereco', $endereco);
    $sql->bindValue(':complemento', $complemento);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':abertura', $abertura);
    $sql->bindValue(':descricao', $descricao);
    $sql ->execute();


        header("Location: fornecedorlista.php");
        exit;

 } else {

    header("Location: fornecedorlista.php");
    exit;
 }