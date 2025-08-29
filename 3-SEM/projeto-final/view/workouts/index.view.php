<header>
    <div class="header-content">
        <div class="header-info">
            <h1 class="page-title">Treinos</h1>
            <p class="page-subtitle">Gerencie os treinos de natação</p>
        </div>
        <a href="/treinos/novo" class="btn btn-primary">
            <span class="material-symbols-outlined">add_circle</span>
            <span>Novo treino</span>
        </a>
    </div>
</header>

<div class="workouts-grid">
    <?php
    $workouts = WorkoutController::list(0, 10);

    if (!isset($workouts) || count($workouts) === 0) {
        echo '<div class="empty-state">
                <div class="empty-icon">
                    <span class="material-symbols-outlined">fitness_center</span>
                </div>
                <h3>Nenhum treino encontrado</h3>
                <p>Comece criando o primeiro treino da plataforma</p>
                <a href="/treinos/novo" class="btn btn-primary">
                    <span class="material-symbols-outlined">add_circle</span>
                    <span>Criar treino</span>
                </a>
              </div>';
        return;
    }

    foreach ($workouts as $workout) {
    ?>
        <div class="workout-card card">
            <div class="card-header">
                <div class="workout-avatar">
                    <div class="workout-icon">
                        <span class="material-symbols-outlined">fitness_center</span>
                    </div>
                </div>
                <div class="workout-info">
                    <h3 class="workout-name"><?= $workout['name'] ?></h3>
                    <p class="workout-description"><?= $workout['description'] ?? 'Treino de natação' ?></p>
                </div>
            </div>

            <div class="card-body">
                <div class="workout-details">
                    <div class="detail-item">
                        <span class="material-symbols-outlined">schedule</span>
                        <div class="detail-content">
                            <span class="detail-label">Data agendada</span>
                            <span class="detail-value" data-epoch="<?= strtotime($workout['scheduled_at']) * 1000 ?>"></span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <span class="material-symbols-outlined">description</span>
                        <div class="detail-content">
                            <span class="detail-label">Descrição</span>
                            <span class="detail-value"><?= $workout['description'] ?? 'Sem descrição' ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="action-buttons">
                    <a href="/treinos/<?= $workout['id'] ?>" class="btn btn-secondary btn-sm" title="Editar treino">
                        <span class="material-symbols-outlined">edit</span>
                        <span>Editar</span>
                    </a>
                    <form action="/treinos/<?= $workout['id'] ?>/delete" method="POST" class="delete-form" onsubmit="return confirm('Tem certeza que deseja deletar este treino?')">
                        <button type="submit" class="btn btn-danger btn-sm" title="Deletar treino">
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

    .workouts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: var(--space-6);
        margin-top: var(--space-8);
    }

    .workout-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all var(--transition-normal);
        border: 1px solid var(--gray-100);
    }

    .workout-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-xl);
    }

    .workout-avatar {
        position: relative;
        width: 60px;
        height: 60px;
        margin-right: var(--space-4);
    }

    .workout-icon {
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

    .workout-card:hover .workout-icon {
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
        background: var(--info-500);
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

    .workout-info {
        flex: 1;
    }

    .workout-name {
        font-size: var(--font-size-lg);
        font-weight: 600;
        color: var(--gray-800);
        margin: 0 0 var(--space-1) 0;
        line-height: 1.3;
    }

    .workout-description {
        font-size: var(--font-size-sm);
        color: var(--gray-600);
        margin: 0 0 var(--space-2) 0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .workout-details {
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
        background: var(--info-50);
        transform: translateX(4px);
    }

    .detail-item .material-symbols-outlined {
        color: var(--info-500);
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
        word-break: break-word;
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
        background: var(--info-50);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .empty-icon .material-symbols-outlined {
        font-size: var(--font-size-4xl);
        color: var(--info-500);
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
        .workouts-grid {
            grid-template-columns: 1fr;
            gap: var(--space-4);
        }

        .workout-avatar {
            margin-right: 0;
        }

        .action-buttons {
            flex-direction: column;
        }
    }

    @media (max-width: 480px) {
        .workouts-grid {
            gap: var(--space-3);
        }

        .workout-card {
            margin: 0 var(--space-2);
        }

        .empty-state {
            padding: var(--space-8) var(--space-4);
        }
    }
</style>