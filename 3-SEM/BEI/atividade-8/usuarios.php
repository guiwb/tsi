<?php
include("valida_sessao.php");
include "conecta.php";
include "fotos.php";
include "valida_cpf.php";

$filtro = isset($_GET["filtro"]) ? $_GET["filtro"] : "";
$id_delecao = isset($_GET["id_delecao"]) ? $_GET["id_delecao"] : "";
$id_edicao = isset($_GET["id_edicao"]) ? $_GET["id_edicao"] : "";

$id = isset($_POST["id"]) ? $_POST["id"] : "";
$nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
$cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : "";

if (!validaCPF($cpf)) $_SESSION["error"] = "CPF inválido!";

if (!empty($nome) && empty($id) && validaCPF($cpf)) {
    $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha, cpf) VALUES (:nome, :email, :senha, :cpf)");
    $stmt->execute([
        ':nome' => $nome,
        ':senha' => $senha,
        ':email' => $email,
        ':cpf' => $cpf
    ]);

    salvaFoto($pdo->lastInsertId(), $pdo, "usuario");
} else if (!empty($nome) && !empty($id) && validaCPF($cpf)) {
    if (!validaCPF($cpf)) return $_SESSION["error"] = "CPF inválido!";

    $stmt = $pdo->prepare("UPDATE usuario SET nome= :nome, email = :email, senha = :senha, cpf = :cpf where id = :id");
    $stmt->execute([
        ':nome' => $nome,
        ':senha' => $senha,
        ':email' => $email,
        ':cpf' => $cpf,
        ':id' => $id
    ]);

    salvaFoto($id, $pdo, "usuario");
} else if (!empty($id_delecao)) {
    $stmt = $pdo->prepare("DELETE FROM telefone WHERE id_usuario = :id");
    $stmt->execute([':id' => $id_delecao]);
    
    $stmt = $pdo->prepare("DELETE FROM usuario WHERE id = :id");
    $stmt->execute([':id' => $id_delecao]);
}
include("navbar.php");
?>

<main>
    <h1>Usuários</h1>
    <h3>Cadastrar um novo usuário</h3>

    <?php
    if (isset($_SESSION["error"])) echo "<h3 style='color: red;'>Erro: ".$_SESSION['error']."</h3>";
    unset($_SESSION["error"]);
    ?>

    <?php
    if (!empty($id_edicao)) {
        $stmt = $pdo->prepare("SELECT nome, email, senha, foto, cpf FROM usuario WHERE id = :id");
        $stmt->execute([':id' => $id_edicao]);
        $usuario_edicao = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <form action="usuarios.php?id_edicao=<?=$id_edicao?>" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend><strong>Editar Usuário</strong></legend>

                <input type="hidden" name="id" value="<?=$id_edicao?>" required>

                <?=pegaFoto($usuario_edicao['foto'])?><br>
                <label for="foto">Edite a foto de perfil:
                    <input type="file" id="foto" name="foto"><br><br>
                </label>

                <label for="nome">Nome:<br>
                    <input type="text" id="nome" name="nome" value="<?=$usuario_edicao['nome']?>" required>
                </label>

                <br><br>

                <label for="email">Email:<br>
                    <input type="email" id="email" name="email" value="<?=$usuario_edicao['email']?>" required>
                </label>

                <br><br>

                <label for="cpf">CPF:<br>
                    <input type="text" id="cpf" name="cpf" value="<?=$usuario_edicao['cpf']?>" required>
                </label>

                <br><br>

                <label for="senha">Senha:<br>
                    <input type="password" id="senha" name="senha" value="<?=$usuario_edicao['senha']?>" required>
                </label>

                <br><br>

                <button type="submit"><strong>Salvar</strong></button>
            </fieldset>
        </form>
        <?php
    } else {
        ?>
        <form action="usuarios.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend><strong>Cadastro de Usuário</strong></legend>

                <label for="foto">Selecione uma foto de perfil:
                    <input type="file" id="foto" name="foto"><br><br>
                </label>

                <label for="nome">Nome:<br>
                    <input type="text" id="nome" name="nome" required>
                </label>

                <br><br>

                <label for="email">Email:<br>
                    <input type="email" id="email" name="email" required>
                </label>

                <br><br>

                <label for="cpf">CPF:<br>
                    <input type="text" id="cpf" name="cpf" required>
                </label>

                <br><br>

                <label for="senha">Senha:<br>
                    <input type="password" id="senha" name="senha" required>
                </label>

                <br><br>

                <button type="submit"><strong>Cadastrar</strong></button>
            </fieldset>
        </form>
        <?php
    }
    ?>
    <h3>Listagem de usuários</h3>
    <form action="usuarios.php" method="GET">
        <input type="text" name="filtro" value="<?=$filtro?>" >
        <button type="submit">Buscar</button>
        <a href="usuarios.php">Limpar</a>
    </form>
    <?php
    $filtro_nome = "%".strtoupper($filtro)."%";
    $stmt = $pdo->prepare("SELECT id, nome, email, foto, cpf FROM usuario WHERE upper(nome) LIKE :filtro_nome OR cpf = :filtro ORDER BY id");
    $stmt->execute([
        ':filtro_nome' => $filtro_nome,
        ':filtro' => $filtro
    ]);
    if($stmt->rowCount() == 0) {
        echo "Nenhum usuário encontrado!";
    } else {
        ?>
        <table border="1" align="left">
            <thead>
                <th>Foto</th>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>CPF</th>
                <th>Ações</th>
            </thead>

            <tbody>
                <?php
                while ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?=pegaFoto($usuario['foto'], 30)?></td>
                        <td><?=$usuario['id']?></td>
                        <td><?=$usuario['nome']?></td>
                        <td><?=$usuario['email']?></td>
                        <td><?=$usuario['cpf']?></td>
                        <td>
                            <a href="usuarios.php?id_edicao=<?=$usuario['id']?>">Editar</a>
                            <a href="usuarios.php?id_delecao=<?=$usuario['id']?>">Deletar</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>
</main>