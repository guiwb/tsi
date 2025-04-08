<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/quarto.php" method="POST">
        <label for="numero">Número</label>
        <input type="text" name="numero" id="numero" required />
        
        <button type="submit">Enviar</button>

        <?php
        $numero = isset($_POST['numero']) ? $_POST['numero'] : null;
        $contador = $numero;

        if($numero > 0) {
            echo "<h2>Início do contador positivo:</h2>";

            while ($contador >= 0) {
                echo "$contador<br>";
                $contador--;
            }
        } else {
            echo "<h2>Início do contador negativo:<h2>";

            while ($contador <= 0) {
                echo "$contador<br>";
                $contador++;
            }
        }
        ?>
    </form>

    <script>
        const input = document.querySelector('input[name="numero"]')

        input.addEventListener('keypress', (event) => {
            const char = String.fromCharCode(event.which)

            if (!char.match(/[\d-]/) || (event.target.value !== '' && char === '-')) {
                event.preventDefault()
            }
        })
    </script>
</body>
</html>