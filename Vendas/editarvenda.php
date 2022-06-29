
<?php
include_once("../config.php");

$info = [];
$numero = filter_input(INPUT_GET, 'numero');
if($numero) {

    $sql = $pdo ->prepare("SELECT * FROM vendas WHERE numero = :numero");
    $sql ->bindValue(':numero', $numero);
    $sql ->execute();

    if($sql->rowCount() > 0) {

        $info = $sql->fetch( PDO::FETCH_ASSOC ); 

    } else {
        header("Location: listavenda.php");
        exit;
    }
    
} else {
    header("Location: listavenda.php");
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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

<title>Registrar Venda</title>
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

        <div class="titulo-formulario">
            <h1>Vendas </h1>
        </div>

        <div class="corpo-formulario">
            
                <div class="campos-formulario">
                    <h1> Registrar Venda</h1>
                </div>
                <form method = "POST" action="./editar_action.php">
                <div class="linha1-formulario">
                    <input type="hidden" name="numero" value="<?=$info ['numero'];?>">
                    <label for="codigo">Código Cliente</label> &nbsp;
                    <input type="text" name= "codigo" value="<?=$info ['codigo'];?>"placeholder="Código do Cliente"><br><br>
                    <label for="name">Cliente</label> &nbsp;
                    <input type="text" name= "name" value="<?=$info ['name'];?>" placeholder="Nome do Cliente" readonly ><br><br>
                    <label for="data">Data de Registro</label> &nbsp;
                    <input type="date" name="data" value="<?=$info ['data'];?>"id="data"><br><br>
                </div>

                <div class="linha2-formulario">
                    <label for="codigop">Cod Produto</label> &nbsp; 
                    <input name="codigop" id="codigop" value="<?=$info ['codigop'];?>"size ="15" placeholder="Código do Produto"> &nbsp; &nbsp; &nbsp; &nbsp
                    <label for="pdt">Produto</label> &nbsp; 
                    <input name="produto" id="pdt" value="<?=$info ['produto'];?>"placeholder="Nome do Produto"readonly > &nbsp; &nbsp; &nbsp; &nbsp
                    <label for="preco">Preço Unitário</label> &nbsp; 
                    <input name="preco" id="preco" size ="15" value="<?=$info ['preco'];?>"placeholder="Preço unitário" readonly > &nbsp; &nbsp; &nbsp; &nbsp
                    <label for="quantidade">Estoque</label> &nbsp; 
                    <input name="quantidade" id="quantidade" size ="15" value="<?=$info ['quantidade'];?>"placeholder="Estoque" readonly > &nbsp; &nbsp; &nbsp; &nbsp
                </div>

                <div class="linha3-formulario">
                    <label for="qtdvenda">Quantidade</label> &nbsp; 
                    <input type="number" name= "qtdvenda" id ="qtdvenda" value="<?=$info ['qtdvenda'];?>"placeholder="Quantidade vendida" min= "1" size ="15"><br>
                    <label for="desconto">Desconto</label> &nbsp; 
                    <input name= "desconto" id ="desconto"value="<?=$info ['desconto'];?>" placeholder="00,00"  onblur="calcula()" size ="15"><br>
                    <label for="totalvenda">Valor Total da Venda</label> &nbsp; 
                    <input name= "totalvenda" id = "totalvenda" value="<?=$info ['totalvenda'];?>"readonly size ="15" ><br>
                </div>

                <div class="linha4-formulario">
                    <label for="info">Informações adicionais</label>
                    <textarea name="info" id="info" value="<?=$info ['info'];?>"placeholder="Detalhamento adicional"></textarea>
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
    //Verificar se o botão foi acionado
    if (isset($_POST['codigo'])){

        $numero = addslashes ($_POST ['numero']);
        $codigo = addslashes ($_POST ['codigo']);
        $name = addslashes ($_POST ['name']);
        $data = addslashes ($_POST ['data']);
        $codigop = addslashes ($_POST ['codigop']);
        $produto = addslashes ($_POST ['produto']);
        $preco = addslashes ($_POST ['preco']);
        $quantidade = addslashes ($_POST ['quantidade']);
        $qtdvenda = addslashes ($_POST ['qtdvenda']);
        $desconto = addslashes ($_POST ['desconto']);
        $totalvenda = addslashes ($_POST ['totalvenda']);
        $info = addslashes ($_POST ['info']);
       

        // Verifica se os campos estao preenchidos 
        if (!empty ($codigo) && !empty ($name) && !empty ($data) && !empty ($codigop) 
            && !empty ($produto)&& !empty ($preco) && !empty ($quantidade) && !empty ($qtdvenda)
             && !empty($totalvenda) && !empty($info))
        { 
            $user->conectar ("projeto_las", "localhost", "root", "");
            if($user->msgErro == "")
            {
                if ($qtdvenda < $quantidade)
                {
                $user ->cadastrarV($numero,$codigo,$name, $data,$codigop,$produto,$preco,
                                    $quantidade, $qtdvenda,$desconto, $totalvenda, $info);
                        echo '<script language="javascript">';
                        echo 'alert("Registro efetuado com sucesso!")';
                        echo '</script>';
                }else{
                        echo '<script language="javascript">';
                        echo 'alert("Quantidade vendida está acima do estoque disponivel!")';
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



    <!-- Script para pegar valor da busca (Produto) -->
    <script type='text/javascript'>
			$(document).ready(function(){
				$("input[name='codigop']").blur(function(){
					var $produto = $("input[name='produto']");
					var $preco = $("input[name='preco']");
                    var $quantidade = $("input[name='quantidade']");
					$.getJSON('buscaProduto.php',{ 
						codigop: $( this ).val() 
					},function( json ){
						$produto.val( json.produto );
						$preco.val( json.preco );
                        $quantidade.val( json.quantidade );
					});
				});
			});
		</script>

        <!-- Script para pegar valor da busca (Cliente) -->
        <script type='text/javascript'>
			$(document).ready(function(){
				$("input[name='codigo']").blur(function(){
					var $name = $("input[name='name']");
					$.getJSON('buscaCliente.php',{ 
						codigo: $( this ).val() 
					},function( json ){
						$name.val( json.name );
					});
				});
			});
		</script>

        <!-- Script para calculo dos campos  -->

        <script type="text/javascript">
        function id(valor_campo)
        {
            return document.getElementById(valor_campo);
        }
        function getValor(valor_campo)
        {
            var valor = document.getElementById(valor_campo).value.replace( ' ', '.');
            return parseFloat( valor );
        }

        function calcula()
        {
            var total = getValor('preco') * getValor('qtdvenda');
            total = total - getValor('desconto') ;
            id('totalvenda').value = total;
        }
        </script>

</body>
</html>