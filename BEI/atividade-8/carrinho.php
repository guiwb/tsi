<?php
include("valida_sessao.php");
include "conecta.php";
include("navbar.php");

$ids = $_SESSION['carrinho'];
?>
<main>
    <h1>Carrinho</h1>

    <?php
    if (count($ids) == 0) {
        echo "Nenhum item!";
    } else {
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $pdo->prepare("SELECT id, nome, foto, descricao FROM produto WHERE id IN($placeholders)");
        $stmt->execute($ids);

        if ($stmt->rowCount() == 0) {
            echo "Nenhum item!";
        } else {
            while($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <hr>
                <?=pegaFoto($produto['foto'], 100)?>
                <h2><?=$produto['nome']?></h2>
                <p><?=$produto['descricao']?></p>
                <a href="remove_carrinho.php?id=<?=$produto['id']?>">Remover do carrinho</a>
                <?php
            }
        }
    }
    ?>
</main>
