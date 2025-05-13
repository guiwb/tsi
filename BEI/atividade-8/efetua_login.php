<?php
session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];

if (!(empty($email) or empty($senha))) {
    include "conecta.php";

    $stmt = $pdo->prepare("SELECT id, nome, email, foto from usuario WHERE email= :email and senha= :senha");
    $stmt->execute([
        ':email' => $email,
        ':senha' => $senha
    ]);
    
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        $_SESSION["user"] = $usuario;
        $_SESSION["carrinho"] = [];
        header("Location:index.php");
    } else {
        $_SESSION["error_message"] = "Usuário e/ou senha inválidos!";
        header("Location:login.php");
    }
} else {
    $_SESSION["error_message"] = "Preencha os campos de usuário e senha!";
}
