<div class="form-container">
    <div class="form-header">
        <div class="breadcrumb-wrapper">
            <nav class="modern-breadcrumb">
                <a href="/treinos" class="breadcrumb-item">
                    <span class="material-symbols-outlined">fitness_center</span>
                    <span>Treinos</span>
                </a>
                <span class="breadcrumb-separator">
                    <span class="material-symbols-outlined">chevron_right</span>
                </span>
                <span class="breadcrumb-item active success">
                    <span class="material-symbols-outlined">add_circle</span>
                    <span>Criar Treino</span>
                </span>
            </nav>
        </div>
        <div class="form-title">
            <div class="title-icon success">
                <span class="material-symbols-outlined">fitness_center</span>
            </div>
            <div class="title-content">
                <h1>Criar Novo Treino</h1>
                <p>Configure um novo treino de natação para a equipe</p>
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
                        Nome do Treino
                    </label>
                    <input type="text" id="name" name="name" placeholder="Digite o nome do treino" required>
                </div>

                <div class="input-group success">
                    <label for="description">
                        <span class="material-symbols-outlined">description</span>
                        Descrição
                    </label>
                    <textarea id="description" name="description" placeholder="Descreva os detalhes do treino" required></textarea>
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title success">
                    <span class="material-symbols-outlined">schedule</span>
                    Agendamento
                </h3>
                
                <div class="input-group success">
                    <label for="scheduled_at">
                        <span class="material-symbols-outlined">event</span>
                        Data e Hora
                    </label>
                    <input type="datetime-local" id="scheduled_at" name="scheduled_at" required>
                </div>
            </div>

            <div class="form-actions">
                <a href="/treinos" class="btn btn-secondary">
                    <span class="material-symbols-outlined">arrow_back</span>
                    <span>Cancelar</span>
                </a>
                <button type="submit" class="btn btn-primary">
                    <span class="material-symbols-outlined">save</span>
                    <span>Criar Treino</span>
                </button>
            </div>
        </form>
    </div>
</div>