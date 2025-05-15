<?php
include("valida_sessao.php");
include "conecta.php";
include("navbar.php");

$ids = array_keys($_SESSION['carrinho']);
$total = 0;
?>
<main>
    <h1>Carrinho</h1>

    <?php
    if (count($ids) == 0) {
        echo "Nenhum item!";
    } else {
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $pdo->prepare("SELECT id, nome, foto, descricao, valor FROM produto WHERE id IN($placeholders)");
        $stmt->execute($ids);

        if ($stmt->rowCount() == 0) {
            echo "Nenhum item!";
        } else {
            while($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $quantidade = $_SESSION['carrinho'][$produto['id']];
                $valor_total = $produto['valor'] * $quantidade;
                $total = $total + $valor_total;
                ?>
                <hr>
                <?=pegaFoto($produto['foto'], 100)?>
                <h2>Nome: <?=$produto['nome']?></h2>
                <p>Descrição: <?=$produto['descricao']?></p>
                <p>Valor individual: R$ <?=number_format($produto['valor'], 2, ',', '.')?></p>
                <p>Valor total: R$ <?=number_format($valor_total, 2, ',', '.')?></p>
                <p>
                Quantidade:<a href="remove_carrinho.php?id=<?=$produto['id']?>">&nbsp;&nbsp; - &nbsp;&nbsp;</a><?=isset($_SESSION['carrinho'][$produto['id']]) ? $_SESSION['carrinho'][$produto['id']] : 0?><a href="adiciona_carrinho.php?id=<?=$produto['id']?>">&nbsp;&nbsp; + &nbsp;&nbsp;</a></p>
                <?php
            }
        }
    }
    ?>
    <hr>
    <h3>Total: R$<?=number_format($total, 2, ',', '.')?></h3>
</main>
