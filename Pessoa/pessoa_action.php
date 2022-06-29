<?php
error_reporting(0);
Class pessoa{
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
    public function cadastrarC ($name, $codigo, $cpf, $telefone1, $telefone2, $estado, $cidade, $cep, $endereco, $complemento, $email, $abertura,$descricao, $data, $tipo, $pes){
        global $pdo;
        $sql=$pdo ->prepare("INSERT INTO cliente (name, codigo, cpf, telefone1, telefone2, estado, cidade, cep, endereco, complemento, email, abertura, descricao, data, tipo, pes)VALUES (:name, :codigo, :cpf, :telefone1, :telefone2, :estado, :cidade, :cep, :endereco, :complemento, :email, :abertura, :descricao, :data, :tipo, :pes)");
        $sql->bindValue(':name', $name);
         $sql->bindValue(':codigo', $codigo);
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
         $sql->bindValue(':data', $data);
         $sql->bindValue(':tipo', $tipo);
         $sql->bindValue(':pes', $pes);
        $sql-> execute(); 
        return true ;
    }


    public function cadastrarF ($name, $codigo, $cpf, $telefone1, $telefone2, $estado, $cidade, $cep, $endereco, $complemento, $email, $abertura,$descricao, $data, $tipo, $pes){
        global $pdo;
        $sql=$pdo ->prepare("INSERT INTO fornecedor (name, codigo, cpf, telefone1, telefone2, estado, cidade, cep, endereco, complemento, email, abertura, descricao, data, tipo, pes)VALUES (:name, :codigo, :cpf, :telefone1, :telefone2, :estado, :cidade, :cep, :endereco, :complemento, :email, :abertura, :descricao, :data, :tipo, :pes)");
        $sql->bindValue(':name', $name);
         $sql->bindValue(':codigo', $codigo);
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
         $sql->bindValue(':data', $data);
         $sql->bindValue(':tipo', $tipo);
         $sql->bindValue(':pes', $pes);
        $sql-> execute(); 
        return true ;
    }


    //funcao para inserir nos dois bancos( cliente e fornecedor)
    public function cadastrarambos($name, $codigo, $cpf, $telefone1, $telefone2, $estado,
    $cidade, $cep, $endereco, $complemento, $email, $abertura,$descricao, $data, $tipo, $pes){
        global $pdo;
    
      $sql = $pdo->prepare("INSERT INTO cliente (name,codigo,cpf,telefone1,telefone2,estado,cidade,cep,endereco,complemento,email,abertura,descricao,data,tipo,pes) 
      VALUES (:name,:codigo,:cpf,:telefone1,:telefone2,:estado, :cidade,:cep, :endereco, :complemento, :email,:abertura, :descricao, :data, :tipo, :pes)");
     $sql->bindValue(':name', $name);
     $sql->bindValue(':codigo', $codigo);
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
     $sql->bindValue(':data', $data);
     $sql->bindValue(':tipo', $tipo);
     $sql->bindValue(':pes', $pes);
      
      $sql ->execute();

      $sql2 = $pdo->prepare("INSERT INTO fornecedor (name,codigo,cpf,telefone1,telefone2,estado,cidade,cep,endereco,complemento,email,abertura,descricao,data,tipo,pes) 
      VALUES (:name,:codigo,:cpf,:telefone1,:telefone2,:estado, :cidade,:cep, :endereco, :complemento, :email,:abertura, :descricao, :data, :tipo, :pes)");
      $sql2->bindValue(':name', $name);
      $sql2->bindValue(':codigo', $codigo);
      $sql2->bindValue(':cpf', $cpf);
      $sql2->bindValue(':telefone1', $telefone1);
      $sql2->bindValue(':telefone2', $telefone2);
      $sql2->bindValue(':estado', $estado);
      $sql2->bindValue(':cidade', $cidade);
      $sql2->bindValue(':cep', $cep);
      $sql2->bindValue(':endereco', $endereco);
      $sql2->bindValue(':complemento', $complemento);
      $sql2->bindValue(':email', $email);
      $sql2->bindValue(':abertura', $abertura);
      $sql2->bindValue(':descricao', $descricao);
      $sql2->bindValue(':data', $data);
      $sql2->bindValue(':tipo', $tipo);
      $sql2->bindValue(':pes', $pes);
      
      $sql2 ->execute();
      return true ;

      header("Location: pessoa.php");
      exit;
    
}
}

?>