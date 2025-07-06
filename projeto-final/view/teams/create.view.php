<div class="form-container">
    <div class="form-header">
        <div class="breadcrumb-wrapper">
            <nav class="modern-breadcrumb">
                <a href="/equipes" class="breadcrumb-item">
                    <span class="material-symbols-outlined">groups</span>
                    <span>Equipes</span>
                </a>
                <span class="breadcrumb-separator">
                    <span class="material-symbols-outlined">chevron_right</span>
                </span>
                <span class="breadcrumb-item active success">
                    <span class="material-symbols-outlined">add_circle</span>
                    <span>Criar Equipe</span>
                </span>
            </nav>
        </div>
        <div class="form-title">
            <div class="title-icon success">
                <span class="material-symbols-outlined">groups</span>
            </div>
            <div class="title-content">
                <h1>Criar Nova Equipe</h1>
                <p>Preencha os dados abaixo para criar uma nova equipe</p>
            </div>
        </div>
    </div>

    <div class="form-card card">
        <form method="POST" class="modern-form">
            <div class="form-section">
                <h3 class="section-title success">
                    <span class="material-symbols-outlined">info</span>
                    Informações Básicas
                </h3>
                
                <div class="input-group success">
                    <label for="name">
                        <span class="material-symbols-outlined">label</span>
                        Nome da Equipe
                    </label>
                    <input type="text" id="name" name="name" placeholder="Digite o nome da equipe" required>
                </div>
            </div>

            <div class="form-actions">
                <a href="/equipes" class="btn btn-secondary">
                    <span class="material-symbols-outlined">arrow_back</span>
                    <span>Cancelar</span>
                </a>
                <button type="submit" class="btn btn-primary">
                    <span class="material-symbols-outlined">save</span>
                    <span>Criar Equipe</span>
                </button>
            </div>
        </form>
    </div>
</div>