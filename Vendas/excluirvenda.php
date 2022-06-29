
<?php
require '../config.php';

$numero = filter_input(INPUT_GET, 'numero');
if($numero) {

    $sql = $pdo ->prepare("DELETE FROM vendas WHERE numero = :numero");

    $sql ->bindValue('numero', $numero);
    $sql ->execute();
}

 
    header("Location: listavenda.php");
    exit;


