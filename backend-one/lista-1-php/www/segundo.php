<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/segundo.php" method="GET">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required />

        <label for="idade">Idade</label>
        <input type="number" name="idade" id="idade" min="1" required />

        <label for="cidade">Cidade</label>
        <select name="cidade" id="cidade" required>
            <option value="Pelotas">Pelotas</option>
            <option value="Rio Grande">Rio Grande</option>
            <option value="Porto Alegre">Porto Alegre</option>
        </select>
        
        <button type="submit">Enviar</button>

        <?php
        $nome = isset($_GET['nome']) ? $_GET['nome'] : null;
        $idade = isset($_GET['idade']) ? $_GET['idade'] : null;
        $cidade = isset($_GET['cidade']) ? $_GET['cidade'] : null;

        if ($nome == null) return;

        echo "<h1>Seja bem-vindo(a), $nome!</h1>";
        
        if ($idade < 18) {
            echo "<h2>Inscrição Inválida!</h2>";
        } else if ($cidade == "Porto Alegre") {
            echo "<h2>Inscrição para a Capital!</h2>";
        } else {
            echo "<h2>Inscrição para Zona Sul!</h2>";
        }
        ?>
    </form>
</body>
</html>