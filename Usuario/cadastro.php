<?php
    require_once '../Usuario/usuarios.php';
    $user = new Usuario;
    //instancia a Classe que sera utilizada no final do arquivo
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--Ligaçao com a página de estilo-->
   <link rel="stylesheet" href="../CSS/styles.css">

   <!--Logo do sistema na parte superior da página-->
   <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">

    <title>Pagina de cadastro</title>
</head>
<body>
<form action="../Usuario/cadastro.php" method="post">
    <div class="main-login">
        
        <div class="left-login">
        <img src="../assets/Logo3D1.png" class="left-login-img" alt="Logo do sistema">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>NOVO USUÁRIO</h1>
                <div class="textfield">
                    <label for="usuario">Nome</label>
                    <!-- Maxlength define o tamanho do campo, limitando a quantidade de informações digitadas-->
                    <input type="text" name="nome" id ="nome" placeholder="Nome completo" maxlength="40">
                    
                </div>
                <div class="textfield">
                    <label for="email">Email</label>
                    <input type="text" name="email" id ="email" placeholder="Email" maxlength="40">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id ="senha" placeholder="Senha" maxlength="15">
                </div>
                <div class="textfield">
                    <label for="confsenha">Confirmar Senha</label>
                    <input type="password" name="confsenha" id ="confsenha" placeholder="Confirmar Senha" maxlength="15">
                </div>
                <input type="submit" class="button-login" id ="button" value="CADASTRAR"> 
                <a href = "./index.php">Tela de Login</a>
            </div>
        </div>
    </div>
    </form>
<?php
    //Verificar se o botão foi acionado
    if (isset($_POST['nome'])){

        //addslashes : evita ataques de hackers que queiram inserir informações maliciosas; 
        //evita erros na hora de executar um comando SQL
        $nome = addslashes ($_POST ['nome']);
        $email = addslashes ($_POST ['email']);
        $senha = addslashes ($_POST ['senha']);
        $confirmarSenha = addslashes ($_POST ['confsenha']);

        // Verificar se os campos estao preenchidos 
        if (!empty ($nome) && !empty ($email) && !empty ($senha) && !empty ($confirmarSenha))
        {
            $user->conectar ("projeto_las", "localhost", "root", "");
            if($user->msgErro == "")
            {
                if ($senha == $confirmarSenha)
                {
                    if($user -> cadastrar($nome,$email,$senha)){
                        echo '<script language="javascript">';
                        echo 'alert("Cadastro efetuado com sucesso! Faça login para acessar")';
                        echo '</script>';
                    }else
                    {
                        echo '<script language="javascript">';
                        echo 'alert("Email ja cadastrado!")';
                        echo '</script>';
                    }
                }else 
                {
                    echo '<script language="javascript">';
                    echo 'alert(" Senha e Confirmar senha não correspondem")';
                    echo '</script>';
                }
            }else 
            {   
                echo '<script language="javascript">';
                echo 'alert(" Erro: .$user->msgErro")';
                echo '</script>';
            }
        }else 
        {    
            echo '<script language="javascript">';
            echo 'alert(" Preencha todos os campos!")';
            echo '</script>';
        }
    }

    ?>
</body>
</html>
