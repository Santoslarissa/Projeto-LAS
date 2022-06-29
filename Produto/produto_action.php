<?php
Class Produto{
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
    public function cadastrarP($produto, $codigop, $categoria,$quantidade,$preco,$imagem, $descricao, $data){
        global $pdo;
      $sql = $pdo->prepare("INSERT INTO produtos (produto, codigop, categoria, quantidade,preco, imagem, descricao, data ) 
      VALUES (:produto, :codigop, :categoria, :quantidade,:preco,:imagem, :descricao, :data)");
      $sql->bindValue(':produto', $produto);
      $sql->bindValue(':codigop', $codigop);
      $sql->bindValue(':categoria', $categoria);
      $sql->bindValue(':quantidade', $quantidade);
      $sql->bindValue(':preco', $preco);
      $sql->bindValue(':imagem', $imagem);
      $sql->bindValue(':descricao', $descricao);
      $sql->bindValue(':data', $data);
      $sql ->execute();
      return true ;

      header("Location: produto.php");
      exit;
}
/*
public function editarP($produto, $codigop, $categoria,$quantidade,$preco,$imagem, $descricao, $data){

        global $pdo;
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
        return true ;

        header("Location: produto.php");
        exit;
}
*/
}

?>