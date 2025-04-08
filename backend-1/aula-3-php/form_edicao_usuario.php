<?php 

include "conecta.php";

$id= $_POST['id'];

$SQL= "select * from usuario where id = '$id'";

$resultado=pg_query($conexao,$SQL);

$registro= pg_fetch_row($resultado,0);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edição </title>
	<meta charset="utf-8">
</head>
<body>
<h1> Edição de Usuário </h1>

<form action="edicao_usuario.php" method="POST">
	<p><label for='nome'> Nome </label> 
	<input type="text" id='nome' name='nome' value="<?php echo $registro[1]; ?>" ></p>
	<p><label for='email'> Email </label> 
	<input type="text" id='email' name='email' value="<?php echo $registro[2]; ?>" ></p>
	<p><label for='senha'> Senha </label> 
	<input type="password" id='senha' name='senha' value="<?php echo $registro[3]; ?>"></p>
	<input type="hidden" name='id' value="<?php echo $registro[0]; ?>">
	<button type="submit">Editar</button>
</form>
<br>
<a href='index.php'>Voltar </a>
</body>
</html>