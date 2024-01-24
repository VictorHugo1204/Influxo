
<?php

session_start();

//ini_set ('display_errors',0); 

$servidor            = "localhost";
$usuario_mysql       = "root";
$senha_mysql         = "";

$nome_programa       = "iceal-produtos.php";

$nome_banco_de_dados = "influxo";
$nome_tabela_1       = "produtos";

	
//Criar a conexao
$conn = mysqli_connect($servidor, $usuario_mysql, $senha_mysql, $nome_banco_de_dados)
        or die ("<br>falha na conexão com MySQL ou na seleção do BD");


// Definir as variáveis session
if(!isset($_SESSION['pro_cod']))      { $_SESSION['pro_cod']  = null; }
if(!isset($_SESSION['pro_nome']))     { $_SESSION['pro_nome']  = null; }
if(!isset($_SESSION['pro_categ']))    { $_SESSION['pro_categ']  = null; }
if(!isset($_SESSION['pro_clas']))     { $_SESSION['pro_clas']  = null; }
if(!isset($_SESSION['pro_unid']))     { $_SESSION['pro_unid']  = null; }
if(!isset($_SESSION['pro_forne']))    { $_SESSION['pro_forne']  = null; }
if(!isset($_SESSION['pro_estoq']))    { $_SESSION['pro_estoq']  = null; }
if(!isset($_SESSION['pro_estmax']))   { $_SESSION['pro_estmax']  = null; }
if(!isset($_SESSION['pro_estmin']))   { $_SESSION['pro_estmin']  = null; }
if(!isset($_SESSION['pro_precoc']))   { $_SESSION['pro_precoc']  = null; }
if(!isset($_SESSION['pro_precov']))   { $_SESSION['pro_precov']  = null; }
if(!isset($_SESSION['pro_imagem']))   { $_SESSION['pro_imagem']  = null; }

if(!isset($_SESSION['botao']))        { $_SESSION['botao']       = null; }
if(!isset($_SESSION['msg']))          { $_SESSION['msg']         = null; }
if(!isset($_SESSION['consulta']))     { $_SESSION['consulta']    = "n";  }
if(!isset($_SESSION['arquivo']))      { $_SESSION['arquivo']     = null; }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Tabela Produtos </title>
    </head>
    <body>
              <h1> Tabela Produtos </h1>
              <form action="#" method="POST">
										 
						
                    Código: <input type="number" 
					                name="pro_cod" 
									size="20" 
									maxlength="12" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['pro_cod']; ?>"> *<p>
								
                    Nome: <input type="text" 
					                name="pro_nome" 
									size="100" 
									maxlength="80" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['pro_nome']; ?>"> *<p>
								
                    Categoria: <input type="text" 
					                name="pro_categ" 
									size="30" 
									maxlength="25" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['pro_categ']; ?>"> *<p>
								
                    Classe: <input type="text" 
					                name="pro_clas" 
									size="30" 
									maxlength="25" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['pro_clas']; ?>"> *<p>
								
                    Unidade: <input type="text" 
					                name="pro_unid" 
									size="10" 
									maxlength="2" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['pro_unid']; ?>"> *<p>
								
                    Fornecedor: <input type="number" 
					                name="pro_forne" 
									size="10" 
									maxlength="5" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['pro_forne']; ?>"> *<p>
								
                    Estoque: <input type="number" 
					                name="pro_estoq" 
									size="10" 
									maxlength="5" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['pro_estoq']; ?>"> *<p>
								
                    Estoque Máximo: <input type="number" 
					                name="pro_estmax" 
									size="10" 
									maxlength="5" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['pro_estmax']; ?>"> *<p>
								
                    Estoque Mínimo: <input type="number" 
					                name="pro_estmin" 
									size="10" 
									maxlength="5" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['pro_estmin']; ?>"> *<p>

								
                    Preço Compra: <input type="number" 
					                name="pro_precoc" 
									size="15"
                                    step="0.01" 
									maxlength="" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['pro_precoc']; ?>"> *<p>
								
                    Preço Venda: <input type="number" 
					                name="pro_precov" 
									size="15" 
                                    step="0.01"
									maxlength="" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['pro_precov']; ?>"> *<p>
								
	                Endereço Imagem: <input type="text" 
					                name="pro_imagem" 
									size="100" 
									maxlength="80" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['pro_imagem']; ?>"> <p>
									
					<input type="submit" name="botao" value="Incluir">
					<input type="submit" name="botao" value="Consultar">
					<input type="submit" name="botao" value="Excluir">
					<input type="submit" name="botao" value="Alterar">
					<input type="submit" name="botao" value="Limpar"> 
					<input type="submit" name="botao" value="Conferir Imagem"><p>

                    Mensagens do Sistema: <input size="100"
                                                 disabled
								                 value = "<?php echo $_SESSION['msg']; ?>"> *<p>
                    Campos com (*) deverão ser preenchidos!<p>
              </form>
    </body>
</html>

<?php

