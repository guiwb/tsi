<header>
    <div class="header-content">
        <div class="header-info">
            <h1 class="page-title">Usuários</h1>
            <p class="page-subtitle">Gerencie os usuários da plataforma</p>
        </div>
        <a href="/usuarios/novo" class="btn btn-primary">
            <span class="material-symbols-outlined">add_circle</span>
            <span>Novo usuário</span>
        </a>
    </div>
</header>

<div class="users-grid">
    <?php
    $users = UserController::list(0, 10);

    if (!isset($users) || count($users) === 0) {
        echo '<div class="empty-state">
                <div class="empty-icon">
                    <span class="material-symbols-outlined">people</span>
                </div>
                <h3>Nenhum usuário encontrado</h3>
                <p>Comece criando o primeiro usuário da plataforma</p>
                <a href="/usuarios/novo" class="btn btn-primary">
                    <span class="material-symbols-outlined">add_circle</span>
                    <span>Criar usuário</span>
                </a>
              </div>';
        return;
    }

    foreach ($users as $user) {
    ?>
        <div class="user-card card">
            <div class="card-header">
                <div class="user-avatar">
                    <img src="<?= BASE_URL ?>assets/images/<?= $user['profile_picture'] ?? 'profile_picture.png'; ?>" alt="Foto de perfil do <?= $user['name'] ?>">
                    <div class="status-badge">
                        <span class="status-dot"></span>
                    </div>
                </div>
                <div class="user-info">
                    <h3 class="user-name"><?= $user['name'] ?></h3>
                    <p class="user-email"><?= $user['email'] ?></p>
                    <span class="badge badge-primary"><?= UserRole::fromStringToLabel($user['role']) ?></span>
                </div>
            </div>

            <div class="card-body">
                <div class="user-details">
                    <div class="detail-item">
                        <span class="material-symbols-outlined">schedule</span>
                        <div class="detail-content">
                            <span class="detail-label">Criado em</span>
                            <span class="detail-value" data-epoch="<?= strtotime($user['created_at']) * 1000 ?>"></span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <span class="material-symbols-outlined">update</span>
                        <div class="detail-content">
                            <span class="detail-label">Atualizado em</span>
                            <span class="detail-value" data-epoch="<?= strtotime($user['updated_at']) * 1000 ?>"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="action-buttons">
                    <a href="/usuarios/<?= $user['id'] ?>" class="btn btn-secondary btn-sm" title="Editar usuário">
                        <span class="material-symbols-outlined">edit</span>
                        <span>Editar</span>
                    </a>
                    <form action="/usuarios/<?= $user['id'] ?>/delete" method="POST" class="delete-form" onsubmit="return confirm('Tem certeza que deseja deletar este usuário?')">
                        <button type="submit" class="btn btn-danger btn-sm" title="Deletar usuário">
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

    .users-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: var(--space-6);
        margin-top: var(--space-8);
    }

    .user-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all var(--transition-normal);
        border: 1px solid var(--gray-100);
    }

    .user-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-xl);
    }

    .user-avatar {
        position: relative;
        width: 60px;
        height: 60px;
        margin-right: var(--space-4);
    }

    .user-avatar img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--primary-200);
        transition: all var(--transition-fast);
    }

    .user-card:hover .user-avatar img {
        border-color: var(--primary-400);
        transform: scale(1.05);
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

    .user-info {
        flex: 1;
    }

    .user-name {
        font-size: var(--font-size-lg);
        font-weight: 600;
        color: var(--gray-800);
        margin: 0 0 var(--space-1) 0;
        line-height: 1.3;
    }

    .user-email {
        font-size: var(--font-size-sm);
        color: var(--gray-600);
        margin: 0 0 var(--space-2) 0;
        word-break: break-word;
    }

    .user-details {
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
        background: var(--primary-50);
        transform: translateX(4px);
    }

    .detail-item .material-symbols-outlined {
        color: var(--primary-500);
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
        background: var(--primary-50);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .empty-icon .material-symbols-outlined {
        font-size: var(--font-size-4xl);
        color: var(--primary-500);
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
        .users-grid {
            grid-template-columns: 1fr;
            gap: var(--space-4);
        }

        .user-avatar {
            margin-right: 0;
        }

        .action-buttons {
            flex-direction: column;
        }
    }

    @media (max-width: 480px) {
        .users-grid {
            gap: var(--space-3);
        }

        .user-card {
            margin: 0 var(--space-2);
        }

        .empty-state {
            padding: var(--space-8) var(--space-4);
        }
    }
</style>