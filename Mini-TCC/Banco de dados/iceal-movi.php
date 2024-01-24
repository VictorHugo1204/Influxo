
<?php

session_start();

//ini_set ('display_errors',0); 

$servidor            = "localhost";
$usuario_mysql       = "root";
$senha_mysql         = "";

$nome_programa       = "iceal-movi.php";

$nome_banco_de_dados = "influxo";
$nome_tabela_1       = "movimentacoes";

	
//Criar a conexao
$conn = mysqli_connect($servidor, $usuario_mysql, $senha_mysql, $nome_banco_de_dados)
        or die ("<br>falha na conexão com MySQL ou na seleção do BD");


// Definir as variáveis session
if(!isset($_SESSION['mov_cod']))   { $_SESSION['mov_cod']  = null; }
if(!isset($_SESSION['mov_qtd']))   { $_SESSION['mov_qtd']  = null; }
if(!isset($_SESSION['mov_tipo']))   { $_SESSION['mov_tipo']  = null; }
if(!isset($_SESSION['mov_data']))   { $_SESSION['mov_data']  = null; }
if(!isset($_SESSION['mov_hora']))   { $_SESSION['mov_hora']  = null; }
if(!isset($_SESSION['mov_nnotf']))   { $_SESSION['mov_nnotf']  = null; }
if(!isset($_SESSION['mov_pro_cod']))   { $_SESSION['mov_pro_cod']  = null; }
if(!isset($_SESSION['mov_cli_cod']))   { $_SESSION['mov_cli_cod']  = null; }
if(!isset($_SESSION['mov_for_cod']))   { $_SESSION['mov_for_cod']  = null; }

if(!isset($_SESSION['botao']))        { $_SESSION['botao']       = null; }
if(!isset($_SESSION['msg']))          { $_SESSION['msg']         = null; }
if(!isset($_SESSION['consulta']))     { $_SESSION['consulta']    = "n";  }
if(!isset($_SESSION['arquivo']))      { $_SESSION['arquivo']     = null; }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Tabela Movimentações </title>
    </head>
    <body>
              <h1> Título </h1>
              <form action="#" method="POST">
										 
						
                    Código: <input type="number" 
					                name="mov_cod" 
									size="15" 
									maxlength="10" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['mov_cod']; ?>"> *<p>
								
                    Quantidade: <input type="number" 
					                name="mov_qtd" 
									size="10" 
									maxlength="5" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['mov_qtd']; ?>"> *<p>
								
                    Tipo: <input type="text" 
					                name="mov_tipo" 
									size="10" 
									maxlength="1" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['mov_tipo']; ?>"> E-entrada S-saída *<p>
								
                    Data: <input type="date" 
					                name="mov_data" 
									size="" 
									maxlength="" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['mov_data']; ?>"> *<p>
								
                    Hora: <input type="time" 
					                name="mov_hora" 
									size="" 
									maxlength="" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['mov_hora']; ?>"> *<p>
								
                    Número da Nota Fiscal: <input type="text" 
					                name="mov_nnotf" 
									size="15" 
									maxlength="10" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['mov_nnotf']; ?>"> *<p>
								
                    Código do Produto: <input type="text" 
					                name="mov_pro_cod" 
									size="15" 
									maxlength="12" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['mov_pro_cod']; ?>"> *<p>
								
                    Código do Cliente: <input type="text" 
					                name="mov_cli_cod" 
									size="10" 
									maxlength="6" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['mov_cli_cod']; ?>"> *<p>

	                Código do Fornecedor: <input type="text" 
					                name="mov_for_cod" 
									size="10" 
									maxlength="5" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['mov_for_cod']; ?>"> *<p>
									
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
$_SESSION['mov_cod'] = $mov_cod = filter_input(INPUT_POST, 'mov_cod');
$_SESSION['mov_qtd'] = $mov_qtd = filter_input(INPUT_POST, 'mov_qtd');
$_SESSION['mov_tipo'] = $mov_tipo = filter_input(INPUT_POST, 'mov_tipo');
$_SESSION['mov_data'] = $mov_data = filter_input(INPUT_POST, 'mov_data');
$_SESSION['mov_hora'] = $mov_hora = filter_input(INPUT_POST, 'mov_hora');
$_SESSION['mov_nnotf'] = $mov_nnotf = filter_input(INPUT_POST, 'mov_nnotf');
$_SESSION['mov_pro_cod'] = $mov_pro_cod = filter_input(INPUT_POST, 'mov_pro_cod');
$_SESSION['mov_cli_cod'] = $mov_cli_cod = filter_input(INPUT_POST, 'mov_cli_cod');
$_SESSION['mov_for_cod'] = $mov_for_cod = filter_input(INPUT_POST, 'mov_for_cod');
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
				   $mov_cod =
    		       $mov_qtd =
				   $mov_tipo =
				   $mov_data =
				   $mov_hora =
				   $mov_nnotf =
				   $mov_pro_cod =
				   $mov_cli_cod =
        		   $mov_for_cod =
				   $botao = "";
	    $_SESSION['consulta'] = "n";
	    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=$nome_programa'>";
   }

