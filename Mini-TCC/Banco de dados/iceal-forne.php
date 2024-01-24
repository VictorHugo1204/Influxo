
<?php

session_start();

//ini_set ('display_errors',0); 

$servidor            = "localhost";
$usuario_mysql       = "root";
$senha_mysql         = "";

$nome_programa       = "iceal-forne.php";

$nome_banco_de_dados = "influxo";
$nome_tabela_1       = "fornecedores";

	
//Criar a conexao
$conn = mysqli_connect($servidor, $usuario_mysql, $senha_mysql, $nome_banco_de_dados)
        or die ("<br>falha na conexão com MySQL ou na seleção do BD");


// Definir as variáveis session
if(!isset($_SESSION['for_cod']))   { $_SESSION['for_cod']  = null; }
if(!isset($_SESSION['for_cnpj']))   { $_SESSION['for_cnpj']  = null; }
if(!isset($_SESSION['for_email']))   { $_SESSION['for_email']  = null; }
if(!isset($_SESSION['for_nome']))   { $_SESSION['for_nome']  = null; }
if(!isset($_SESSION['for_fone']))   { $_SESSION['for_fone']  = null; }

if(!isset($_SESSION['botao']))        { $_SESSION['botao']       = null; }
if(!isset($_SESSION['msg']))          { $_SESSION['msg']         = null; }
if(!isset($_SESSION['consulta']))     { $_SESSION['consulta']    = "n";  }
if(!isset($_SESSION['arquivo']))      { $_SESSION['arquivo']     = null; }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Tabela Fornecedores </title>
    </head>
    <body>
              <h1> Tabela Fornecedores </h1>
              <form action="#" method="POST">
										 
						
                    Código: <input type="number" 
					                name="for_cod" 
									size="10" 
									maxlength="5" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['for_cod']; ?>"> *<p>
								
                    Cnpj: <input type="text" 
					                name="for_cnpj" 
									size="20" 
									maxlength="18"
                                    pattern="(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})" 
                                    placeholder="XX. XXX. XXX/0001-XX"
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['for_cnpj']; ?>"> *<p>
								
                    Email: <input type="email" 
					                name="for_email" 
									size="60" 
									maxlength="50" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['for_email']; ?>"> *<p>
								
                    Nome: <input type="text" 
					                name="for_nome" 
									size="100" 
									maxlength="80" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['for_nome']; ?>"> *<p>

	                Telefone: <input type="tel" 
					                name="for_fone" 
									size="20" 
									maxlength="15"
									pattern="[0-9]{2} [0-9]{5}-[0-9]{4}"
									placeholder="11 99999-9999" 
     								min="" 
									max=""
									autocomplete="off" 
								    value = "<?php echo $_SESSION['for_fone']; ?>"> *<p>
									
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
$_SESSION['for_cod'] = $for_cod = filter_input(INPUT_POST, 'for_cod');
$_SESSION['for_cnpj'] = $for_cnpj = filter_input(INPUT_POST, 'for_cnpj');
$_SESSION['for_email'] = $for_email = filter_input(INPUT_POST, 'for_email');
$_SESSION['for_nome'] = $for_nome = filter_input(INPUT_POST, 'for_nome');
$_SESSION['for_fone'] = $for_fone = filter_input(INPUT_POST, 'for_fone');
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
				   $for_cod =
    		       $for_cnpj =
				   $for_email =
				   $for_nome =
        		   $for_fone =
				   $botao = "";
	    $_SESSION['consulta'] = "n";
	    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=$nome_programa'>";
   }

