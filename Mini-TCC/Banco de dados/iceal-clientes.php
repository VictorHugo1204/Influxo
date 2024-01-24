
<?php

session_start();

//ini_set ('display_errors',0); 

$servidor            = "localhost";
$usuario_mysql       = "root";
$senha_mysql         = "";

$nome_programa       = "iceal-clientes.php";

$nome_banco_de_dados = "influxo";
$nome_tabela_1       = "clientes";

	
//Criar a conexao
$conn = mysqli_connect($servidor, $usuario_mysql, $senha_mysql, $nome_banco_de_dados)
        or die ("<br>falha na conexão com MySQL ou na seleção do BD");


// Definir as variáveis session
if(!isset($_SESSION['cli_cod']))      { $_SESSION['cli_cod']  = null; }
if(!isset($_SESSION['cli_cpf']))      { $_SESSION['cli_cpf']  = null; }
if(!isset($_SESSION['cli_nome']))     { $_SESSION['cli_nome']  = null; }
if(!isset($_SESSION['cli_fone']))     { $_SESSION['cli_fone']  = null; }
if(!isset($_SESSION['cli_email']))    { $_SESSION['cli_email']  = null; }
if(!isset($_SESSION['cli_dtnas']))    { $_SESSION['cli_dtnas']  = null; }
if(!isset($_SESSION['cli_senha']))    { $_SESSION['cli_senha']  = null; }
if(!isset($_SESSION['botao']))        { $_SESSION['botao']       = null; }
if(!isset($_SESSION['msg']))          { $_SESSION['msg']         = null; }
if(!isset($_SESSION['consulta']))     { $_SESSION['consulta']    = "n";  }
if(!isset($_SESSION['arquivo']))      { $_SESSION['arquivo']     = null; }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Tabela Clientes </title>
    </head>
    <body>
              <h1> Tabela Clientes </h1>
              <form action="#" method="POST">
										 
						
                    Código: <input type="number" 
					                name="cli_cod" 
									size="10" 
									maxlength="6" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['cli_cod']; ?>"> *<p>
								
                    Cpf: <input type="text" 
					                name="cli_cpf" 
									size="20" 
									maxlength="14" 
                                    pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                                    placeholder="000.000.006-00"
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['cli_cpf']; ?>"> *<p>
								
                    Nome: <input type="text" 
					                name="cli_nome" 
									size="100" 
									maxlength="80" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['cli_nome']; ?>"> *<p>
								
                    Telefone: <input type="tel" 
					                name="cli_fone" 
									size="20" 
									maxlength="15" 
									pattern="[0-9]{2} [0-9]{5}-[0-9]{4}"
									placeholder="11 99999-9999"
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['cli_fone']; ?>"> *<p>
								
                    Email: <input type="email" 
					                name="cli_email" 
									size="60" 
									maxlength="50" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['cli_email']; ?>"> *<p>
								
                    Data de Nascimento: <input type="date" 
					                name="cli_dtnas" 
									size="" 
									maxlength="" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['cli_dtnas']; ?>"> *<p>

	                Senha: <input type="password" 
					                name="cli_senha" 
									size="20" 
									maxlength="15" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['cli_senha']; ?>"> *<p>
									
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
$_SESSION['cli_cod'] = $cli_cod       = filter_input(INPUT_POST, 'cli_cod');
$_SESSION['cli_cpf'] = $cli_cpf       = filter_input(INPUT_POST, 'cli_cpf');
$_SESSION['cli_nome'] = $cli_nome     = filter_input(INPUT_POST, 'cli_nome');
$_SESSION['cli_fone'] = $cli_fone     = filter_input(INPUT_POST, 'cli_fone');
$_SESSION['cli_email'] = $cli_email   = filter_input(INPUT_POST, 'cli_email');
$_SESSION['cli_dtnas'] = $cli_dtnas   = filter_input(INPUT_POST, 'cli_dtnas');
$_SESSION['cli_senha'] = $cli_senha   = filter_input(INPUT_POST, 'cli_senha');
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
				   $cli_cod   =
    		       $cli_cpf   =
				   $cli_nome  =
				   $cli_fone  =
				   $cli_email =
				   $cli_dtnas =
        		   $cli_senha =
				   $botao = "";
	    $_SESSION['consulta'] = "n";
	    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=$nome_programa'>";
   }

