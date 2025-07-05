<header>
    <ul class="breadcrumb">
        <li>Equipes</li>
    </ul>

    <a href="/equipes/novo" class="button small with-icon"><span class="material-symbols-outlined">add_circle</span> Nova equipe</a>
</header>

<table>
    <thead>
        <th>Nome</th>
        <th>Total de atletas</th>
        <th>Ações</th>
    </thead>

    <tbody>
        <?php
        $teams = TeamController::list(0, 10);

        if (!isset($teams) || count($teams) === 0) {
            echo "<tr><td colspan='3'><p>Nenhuma equipe encontrada.</p></td></tr>";
            return;
        }

        foreach ($teams as $team) {
        ?>
            <tr>
                <td><?= $team['name'] ?></td>
                <td><?= $team['total_athletes'] ?></td>
                <td>
                    <div class="action-buttons">
                        <a href="/equipes/<?= $team['id'] ?>" class="button action edit" title="Editar equipe">
                            <span class="material-symbols-outlined">edit</span>
                        </a>
                        <form action="/equipes/<?= $team['id'] ?>/delete" method="POST" class="delete-form" onsubmit="return confirm('Tem certeza que deseja deletar esta equipe?')">
                            <button type="submit" class="button action delete" title="Deletar equipe">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>