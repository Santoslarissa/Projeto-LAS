<?php
	include_once("../conexao.php");
	$result_produtos = "SELECT * FROM produtos";
	$resultado_produtos = mysqli_query($pdo, $result_produtos);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../CSS/modalproduto.css">
    
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">

<title>Produtos</title>

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

        <div class="listaproduto">
            <h1>Produtos</h1>
        </div>
        
        <div class="formlistaproduto">
            <div class="listacadastro">
                <h1>Lista</h1>
            </div>
            
            <div class="tabelalistaproduto">
                <table border="1" width="100%">
                    <tr>
                        <th width="120px">CÓDIGO</th>
                        <th width="400px">NOME</th>
                        <th width="130px">QUANTIDADE</th>
                        <th width="120px">INFORMAÇÕES</th>
                        <th width="150px">AÇÕES</th>
                    </tr>
                    
                    <?php while($rows_produtos = mysqli_fetch_assoc($resultado_produtos)){ ?>
                        
                        <tr>
                            <td><?php echo $rows_produtos['codigop']; ?></td>
                            <td><?php echo $rows_produtos['produto']; ?></td>
                            <td><?php echo $rows_produtos['quantidade']; ?></td>
                            <td>

                            <a class="modal-open" data-target="#myModal<?php echo $rows_produtos['codigop']; ?>" href="#modal<?php echo $rows_produtos['codigop']; ?>">Detalhar</a>

                        <div class="modal" id="modal<?php echo $rows_produtos['codigop']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

							<div class="modal-dialog" role="document">
                                
                            <div class="modal-content">
                                <a href="#" class="modal-close" title="Close Modal">X</a>
                                <h3><?php echo $rows_produtos['produto']; ?></h3>  
                                  
                                
                                <div class="modal-area">
                                    
                                    
                                            <p><b>Código</b>: <?php echo $rows_produtos['codigop']; ?></p>
                                            <p><b>Nome do produto</b>: <?php echo $rows_produtos['produto']; ?></p>
                                            <p><b>Categoria</b>: <?php echo $rows_produtos['categoria']; ?></p>

                                            <p><b>Quantidade</b>: <?php echo $rows_produtos['quantidade']; ?></p>
                                            <p><b>Preço</b>: <?php echo $rows_produtos['preco']; ?></p>
                                            <p><b>Data de inclusão</b>: <?php echo $rows_produtos['data']; ?></p>

                                            <p><b>Descrição</b>: <?php echo $rows_produtos['descricao']; ?></p>
                                            <p><b>Imagem</b>: <?php echo $rows_produtos['imagem']; ?></p>
                                        
                                </div>
                            </div>
                        </div>
                            </td>
                        
                        <td>
                            <a href="./editar.php?codigop=<?=$rows_produtos['codigop']; ?>" class="btn-edicao">Editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="./excluir.php?codigop=<?=$rows_produtos['codigop']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn-exclusao">Excluir</a>
                        </td>
                        
                    </tr>

                    <?php } ?>
                    
                </table>
            </div>
        </div>
    </div>
</body>
</html>