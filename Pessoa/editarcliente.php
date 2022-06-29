<?php
require '../config.php';

$info = [];
$codigo = filter_input(INPUT_GET, 'codigo');
if($codigo) {

    $sql = $pdo ->prepare("SELECT * FROM cliente WHERE codigo = :codigo");
    $sql ->bindValue(':codigo', $codigo);
    $sql ->execute();

    if($sql->rowCount() > 0) {

        $info = $sql->fetch( PDO::FETCH_ASSOC ); 

    } else {
        header("Location: editarcliente.php");
        exit;
    }
    
} else {
    header("Location: editarcliente.php");
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

<title>Pessoa</title>
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

        <div class="titulo-produto">
            <h1>Pessoa</h1>
        </div>

        <div class="form">
            
                <div class="titulo-cadastro">
                    <h1>Dados para cadastro</h1>
                </div>
                <form method="POST" action="./editarcliente_action.php">
                <div class="linha-nome">
                    <input type="hidden" name="codigo" value="<?=$info ['codigo'];?>">
                    <label for="name">Nome Completo</label> &nbsp; 
                    <input type="text" name="name" size="35" value="<?=$info ['name'];?>"placeholder="Nome do pessoa">
                    <label for="data">Data de nascimento</label> &nbsp;
                    <input type="date" name="data" value="<?=$info ['data'];?>"id="data"><br><br>
                </div>

                <div class="linha-tipo">
                    <label for="cpf">CPF/CNPJ</label> &nbsp; &nbsp;
                    <input type="text" name="cpf" size="35" value="<?=$info ['cpf'];?>" placeholder="Somente números"><br>
                    <label for="telefone1">Telefone 1</label> &nbsp; &nbsp;
                    <input type="text" name="telefone1" size="21" value="<?=$info ['telefone1'];?>" placeholder="Fixo">
                    <label for="telefone2">Telefone 2</label> &nbsp; &nbsp;
                    <input type="text" name="telefone2" size="21" value="<?=$info ['telefone2'];?>"placeholder="Celular">
                </div>

                <div class="linha-pessoa">
                    <label for="pes">Pessoa</label> &nbsp; 
                    <select name="pessoa" id="pes">
                         <option value="0">Escolha sua opção</option>
                        <option value="pfisica">Física</option>
                        <option value="pjuridica">Jurídica</option>
                    </select> 
                </div>

                <div class="titulo-endereco">
                    <h1>Endereço</h1>
                </div>

                <div class="linha-endereco">
                    <label for="estado">Estado-UF</label> &nbsp; &nbsp;
                    <input type="text" name="estado" value="<?=$info ['estado'];?>" size="35" placeholder="Unidade da federação">
                    <label for="cidade">Cidade</label> &nbsp; &nbsp;
                    <input type="text" name="cidade" size="38" value="<?=$info ['cidade'];?>" placeholder="Nome da cidade">
                    <label for="cep">CEP</label> &nbsp; &nbsp;
                    <input type="text" name="cep" size="20" value="<?=$info ['cep'];?>" placeholder="Código postal">
                </div>

                <div class="linha-bairro">
                    <label for="endereco">Endereço</label> &nbsp; &nbsp;
                    <input type="text" name="endereco" size="36" value="<?=$info ['endereco'];?>" placeholder="Quadra, rua, bloco">
                    <label for="complemento">Complemento</label> &nbsp; &nbsp;
                    <input type="text" name="complemento" size="66" value="<?=$info ['complemento'];?>" placeholder="Fixo">
                </div>

                <div class="titulo-info">
                    <h1>Informações Adicionais</h1>
                </div>

                <div class="linha-info-adicional">
                    <label for="email">e-mail</label> &nbsp; &nbsp; 
                    <input type="text" name="email" size="40" value="<?=$info ['email'];?>" placeholder="Endereço eletrônico">
                    <label for="abertura">Data de abertura</label> &nbsp; &nbsp;
                    <input type="date" name="abertura" value="<?=$info ['abertura'];?>" id="data"><br><br>
                </div>

                <div class="linha-descricao">
                    <label for="descricao">Obs</label>
                    <textarea name="descricao" id="descricao" value="<?=$info ['descricao'];?>" placeholder="Informação adicional"></textarea>
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
</body>
</html>