// INCLUIR -------------------------
if ($_SESSION['botao'] == "Incluir")
	{
	    //Testar se campos estão em branco------------------------------
		  
		  $_SESSION['msg'] = "";
		  
	      if (($_SESSION['cli_cod']  == "")  or 
		      ($_SESSION['cli_cpf']  == "")  or
		      ($_SESSION['cli_nome']  == "")  or
		      ($_SESSION['cli_fone']  == "")  or
		      ($_SESSION['cli_email']  == "")  or
		      ($_SESSION['cli_dtnas']  == "")  or
		      ($_SESSION['cli_senha']  == ""))
		      {$_SESSION['msg']      = "Campos com (*) deverão ser preenchidos!";}
			  
        //-----------------------------------------------------------------------------
		
		if ($_SESSION['msg'] == "")
		{
			$inclusao = mysqli_query($conn, "INSERT INTO $nome_tabela_1 values 
			                                                    (
																 
																 '$cli_cod',
																 '$cli_cpf',
																 '$cli_nome',
																 '$cli_fone',
																 '$cli_email',
																 '$cli_dtnas',
																 '$cli_senha'
																 
																 )");

			if ($inclusao)
			   { $_SESSION['msg'] = "Registro $cli_cod Incluído!"; }
			else
			   { $_SESSION['msg'] =  ">>> ERRO na inclusão do Registro $cli_cod! <<<"; }
		}
		
		$_SESSION['botao'] = "";		  
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=$nome_programa'>"; 
	}

   // executa quando clica o botão Consultar
   if ($_SESSION['botao']  ==  "Consultar")     
    {
		$resultado = mysqli_query($conn, "SELECT * FROM $nome_tabela_1 WHERE cli_cod='$cli_cod'");
		
		$rowcount  = mysqli_num_rows($resultado);
			
		if ($rowcount)
			{ 
				$campo = mysqli_fetch_array($resultado);
				
				$_SESSION['cli_cod']   = $cli_cod   = $campo['cli_cod'];
				$_SESSION['cli_cpf']   = $cli_cpf   = $campo['cli_cpf'];
				$_SESSION['cli_nome']  = $cli_nome  = $campo['cli_nome'];
				$_SESSION['cli_fone']  = $cli_fone  = $campo['cli_fone'];
				$_SESSION['cli_email'] = $cli_email = $campo['cli_email'];
				$_SESSION['cli_dtnas'] = $cli_dtnas = $campo['cli_dtnas'];
				$_SESSION['cli_senha'] = $cli_senha = $campo['cli_senha'];
				
				$_SESSION['consulta']  = "s";
				$_SESSION['msg']       = "Registro $cli_cod Consultado!";
				$_SESSION['arquivo']   = $campo['cli_cod'] . ".jpg";
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
				$cli_cod = $_SESSION['cli_cod'];
				$sql = "DELETE FROM $nome_tabela_1 WHERE cli_cod='$cli_cod'";
				if (mysqli_query($conn, $sql))
					{
						$_SESSION['msg'] = "Registro $cli_cod Excluido!";
					}  
				else
					{ 
						$_SESSION['msg'] = "Registro $cli_cod Não Cadastrado!";
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
				$_SESSION['cli_cod']    = $cli_cod    = filter_input(INPUT_POST, 'cli_cod');
				$_SESSION['cli_cpf']    = $cli_cpf    = filter_input(INPUT_POST, 'cli_cpf');
				$_SESSION['cli_nome']   = $cli_nome   = filter_input(INPUT_POST, 'cli_nome');
				$_SESSION['cli_fone']   = $cli_fone   = filter_input(INPUT_POST, 'cli_fone');
				$_SESSION['cli_email']  = $cli_email  = filter_input(INPUT_POST, 'cli_email');
				$_SESSION['cli_dtnas']  = $cli_dtnas  = filter_input(INPUT_POST, 'cli_dtnas');
				$_SESSION['cli_senha']  = $cli_senha  = filter_input(INPUT_POST, 'cli_senha');
				$_SESSION['botao']      = $botao      = filter_input(INPUT_POST, 'botao');

              $sql  = "UPDATE $nome_tabela_1 SET 
			                                     cli_cod   = '$cli_cod',
			                                     cli_cpf   = '$cli_cpf',
			                                     cli_nome  = '$cli_nome',
			                                     cli_fone  = '$cli_fone',
			                                     cli_email = '$cli_email',
			                                     cli_dtnas = '$cli_dtnas',
			                                     cli_senha = '$cli_senha'

                                                 WHERE cli_cod='$cli_cod'";
										   
              mysqli_query($conn, $sql) or die ("ERRO NA ALTERACAO!");
              $_SESSION['msg'] = "Registro $cli_cod Alterado!";
             }
	 $_SESSION['botao'] = "";
	 echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=$nome_programa'>"; 
     }

if ($_SESSION['botao'] == "Conferir Imagem")
	{	
		$_SESSION['$cli_cod'] = $cli_cod = filter_input(INPUT_POST, 'cli_cod');
		$arquivo = $_SESSION['$cli_cod'] . ".jpg";

		if ($_SESSION['$cli_cod']  <> "") 
			{
				echo "<center><img src='../img/nome-da-pasta/$arquivo' width=450 height=350 />";
			}
		else
			{
				{$_SESSION['msg'] = "Para exibir a imagem é necessário preencher o Código do Livro!";}
			}
	}

?>






