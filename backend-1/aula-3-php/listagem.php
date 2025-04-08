<?php

include "conecta.php";

$sql = "select * from usuario order by id";


$resultado = pg_query($conexao,$sql);
$linhas = pg_num_rows ($resultado);

for ($i = 0 ; $i < $linhas ; $i++) {
	$registro=pg_fetch_row($resultado,$i);

?>
<section>
<form action="edicao_usuario.php" method="post" enctype="multipart/form-data">
<p>ID: <?php echo $registro[0]; ?></p>
<input type ='hidden' name = 'id' value='<?php echo $registro[0]?>'>
<p>Nome:  <input type="text" name="nome" value="<?php echo $registro[1]?>"></p>
<p>Email:<input type ='text' name = 'email' value='<?php echo $registro[2]?>'</p>
<p>Senha: <input type ='password' name = 'senha' value='<?php echo $registro[3]?>' ?></p>
<button type="submit" name="editar" value="<?php echo $registro[0]; ?>"> Editar </button>
</form>
<form action="exclusao_usuario.php" method="post">
<input type ='hidden' name = 'id' value='<?php echo $registro[0]?>'>
<button type="submit" name="deletar" value="<?php echo $registro[0]; ?>" onclick = "return confirma_excluir()"> Deletar </button> 
</form>                                                         
</section>
<?php
}
?>
<a href='index.php'>Voltar </a>


