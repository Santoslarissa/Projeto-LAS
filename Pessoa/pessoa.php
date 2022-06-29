<?php
    include_once ("./pessoa_action.php");
    $user = new pessoa;
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
                <form method="POST" action="pessoa.php">
                <div class="linha-nome">
                    <label for="name">Nome Completo</label> &nbsp; 
                    <input type="text" name="name" size="35" placeholder="Nome do pessoa">
                    <label for="data">Data de nascimento</label> &nbsp;
                    <input type="date" name="data" id="data"><br><br>
                </div>

                <div class="linha-tipo">
                    <label for="cpf">CPF/CNPJ</label> &nbsp; &nbsp;
                    <input type="text" name="cpf" size="35" placeholder="Somente números"><br>
                    <label for="telefone1">Telefone 1</label> &nbsp; &nbsp;
                    <input type="text" name="telefone1" size="21" placeholder="Fixo">
                    <label for="telefone2">Telefone 2</label> &nbsp; &nbsp;
                    <input type="text" name="telefone2" size="21" placeholder="Celular">
                </div>

                <div class="linha-pessoa">
                    <label for="pes">Pessoa</label> &nbsp; 
                    <select name="pes" id="pes">
                         <option value="0">Escolha sua opção</option>
                        <option value="fisica">Física</option>
                        <option value="juridica">Jurídica</option>
                    </select> 
                    <label for="tipo">Tipo</label> &nbsp; 
                    <select name="tipo" id="tipo">
                         <option value="0">Escolha sua opção</option>
                        <option value="cliente">Cliente</option>
                        <option value="fornecedor">Fornecedor</option>
                        <option value="ambos">Cliente e Fornecedor</option>
                    </select>
                </div>

                <div class="titulo-endereco">
                    <h1>Endereço</h1>
                </div>

                <div class="linha-endereco">
                    <label for="estado">Estado-UF</label> &nbsp; &nbsp;
                    <input type="text" name="estado" size="35" placeholder="Unidade da federação">
                    <label for="cidade">Cidade</label> &nbsp; &nbsp;
                    <input type="text" name="cidade" size="38" placeholder="Nome da cidade">
                    <label for="cep">CEP</label> &nbsp; &nbsp;
                    <input type="text" name="cep" size="20" placeholder="Código postal">
                </div>

                <div class="linha-bairro">
                    <label for="endereco">Endereço</label> &nbsp; &nbsp;
                    <input type="text" name="endereco" size="36" placeholder="Quadra, rua, bloco">
                    <label for="complemento">Complemento</label> &nbsp; &nbsp;
                    <input type="text" name="complemento" size="66" placeholder="Fixo">
                </div>

                <div class="titulo-info">
                    <h1>Informações Adicionais</h1>
                </div>

                <div class="linha-info-adicional">
                    <label for="email">e-mail</label> &nbsp; &nbsp; 
                    <input type="text" name="email" size="40" placeholder="Endereço eletrônico">
                    <label for="abertura">Data de cadastro</label> &nbsp; &nbsp;
                    <input type="date" name="abertura" id="data"><br><br>
                </div>

                <div class="linha-descricao">
                    <label for="descricao">Obs</label>
                    <textarea name="descricao" id="descricao" placeholder="Informação adicional"></textarea>
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
    if (isset($_POST['name'])){

        $name = addslashes ($_POST ['name']);
        $codigo = addslashes ($_POST ['codigo']);
        $cpf = addslashes ($_POST ['cpf']);
        $telefone1 = addslashes ($_POST ['telefone1']);
        $telefone2 = addslashes ($_POST ['telefone2']);
        $estado = addslashes ($_POST ['estado']);
        $cidade = addslashes ($_POST ['cidade']);
        $cep = addslashes ($_POST ['cep']);
        $endereco = addslashes ($_POST ['endereco']);
        $complemento = addslashes ($_POST ['complemento']);
        $email = addslashes ($_POST ['email']);
        $abertura = addslashes ($_POST ['abertura']);
        $descricao = addslashes ($_POST ['descricao']);
        $data = addslashes ($_POST ['data']);
        $tipo = addslashes ($_POST ['tipo']);
        $pes = addslashes ($_POST ['pes']);

        // Verifica se os campos estao preenchidos 
        if (!empty ($name) && !empty ($cpf) && !empty ($telefone1) && !empty ($telefone2)
             && !empty ($estado) && !empty ($cidade) && !empty ($cep) && !empty ($endereco)  && !empty ($complemento)
             && !empty ($email) && !empty ($abertura) && !empty ($data) && !empty ($tipo) && !empty ($pes))
        { 
            $user->conectar ("projeto_las", "localhost", "root", "");
            if($user->msgErro == "")
            {
                    switch ($tipo){
                    case 'cliente':
                    {
                        ($user -> cadastrarC ($name, $codigo, $cpf, $telefone1, $telefone2, $estado, 
                        $cidade, $cep, $endereco, $complemento, $email, $abertura,$descricao, $data, $tipo, $pes));
                            echo '<script language="javascript">';
                            echo 'alert("Cadastro de cliente efetuado com sucesso!")';
                            echo '</script>';
                        break;
                    }
                        case 'fornecedor';
                        {
                            ($user -> cadastrarF($name, $codigo, $cpf, $telefone1, $telefone2, $estado, 
                            $cidade, $cep, $endereco, $complemento, $email, $abertura,$descricao, $data, $tipo, $pes));
                                echo '<script language="javascript">';
                                echo 'alert("Cadastro de fornecedor efetuado com sucesso!")';
                                echo '</script>';
                            break;
                        }
                            case 'ambos':
                            {
                                ($user -> cadastrarambos ($name, $codigo, $cpf, $telefone1, $telefone2, $estado, 
                                $cidade, $cep, $endereco, $complemento, $email, $abertura,$descricao, $data, $tipo, $pes));
                                    echo '<script language="javascript">';
                                    echo 'alert("Cadastro Cliente e Fornecedor efetuado com sucesso!")';
                                    echo '</script>';
                                break;
                            }
                            default: 
                                {   
                                    echo '<script language="javascript">';
                                    echo 'alert("Nenhum tipo selecionado!")';
                                    echo '</script>';
                                }
                                break;
                    }

            }else 
            {   

                echo '<script language="javascript">';
                echo 'alert("Erro: .$user->msgErro")';
                echo '</script>';
            }
        }else 
        {    
              
            echo '<script language="javascript">';
            echo 'alert("Preencha todos os campos!")';
            echo '</script>';
        }
    }

    ?>
</body>
</html>