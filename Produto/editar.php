<?php
    include_once("./produto_action.php");
    $user = new Produto;
?>
<?php
include_once("../config.php");

$info = [];
$codigop = filter_input(INPUT_GET, 'codigop');
if($codigop) {

    $sql = $pdo ->prepare("SELECT * FROM produtos WHERE codigop = :codigop");
    $sql ->bindValue(':codigop', $codigop);
    $sql ->execute();

    if($sql->rowCount() > 0) {

        $info = $sql->fetch( PDO::FETCH_ASSOC ); 

    } else {
        header("Location: novoProduto.php");
        exit;
    }
    
} else {
    header("Location: produto.php");
    exit;
}
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

        <div class="fundodetela">
            <img src="../assets/fundodetela.png" class="fundo-img" alt="Imagem de fundo">
        </div>



        <div class="titulo-editaproduto">
            <h1>Produto</h1>
        </div>

        <div class="formeditaproduto">
            
                <div class="titulo-editacadastro">
                    <h1>Editar Produto</h1>
                </div>
                <form method="POST" action="./editar_action.php">
                <div class="linha-nome">
                    <input type="hidden" name="codigop" value="<?=$info ['codigop'];?>">
                    <label for="name">Nome</label> &nbsp; 
                    <input type="text" name="produto" value="<?=$info ['produto'];?>"size="45" placeholder="Nome do produto" />
                    <label for="data">Data de Inclusão</label> &nbsp;
                    <input type="date" name="data" value="<?=$info ['data'];?>" id="data"><br><br>
                </div>

                <div class="linha-categoria">
                    <label for="ct">Categoria</label> &nbsp; 
                    <select name="categoria" value="<?=$info ['categoria'];?>" id="ct">
                         <option value="0">Escolha sua opcao</option>
                        <optgroup label="Alimentícios"></optgroup>
                        <option value="Longa durabilidade">Longa durabilidade</option>
                        <option value="média durabilidade">média durabilidade</option>
                        <option value="curta durabilidade">curta durabilidade</option>
                        <optgroup label="Eletrônicos"></optgroup>
                        <option value="Imagem e Som">Imagem e som</option>
                        <option value="Informática">Informática</option>
                        <option value="Videogames">Videogames</option>
                        <optgroup label="Escritório"></optgroup>
                        <option value="Móveis">Móveis</option>
                        <option value="Decorativos">Decorativos</option>
                        <option value="Trabalho">Trabalho</option>
                    </select> 
                    <label for="quantidade">Quantidade</label> &nbsp; 
                    <input type="text" name= "quantidade" value="<?=$info ['quantidade'];?>" placeholder="Quantidade do produto"><br>
                    <label for="preco">Preço Unitário</label> &nbsp; 
                    <input type = "text" name= "preco" value="<?=$info ['preco'];?>" placeholder="Preço unitario"><br>
                    <label for="imagem">Foto do produto</label> &nbsp; 
                    <input type="file" name="imagem" value="<?=$info ['imagem'];?>" />
                </div>
                <div class="linha-descricao">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" value="<?=$info ['descricao'];?>" placeholder="Breve descrição do produto"></textarea>
                </div>
                
                

                <input type="submit" value="Editar"> &nbsp; &nbsp;
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
    /*
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
        && !empty ($descricao) && !empty ($data))
        { 
            $user->conectar ("projeto_las", "localhost", "root", "");
            if($user->msgErro == "")
            {   
                    if($user ->editarP($produto, $codigop, $categoria,$quantidade,$preco, $imagem, $descricao, $data))
                        echo '<script language="javascript">';
                        echo 'alert("Edição efetuada com sucesso!")';
                        echo '</script>';
                    
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
    */
    ?>
</body>
</html>



