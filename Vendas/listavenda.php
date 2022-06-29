<?php

include_once("../conexao.php");
	$result_venda = "SELECT * FROM vendas";
	$resultado_venda = mysqli_query($pdo, $result_venda);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/modalvendas.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">

<title>Vendas</title>
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
                    <li ><a href = "./listavenda.php" >Vendas</a>
                        <ul>
                            <li><a href = "./venda.php">Nova Venda</a></li>
                            <li><a href = "./listavenda.php">Lista Geral de vendas</a></li>
                            <li><a href = "./relatoriovenda.php">Relatorio</a></li>
                        </ul>
                    </li>
                    <li ><a href ="../Notas/notas.php" >Notas</a></li>
                    <li ><a href = "../Caixa/caixa.php" >Caixa</a></li>
                </ul>
            </nav>
        </div>

        <div class="fundodetela">
            <img src="../assets/fundodetela.png" class="fundo-img" alt="Imagem de fundo">
        </div>

        <div class="listapessoa">
            <h1>Venda</h1>
        </div>

        <div class="formlistapessoa">

                <div class="cadastropessoa">
                    <h1>Lista de Vendas</h1>
                </div>
                
                <div class="tabelalistapessoa">

                <table border="1" width="100%">
                        <tr>
                            <th width="120px">NÚMERO</th>
                            <th width="120px">CÓD.CLIENTE</th>
                            <th width="300px">CLIENTE</th>
                            <th width="120px">INFORMAÇÕES</th>
                            <th width="150px">AÇÕES</th>
                        </tr>
                        
                        <?php while($rows_venda = mysqli_fetch_assoc($resultado_venda)){ ?>
                            
                        <tr>
                            <td><?php echo $rows_venda['numero']; ?></td>
                            <td><?php echo $rows_venda['codigo']; ?></td>
                            <td><?php echo $rows_venda['name']; ?></td>
                            <td>
    
                            <a class="modal-open" data-target="#myModal<?php echo $rows_venda['numero']; ?>" href="#modal<?php echo $rows_venda['numero']; ?>">Detalhar</a>
    
                            <div class="modal" id="modal<?php echo $rows_venda['numero']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    
                            <div class="modal-dialog" role="document">
                                    
                            <div class="modal-content">
                                <a href="#" class="modal-close" title="Close Modal">X</a>
                                
                                <h3><?php echo $rows_venda['codigo']; ?></h3>  
                                
                                <div class="modal-area">
                                    <p><b>Número</b>: <?php echo $rows_venda['numero']; ?></p>
                                    <p><b>Código</b>: <?php echo $rows_venda['codigo']; ?></p>
                                    <p><b>Nome do Cliente</b>: <?php echo $rows_venda['name']; ?></p>
    
                                    <p><b>Data de Registro</b>: <?php echo $rows_venda['data']; ?></p>
                                    <p><b>ID do Produto</b>: <?php echo $rows_venda['codigop']; ?></p>
                                    <p><b>Nome do Produto</b>: <?php echo $rows_venda['produto']; ?></p>
    
                                    <p><b>Preço</b>: <?php echo $rows_venda['preco']; ?></p>
                                    <p><b>Quantidade</b>: <?php echo $rows_venda['quantidade']; ?></p>
                                    <p><b>Quantidade Vendida</b>: <?php echo $rows_venda['qtdvenda']; ?></p>
                                    <p><b>Desconto</b>: <?php echo $rows_venda['desconto']; ?></p>
                                    <p><b>Total da Venda</b>: <?php echo $rows_venda['totalvenda']; ?></p>

                                    <p><b>Informações</b>: <?php echo $rows_venda['info']; ?></p>
                                    
                                </div>
                            </div>
                            </div>
                            
                            </td>
                            
                            <td>
                                <a href="./editarvenda.php?numero=<?=$rows_venda['numero']; ?>" class="btn-edicao">Editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="./excluirvenda.php?numero=<?=$rows_venda['numero']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn-exclusao">Excluir</a>
                            </td>
                            
                        </tr>
    
                        <?php } ?>
                        
                    </table>

                </div>
            </div> 
        </div>
</body>
</html>