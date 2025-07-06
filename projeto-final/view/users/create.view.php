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
                    <span class="material-symbols-outlined">add_circle</span>
                    <span>Criar Usuário</span>
                </span>
            </nav>
        </div>
        <div class="form-title">
            <div class="title-icon primary">
                <span class="material-symbols-outlined">person_add</span>
            </div>
            <div class="title-content">
                <h1>Criar Novo Usuário</h1>
                <p>Adicione um novo usuário à plataforma</p>
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
                    <input type="text" id="name" name="name" placeholder="Digite o nome completo" required>
                </div>

                <div class="input-group primary">
                    <label for="email">
                        <span class="material-symbols-outlined">email</span>
                        E-mail
                    </label>
                    <input type="email" id="email" name="email" placeholder="Digite o e-mail" required>
                </div>

                <div class="input-group primary">
                    <label for="role">
                        <span class="material-symbols-outlined">admin_panel_settings</span>
                        Papel/Função
                    </label>
                    <select id="role" name="role" required>
                        <option value="">Selecione o papel</option>
                        <option value="admin">Administrador</option>
                        <option value="coach">Treinador</option>
                        <option value="athlete">Atleta</option>
                    </select>
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title primary">
                    <span class="material-symbols-outlined">security</span>
                    Segurança
                </h3>
                
                <div class="input-group primary">
                    <label for="password">
                        <span class="material-symbols-outlined">lock</span>
                        Senha
                    </label>
                    <input type="password" id="password" name="password" placeholder="Digite a senha" required>
                </div>

                <div class="input-group primary">
                    <label for="confirm_password">
                        <span class="material-symbols-outlined">lock_reset</span>
                        Confirme a Senha
                    </label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirme a senha" required>
                </div>
            </div>

            <div class="form-actions">
                <a href="/usuarios" class="btn btn-secondary">
                    <span class="material-symbols-outlined">arrow_back</span>
                    <span>Cancelar</span>
                </a>
                <button type="submit" class="btn btn-primary">
                    <span class="material-symbols-outlined">save</span>
                    <span>Criar Usuário</span>
                </button>
            </div>
        </form>
    </div>
</div>