// Pega dados do formulário
$_SESSION['pro_cod']    = $pro_cod    = filter_input(INPUT_POST, 'pro_cod');
$_SESSION['pro_nome']   = $pro_nome   = filter_input(INPUT_POST, 'pro_nome');
$_SESSION['pro_categ']  = $pro_categ  = filter_input(INPUT_POST, 'pro_categ');
$_SESSION['pro_clas']   = $pro_clas   = filter_input(INPUT_POST, 'pro_clas');
$_SESSION['pro_unid']   = $pro_unid   = filter_input(INPUT_POST, 'pro_unid');
$_SESSION['pro_forne']  = $pro_forne  = filter_input(INPUT_POST, 'pro_forne');
$_SESSION['pro_estoq']  = $pro_estoq  = filter_input(INPUT_POST, 'pro_estoq');
$_SESSION['pro_estmax'] = $pro_estmax = filter_input(INPUT_POST, 'pro_estmax');
$_SESSION['pro_estmin'] = $pro_estmin = filter_input(INPUT_POST, 'pro_estmin');
$_SESSION['pro_precoc'] = $pro_precoc = filter_input(INPUT_POST, 'pro_precoc');
$_SESSION['pro_precov'] = $pro_precov = filter_input(INPUT_POST, 'pro_precov');
$_SESSION['pro_imagem'] = $pro_imagem = filter_input(INPUT_POST, 'pro_imagem');
$_SESSION['botao']      = $botao      = filter_input(INPUT_POST, 'botao');


if ($_SESSION['consulta'] == "s") 
    { 
	    echo "<br>Arquivo: " . $_SESSION['arquivo'];
	    $arquivo = $_SESSION['arquivo'];
	    echo "<center><img src='../img/nome-da-pasta/$arquivo' width=450 height=350 />";
	}

// LIMPAR -------------------------
if ($_SESSION['botao'] == "Limpar")
   {
	    session_destroy();
				   $pro_cod =
    		       $pro_nome =
				   $pro_categ =
				   $pro_clas =
				   $pro_unid =
				   $pro_forne =
				   $pro_estoq =
				   $pro_estmax =
				   $pro_estmin =
				   $pro_precoc =
				   $pro_precov =
        		   $pro_imagem =
				   $botao = "";
	    $_SESSION['consulta'] = "n";
	    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=$nome_programa'>";
   }

