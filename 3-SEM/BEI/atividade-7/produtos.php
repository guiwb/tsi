<?php
include("valida_sessao.php");
include "conecta.php";
include "fotos.php";

$filtro = isset($_GET["filtro"]) ? $_GET["filtro"] : "";
$id_delecao = isset($_GET["id_delecao"]) ? $_GET["id_delecao"] : "";
$id_edicao = isset($_GET["id_edicao"]) ? $_GET["id_edicao"] : "";

$id = isset($_POST["id"]) ? $_POST["id"] : "";
$nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
$descricao = isset($_POST["descricao"]) ? $_POST["descricao"] : "";

if (!empty($nome) && empty($id)) {
    $resultado = pg_query($conexao, "insert into produto (nome, descricao) values ('$nome', '$descricao') RETURNING id;");

    salvaFoto(pg_fetch_row($resultado)[0], $conexao, "produto");
} else if (!empty($nome) && !empty($id)) {
    pg_query($conexao, "update produto set nome= '$nome', descricao = '$descricao' where id = $id;");

    salvaFoto($id, $conexao, "produto");
} else if (!empty($id_delecao)) {
    pg_query($conexao, "delete from produto where id = $id_delecao;");
}

$filtro_upper = strtoupper($filtro);
$produtos = pg_query($conexao, "select id, nome, descricao, foto from produto where upper(nome) like '%$filtro_upper%' order by id");
$total_linhas = pg_num_rows($produtos);
include("navbar.php");
?>

<main>
    <h1>Produtos</h1>
    <h3>Cadastrar um novo produto</h3>

    <?php
    if (!empty($id_edicao)) {
        $resultado = pg_query($conexao, "select nome, descricao, foto from produto where id = $id_edicao");
        $produto_edicao = pg_fetch_row($resultado, 0);
        ?>
        <form action="produtos.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend><strong>Editar produto</strong></legend>

                <input type="hidden" name="id" value="<?=$id_edicao?>" required>
            
                <?=pegaFoto($produto_edicao[2])?><br>
                <label for="foto">Edite a foto do produto:
                    <input type="file" id="foto" name="foto"><br><br>
                </label>

                <label for="nome">Nome:<br>
                    <input type="text" id="nome" name="nome" value="<?=$produto_edicao[0]?>" required>
                </label>

                <br><br>

                <label for="descricao">Descrição:<br>
                    <textarea name="descricao" id="descricao"><?=$produto_edicao[1]?></textarea>
                </label>

                <br><br>

                <button type="submit"><strong>Salvar</strong></button>
            </fieldset>
        </form>
        <?php
    } else {
        ?>
        <form action="produtos.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend><strong>Cadastro de produto</strong></legend>

                <label for="foto">Selecione uma foto do produto:
                    <input type="file" id="foto" name="foto"><br><br>
                </label>

                <label for="nome">Nome:<br>
                    <input type="text" id="nome" name="nome" required>
                </label>

                <br><br>

                <label for="descricao">Descrição:<br>
                    <textarea name="descricao" id="descricao"></textarea>
                </label>

                <br><br>

                <button type="submit"><strong>Cadastrar</strong></button>
            </fieldset>
        </form>
        <?php
    }
    ?>
    <h3>Listagem de produtos</h3>
    <form action="produtos.php" method="GET">
        <input type="text" name="filtro" value="<?=$filtro?>" >
        <button type="submit">Buscar</button>
        <a href="produtos.php">Limpar</a>
    </form>
    <?php
    if($total_linhas == 0) {
        echo "Nenhum produto encontrado!";
    } else {
        ?>
        <table border="1" align="left">
            <thead>
                <th>Foto</th>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </thead>

            <tbody>
                <?php
                for ($i = 0; $i < $total_linhas; $i++) {
                    $produto = pg_fetch_row($produtos, $i);
                    ?>
                    <tr>
                        <td><?=pegaFoto($produto[3], 30)?></td>
                        <td><?=$produto[0]?></td>
                        <td><?=$produto[1]?></td>
                        <td><?=$produto[2]?></td>
                        <td>
                            <a href="produtos.php?id_edicao=<?=$produto[0]?>">Editar</a>
                            <a href="produtos.php?id_delecao=<?=$produto[0]?>">Deletar</a>
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