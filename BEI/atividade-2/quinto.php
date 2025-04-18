<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/quinto.php" method="POST">
        <p>Quais as suas linguagens de programação preferidas?</p>
        <input type="checkbox" name="linguagens[]" id="PHP" value="PHP" />
        <label for="PHP">PHP</label>

        <input type="checkbox" name="linguagens[]" id="JavaScript" value="JavaScript" />
        <label for="JavaScript">JavaScript</label>

        <input type="checkbox" name="linguagens[]" id="C#" value="C#" />
        <label for="C#">C#</label>
        
        <button type="submit">Enviar</button>

        <?php
        $linguagens = isset($_POST['linguagens']) ? $_POST['linguagens'] : null;

        if ($linguagens === null) return;

        echo "<h2>Linguagens escolhidas:</h2>";

        foreach ($linguagens as $linguagem) {
            echo "$linguagem<br>";
        }
        ?>
    </form>
</body>
</html> 