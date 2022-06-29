<?php
	include_once("../conexao.php");
	$result_fornecedor = "SELECT * FROM fornecedor";
	$resultado_fornecedor = mysqli_query($pdo, $result_fornecedor);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/modalfornecedor.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">

<title>Fornecedores</title>
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
                    
                    <li><a href = "./pessoa.php" >Pessoa</a>
                        <ul>
                            <li><a href = "./pessoa.php">Nova Pessoa</a></li>
                            <li><a href = "./clientelista.php">Lista de Clientes</a></li>
                            <li><a href = "./fornecedorlista.php">Lista de Fornecedores</a></li>
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

        <div class="fundodetela">
            <img src="../assets/fundodetela.png" class="fundo-img" alt="Imagem de fundo">
        </div>

        <div class="listapessoa">
            <h1>Fornecedor</h1>
        </div>

        <div class="formlistapessoa">

                <div class="cadastropessoa">
                    <h1>Lista</h1>
                </div>
                
                <div class="tabelalistapessoa">

                    <table border="1" width="100%">
                        <tr>
                            <th width="120px">CÓDIGO</th>
                            <th width="400px">NOME</th>
                            <th width="130px">CPF/CNPJ</th>
                            <th width="120px">INFORMAÇÕES</th>
                            <th width="150px">AÇÕES</th>
                        </tr>
                        
                        <?php while($rows_fornecedor = mysqli_fetch_assoc($resultado_fornecedor)){ ?>
                            
                        <tr>
                            <td><?php echo $rows_fornecedor['codigo']; ?></td>
                            <td><?php echo $rows_fornecedor['name']; ?></td>
                            <td><?php echo $rows_fornecedor['cpf']; ?></td>
                            <td>
    
                            <a class="modal-open" data-target="#myModal<?php echo $rows_fornecedor['codigo']; ?>" href="#modal<?php echo $rows_fornecedor['codigo']; ?>">Detalhar</a>
    
                            <div class="modal" id="modal<?php echo $rows_fornecedor['codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    
                            <div class="modal-dialog" role="document">
                                    
                            <div class="modal-content">
                                <a href="#" class="modal-close" title="Close Modal">X</a>
                                
                                <h3><?php echo $rows_fornecedor['name']; ?></h3>  
                                
                                <div class="modal-area">
                                    <p><b>Código</b>: <?php echo $rows_fornecedor['codigo']; ?></p>
                                    <p><b>Nome</b>: <?php echo $rows_fornecedor['name']; ?></p>
                                    <p><b>CPF/CNPJ</b>: <?php echo $rows_fornecedor['cpf']; ?></p>
    
                                    <p><b>Data de Nascimento</b>: <?php echo $rows_fornecedor['data']; ?></p>
                                    <p><b>Pessoa</b>: <?php echo $rows_fornecedor['pes']; ?></p>
                                    <p><b>Tipo</b>: <?php echo $rows_fornecedor['tipo']; ?></p>
    
                                    <p><b>Estado-UF</b>: <?php echo $rows_fornecedor['estado']; ?></p>
                                    <p><b>Cidade</b>: <?php echo $rows_fornecedor['cidade']; ?></p>
                                    <p><b>CEP</b>: <?php echo $rows_fornecedor['cep']; ?></p>
                                    <p><b>Endereço</b>: <?php echo $rows_fornecedor['endereco']; ?></p>
                                    <p><b>Complemento</b>: <?php echo $rows_fornecedor['complemento']; ?></p>

                                    <p><b>Telefone (1)</b>: <?php echo $rows_fornecedor['telefone1']; ?></p>
                                    <p><b>Telefone (2)</b>: <?php echo $rows_fornecedor['telefone2']; ?></p>
                                    <p><b>E-mail</b>: <?php echo $rows_fornecedor['email']; ?></p>

                                    <p><b>Data de Abertura</b>: <?php echo $rows_fornecedor['abertura']; ?></p>
                                    <p><b>Fato</b>: <?php echo $rows_fornecedor['descricao']; ?></p>
                                </div>
                            </div>
                            </div>
                            
                            </td>
                            
                            <td>
                                <a href="./editarfornecedor.php?codigo=<?=$rows_fornecedor['codigo']; ?>" class="btn-edicao">Editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="./excluirfornecedor.php?codigo=<?=$rows_fornecedor['codigo']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn-exclusao">Excluir</a>
                            </td>
                            
                        </tr>
    
                        <?php } ?>

                    </table>
                </div>
            </div> 
        </div>

</body>
</html>