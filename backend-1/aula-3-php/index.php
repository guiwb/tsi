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
	<title>Pagina Inicial </title>
	<meta charset="utf-8">
</head>
<body>
<h1> Escolha a opção para o Usuario </h1>
	<button><a href="form_cad_usuario.php">Cadastrar </a></button>
	<button><a href="form_edit_usuario.php">Editar </a></button>
	<button><a href="form_del_usuario.php">Excluir </a></button>
	<button><a href="listagem.php">Listar</a></button>
	<button><a href="pesquisa.php">Pesquisar</a></button>
	<button><a href="sair.php">Sair</a></button>

</form>
</body>
</html>