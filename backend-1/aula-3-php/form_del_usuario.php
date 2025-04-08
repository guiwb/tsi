<!DOCTYPE html>
<html>
<head>
	<title>Excluir</title>
	<meta charset="utf-8">
	<script type="text/javascript">
		function confirma_exclusao()
		{

			resp=confirm('Deseja excluir o usuario?');
			if(resp == true)
			{
				return true;

			}
			else
			{
				return false;
			}
		}


	</script>
</head>
<body>
<h1> Exclusao de Usuário </h1>

<form action="form_edicao_usuario.php" method="POST">
	<p><label for='id'> Digite o Código do Usuario para exclusão: </label> 
	<input type="text" id='id' name='id'></p>
	<button type="submit" onclick="return confirma_exclusao()">Excluir</button>
</form>
<br>
<a href='index.php'>Voltar </a>
</body>
</html>