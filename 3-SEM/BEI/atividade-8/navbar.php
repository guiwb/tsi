<?php
include_once("fotos.php");
?>

<nav>
    Seja bem-vindo(a) <?=pegaFoto($_SESSION["user"]["foto"], 30)?><b><?=$_SESSION["user"]["nome"]?></b> | <button><a href="desloga.php">deslogar</a></button><button><a href="perfil.php">editar perfil</a></button>.

    <br><br>

    <button><a href="index.php">Home</a></button>
    <button><a href="usuarios.php">Usuários</a></button>
    <button><a href="produtos.php">Produtos</a></button>
    <button><a href="carrinho.php">Carrinho</a></button>
</nav>