
<?php

$servidor            = "localhost";
$usuario_mysql       = "root";
$senha_mysql         = "";

$nome_banco_de_dados =  "influxo";
$nome_tabela_1       =  "produtos";
$nome_tabela_2       =  "clientes";
$nome_tabela_3       =  "fornecedores";
$nome_tabela_4       =  "movimentacoes";

$conn = mysqli_connect($servidor, $usuario_mysql, $senha_mysql) or die ("Falha na conexão com MySQL");
	
mysqli_query($conn, "DROP DATABASE $nome_banco_de_dados") or die ("BD $nome_banco_de_dados ainda não foi criado!");

mysqli_query($conn, "CREATE DATABASE $nome_banco_de_dados") or die ("Falha na criação do BD $nome_banco_de_dados");

mysqli_select_db($conn, $nome_banco_de_dados) or die ("Falha na selecao do BD $nome_banco_de_dados");

echo "<center><h1>Processamento de criação de BD e Tabelas realizado com sucesso!</h1>";
echo "<center><h3>Banco de dados <b> $nome_banco_de_dados </b> criado </h3>";

mysqli_query($conn, "CREATE TABLE $nome_tabela_1 (

                                            pro_cod        INT      (012),
                                            pro_nome       VARCHAR  (080),
                                            pro_categ      VARCHAR  (025),
                                            pro_clas       VARCHAR  (025),
                                            pro_unid       VARCHAR  (002),
                                            pro_forne      INT      (005),
                                            pro_estoq      INT      (005),
                                            pro_estmax     INT      (005),
                                            pro_estmin     INT      (005),
                                            pro_precoc     DECIMAL  (10,2),
                                            pro_precov     DECIMAL  (10,2),
                                            pro_imagem     VARCHAR  (080),
                                            
											PRIMARY KEY(pro_cod)
											)
                                            COLLATE='utf8_general_ci'
                                            ENGINE=InnoDB") or die ("<br>ERRO_$nome_tabela_1");

echo "<center><h3>Tabela(s) <b> $nome_tabela_1 </b> criada(s) </h3>";
   


mysqli_query($conn, "CREATE TABLE $nome_tabela_2 (

                                            cli_cod       INT      (006),
                                            cli_cpf       VARCHAR  (014),
                                            cli_nome      VARCHAR  (080),
                                            cli_fone      VARCHAR  (015),
                                            cli_email     VARCHAR  (050),
                                            cli_dtnas     DATE          ,
                                            cli_senha     VARCHAR  (015),
                                            
											PRIMARY KEY(cli_cod)
											)
                                            COLLATE='utf8_general_ci'
                                            ENGINE=InnoDB") or die ("<br>ERRO_$nome_tabela_2");

echo "<center><h3>Tabela(s) <b> $nome_tabela_2 </b> criada(s) </h3>";


mysqli_query($conn, "CREATE TABLE $nome_tabela_3 (

                                            for_cod       INT      (005),
                                            for_cnpj      VARCHAR  (018),
                                            for_email     VARCHAR  (050),
                                            for_nome      VARCHAR  (080),
                                            for_fone      VARCHAR  (015),
                                            
											PRIMARY KEY(for_cod)
											)
                                            COLLATE='utf8_general_ci'
                                            ENGINE=InnoDB") or die ("<br>ERRO_$nome_tabela_3");

echo "<center><h3>Tabela(s) <b> $nome_tabela_3 </b> criada(s) </h3>";   


mysqli_query($conn, "CREATE TABLE $nome_tabela_4 (

                                            mov_cod         INT      (010),
                                            mov_qtd         INT      (005),
                                            mov_tipo        VARCHAR  (001),
                                            mov_data        VARCHAR  (010),
                                            mov_hora        VARCHAR  (008),
                                            mov_nnotf       VARCHAR  (010),
                                            mov_pro_cod     INT      (012),
                                            mov_cli_cod     INT      (006),
                                            mov_for_cod     INT      (005),
                                            
											PRIMARY KEY(mov_cod)
											)
                                            COLLATE='utf8_general_ci'
                                            ENGINE=InnoDB") or die ("<br>ERRO_$nome_tabela_4");

echo "<center><h3>Tabela(s) <b> $nome_tabela_4 </b> criada(s) </h3>";


mysqli_query($conn, "ALTER TABLE produtos
                     ADD CONSTRAINT fk_pro_forne FOREIGN KEY (pro_forne) 
                     REFERENCES fornecedores (for_cod)
                     ON UPDATE CASCADE;")
                     or die ("Falha na criação da chave estrangeira");

mysqli_query($conn, "ALTER TABLE movimentacoes
                     ADD CONSTRAINT fk_mov_pro_cod FOREIGN KEY (mov_pro_cod) 
                     REFERENCES produtos (pro_cod)
                     ON UPDATE CASCADE;")
                     or die ("Falha na criação da chave estrangeira");

mysqli_query($conn, "ALTER TABLE movimentacoes
                     ADD CONSTRAINT fk_mov_cli_cod FOREIGN KEY (mov_cli_cod) 
                     REFERENCES clientes (cli_cod)
                     ON UPDATE CASCADE;")
                     or die ("Falha na criação da chave estrangeira");

mysqli_query($conn, "ALTER TABLE movimentacoes
                     ADD CONSTRAINT fk_mov_for_cod FOREIGN KEY (mov_for_cod) 
                     REFERENCES fornecedores (for_cod)
                     ON UPDATE CASCADE;")
                     or die ("Falha na criação da chave estrangeira");

?>