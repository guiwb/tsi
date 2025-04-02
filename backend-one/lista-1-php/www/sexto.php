<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/sexto.php" method="GET">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required />

        <label for="primeira_nota">Primeira Nota</label>
        <input type="number" name="primeira_nota" min="0" id="primeira_nota" required />

        <label for="segunda_nota">Segunda Nota</label>
        <input type="number" name="segunda_nota" min="0" id="segunda_nota" required />

        <label for="terceira_nota">Terceira Nota</label>
        <input type="number" name="terceira_nota" min="0" id="terceira_nota" required />
        
        <button type="submit">Enviar</button>

        <?php
        $primeira_nota = isset($_GET['primeira_nota']) ? $_GET['primeira_nota'] : null;
        $segunda_nota = isset($_GET['segunda_nota']) ? $_GET['segunda_nota'] : null;
        $terceira_nota = isset($_GET['terceira_nota']) ? $_GET['terceira_nota'] : null;

        if ($primeira_nota === null || $segunda_nota === null || $terceira_nota === null) return;

        $media = round(($primeira_nota + $segunda_nota + $terceira_nota) / 3);
        echo "<h2>Média: $media</h2>";
        ?>
    </form>
</body>
</html> 