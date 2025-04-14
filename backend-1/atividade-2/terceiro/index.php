

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/terceiro/imprime.php" method="POST">
        <label for="nome">Nome do usuário</label>
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

<?php
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$nome_do_livro = isset($_POST['nome_do_livro']) ? $_POST['nome_do_livro'] : null;
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : null;

$data_atual = new DateTime()->format('d/m/Y');
$dias_prazo = $tipo == 'aluno' ? 7 : 14;
$data_devolucao = new DateTime()->modify("+$dias_prazo days")->format('d/m/Y');

if ($nome == null) return;

$texto = sprintf("Nome do usuário: $nome\nNome do Livro: $nome_do_livro\nData atual: $data_atual\nData de devolução: $data_devolucao");
print($texto);
?>