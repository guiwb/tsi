<?php
$team = TeamModel::findById($current_route['params']['id']);

if (!$team) {
    header('Location: /equipes');
    exit;
}
?>

<ul class="breadcrumb">
    <li><a href="/equipes">Equipes</a></li>
    <li>Editar equipe</li>
</ul>

<form class="form-group" method="POST">
    <div class="input-group">
        <label for="name">Nome</label>
        <input type="text" id="name" name="name" value="<?= $team['name'] ?>" required>
    </div>

    <button type="submit">Salvar</button>
</form>