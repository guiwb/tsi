<!DOCTYPE html>
<html>
<head>
	<title>Cadastro Usuário</title>
	<meta charset="utf-8">
</head>
<body>
<h1> Cadastro de Usuários </h1>
<form action="cadastro_usuario.php" method="POST">
<p><label for='nome'> Nome </label> 
	<input type="text" id="nome" name="nome"></p>	
<p><label for='email'> Email </label> 
	<input type="text" id='email' name='email'></p>
<p><label for='senha'> Senha </label> 
	<input type="password" id='senha' name='senha'></p>

<p><button type="submit">Cadastrar</button> </p>
</form>
<a href='index.php'>Voltar </a>
</body>
</html>