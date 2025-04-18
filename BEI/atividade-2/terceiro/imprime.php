<?php
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$nome_do_livro = isset($_POST['nome_do_livro']) ? $_POST['nome_do_livro'] : null;
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : null;

$data_atual = new DateTime()->format('d/m/Y');
$dias_prazo = $tipo == 'aluno' ? 7 : 14;
$data_devolucao = new DateTime()->modify("+$dias_prazo days")->format('d/m/Y');

if ($nome == null) return;

echo "Nome do usuário: $nome<br>Nome do Livro: $nome_do_livro<br>Data atual: $data_atual<br>Data de devolução: $data_devolucao";
echo "<script>window.print();</script>"
?>