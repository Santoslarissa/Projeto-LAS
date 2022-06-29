<?php
require '../config.php';

$codigop = filter_input(INPUT_GET, 'codigop');
if($codigop) {

    $sql = $pdo->prepare("DELETE FROM produtos WHERE codigop = :codigop");
    $sql->bindValue('codigop', $codigop);
    $sql->execute();
    
} 
    header("Location: produto.php ");
    exit;
?>
    