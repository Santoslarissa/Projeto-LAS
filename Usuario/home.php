<!-- Verifica se a pessoa fez o login.Se nao é redirecionado para pagina de acesso-->
<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit();
    } 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Ligaçao com a página de estilo-->
    <link rel="stylesheet" href="../CSS/stylesHome.css">

    <!--Logo do sistema na parte superior da página-->
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">

    <title>Home</title>
</head>
<body>

    <div class="tela-home">

        <div class="home-head">
            <img src="../assets/LogoAnimado.gif" class="logo-img" alt="Logo do sistema">
            <h1>SISTEMA DE GERENCIAMENTO E ESTOQUE</h1>
            <a href="../Usuario/sair.php" >
            <input type="submit" value="SAIR" class="sair">
            </a>
        </div>
        
        <div class="menu"> 
            <nav>
                <ul >
                    <li><a href = "./home.php">Inicio</a></li>
                    <li><a href = "../Produto/produto.php">Produto</a>
                        <ul>
                            <li><a href = "../Produto/novoProduto.php" >Novo Produto</a></li>
                            <li><a href = "../Produto/produto.php" >Lista de Produtos</a></li>
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
                    <li ><a href ="../Notas/notas.php" >Notas</a></li>
                    <li ><a href = "../Caixa/caixa.php" >Caixa</a></li>
                </ul>
            </nav>
        </div>
        
        <div class="home-background">
            <img src="../assets/Home-Background.png" class="home-img" alt="Imagem de fundo home">

        <div class="home-product">
            <img src="../assets/Box-1.png" class="box-img" alt="Caixas de Produto">
            <h1>Cadastro de produtos</h1>
            <h1>para controle do estoque</h1>
        </div>

        <div class="description-cadastrar">
            <li>A funcionalidade <a href = "../Produto/novoProduto.php" >Novo Poduto </a> permite ao usuário,
                logado no sistema, adicionar produtos, Especificando
                seu código de referência dentro do sistema, o nome
                de identificação, a data que o mesmo está sendo
                incluido, <br> o tipo/categoria ao qual pertence e
                a quantidade que está sendo recebida. 
            </li>
        </div>

        <div class="home-product-cad">
            <img src="../assets/Produtos-Cadastrados.png" class="hand-img" alt="Produtos Cadastro">
            <h1>Produtos no</h1>
            <h1>controle do estoque</h1>
        </div>

        <div class="description-product-cad">
            <li>A funcionalidade <a href = "../Produto/produto.php" >Produtos</a> permite ao usuário,
                visualizar todos os produtos que já foram
                cadastrados. Além de informações específicas
                de cada produto. 
            </li>
        </div>

        <div class="home-pessoa">
            <img src="../assets/Customers-icon.png" class="pessoa-img" alt="pessoa">
            <h1>Pessoas</h1>
        </div>

        <div class="pessoa-description">
            <li>A funcionalidade <a href = "../Pessoa/pessoa.php" >Pessoa</a>, permite a inserção de uma pessoa
                como cliente, fornecedor ou ambas as descrições.
            </li>
        </div>

        <div class="home-nota">
            <img src="../assets/Notas-icon.png" class="nota-img" alt="Notas">
            <h1>Emissão de Notas</h1>
        </div>

        <div class="nota-description">
            <li>A funcionalidade <a href ="../Notas/notas.php" >Notas</a> permite a emissão de NFs e relatórios de vendas. 
            </li>
        </div>

        <div class="home-caixa">
            <img src="../assets/Caixa-icon.png" class="caixa-img" alt="Caixa">
            <h1>Caixa</h1>
        </div>

        <div class="caixa-description">
            <li>O <a href = "../Caixa/caixa.php" >Caixa</a> permite a visualização do fluxo de entradas e saídas realizadas,<br>
                disponibilizando um saldo negativo ou positivo,que varia de acordo<br>
                com o fluxo decorrente.
            </li>
        </div>
         
        <div class="home-venda">
            <img src="../assets/Sales-icon.png" class="venda-img" alt="Vendas">
            <h1>Vendas</h1>
        </div>

        <div class="venda-description">
            <li>Na funcionalidade de Vendas, pode-se:<br>
                Registrar uma <a href = "../Vendas/venda.php" >Nova Venda</a>, selecionando o cliente e o produto que o mesmo irá comprar;<br>
                Visualizar a <a href = "../Vendas/listavenda.php">Lista Geral</a> de todas as vendas já realizadas;<br>
                Visualizar o <a href = "../Vendas/relatoriovenda.php">Relatorio</a> de vendas a partir de uma data inicial e uma data final.
            </li>
        </div>

        <div class="home-end">
            <li>Espaço reservado para contatos e informações
                inerentes ao desenvolvimento.
            </li>
        </div>

        </div>
    
    </div>

</body>
</html>