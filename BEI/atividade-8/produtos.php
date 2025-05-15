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
$valor = isset($_POST["valor"]) ? $_POST["valor"] : "";

if (!empty($nome) && empty($id)) {
    $stmt = $pdo->prepare("INSERT INTO produto (nome, descricao, valor) VALUES (:nome, :descricao, :valor)");
    $stmt->execute([
        ':nome' => $nome,
        ':descricao' => $descricao,
        ':valor' => $valor,
    ]);

    salvaFoto($pdo->lastInsertId(), $pdo, tabela: "produto");
} else if (!empty($nome) && !empty($id)) {
    $stmt = $pdo->prepare("UPDATE produto SET nome= :nome, descricao = :descricao, valor = :valor WHERE id = :id");
    $stmt->execute([
        ':nome' => $nome,
        ':descricao' => $descricao,
        ':valor' => $valor,
        ':id' => $id,
    ]);

    salvaFoto($id, $pdo, "produto");
} else if (!empty($id_delecao)) {
    $stmt = $pdo->prepare("DELETE FROM produto WHERE id = :id");
    $stmt->execute([':id' => $id_delecao]);
}
include("navbar.php");
?>

<main>
    <h1>Produtos</h1>
    <h3>Cadastrar um novo produto</h3>

    <?php
    if (!empty($id_edicao)) {
        $stmt = $pdo->prepare("SELECT nome, descricao, foto, valor FROM produto WHERE id = :id");
        $stmt->execute([':id' => $id_edicao]);
        $produto_edicao = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <form action="produtos.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend><strong>Editar produto</strong></legend>

                <input type="hidden" name="id" value="<?=$id_edicao?>" required>
            
                <?=pegaFoto($produto_edicao['foto'])?><br>
                <label for="foto">Edite a foto do produto:
                    <input type="file" id="foto" name="foto"><br><br>
                </label>

                <label for="nome">Nome:<br>
                    <input type="text" id="nome" name="nome" value="<?=$produto_edicao['nome']?>" required>
                </label>

                <br><br>

                <label for="descricao">Descrição:<br>
                    <textarea name="descricao" id="descricao"><?=$produto_edicao['descricao']?></textarea>
                </label>

                <br><br>

                <label for="valor">Valor:<br>
                    <input type="number" id="valor" name="valor" value="<?=$produto_edicao['valor']?>" required>
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

                <label for="valor">Valor:<br>
                    <input type="number" id="valor" name="valor" required>
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
    $filtro_upper = strtoupper($filtro);
    $stmt = $pdo->prepare("SELECT id, nome, descricao, foto, valor FROM produto WHERE upper(nome) LIKE :filtro ORDER BY id");
    $stmt->execute([':filtro' => "%$filtro_upper%"]);

    if($stmt->rowCount() == 0) {
        echo "Nenhum produto encontrado!";
    } else {
        ?>
        <table border="1" align="left">
            <thead>
                <th>Foto</th>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Ações</th>
                <th>Carrinho</th>
            </thead>

            <tbody>
                <?php
                while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?=pegaFoto($produto['foto'], 30)?></td>
                        <td><?=$produto['id']?></td>
                        <td><?=$produto['nome']?></td>
                        <td><?=$produto['descricao']?></td>
                        <td><?=$produto['valor']?></td>
                        <td>
                            <a href="produtos.php?id_edicao=<?=$produto['id']?>">Editar</a>
                            <a href="produtos.php?id_delecao=<?=$produto['id']?>">Deletar</a>
                        </td>
                        <td>
                            Total no carrinho: <?=isset($_SESSION['carrinho'][$produto['id']]) ? $_SESSION['carrinho'][$produto['id']] : 0?>
                            <a href="remove_carrinho.php?id=<?=$produto['id']?>">-</a>
                            <a href="adiciona_carrinho.php?id=<?=$produto['id']?>">+</a>
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