<?php
Class Usuario{
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
    public function cadastrar ($nome,$email,$senha){
        global $pdo;
    //Primeiro : Verificar se ja existe o email cadastrado
    $sql = $pdo -> prepare ("SELECT id_usuario FROM usuarios WHERE email = :e");
    $sql -> bindValue(":e",$email);
    $sql-> execute ();
    // Função rowCount conta as linhas que veio do banco de dados
    if ($sql -> rowCount() > 0){
        return false; // ou seja, ja tem cadastro
    }
    //Se nao, cadastra
    else
    {
        $sql=$pdo ->prepare("INSERT INTO usuarios (nome, 
        email,senha)VALUES (:n, :e, :s)");
        $sql -> bindValue(":n",$nome);
        $sql -> bindValue(":e",$email);
        $sql -> bindValue(":s",md5($senha));
        $sql-> execute(); 
        return true ;

    }
  

    }
    public function logar($email,$senha){
        global $pdo;
        //Primeiro: Verificar se o email e senha estao cadastrados
        $sql = $pdo->prepare ("SELECT id_usuario FROM usuarios WHERE
        email = :e AND senha = :s");
        $sql -> bindValue(":e",$email);
        $sql -> bindValue(":s",md5($senha));
        $sql-> execute(); 
        if ($sql->rowCount() > 0){
        // Se estiver, entra no sistema 
            $dado = $sql->fetch(); //fetch pega tudo que veio do banco de dados e transforma em um Array, com os nomes das colunas
            session_start();
            $_SESSION['id_usuario'] = $dado ['id_usuario'];
            return true; //acesso foi concedido
        }else {
            return false; //acesso negado
        }

    }
}

?>