// INCLUIR -------------------------
if ($_SESSION['botao'] == "Incluir")
	{
	    //Testar se campos estão em branco------------------------------
		  
		  $_SESSION['msg'] = "";
		  
	      if (($_SESSION['mov_cod']  == "")  or 
		      ($_SESSION['mov_qtd']  == "")  or
		      ($_SESSION['mov_tipo']  == "")  or
		      ($_SESSION['mov_data']  == "")  or
		      ($_SESSION['mov_hora']  == "")  or
		      ($_SESSION['mov_nnotf']  == "")  or
		      ($_SESSION['mov_pro_cod']  == "")  or
		      ($_SESSION['mov_cli_cod']  == "")  or
		      ($_SESSION['mov_for_cod']  == ""))
		      {$_SESSION['msg']      = "Campos com (*) deverão ser preenchidos!";}
			  
        //-----------------------------------------------------------------------------
		
		if ($_SESSION['msg'] == "")
		{
			$inclusao = mysqli_query($conn, "INSERT INTO $nome_tabela_1 values 
			                                                    (
																 
																 '$mov_cod',
																 '$mov_qtd',
																 '$mov_tipo',
																 '$mov_data',
																 '$mov_hora',
																 '$mov_nnotf',
																 '$mov_pro_cod',
																 '$mov_cli_cod',
																 '$mov_for_cod'
																 
																 )");

			if ($inclusao)
			   { $_SESSION['msg'] = "Registro $mov_cod Incluído!"; }
			else
			   { $_SESSION['msg'] =  ">>> ERRO na inclusão do Registro $mov_cod! <<<"; }
		}
		
		$_SESSION['botao'] = "";		  
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=$nome_programa'>"; 
	}

   // executa quando clica o botão Consultar
   if ($_SESSION['botao']  ==  "Consultar")     
    {
		$resultado = mysqli_query($conn, "SELECT * FROM $nome_tabela_1 WHERE mov_cod='$mov_cod'");
		
		$rowcount  = mysqli_num_rows($resultado);
			
		if ($rowcount)
			{ 
				$campo = mysqli_fetch_array($resultado);
				
				$_SESSION['mov_cod'] = $mov_cod = $campo['mov_cod'];
				$_SESSION['mov_qtd'] = $mov_qtd = $campo['mov_qtd'];
				$_SESSION['mov_tipo'] = $mov_tipo = $campo['mov_tipo'];
				$_SESSION['mov_data'] = $mov_data = $campo['mov_data'];
				$_SESSION['mov_hora'] = $mov_hora = $campo['mov_hora'];
				$_SESSION['mov_nnotf'] = $mov_nnotf = $campo['mov_nnotf'];
				$_SESSION['mov_pro_cod'] = $mov_pro_cod = $campo['mov_pro_cod'];
				$_SESSION['mov_cli_cod'] = $mov_cli_cod = $campo['mov_cli_cod'];
				$_SESSION['mov_for_cod'] = $mov_for_cod = $campo['mov_for_cod'];
				
				$_SESSION['consulta']  = "s";
				$_SESSION['msg']       = "Registro $mov_cod Consultado!";
				$_SESSION['arquivo']   = $campo['mov_cod'] . ".jpg";
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
				$mov_cod = $_SESSION['mov_cod'];
				$sql = "DELETE FROM $nome_tabela_1 WHERE mov_cod='$mov_cod'";
				if (mysqli_query($conn, $sql))
					{
						$_SESSION['msg'] = "Registro $mov_cod Excluido!";
					}  
				else
					{ 
						$_SESSION['msg'] = "Registro $mov_cod Não Cadastrado!";
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
				$_SESSION['mov_cod'] = $mov_cod = filter_input(INPUT_POST, 'mov_cod');
				$_SESSION['mov_qtd'] = $mov_qtd = filter_input(INPUT_POST, 'mov_qtd');
				$_SESSION['mov_tipo'] = $mov_tipo = filter_input(INPUT_POST, 'mov_tipo');
				$_SESSION['mov_data'] = $mov_data = filter_input(INPUT_POST, 'mov_data');
				$_SESSION['mov_hora'] = $mov_hora = filter_input(INPUT_POST, 'mov_hora');
				$_SESSION['mov_nnotf'] = $mov_nnotf = filter_input(INPUT_POST, 'mov_nnotf');
				$_SESSION['mov_pro_cod'] = $mov_pro_cod = filter_input(INPUT_POST, 'mov_pro_cod');
				$_SESSION['mov_cli_cod'] = $mov_cli_cod = filter_input(INPUT_POST, 'mov_cli_cod');
				$_SESSION['mov_for_cod'] = $mov_for_cod = filter_input(INPUT_POST, 'mov_for_cod');
				$_SESSION['botao']      = $botao      = filter_input(INPUT_POST, 'botao');

              $sql  = "UPDATE $nome_tabela_1 SET 
			                                     mov_cod = '$mov_cod',
			                                     mov_qtd = '$mov_qtd',
			                                     mov_tipo = '$mov_tipo',
			                                     mov_data = '$mov_data',
			                                     mov_hora = '$mov_hora',
			                                     mov_nnotf = '$mov_nnotf',
			                                     mov_pro_cod = '$mov_pro_cod',
			                                     mov_cli_cod = '$mov_cli_cod',
			                                     mov_for_cod = '$mov_for_cod'

                                                 WHERE mov_cod='$mov_cod'";
										   
              mysqli_query($conn, $sql) or die ("ERRO NA ALTERACAO!");
              $_SESSION['msg'] = "Registro $mov_cod Alterado!";
             }
	 $_SESSION['botao'] = "";
	 echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=$nome_programa'>"; 
     }

if ($_SESSION['botao'] == "Conferir Imagem")
	{	
		$_SESSION['$mov_cod'] = $mov_cod = filter_input(INPUT_POST, 'mov_cod');
		$arquivo = $_SESSION['$mov_cod'] . ".jpg";

		if ($_SESSION['$mov_cod']  <> "") 
			{
				echo "<center><img src='../img/nome-da-pasta/$arquivo' width=450 height=350 />";
			}
		else
			{
				{$_SESSION['msg'] = "Para exibir a imagem é necessário preencher o Código do Livro!";}
			}
	}

?>






