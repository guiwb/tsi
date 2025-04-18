<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/primeiro.php" method="GET">
        <label for="altura">Altura (em cm)</label>
        <input type="number" name="altura" id="altura" min="100" max="250" required />

        <input type="radio" name="sexo" id="masculino" value="masculino" required />
        <label for="masculino">Masculino</label>

        <input type="radio" name="sexo" id="feminino" value="feminino" required />
        <label for="feminino">Feminino</label>
        
        <button type="submit">Enviar</button>

        <?php
        $sexo = isset($_GET['sexo']) ? $_GET['sexo'] : null;
        $altura = isset($_GET['altura']) ? $_GET['altura'] / 100 : 0;
        
        $peso_ideal = 0;
        
        if ($sexo == 'masculino') {
            $peso_ideal = (72.7*$altura) - 58;
        } else if ($sexo == 'feminino') {
            $peso_ideal = (62.1*$altura) - 44.7;
        }
        
        if($peso_ideal > 0) echo "<h1>Peso Ideal: $peso_ideal</h1>";
        ?>
    </form>
</body>
</html>