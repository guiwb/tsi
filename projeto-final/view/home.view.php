<header>
    <div class="header-content">
        <div class="header-info">
            <h1 class="page-title">Bem-vindo ao Natare</h1>
            <p class="page-subtitle">Sua plataforma completa de gestão de natação</p>
        </div>
        <div class="welcome-message">
            <span class="material-symbols-outlined">waving_hand</span>
            <span>Olá, <?= $_SESSION['user']['name'] ?? 'Atleta' ?>!</span>
        </div>
    </div>
</header>

<div class="dashboard">
    <div class="metrics-grid">
        <div class="metric-card card">
            <div class="metric-icon users">
                <span class="material-symbols-outlined">people</span>
            </div>
            <div class="metric-content">
                <h3 class="metric-value"><?= UserModel::getTotalUsers() ?></h3>
                <p class="metric-label">Usuários</p>
            </div>
            <div class="metric-trend positive">
                <span class="material-symbols-outlined">trending_up</span>
                <span>+12%</span>
            </div>
        </div>

        <div class="metric-card card">
            <div class="metric-icon teams">
                <span class="material-symbols-outlined">groups</span>
            </div>
            <div class="metric-content">
                <h3 class="metric-value"><?= TeamModel::getTotalTeams() ?></h3>
                <p class="metric-label">Equipes</p>
            </div>
            <div class="metric-trend positive">
                <span class="material-symbols-outlined">trending_up</span>
                <span>+8%</span>
            </div>
        </div>

        <div class="metric-card card">
            <div class="metric-icon workouts">
                <span class="material-symbols-outlined">fitness_center</span>
            </div>
            <div class="metric-content">
                <h3 class="metric-value"><?= WorkoutModel::getTotalWorkouts() ?></h3>
                <p class="metric-label">Treinos</p>
            </div>
            <div class="metric-trend positive">
                <span class="material-symbols-outlined">trending_up</span>
                <span>+15%</span>
            </div>
        </div>

        <div class="metric-card card">
            <div class="metric-icon sessions">
                <span class="material-symbols-outlined">schedule</span>
            </div>
            <div class="metric-content">
                <h3 class="metric-value">24</h3>
                <p class="metric-label">Sessões Hoje</p>
            </div>
            <div class="metric-trend neutral">
                <span class="material-symbols-outlined">trending_flat</span>
                <span>0%</span>
            </div>
        </div>
    </div>

    <div class="quick-actions">
        <h2 class="section-title">
            <span class="material-symbols-outlined">bolt</span>
            Ações Rápidas
        </h2>

        <div class="actions-grid">
            <a href="/usuarios/novo" class="action-card card">
                <div class="action-icon">
                    <span class="material-symbols-outlined">person_add</span>
                </div>
                <div class="action-content">
                    <h3>Novo Usuário</h3>
                    <p>Adicionar um novo atleta ou treinador</p>
                </div>
                <div class="action-arrow">
                    <span class="material-symbols-outlined">arrow_forward</span>
                </div>
            </a>

            <a href="/equipes/novo" class="action-card card">
                <div class="action-icon">
                    <span class="material-symbols-outlined">group_add</span>
                </div>
                <div class="action-content">
                    <h3>Nova Equipe</h3>
                    <p>Criar uma nova equipe de natação</p>
                </div>
                <div class="action-arrow">
                    <span class="material-symbols-outlined">arrow_forward</span>
                </div>
            </a>

            <a href="/treinos/novo" class="action-card card">
                <div class="action-icon">
                    <span class="material-symbols-outlined">add_task</span>
                </div>
                <div class="action-content">
                    <h3>Novo Treino</h3>
                    <p>Planejar um novo treino</p>
                </div>
                <div class="action-arrow">
                    <span class="material-symbols-outlined">arrow_forward</span>
                </div>
            </a>

            <a href="/usuarios" class="action-card card">
                <div class="action-icon">
                    <span class="material-symbols-outlined">manage_accounts</span>
                </div>
                <div class="action-content">
                    <h3>Gerenciar Usuários</h3>
                    <p>Ver e editar usuários da plataforma</p>
                </div>
                <div class="action-arrow">
                    <span class="material-symbols-outlined">arrow_forward</span>
                </div>
            </a>
        </div>
    </div>

    <div class="recent-activity">
        <h2 class="section-title">
            <span class="material-symbols-outlined">history</span>
            Atividade Recente
        </h2>

        <div class="activity-list">
            <div class="activity-item">
                <div class="activity-icon">
                    <span class="material-symbols-outlined">person_add</span>
                </div>
                <div class="activity-content">
                    <h4>Novo usuário cadastrado</h4>
                    <p>João Silva foi adicionado à plataforma</p>
                    <span class="activity-time">Há 2 horas</span>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon">
                    <span class="material-symbols-outlined">fitness_center</span>
                </div>
                <div class="activity-content">
                    <h4>Treino criado</h4>
                    <p>Treino de resistência para equipe A</p>
                    <span class="activity-time">Há 4 horas</span>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon">
                    <span class="material-symbols-outlined">groups</span>
                </div>
                <div class="activity-content">
                    <h4>Equipe atualizada</h4>
                    <p>Equipe B recebeu novos membros</p>
                    <span class="activity-time">Ontem</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .welcome-message {
        display: flex;
        align-items: center;
        gap: var(--space-2);
        padding: var(--space-3) var(--space-4);
        background: linear-gradient(135deg, var(--success-50) 0%, var(--success-100) 100%);
        border-radius: var(--radius-xl);
        color: var(--success-700);
        font-weight: 600;
        font-size: var(--font-size-sm);
    }

    .welcome-message .material-symbols-outlined {
        animation: wave 2s infinite;
    }

    @keyframes wave {

        0%,
        100% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(20deg);
        }

        75% {
            transform: rotate(-20deg);
        }
    }

    .dashboard {
        display: flex;
        flex-direction: column;
        gap: var(--space-8);
        margin-top: var(--space-8);
    }

    .metrics-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: var(--space-6);
    }

    .metric-card {
        display: flex;
        align-items: center;
        gap: var(--space-4);
        padding: var(--space-6);
        position: relative;
        overflow: hidden;
    }

    .metric-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, var(--primary-50) 0%, transparent 100%);
        opacity: 0;
        transition: opacity var(--transition-fast);
    }

    .metric-card:hover::before {
        opacity: 1;
    }

    .metric-icon {
        width: 60px;
        height: 60px;
        border-radius: var(--radius-xl);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 1;
    }

    .metric-icon.users {
        background: linear-gradient(135deg, var(--primary-500) 0%, var(--primary-600) 100%);
        color: white;
    }

    .metric-icon.teams {
        background: linear-gradient(135deg, var(--success-500) 0%, var(--success-600) 100%);
        color: white;
    }

    .metric-icon.workouts {
        background: linear-gradient(135deg, var(--warning-500) 0%, var(--warning-600) 100%);
        color: white;
    }

    .metric-icon.sessions {
        background: linear-gradient(135deg, var(--danger-500) 0%, var(--danger-600) 100%);
        color: white;
    }

    .metric-icon .material-symbols-outlined {
        font-size: var(--font-size-2xl);
    }

    .metric-content {
        flex: 1;
        position: relative;
        z-index: 1;
    }

    .metric-value {
        font-size: var(--font-size-3xl);
        font-weight: 700;
        color: var(--gray-800);
        margin: 0 0 var(--space-1) 0;
        line-height: 1;
    }

    .metric-label {
        font-size: var(--font-size-sm);
        color: var(--gray-600);
        margin: 0;
        font-weight: 500;
    }

    .metric-trend {
        display: flex;
        align-items: center;
        gap: var(--space-1);
        font-size: var(--font-size-xs);
        font-weight: 600;
        padding: var(--space-1) var(--space-2);
        border-radius: var(--radius-full);
        position: relative;
        z-index: 1;
    }

    .metric-trend.positive {
        background: var(--success-100);
        color: var(--success-700);
    }

    .metric-trend.neutral {
        background: var(--gray-100);
        color: var(--gray-600);
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: var(--space-3);
        font-size: var(--font-size-xl);
        font-weight: 600;
        color: var(--gray-800);
        margin: 0 0 var(--space-6) 0;
    }

    .section-title .material-symbols-outlined {
        color: var(--primary-500);
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: var(--space-4);
    }

    .action-card {
        display: flex;
        align-items: center;
        gap: var(--space-4);
        padding: var(--space-6);
        text-decoration: none;
        color: inherit;
        transition: all var(--transition-normal);
        position: relative;
        overflow: hidden;
    }

    .action-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left var(--transition-slow);
    }

    .action-card:hover::before {
        left: 100%;
    }

    .action-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-xl);
    }

    .action-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-50);
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-600);
        transition: all var(--transition-fast);
    }

    .action-card:hover .action-icon {
        background: var(--primary-500);
        color: white;
        transform: scale(1.1);
    }

    .action-content {
        flex: 1;
    }

    .action-content h3 {
        font-size: var(--font-size-lg);
        font-weight: 600;
        color: var(--gray-800);
        margin: 0 0 var(--space-1) 0;
    }

    .action-content p {
        font-size: var(--font-size-sm);
        color: var(--gray-600);
        margin: 0;
    }

    .action-arrow {
        color: var(--gray-400);
        transition: all var(--transition-fast);
    }

    .action-card:hover .action-arrow {
        color: var(--primary-500);
        transform: translateX(4px);
    }

    .activity-list {
        display: flex;
        flex-direction: column;
        gap: var(--space-4);
    }

    .activity-item {
        display: flex;
        align-items: flex-start;
        gap: var(--space-4);
        padding: var(--space-4);
        background: white;
        border-radius: var(--radius-lg);
        border: 1px solid var(--gray-100);
        transition: all var(--transition-fast);
    }

    .activity-item:hover {
        background: var(--gray-50);
        transform: translateX(4px);
        box-shadow: var(--shadow-md);
    }

    .activity-icon {
        width: 40px;
        height: 40px;
        background: var(--primary-50);
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-600);
        flex-shrink: 0;
    }

    .activity-content {
        flex: 1;
    }

    .activity-content h4 {
        font-size: var(--font-size-base);
        font-weight: 600;
        color: var(--gray-800);
        margin: 0 0 var(--space-1) 0;
    }

    .activity-content p {
        font-size: var(--font-size-sm);
        color: var(--gray-600);
        margin: 0 0 var(--space-1) 0;
    }

    .activity-time {
        font-size: var(--font-size-xs);
        color: var(--gray-500);
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .metrics-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: var(--space-4);
        }

        .actions-grid {
            grid-template-columns: 1fr;
        }

        .metric-card {
            flex-direction: column;
            text-align: center;
            gap: var(--space-3);
        }

        .metric-trend {
            align-self: center;
        }
    }

    @media (max-width: 480px) {
        .dashboard {
            gap: var(--space-6);
        }

        .metrics-grid {
            grid-template-columns: 1fr;
        }

        .action-card {
            flex-direction: column;
            text-align: center;
            gap: var(--space-3);
        }

        .action-arrow {
            display: none;
        }
    }
</style>