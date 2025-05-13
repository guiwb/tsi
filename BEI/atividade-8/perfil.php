<?php
include("valida_sessao.php");
include "conecta.php";
include "fotos.php";

$id = isset($_POST["id"]) ? $_POST["id"] : "";
$nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$senha = isset($_POST["senha"]) ? $_POST["senha"] : "";

if (!empty($id)) {
    $stmt = $pdo->prepare("UPDATE usuario SET nome= :nome, email = :email, senha = :senha WHERE id = :id RETURNING nome, foto");
    $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':senha' => $senha,
        ':id' => $id,
    ]);
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    $_SESSION['user']['nome'] = $res['nome'];
    $_SESSION['user']['foto'] = $res['foto'];

    salvaFoto($id, $pdo, "usuario");
}

include("navbar.php");
?>

<main>
    <h1>Perfil</h1>

    <form action="perfil.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend><strong>Editar Perfil</strong></legend>

            <input type="hidden" name="id" value="<?=$_SESSION['user']['id']?>" required>

            <?=pegaFoto($_SESSION['user']['foto'])?><br>
            <label for="foto">Edite a foto de perfil:
                <input type="file" id="foto" name="foto"><br><br>
            </label>

            <label for="nome">Nome:<br>
                <input type="text" id="nome" name="nome" value="<?=$_SESSION['user']['nome']?>" required>
            </label>

            <br><br>

            <label for="email">Email:<br>
                <input type="email" id="email" name="email" value="<?=$_SESSION['user']['email']?>" required>
            </label>

            <br><br>

            <label for="senha">Senha (apenas se quiser alterar):<br>
                <input type="password" id="senha" name="senha">
            </label>

            <br><br>

            <button type="submit"><strong>Editar</strong></button>
        </fieldset>
    </form>
</main>