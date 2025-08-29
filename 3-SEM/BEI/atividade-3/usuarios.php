<?php
include "conecta.php";

$filtro = isset($_GET["filtro"]) ? $_GET["filtro"] : "";
$id_delecao = isset($_GET["id_delecao"]) ? $_GET["id_delecao"] : "";
$id_edicao = isset($_GET["id_edicao"]) ? $_GET["id_edicao"] : "";

$id = isset($_POST["id"]) ? $_POST["id"] : "";
$nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$senha = isset($_POST["senha"]) ? $_POST["senha"] : "";

if (!empty($nome) && empty($id)) {
    pg_query($conexao, "insert into usuario (nome, email, senha) values ('$nome', '$email', '$senha');");
} else if (!empty($nome) && !empty($id)) {
    pg_query($conexao, "update usuario set nome= '$nome', email = '$email', senha = '$senha' where id = $id;");
} else if (!empty($id_delecao)) {
    pg_query($conexao, "delete from usuario where id = $id_delecao;");
}

$filtro_upper = strtoupper($filtro);
$usuarios = pg_query($conexao, "select id, nome, email from usuario where upper(nome) like '%$filtro_upper%' order by id");
$total_linhas = pg_num_rows($usuarios);
?>
<nav>
    Seja bem-vindo(a), caso deseje deslogar, <button><a href="sair.php">clique aqui</a></button>.
</nav>

<main>
    <h1>Usuários</h1>
    <a href="index.php">Home</a>
    <a href="produtos.php">Produtos</a>

    <h3>Cadastrar um novo usuário</h3>

    <?php
    if (!empty($id_edicao)) {
        $resultado = pg_query($conexao, "select nome, email, senha from usuario where id = $id_edicao");
        $usuario_edicao = pg_fetch_row($resultado, 0);
        ?>
        <form action="usuarios.php" method="POST">
            <fieldset>
                <legend><strong>Editar Usuário</strong></legend>

                <input type="hidden" name="id" value="<?=$id_edicao?>" required>

                <label for="nome">Nome:<br>
                    <input type="text" id="nome" name="nome" value="<?=$usuario_edicao[0]?>" required>
                </label>

                <br><br>

                <label for="email">Email:<br>
                    <input type="email" id="email" name="email" value="<?=$usuario_edicao[1]?>" required>
                </label>

                <br><br>

                <label for="senha">Senha:<br>
                    <input type="password" id="senha" name="senha" value="<?=$usuario_edicao[2]?>" required>
                </label>

                <br><br>

                <button type="submit"><strong>Salvar</strong></button>
            </fieldset>
        </form>
        <?php
    } else {
        ?>
        <form action="usuarios.php" method="POST">
            <fieldset>
                <legend><strong>Cadastro de Usuário</strong></legend>

                <label for="nome">Nome:<br>
                    <input type="text" id="nome" name="nome" required>
                </label>

                <br><br>

                <label for="email">Email:<br>
                    <input type="email" id="email" name="email" required>
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
    if($total_linhas == 0) {
        echo "Nenhum usuário encontrado!";
    } else {
        ?>
        <table border="1" align="left">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </thead>

            <tbody>
                <?php
                for ($i = 0; $i < $total_linhas; $i++) {
                    $usuario = pg_fetch_row($usuarios, $i);
                    ?>
                    <tr>
                        <td><?=$usuario[0]?></td>
                        <td><?=$usuario[1]?></td>
                        <td><?=$usuario[2]?></td>
                        <td>
                            <a href="usuarios.php?id_edicao=<?=$usuario[0]?>">Editar</a>
                            <a href="usuarios.php?id_delecao=<?=$usuario[0]?>">Deletar</a>
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