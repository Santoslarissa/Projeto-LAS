<?php
Class Venda{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome,$host,$usuario,$senha){
        global $pdo;
        global $msgErro;
        try
        {
            $pdo = new PDO("mysql:dbname=" .$nome. ";host=".$host,$usuario,$senha);
        } catch (PDOException $e){
             $msgErro = $e -> getMessage();
        }


    }
    public function cadastrarV($codigo, $name, $data,$codigop,$produto,$preco,
                                $quantidade, $qtdvenda,$desconto, $totalvenda, $info){
        global $pdo;
    
      $sql = $pdo->prepare("INSERT INTO vendas (codigo,name,data,codigop,produto,preco,quantidade,qtdvenda, desconto,totalvenda,info) 
      VALUES (:codigo,:name,:data,:codigop,:produto,:preco, :quantidade,:qtdvenda, :desconto, :totalvenda, :info)");
      $sql->bindValue(':codigo', $codigo);
      $sql->bindValue(':name', $name);
      $sql->bindValue(':data', $data);
      $sql->bindValue(':codigop', $codigop);
      $sql->bindValue(':produto', $produto);
      $sql->bindValue(':preco', $preco);
      $sql->bindValue(':quantidade', $quantidade );
      $sql->bindValue(':qtdvenda', $qtdvenda);
      $sql->bindValue(':desconto', $desconto);
      $sql->bindValue(':totalvenda', $totalvenda);
      $sql->bindValue(':info', $info) ;
      
      $sql ->execute();

      $sql2 = $pdo->prepare("INSERT INTO notas (codigo,name,data,codigop,produto,preco,quantidade,qtdvenda, desconto,totalvenda,info) 
      VALUES (:codigo,:name,:data,:codigop,:produto,:preco, :quantidade,:qtdvenda, :desconto, :totalvenda, :info)");
      $sql2->bindValue(':codigo', $codigo);
      $sql2->bindValue(':name', $name);
      $sql2->bindValue(':data', $data);
      $sql2->bindValue(':codigop', $codigop);
      $sql2->bindValue(':produto', $produto);
      $sql2->bindValue(':preco', $preco);
      $sql2->bindValue(':quantidade', $quantidade );
      $sql2->bindValue(':qtdvenda', $qtdvenda);
      $sql2->bindValue(':desconto', $desconto);
      $sql2->bindValue(':totalvenda', $totalvenda);
      $sql2->bindValue(':info', $info);
      $sql2 ->execute();
      return true ;

      header("Location: venda.php");
      exit;
    
}
}

?>