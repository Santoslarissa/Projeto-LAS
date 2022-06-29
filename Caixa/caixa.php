<?php
include_once "../config.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/modalvendas.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">

<title>Caixa</title>
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
                    <li ><a href = "./caixa.php" >Caixa</a></li>
                </ul>
            </nav>
        </div>

        <div class="fundodetela">
            <img src="../assets/fundodetela.png" class="fundo-img" alt="Imagem de fundo">
        </div>

        <div class="listapessoa">
            <h1>Caixa</h1>
        </div>

        <div class="formlistapessoa">

                <div class="cadastropessoa">
                    <h1>Resumo Financeiro</h1>
                </div>
                
                
                <?php

                    $query_compra = "SELECT SUM(quantidade * preco) AS valor_estoque FROM produtos";
                    $result_compra = $pdo->prepare($query_compra);
                    $result_compra->execute();
                    // fetch(PDO::FETCH_ASSOC) - coloca os resultados em uma matriz onde os valores são 
                    //  mapeados para seus nomes de colunas.

                    //number_format vai formatar o valor do numero gerado
                    $row_compra = $result_compra->fetch(PDO::FETCH_ASSOC);
                    echo "    Entradas (compra): R$ " . number_format($row_compra['valor_estoque'], 2, ",", ".")  . "<br><br>";


                    $query_venda = "SELECT SUM(totalvenda) AS valor_estoque FROM vendas";
                    $result_venda = $pdo->prepare($query_venda);
                    $result_venda->execute();

                    $row_venda = $result_venda->fetch(PDO::FETCH_ASSOC);
                    echo "Saídas (venda): R$ " . number_format($row_venda['valor_estoque'], 2, ",", ".")  . "<br><br>";

                    $lucro = $row_venda['valor_estoque'] - $row_compra['valor_estoque'];
                    echo "Caixa: R$ " . number_format($lucro, 2, ",", ".") . " <br><br>";

                ?>

            </div> 
        </div>

</body>
</html>