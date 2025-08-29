<?php
session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];

if (!(empty($email) or empty($senha))) {
    include "conecta.php";

    $resultado = pg_query($conexao, "SELECT id, nome, email, foto from usuario WHERE email='$email' and senha='$senha'");

    if (pg_num_rows($resultado) == 1) {
        $_SESSION["user"] = pg_fetch_assoc($resultado, 0);
        header("Location:index.php");
    } else {
        $_SESSION["error_message"] = "Usuário e/ou senha inválidos!";
        header("Location:login.php");
    }
} else {
    $_SESSION["error_message"] = "Preencha os campos de usuário e senha!";
}

?>