// INCLUIR -------------------------
if ($_SESSION['botao'] == "Incluir")
	{
	    //Testar se campos estão em branco------------------------------
		  
		  $_SESSION['msg'] = "";
		  
	      if (($_SESSION['for_cod']  == "")  or 
		      ($_SESSION['for_cnpj']  == "")  or
		      ($_SESSION['for_email']  == "")  or
		      ($_SESSION['for_nome']  == "")  or
		      ($_SESSION['for_fone']  == ""))
		      {$_SESSION['msg']      = "Campos com (*) deverão ser preenchidos!";}
			  
        //-----------------------------------------------------------------------------
		
		if ($_SESSION['msg'] == "")
		{
			$inclusao = mysqli_query($conn, "INSERT INTO $nome_tabela_1 values 
			                                                    (
																 
																 '$for_cod',
																 '$for_cnpj',
																 '$for_email',
																 '$for_nome',
																 '$for_fone'
																 
																 )");

			if ($inclusao)
			   { $_SESSION['msg'] = "Registro $for_cod Incluído!"; }
			else
			   { $_SESSION['msg'] =  ">>> ERRO na inclusão do Registro $for_cod! <<<"; }
		}
		
		$_SESSION['botao'] = "";		  
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=$nome_programa'>"; 
	}

   // executa quando clica o botão Consultar
   if ($_SESSION['botao']  ==  "Consultar")     
    {
		$resultado = mysqli_query($conn, "SELECT * FROM $nome_tabela_1 WHERE for_cod='$for_cod'");
		
		$rowcount  = mysqli_num_rows($resultado);
			
		if ($rowcount)
			{ 
				$campo = mysqli_fetch_array($resultado);
				
				$_SESSION['for_cod'] = $for_cod = $campo['for_cod'];
				$_SESSION['for_cnpj'] = $for_cnpj = $campo['for_cnpj'];
				$_SESSION['for_email'] = $for_email = $campo['for_email'];
				$_SESSION['for_nome'] = $for_nome = $campo['for_nome'];
				$_SESSION['for_fone'] = $for_fone = $campo['for_fone'];
				
				$_SESSION['consulta']  = "s";
				$_SESSION['msg']       = "Registro $for_cod Consultado!";
				$_SESSION['arquivo']   = $campo['for_cod'] . ".jpg";
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
				$for_cod = $_SESSION['for_cod'];
				$sql = "DELETE FROM $nome_tabela_1 WHERE for_cod='$for_cod'";
				if (mysqli_query($conn, $sql))
					{
						$_SESSION['msg'] = "Registro $for_cod Excluido!";
					}  
				else
					{ 
						$_SESSION['msg'] = "Registro $for_cod Não Cadastrado!";
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
				$_SESSION['for_cod'] = $for_cod = filter_input(INPUT_POST, 'for_cod');
				$_SESSION['for_cnpj'] = $for_cnpj = filter_input(INPUT_POST, 'for_cnpj');
				$_SESSION['for_email'] = $for_email = filter_input(INPUT_POST, 'for_email');
				$_SESSION['for_nome'] = $for_nome = filter_input(INPUT_POST, 'for_nome');
				$_SESSION['for_fone'] = $for_fone = filter_input(INPUT_POST, 'for_fone');
				$_SESSION['botao']      = $botao      = filter_input(INPUT_POST, 'botao');

              $sql  = "UPDATE $nome_tabela_1 SET 
			                                     for_cod = '$for_cod',
			                                     for_cnpj = '$for_cnpj',
			                                     for_email = '$for_email',
			                                     for_nome = '$for_nome',
			                                     for_fone = '$for_fone'

                                                 WHERE for_cod='$for_cod'";
										   
              mysqli_query($conn, $sql) or die ("ERRO NA ALTERACAO!");
              $_SESSION['msg'] = "Registro $for_cod Alterado!";
             }
	 $_SESSION['botao'] = "";
	 echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=$nome_programa'>"; 
     }

if ($_SESSION['botao'] == "Conferir Imagem")
	{	
		$_SESSION['$for_cod'] = $for_cod = filter_input(INPUT_POST, 'for_cod');
		$arquivo = $_SESSION['$for_cod'] . ".jpg";

		if ($_SESSION['$for_cod']  <> "") 
			{
				echo "<center><img src='../img/nome-da-pasta/$arquivo' width=450 height=350 />";
			}
		else
			{
				{$_SESSION['msg'] = "Para exibir a imagem é necessário preencher o Código do Livro!";}
			}
	}

?>






