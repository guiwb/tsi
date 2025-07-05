<header>
    <ul class="breadcrumb">
        <li>Treinos</li>
    </ul>

    <a href="/treinos/novo" class="button small with-icon"><span class="material-symbols-outlined">add_circle</span> Novo treino</a>
</header>

<table>
    <thead>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Data</th>
        <th>Ações</th>
    </thead>

    <tbody>
        <?php
        $workouts = WorkoutController::list(0, 10);

        if (!isset($workouts) || count($workouts) === 0) {
            echo "<tr><td colspan='4'><p>Nenhum treino encontrado.</p></td></tr>";
            return;
        }

        foreach ($workouts as $workout) {
        ?>
            <tr>
                <td><?= $workout['name'] ?></td>
                <td><?= $workout['description'] ?></td>
                <td><?= date('d/m/Y \à\s H:i', strtotime($workout['scheduled_at'])) ?></td>
                <td>
                    <a href="/treinos/<?= $workout['id'] ?>">Editar</a> |
                    <form action="/treinos/<?= $workout['id'] ?>/delete" method="POST">
                        <input type="submit" value="Deletar" />
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>