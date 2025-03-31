<!-- Entrar com nome (campo tipo text), idade (campo tipo text), cidade para inscrição (campo tipo
select – codificado da seguinte maneira 1–Pelotas 2–Rio Grande 3-Porto Alegre) de uma pessoa
em campos de formulário HTML. Construa um programa em PHP que imprima o nome da
pessoa e a mensagem “Inscrição para Zona Sul” caso a pessoa escolha sua inscrição para as
cidades de Pelotas e Rio Grande ou “Inscrição para a Capital” caso a pessoa escolha sua inscrição
para Porto Alegre. Caso a pessoa possua idade inferior a 18 anos deverá ser mostrada apenas a
mensagem “Inscrição Inválida”. -->
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