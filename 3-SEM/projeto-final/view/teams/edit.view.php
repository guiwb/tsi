<?php
include_once 'model/athlete.model.php';

$team = TeamModel::findById($current_route['params'][0]);

if (!$team) {
    header('Location: /equipes');
    exit;
}
?>

<div class="form-container wide">
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
                    <span class="material-symbols-outlined">edit</span>
                    <span>Editar Equipe</span>
                </span>
            </nav>
        </div>
        <div class="form-title">
            <div class="title-icon success">
                <span class="material-symbols-outlined">groups</span>
            </div>
            <div class="title-content">
                <h1>Editar Equipe</h1>
                <p>Atualize as informações da equipe e gerencie os atletas</p>
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
                    <input type="text" id="name" name="name" value="<?= $team['name'] ?>" placeholder="Digite o nome da equipe" required>
                </div>
            </div>

            <div class="form-actions">
                <a href="/equipes" class="btn btn-secondary">
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

    <div class="management-sections">
        <div class="management-card card">
            <div class="card-header">
                <h3 class="section-title success">
                    <span class="material-symbols-outlined">people</span>
                    Atletas da Equipe
                </h3>
                <span class="athlete-count"><?= TeamModel::getTotalAthletes($team['id']) ?> atletas</span>
            </div>

            <div class="athletes-list">
                <form class="input-group success" method="GET" action="/equipes/<?= $team['id'] ?>?search_out_of_team=<?= $_GET['search_out_of_team'] ?? '' ?>">
                    <input type="text" id="search" name="search_on_team" value="<?= $_GET['search_on_team'] ?? '' ?>" placeholder="Busque o usuário pelo nome">
                </form>

                <?php
                $search_text = $_GET['search_on_team'] ?? '';

                $athletes = AthleteModel::listAthletesByTeamId($team['id'], $search_text);

                if (count($athletes) === 0 && empty($search_text)) {
                    echo '<div class="empty-athletes">
                            <div class="empty-icon">
                                <span class="material-symbols-outlined">person_off</span>
                            </div>
                            <p>Nenhum atleta na equipe</p>
                          </div>';
                } else if (count($athletes) === 0) {
                    echo '<div class="empty-athletes">
                            <div class="empty-icon">
                                <span class="material-symbols-outlined">person_off</span>
                            </div>
                            <p>Nenhum atleta encontrado</p>
                          </div>';
                } else {
                    foreach ($athletes as $athlete) {
                        echo '<div class="athlete-item">
                                <div class="athlete-info">
                                    <div class="athlete-avatar">
                                        <span class="material-symbols-outlined">person</span>
                                    </div>
                                    <span class="athlete-name">' . $athlete['name'] . '</span>
                                </div>
                                <form action="/equipes/' . $team['id'] . '/atleta/' . $athlete['id'] . '/remover" method="POST" class="delete-form" onsubmit="return confirm(\'Tem certeza que deseja remover este atleta da equipe?\')">
                                    <button type="submit" class="btn btn-danger btn-sm" title="Remover atleta">
                                        <span class="material-symbols-outlined">remove_circle</span>
                                        <span>Remover</span>
                                    </button>
                                </form>
                              </div>';
                    }
                }
                ?>
            </div>
        </div>

        <div class="management-card card">
            <div class="card-header">
                <h3 class="section-title success">
                    <span class="material-symbols-outlined">person_add</span>
                    Adicionar Atletas
                </h3>
                <span class="athlete-count"><?= TeamModel::getTotalAthletesOutOfTeam($team['id']) ?> disponíveis</span>
            </div>

            <div class="athletes-list">
                <form class="input-group success" method="GET" action="/equipes/<?= $team['id'] ?>?search_on_team=<?= $_GET['search_on_team'] ?? '' ?>">
                    <input type="text" id="search" name="search_out_of_team" value="<?= $_GET['search_out_of_team'] ?? '' ?>" placeholder="Busque o usuário pelo nome">
                </form>

                <?php
                $search_text = $_GET['search_out_of_team'] ?? '';

                $athletes = AthleteModel::listAthletesOutOfTeamId($team['id'], $search_text);

                if (count($athletes) === 0 && empty($search_text)) {
                    echo '<div class="empty-athletes">
                            <div class="empty-icon">
                                <span class="material-symbols-outlined">check_circle</span>
                            </div>
                            <p>Todos os atletas já estão na equipe</p>
                          </div>';
                } else if (count($athletes) === 0) {
                    echo '<div class="empty-athletes">
                            <div class="empty-icon">
                                <span class="material-symbols-outlined">person_off</span>
                            </div>
                            <p>Nenhum atleta encontrado</p>
                          </div>';
                } else {
                    foreach ($athletes as $athlete) {
                        echo '<div class="athlete-item">
                                <div class="athlete-info">
                                    <div class="athlete-avatar">
                                        <span class="material-symbols-outlined">person</span>
                                    </div>
                                    <span class="athlete-name">' . $athlete['name'] . '</span>
                                </div>
                                <form action="/equipes/' . $team['id'] . '/atleta/' . $athlete['id'] . '/adicionar" method="POST">
                                    <button type="submit" class="btn btn-success btn-sm" title="Adicionar atleta">
                                        <span class="material-symbols-outlined">add_circle</span>
                                        <span>Adicionar</span>
                                    </button>
                                </form>
                              </div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<style>
    .management-sections {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-6);
    }

    .management-card {
        background: white;
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-lg);
        overflow: hidden;
    }

    .athlete-count {
        font-size: var(--font-size-sm);
        color: var(--gray-500);
        font-weight: 500;
        padding: var(--space-1) var(--space-3);
        background: var(--gray-100);
        border-radius: var(--radius-full);
    }

    .athletes-list {
        padding: var(--space-6);
        max-height: 400px;
        overflow-y: auto;
    }

    .athlete-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: var(--space-4);
        border: 1px solid var(--gray-100);
        border-radius: var(--radius-lg);
        margin-bottom: var(--space-3);
        transition: all var(--transition-fast);
    }

    .athlete-item:hover {
        border-color: var(--success-200);
        background: var(--success-50);
        transform: translateX(4px);
    }

    .athlete-info {
        display: flex;
        align-items: center;
        gap: var(--space-3);
    }

    .athlete-avatar {
        width: 40px;
        height: 40px;
        background: var(--success-100);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--success-600);
    }

    .athlete-name {
        font-weight: 500;
        color: var(--gray-700);
    }

    .empty-athletes {
        text-align: center;
        padding: var(--space-8) var(--space-4);
        color: var(--gray-500);
    }

    .empty-athletes .empty-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto var(--space-4);
        background: var(--gray-100);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gray-400);
        font-size: var(--font-size-2xl);
    }

    .empty-athletes p {
        margin: 0;
        font-size: var(--font-size-sm);
    }

    @media (max-width: 1024px) {
        .management-sections {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {

        .athlete-item {
            flex-direction: column;
            gap: var(--space-3);
            text-align: center;
        }
    }
</style>