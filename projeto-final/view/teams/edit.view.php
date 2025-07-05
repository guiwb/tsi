<?php
$team = TeamModel::findById($current_route['params'][0]);

if (!$team) {
    header('Location: /equipes');
    exit;
}
?>

<ul class="breadcrumb">
    <li><a href="/equipes">Equipes</a></li>
    <li>Editar equipe</li>
</ul>

<form class="form-group" method="POST">
    <div class="input-group">
        <label for="name">Nome</label>
        <input type="text" id="name" name="name" value="<?= $team['name'] ?>" required>
    </div>

    <button type="submit">Salvar</button>
</form>

<div class="lists">
    <div>
        <ul class="breadcrumb">
            <li>Atletas da equipe</li>
        </ul>

        <table>
            <thead>
                <th>Nome</th>
                <th>Ações</th>
            </thead>

            <tbody>
                <?php
                $athletes = TeamModel::listAthletes($team['id']);

                if (count($athletes) === 0) {
                    ?>
                    <tr>
                        <td colspan="2">Nenhum atleta encontrado</td>
                    </tr>
                    <?php
                }

                foreach ($athletes as $athlete) {
                    ?>
                    <tr>
                        <td><?= $athlete['name'] ?></td>
                        <td>
                            <form action="/equipes/<?= $team['id'] ?>/atleta/<?= $athlete['id'] ?>/remover" method="POST" class="delete-form" onsubmit="return confirm('Tem certeza que deseja remover este atleta da equipe?')">
                                <button type="submit" class="button action delete" title="Remover atleta">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <div>
        <ul class="breadcrumb">
            <li>Adicionar atletas à equipe</li>
        </ul>

        <table>
            <thead>
                <th>Nome</th>
                <th>Ações</th>
            </thead>

            <tbody>
                <?php
                $athletes = TeamModel::listNonAthletes($team['id']);

                if (count($athletes) === 0) {
                    ?>
                    <tr>
                        <td colspan="2">Nenhum atleta encontrado</td>
                    </tr>
                    <?php
                }

                foreach ($athletes as $athlete) {
                    ?>
                    <tr>
                        <td><?= $athlete['name'] ?></td>
                        <td>
                            <form action="/equipes/<?= $team['id'] ?>/atleta/<?= $athlete['id'] ?>/adicionar" method="POST">
                                <button type="submit" class="button action" title="Adicionar atleta">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    .lists {
        display: flex;
        gap: 20px;
        justify-content: space-between;
    }

    .lists > div {
        flex: 1;
    }

    .lists > div > table > thead > tr > th:last-child {
        width: 100px;
    }
</style>
