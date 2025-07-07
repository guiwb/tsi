<header>
    <div class="header-content">
        <div class="header-info">
            <h1 class="page-title">Equipes</h1>
            <p class="page-subtitle">Gerencie as equipes de natação</p>
        </div>
        <a href="/equipes/novo" class="btn btn-primary">
            <span class="material-symbols-outlined">add_circle</span>
            <span>Nova equipe</span>
        </a>
    </div>
</header>

<div class="teams-grid">
    <?php
    $teams = TeamController::list(0, 10);

    if (!isset($teams) || count($teams) === 0) {
        echo '<div class="empty-state">
                <div class="empty-icon">
                    <span class="material-symbols-outlined">groups</span>
                </div>
                <h3>Nenhuma equipe encontrada</h3>
                <p>Comece criando a primeira equipe da plataforma</p>
                <a href="/equipes/novo" class="btn btn-primary">
                    <span class="material-symbols-outlined">add_circle</span>
                    <span>Criar equipe</span>
                </a>
              </div>';
        return;
    }

    foreach ($teams as $team) {
    ?>
        <div class="team-card card">
            <div class="card-header">
                <div class="team-avatar">
                    <div class="team-icon">
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                </div>
                <div class="team-info">
                    <h3 class="team-name"><?= $team['name'] ?></h3>
                    <p class="team-description">Equipe de natação</p>
                    <span class="badge badge-success"><?= $team['total_athletes'] ?> atletas</span>
                </div>
            </div>

            <div class="card-body">
                <div class="team-details">
                    <div class="detail-item">
                        <span class="material-symbols-outlined">people</span>
                        <div class="detail-content">
                            <span class="detail-label">Total de atletas</span>
                            <span class="detail-value"><?= $team['total_athletes'] ?? 0 ?></span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <span class="material-symbols-outlined">schedule</span>
                        <div class="detail-content">
                            <span class="detail-label">Criada em</span>
                            <span class="detail-value" data-epoch="<?= strtotime($team['created_at'] ?? 'now') * 1000 ?>"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="action-buttons">
                    <a href="/equipes/<?= $team['id'] ?>" class="btn btn-secondary btn-sm" title="Editar equipe">
                        <span class="material-symbols-outlined">edit</span>
                        <span>Editar</span>
                    </a>
                    <form action="/equipes/<?= $team['id'] ?>/delete" method="POST" class="delete-form" onsubmit="return confirm('Tem certeza que deseja deletar esta equipe?')">
                        <button type="submit" class="btn btn-danger btn-sm" title="Deletar equipe">
                            <span class="material-symbols-outlined">delete</span>
                            <span>Deletar</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<style>
    .header-info {
        flex: 1;
    }

    .teams-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: var(--space-6);
        margin-top: var(--space-8);
    }

    .team-card {
        transition: all var(--transition-normal);
        border: 1px solid var(--gray-100);
    }

    .team-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-xl);
    }

    .team-avatar {
        position: relative;
        width: 60px;
        height: 60px;
        margin-right: var(--space-4);
    }

    .team-icon {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--success-500) 0%, var(--success-600) 100%);
        border-radius: var(--radius-xl);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: var(--font-size-2xl);
        transition: all var(--transition-fast);
    }

    .team-card:hover .team-icon {
        transform: scale(1.05);
        box-shadow: var(--shadow-md);
    }

    .status-badge {
        position: absolute;
        bottom: 2px;
        right: 2px;
        width: 16px;
        height: 16px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: var(--shadow-sm);
    }

    .status-dot {
        width: 8px;
        height: 8px;
        background: var(--success-500);
        border-radius: 50%;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
            transform: scale(1);
        }

        50% {
            opacity: 0.7;
            transform: scale(1.1);
        }
    }

    .team-info {
        flex: 1;
    }

    .team-name {
        font-size: var(--font-size-lg);
        font-weight: 600;
        color: var(--gray-800);
        margin: 0 0 var(--space-1) 0;
        line-height: 1.3;
    }

    .team-description {
        font-size: var(--font-size-sm);
        color: var(--gray-600);
        margin: 0 0 var(--space-2) 0;
    }

    .team-details {
        display: flex;
        flex-direction: column;
        gap: var(--space-4);
    }

    .detail-item {
        display: flex;
        align-items: center;
        gap: var(--space-3);
        padding: var(--space-3);
        background: var(--gray-50);
        border-radius: var(--radius-lg);
        transition: all var(--transition-fast);
    }

    .detail-item:hover {
        background: var(--success-50);
        transform: translateX(4px);
    }

    .detail-item .material-symbols-outlined {
        color: var(--success-500);
        font-size: var(--font-size-lg);
    }

    .detail-content {
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .detail-label {
        font-size: var(--font-size-xs);
        color: var(--gray-500);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .detail-value {
        font-size: var(--font-size-sm);
        color: var(--gray-700);
        font-weight: 500;
    }

    .action-buttons {
        display: flex;
        gap: var(--space-2);
        width: 100%;
    }

    .action-buttons .btn {
        flex: 1;
        justify-content: center;
    }

    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: var(--space-16) var(--space-8);
        background: white;
        border-radius: var(--radius-xl);
        border: 2px dashed var(--gray-200);
    }

    .empty-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto var(--space-6);
        background: var(--success-50);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .empty-icon .material-symbols-outlined {
        font-size: var(--font-size-4xl);
        color: var(--success-500);
    }

    .empty-state h3 {
        font-size: var(--font-size-xl);
        color: var(--gray-800);
        margin: 0 0 var(--space-2) 0;
        font-weight: 600;
    }

    .empty-state p {
        color: var(--gray-600);
        margin: 0 0 var(--space-6) 0;
        font-size: var(--font-size-base);
    }

    @media (max-width: 768px) {
        .teams-grid {
            grid-template-columns: 1fr;
            gap: var(--space-4);
        }

        .team-avatar {
            margin-right: 0;
        }

        .action-buttons {
            flex-direction: column;
        }
    }

    @media (max-width: 480px) {
        .teams-grid {
            gap: var(--space-3);
        }

        .team-card {
            margin: 0 var(--space-2);
        }

        .empty-state {
            padding: var(--space-8) var(--space-4);
        }
    }
</style>