<?php
$user = UserModel::findById($current_route['params'][0]);

if (!$user) {
    header('Location: /usuarios');
    exit;
}
?>

<ul class="breadcrumb">
    <li><a href="/usuarios">Usuários</a></li>
    <li>Editar usuário</li>
</ul>

<form class="form-group" method="POST">
    <div class="input-group">
        <label for="name">Nome completo</label>
        <input type="text" id="name" name="name" value="<?= $user['name'] ?>" required>
    </div>

    <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" value="<?= $user['email'] ?>" readonly>
    </div>

    <div class="input-group">
        <label for="role">Papel</label>
        <select id="role" name="role" required>
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Administrador</option>
            <option value="coach" <?= $user['role'] == 'coach' ? 'selected' : '' ?>>Treinador</option>
            <option value="athlete" <?= $user['role'] == 'athlete' ? 'selected' : '' ?>>Atleta</option>
        </select>
    </div>

    <div class="input-group">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password" placeholder="Deixe em branco para não alterar">
    </div>

    <div class="input-group">
        <label for="confirm_password">Confirme a senha</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Deixe em branco para não alterar">
    </div>

    <button type="submit">Salvar</button>
</form>