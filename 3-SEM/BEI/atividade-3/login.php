<?php 
session_start(); // abre ou restaura os dados de uma sessão 
if(isset($_SESSION["msg"])) // testa a variável de sessão msg 
{ 
echo $_SESSION["msg"]; // mostra mensagem armazenada 
unset($_SESSION['msg']); // elimina variável de sessão msg 
} 
?>
 
<html> 
<head> 
<title>Login </title> 
</head> 
<body> 
<form name="acesso" action="valida_sessao.php" method="post"> 
<label> Email: <input type="text" name="email"> </label> 
<label> Senha: <input type="password" name="senha"> </label> 
<input type="submit" name="botao" value="Enviar"/> 
</form> 
</body> 
</html> 