// INCLUIR -------------------------
if ($_SESSION['botao'] == "Incluir")
	{
	    //Testar se campos estão em branco------------------------------
		  
		  $_SESSION['msg'] = "";
		  
	      if (($_SESSION['pro_cod']  == "")  or 
		      ($_SESSION['pro_nome']  == "")  or
		      ($_SESSION['pro_categ']  == "")  or
		      ($_SESSION['pro_clas']  == "")  or
		      ($_SESSION['pro_unid']  == "")  or
		      ($_SESSION['pro_forne']  == "")  or
		      ($_SESSION['pro_estoq']  == "")  or
		      ($_SESSION['pro_estmax']  == "")  or
		      ($_SESSION['pro_estmin']  == "")  or
		      ($_SESSION['pro_precoc']  == "")  or
		      ($_SESSION['pro_precov']  == ""))
		      {$_SESSION['msg']      = "Campos com (*) deverão ser preenchidos!";}
			  
        //-----------------------------------------------------------------------------
		
		if ($_SESSION['msg'] == "")
		{
			$inclusao = mysqli_query($conn, "INSERT INTO $nome_tabela_1 values 
			                                                    (
																 
																 '$pro_cod',
																 '$pro_nome',
																 '$pro_categ',
																 '$pro_clas',
																 '$pro_unid',
																 '$pro_forne',
																 '$pro_estoq',
																 '$pro_estmax',
																 '$pro_estmin',
																 '$pro_precoc',
																 '$pro_precov',
																 '$pro_imagem'
																 
																 )");

			if ($inclusao)
			   { $_SESSION['msg'] = "Registro $pro_cod Incluído!"; }
			else
			   { $_SESSION['msg'] =  ">>> ERRO na inclusão do Registro $pro_cod! <<<"; }
		}
		
		$_SESSION['botao'] = "";		  
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=$nome_programa'>"; 
	}

   // executa quando clica o botão Consultar
   if ($_SESSION['botao']  ==  "Consultar")     
    {
		$resultado = mysqli_query($conn, "SELECT * FROM $nome_tabela_1 WHERE pro_cod='$pro_cod'");
		
		$rowcount  = mysqli_num_rows($resultado);
			
		if ($rowcount)
			{ 
				$campo = mysqli_fetch_array($resultado);
				
				$_SESSION['pro_cod'] = $pro_cod = $campo['pro_cod'];
				$_SESSION['pro_nome'] = $pro_nome = $campo['pro_nome'];
				$_SESSION['pro_categ'] = $pro_categ = $campo['pro_categ'];
				$_SESSION['pro_clas'] = $pro_clas = $campo['pro_clas'];
				$_SESSION['pro_unid'] = $pro_unid = $campo['pro_unid'];
				$_SESSION['pro_forne'] = $pro_forne = $campo['pro_forne'];
				$_SESSION['pro_estoq'] = $pro_estoq = $campo['pro_estoq'];
				$_SESSION['pro_estmax'] = $pro_estmax = $campo['pro_estmax'];
				$_SESSION['pro_estmin'] = $pro_estmin = $campo['pro_estmin'];
				$_SESSION['pro_precoc'] = $pro_precoc = $campo['pro_precoc'];
				$_SESSION['pro_precov'] = $pro_precov = $campo['pro_precov'];
				$_SESSION['pro_imagem'] = $pro_imagem = $campo['pro_imagem'];
				
				$_SESSION['consulta']  = "s";
				$_SESSION['msg']       = "Registro $pro_cod Consultado!";
				$_SESSION['arquivo']   = $campo['pro_cod'] . ".jpg";
			} 
		else
			{ 
				$_SESSION['msg'] = "Registro não cadastrado!";
			}
    $_SESSION['botao'] = "";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=$nome_programa'>"; 
	}

if ($_SESSION['botao'] == "Excluir")
   {
        if ($_SESSION['consulta'] == "n") 
            { 
		        $_SESSION['msg'] = "Para Excluir é Necessário Consultar o Registro!"; 
			}
        else
			{
				$pro_cod = $_SESSION['pro_cod'];
				$sql = "DELETE FROM $nome_tabela_1 WHERE pro_cod='$pro_cod'";
				if (mysqli_query($conn, $sql))
					{
						$_SESSION['msg'] = "Registro $pro_cod Excluido!";
					}  
				else
					{ 
						$_SESSION['msg'] = "Registro $pro_cod Não Cadastrado!";
					}  
			}
	$_SESSION['botao'] = "";
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=$nome_programa'>";       
   }

if ($_SESSION['botao'] == "Alterar")
   {
        if ($_SESSION['consulta'] == "n")
            { 
				$_SESSION['msg'] = "Para Alterar é Necessário Consultar o Registro!";
            } 
        else
            {
			  // Pega dados do formulário
				$_SESSION['pro_cod'] = $pro_cod = filter_input(INPUT_POST, 'pro_cod');
				$_SESSION['pro_nome'] = $pro_nome = filter_input(INPUT_POST, 'pro_nome');
				$_SESSION['pro_categ'] = $pro_categ = filter_input(INPUT_POST, 'pro_categ');
				$_SESSION['pro_clas'] = $pro_clas = filter_input(INPUT_POST, 'pro_clas');
				$_SESSION['pro_unid'] = $pro_unid = filter_input(INPUT_POST, 'pro_unid');
				$_SESSION['pro_forne'] = $pro_forne = filter_input(INPUT_POST, 'pro_forne');
				$_SESSION['pro_estoq'] = $pro_estoq = filter_input(INPUT_POST, 'pro_estoq');
				$_SESSION['pro_estmax'] = $pro_estmax = filter_input(INPUT_POST, 'pro_estmax');
				$_SESSION['pro_estmin'] = $pro_estmin = filter_input(INPUT_POST, 'pro_estmin');
				$_SESSION['pro_precoc'] = $pro_precoc = filter_input(INPUT_POST, 'pro_precoc');
				$_SESSION['pro_precov'] = $pro_precov = filter_input(INPUT_POST, 'pro_precov');
				$_SESSION['pro_imagem'] = $pro_imagem = filter_input(INPUT_POST, 'pro_imagem');
				$_SESSION['botao']      = $botao      = filter_input(INPUT_POST, 'botao');

              $sql  = "UPDATE $nome_tabela_1 SET 
			                                     pro_cod = '$pro_cod',
			                                     pro_nome = '$pro_nome',
			                                     pro_categ = '$pro_categ',
			                                     pro_clas = '$pro_clas',
			                                     pro_unid = '$pro_unid',
			                                     pro_forne = '$pro_forne',
			                                     pro_estoq = '$pro_estoq',
			                                     pro_estmax = '$pro_estmax',
			                                     pro_estmin = '$pro_estmin',
			                                     pro_precoc = '$pro_precoc',
			                                     pro_precov = '$pro_precov',
			                                     pro_imagem = '$pro_imagem'

                                                 WHERE pro_cod='$pro_cod'";
										   
              mysqli_query($conn, $sql) or die ("ERRO NA ALTERACAO!");
              $_SESSION['msg'] = "Registro $pro_cod Alterado!";
             }
	 $_SESSION['botao'] = "";
	 echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=$nome_programa'>"; 
     }

if ($_SESSION['botao'] == "Conferir Imagem")
	{	
		$_SESSION['$pro_cod'] = $pro_cod = filter_input(INPUT_POST, 'pro_cod');
		$arquivo = $_SESSION['$pro_cod'] . ".jpg";

		if ($_SESSION['$pro_cod']  <> "") 
			{
				echo "<center><img src='../img/nome-da-pasta/$arquivo' width=450 height=350 />";
			}
		else
			{
				{$_SESSION['msg'] = "Para exibir a imagem é necessário preencher o Código do Livro!";}
			}
	}

?>






