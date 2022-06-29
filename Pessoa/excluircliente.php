<?php
require '../config.php';

$info = [];
$codigo = filter_input(INPUT_GET, 'codigo');
if($codigo) {

    $sql = $pdo->prepare("DELETE FROM cliente WHERE codigo =:codigo");

    $sql->bindValue('codigo', $codigo);
    $sql->execute();
    
} 
    header("Location: clientelista.php ");
    exit;