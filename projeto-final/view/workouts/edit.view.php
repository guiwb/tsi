<?php
$workout = WorkoutModel::findById($current_route['params']['id']);

if (!$workout) {
    header('Location: /treinos');
    exit;
}
?>

<ul class="breadcrumb">
    <li><a href="/treinos">Treinos</a></li>
    <li>Editar treino</li>
</ul>

<form class="form-group" method="POST">
    <div class="input-group">
        <label for="name">Nome</label>
        <input type="text" id="name" name="name" value="<?= $workout['name'] ?>" required>
    </div>

    <div class="input-group">
        <label for="scheduled_at">Data</label>
        <input type="datetime-local" id="scheduled_at" name="scheduled_at" value="<?= $workout['scheduled_at'] ?>" required>
    </div>

    <div class="input-group">
        <label for="description">Descrição</label>
        <textarea id="description" name="description" required><?= $workout['description'] ?></textarea>
    </div>

    <button type="submit">Salvar</button>
</form>