<?php
$user = UserModel::findById($current_route['params'][0]);

if (!$user) {
    header('Location: /usuarios');
    exit;
}
?>

<div class="form-container">
    <div class="form-header">
        <div class="breadcrumb-wrapper">
            <nav class="modern-breadcrumb">
                <a href="/usuarios" class="breadcrumb-item">
                    <span class="material-symbols-outlined">people</span>
                    <span>Usuários</span>
                </a>
                <span class="breadcrumb-separator">
                    <span class="material-symbols-outlined">chevron_right</span>
                </span>
                <span class="breadcrumb-item active primary">
                    <span class="material-symbols-outlined">edit</span>
                    <span>Editar Usuário</span>
                </span>
            </nav>
        </div>
        <div class="form-title">
            <div class="title-icon primary">
                <span class="material-symbols-outlined">edit</span>
            </div>
            <div class="title-content">
                <h1>Editar Usuário</h1>
                <p>Atualize as informações do usuário</p>
            </div>
        </div>
    </div>

    <div class="form-card card">
        <form method="POST" class="modern-form">
            <div class="form-section">
                <h3 class="section-title primary">
                    <span class="material-symbols-outlined">info</span>
                    Informações Pessoais
                </h3>
                
                <div class="input-group primary">
                    <label for="name">
                        <span class="material-symbols-outlined">person</span>
                        Nome Completo
                    </label>
                    <input type="text" id="name" name="name" value="<?= $user['name'] ?>" placeholder="Digite o nome completo" required>
                </div>

                <div class="input-group primary">
                    <label for="email">
                        <span class="material-symbols-outlined">email</span>
                        E-mail
                    </label>
                    <input type="email" id="email" value="<?= $user['email'] ?>" readonly>
                    <small class="field-note">O e-mail não pode ser alterado</small>
                </div>

                <div class="input-group primary">
                    <label for="role">
                        <span class="material-symbols-outlined">admin_panel_settings</span>
                        Papel/Função
                    </label>
                    <select id="role" name="role" required>
                        <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Administrador</option>
                        <option value="coach" <?= $user['role'] == 'coach' ? 'selected' : '' ?>>Treinador</option>
                        <option value="athlete" <?= $user['role'] == 'athlete' ? 'selected' : '' ?>>Atleta</option>
                    </select>
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title primary">
                    <span class="material-symbols-outlined">security</span>
                    Alterar Senha
                </h3>
                
                <div class="password-note">
                    <span class="material-symbols-outlined">info</span>
                    <p>Deixe os campos de senha em branco para manter a senha atual</p>
                </div>
                
                <div class="input-group primary">
                    <label for="password">
                        <span class="material-symbols-outlined">lock</span>
                        Nova Senha
                    </label>
                    <input type="password" id="password" name="password" placeholder="Digite a nova senha">
                </div>

                <div class="input-group primary">
                    <label for="confirm_password">
                        <span class="material-symbols-outlined">lock_reset</span>
                        Confirme a Nova Senha
                    </label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirme a nova senha">
                </div>
            </div>

            <div class="form-actions">
                <a href="/usuarios" class="btn btn-secondary">
                    <span class="material-symbols-outlined">arrow_back</span>
                    <span>Cancelar</span>
                </a>
                <button type="submit" class="btn btn-primary">
                    <span class="material-symbols-outlined">save</span>
                    <span>Salvar Alterações</span>
                </button>
            </div>
        </form>
    </div>
</div>