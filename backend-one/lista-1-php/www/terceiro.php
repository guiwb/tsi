<!-- A biblioteca de uma universidade deseja fazer um algoritmo que leia o nome do usuário, o nome
do livro que será emprestado e o tipo de usuário (campo tipo radio - codificado da seguinte forma:
1:professor 2:aluno) em um formulário HTML. Em um programa PHP imprimir um recibo
conforme com as seguintes informações. O Nome do Usuário, o Nome do Livro, a Data Atual e a
Data de Devolução. Considerar que o professor tem 14 dias para devolver o livro e o aluno 7 dias. -->

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/terceiro.php" method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required />

        <label for="nome_do_livro">Nome do livro</label>
        <input type="text" name="nome_do_livro" id="nome_do_livro" required />

        <input type="radio" name="tipo" id="professor" value="professor" required />
        <label for="professor">Professor</label>

        <input type="radio" name="tipo" id="aluno" value="aluno" required />
        <label for="aluno">Aluno</label>
        
        <button type="submit">Enviar</button>
    </form>
</body>
</html>