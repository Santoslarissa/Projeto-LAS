<?php
//credenciais 

$db_name = 'projeto_las';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

//utilização da biblioteca PDO para conexão
$pdo = new PDO ("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);

?>
