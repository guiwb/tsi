<?php 
session_start(); 

$email=$_POST["email"]; 
$senha=$_POST["senha"]; 
if(!(empty($email) OR empty($senha))) // testa se os campos do formulário não estão vazios 
{ 
include "conecta.php"; 
$resultado=pg_query($conexao, "SELECT * from usuario WHERE email='$email' and senha='$senha'"); 

if (pg_num_rows($resultado)== 1) // testa se retornou uma linha de resultado da tabela usuario com login e senha válidos 
{ 

$_SESSION["logado"]=true; // armazena TRUE na variável de sessão logado 
$_SESSION["email"]=$email; // armazena na variável de sessão login_adm o login digitado no formulário 
header("Location:index.php"); // direciona para a home do site 
} 
else // else correspondente ao teste do resultado da função pg_num_rows
 { 

	$_SESSION["msg"]="Usuário ou senha inválidos"; 
	header("Location:login.php");
		// caso não exista uma linha na tabela usuario com o login e a senha 		// válidos uma mensagem é armazenada na variável de sessão msg 	 
                     // o fluxo da aplicação é direcionado novamente para o 
                     // formulário de login - onde a variável de sessão 
                     //contendo a mensagem será exibida 
} 
} else  // else correspondente ao resultado da função !empty

 { $_SESSION["msg"]="Preencha campos usuário e senha"; 
                      // caso contrário, ou seja, 
                      // os campos do formulário login e senha estejam vazios, 
 	            // a mensagem é armazenada na variável msg 	h  			header("Location:login.php"); 
// o fluxo da aplicação é direcionado novamente para o formulário de login - onde a variável de sessão contendo a mensagem será exibida 
} ?> 
