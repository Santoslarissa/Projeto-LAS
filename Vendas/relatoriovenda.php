<?php
include_once "../config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/modalrelatorio.css">
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
                    </ul></li>
                    <li><a href = "../Pessoa/pessoa.php" >Pessoa</a>
                    <ul>
                        <li><a href = "../Pessoa/pessoa.php">Nova Pessoa</a></li>
                        <li><a href = "../Pessoa/clientelista.php">Lista de Clientes</a></li>
                        <li><a href = "../Pessoa/fornecedorlista.php">Lista de Fornecedores</a></li>
                    </ul></li>
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
                <h1>Relatorio</h1>
            </div>
            
            <?php $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); ?>
            
            <form method="POST" action="">
                <?php $data_inicio = "";
                if (isset($dados['data_inicio'])) {
                    $data_inicio = $dados['data_inicio'];
                } ?>
                
                <label>Data Inicial</label>
                <input type="date" name="data_inicio" value="<?php echo $data_inicio; ?>">
                
                <?php $data_final = "";
                if (isset($dados['data_final'])) {
                    $data_final = $dados['data_final'];
                } ?>
                
                <label>Data final</label>
                <input type="date" name="data_final" value="<?php echo $data_final; ?>">

                <input type="submit" value="Pesquisar" name="PesqEntreData"><br><br>
                
                <div class="tabelalistapessoa">
                    <table border="1"  width="100%">
                        <tr>
                            <th>NÚMERO</th>
                            <th>CÓD.PRODUTO</th>
                            <th>PRODUTO</th>
                            <th>INFORMAÇÕES</th>
                        </tr>

                <?php if (!empty($dados['PesqEntreData'])) {
                    $query_vendas = "SELECT numero, codigo, name, data, codigop, produto, preco, quantidade, qtdvenda, desconto, totalvenda, info FROM vendas WHERE data BETWEEN :data_inicio AND :data_final";
                    $result_vendas = $pdo->prepare($query_vendas);
                    $result_vendas->bindParam(':data_inicio', $dados['data_inicio']);
                    $result_vendas->bindParam(':data_final', $dados['data_final']);
                    $result_vendas->execute(); ?>
                    
                    <?php while ($row_venda = $result_vendas->fetch(PDO::FETCH_ASSOC)) {
                        extract($row_venda); ?>
                        
                        <tr>
                            <td><?php echo $numero; ?></td>
                            <td><?php echo $codigop; ?></td>
                            <td><?php echo $produto; ?></td>
                            <td>
                                <a class="modal-open" data-target="#myModal<?php echo $row_venda['numero']; ?>" href="#modal<?php echo $row_venda['numero']; ?>">Detalhar</a>
                                
                                <div class="modal" id="modal<?php echo $row_venda['numero']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <a href="#" class="modal-close" title="Close Modal">X</a>
                                        <h3><?php echo $row_venda['codigo']; ?></h3>  
                                        
                                        <div class="modal-area">
                                            <p><b>Número</b>: <?php echo $row_venda['numero']; ?></p>
                                            <p><b>Código do Produto</b>: <?php echo $row_venda['codigop']; ?></p>
                                            <p><b>Nome do Produto</b>: <?php echo $row_venda['name']; ?></p>
                                            
                                            <p><b>Registro da Venda</b>: <?php echo " " . date('d/m/Y', strtotime($data)) . " "; ?></p>
                                            <p><b>Código do Cliente</b>: <?php echo $row_venda['codigop']; ?></p>
                                            <p><b>Nome do Cliente</b>: <?php echo $row_venda['produto']; ?></p>
                                            
                                            <p><b>Preço</b>: <?php echo $row_venda['preco']; ?></p>
                                            <p><b>Quantidade</b>: <?php echo $row_venda['quantidade']; ?></p>
                                            <p><b>Quantidade Vendida</b>: <?php echo $row_venda['qtdvenda']; ?></p>
                                            <p><b>Desconto</b>: <?php echo $row_venda['desconto']; ?></p>
                                            <p><b>Total da Venda</b>: <?php echo $row_venda['totalvenda']; ?></p>
                                            
                                            <p><b>Informações</b>: <?php echo $row_venda['info']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </td>
                        </tr>
                             
                    <?php } ?>
                    <?php } ?>
                    
                </table>
            </div>
        </form>
    </div>
</div>
</body>
</html>