<?php
    require_once './produto_action.php';
    $user = new Produto;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/stylesnovoProduto.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">

<title>Novo Produto</title>
</head>
<body>

    <div class="container-all">

        <div class="container-header">
            <img src="../assets/LogoAnimado.gif" class="logo-img" alt="Logo do sistema">
            <h1>SISTEMA DE GERENCIAMENTO E ESTOQUE</h1>
                <a href="../Usuario/sair.php" >
                   <input type="submit" value="SAIR" class="sair">
                </a>
        </div>
        
        <div class="container-menu"> 
            <nav>
                <ul >
                <li><a href = "../Usuario/home.php">Inicio</a></li>
                    <li><a href = "./produto.php">Produto</a>
                        <ul>
                            <li><a href = "./novoProduto.php" >Novo Produto</a></li>
                            <li><a href = "./produto.php" >Lista de Produtos</a></li>
                        </ul>
                    </li>
                    
                    <li><a href = "../Pessoa/pessoa.php" >Pessoa</a>
                        <ul>
                            <li><a href = "../Pessoa/pessoa.php">Nova Pessoa</a></li>
                            <li><a href = "../Pessoa/clientelista.php">Lista de Clientes</a></li>
                            <li><a href = "../Pessoa/fornecedorlista.php">Lista de Fornecedores</a></li>
                        </ul>
                    </li>
                    <li ><a href = "../Vendas/listavenda.php" >Vendas</a>
                        <ul>
                            <li><a href = "../Vendas/venda.php">Nova Venda</a></li>
                            <li><a href = "../Vendas/listavenda.php">Lista Geral de vendas</a></li>
                            <li><a href = "../Vendas/relatoriovenda.php">Relatorio</a></li>
                        </ul>
                    </li>
                    <li ><a href = "../Notas/notas.php" >Notas</a></li>
                    <li ><a href = "../Caixa/caixa.php" >Caixa</a></li>
                </ul>
            </nav>
        </div>

        <div class="titulo-produto">
            <h1>Novo Produto</h1>
        </div>

        <div class="formproduto">
            
                <div class="titulo-cadastro">
                    <h1>Cadastro</h1>
                </div>
                <form method = "POST" action="./novoProduto.php">
                <div class="linha-nome">
                    <label for="name">Nome</label> &nbsp; 
                    <input type="text" name="produto" size="45" placeholder="Nome do produto"/>
                    <label for="data">Data de Inclusão</label> &nbsp;
                    <input type="date" name="data" id="data"><br><br>
                </div>

                <div class="linha-categoria">
                    <label for="ct">Categoria</label> &nbsp; 
                    <select name="categoria" id="ct">
                         <option value="0">Escolha sua opcao</option>
                        <optgroup label="Alimentícios"></optgroup>
                        <option value="Longa durabilidade">Longa durabilidade</option>
                        <option value="média durabilidade">média durabilidade</option>
                        <option value="curta durabilidade">curta durabilidade</option>
                        <optgroup label="Eletrônicos"></optgroup>
                        <option value="Imagem e som">Imagem e som</option>
                        <option value="Informática">Informática</option>
                        <option value="Videogames">Videogames</option>
                        <optgroup label="Escritório"></optgroup>
                        <option value="Móveis">Móveis</option>
                        <option value="Decorativos">Decorativos</option>
                        <option value="Trabalho">Trabalho</option>
                    </select> 
                    <label for="quantidade">Quantidade</label> &nbsp; 
                    <input type="text" name= "quantidade" placeholder="Quantidade do produto"><br>
                    <label for="preco">Preço Unitário</label> &nbsp; 
                    <input type="text" name= "preco" placeholder="Preço unitário"><br>
                    
                    
                </div>
                <div class="linha-descricao">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" placeholder="Breve descrição do produto"></textarea>
                    <label for="imagem">Foto do produto</label> &nbsp; 
                    
                    <input type="file" name="imagem" id="imagem" onchange="previewImagem()">&nbsp;&nbsp;
                    <img name="imagem" style="width: auto; height: 150px;">
                    
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                </div>

                <input type="submit" value="Enviar"> &nbsp; &nbsp;
                <input type="button" value="Voltar"> &nbsp; &nbsp;
            </form>
        </div> 

        <div class="produto-end">
            <li>Espaço reservado para contatos e informações
                inerentes ao desenvolvimento.
            </li>
        </div> 
         
    </div>

    <?php
    //Verificar se o botão foi acionado
    if (isset($_POST['produto'])){

        $produto = addslashes ($_POST ['produto']);
        $codigop = addslashes ($_POST ['codigop']);
        $categoria = addslashes ($_POST ['categoria']);
        $quantidade = addslashes ($_POST ['quantidade']);
        $preco = addslashes ($_POST ['preco']);
        $imagem = addslashes ($_POST ['imagem']);
        $descricao = addslashes ($_POST ['descricao']);
        $data = addslashes ($_POST ['data']);

        // Verifica se os campos estao preenchidos 
        if (!empty ($produto) && !empty ($categoria) && !empty ($quantidade) && !empty ($preco)
        && !empty ($imagem) && !empty ($descricao) && !empty ($data))
        { 
            $user->conectar ("projeto_las", "localhost", "root", "");
            if($user->msgErro == "")
            {   
                    if($user ->cadastrarP($produto, $codigop, $categoria,$quantidade,$preco, $imagem, $descricao, $data)){
                        echo '<script language="javascript">';
                        echo 'alert("Cadastro efetuado com sucesso!")';
                        echo '</script>';
                    }else
                    {
                        echo '<script language="javascript">';
                        echo 'alert("Codigo ja cadastrado!")';
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

<script>
function previewImagem(){
    var imagem = document.querySelector('input[name=imagem]').files[0];
    var preview = document.querySelector('img[name=imagem]');
    var reader = new FileReader();
    reader.onloadend = function () {
        preview.src = reader.result;
    }
    
    if(imagem){
        reader.readAsDataURL(imagem);
    }else{
        preview.src = "";
    }
    }
</script>