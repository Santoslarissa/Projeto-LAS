<?php
    require_once './usuarios.php';
    $user = new Usuario;
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

    <title>Acesso ao Sistema</title>
</head>
<body>
    <form action="./index.php" method="POST">
    <!--A intenção foi colocar o logo criado ao lado do card com os elementos para o login-->
    <!--pra isso colocamos duas divs posicionada dentro de uma pronciapal, a div main-->
    <div class="main-login">

         <!--O logo será posicionado do lado esquerdo, usando a classe left-login-->
        <div class="left-login">
        <img src="../assets/Logo3D1.png" class="left-login-img" alt="Logo do sistema">
        </div>

        <!--Os elementos para realizar o login serão posicionados do lado direito, usando a classe right-login-->
        <div class="right-login">

            <!--A classe card-login vai organizar os campos nome de usuário e a senha-->
            <div class="card-login">
                <!--Login-->
                <h1>ACESSAR SISTEMA</h1>
                <div class="textfield">
                    <label for="usuario">Usuário</label>
                    <!-- Campo onde será digitado o nome de usuário. o campo placeholder vai apenas identificar o local para digitação-->
                    <input type="text" name="email" placeholder="Nome de usuário"> 
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Chave de acesso">
                </div>
                    <input type="submit" class="button-login" id ="button" value="ENTRAR">
                    <a href="../Usuario/cadastro.php">Não possui acesso? <strong> Cadastre-se aqui.</strong></a>
            </div>
        </div>
    </div>
    </form> 
    <?php
    //Verificar se o botão foi acionado
    if(isset($_POST['email'])){
        
        $email = addslashes ($_POST ['email']);
        $senha = addslashes ($_POST ['senha']);

        // Verificar se os campos estao preenchidos 
        if (!empty ($email) && !empty($senha))
        {
           $user->conectar("projeto_las", "localhost","root", "");
            if($user->msgErro == "")
            {
                if ($user->logar($email,$senha))
                {
                    header("location:home.php");
                }else
                {
                    echo '<script language="javascript">';
                    echo 'alert("Ops! Email e/ou senha incorretos.")';
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
                echo 'alert("Informe as credenciais!")';
                echo '</script>';
            }    
    }
    ?>
</body>
</html>