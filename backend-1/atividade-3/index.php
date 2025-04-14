<?php
session_start();
if (!isset($_SESSION['email']))
{
	header("Location:login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pagina Inicial</title>
	<meta charset="utf-8">
</head>
<body>
	<nav>
		Seja bem-vindo(a), caso deseje deslogar, <button><a href="sair.php">clique aqui</a></button>.
	</nav>

	<main>
		Acesse uma categoria
		<button><a href="produtos.php">Produtos</a></button>
		<button><a href="usuarios.php">Usuários</a></button>
	</main>
</form>
</body>
</html>