<ul class="breadcrumb">
    <li>Usuários</li>
</ul>

<table>
    <thead>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Papel</th>
        <th>Criado em</th>
        <th>Atualizado em</th>
        <th>Ações</th>
    </thead>

    <tbody>
        <?php
        $users = UserController::list(0, 10);

        if (!isset($users) || count($users) === 0) {
            echo "<p>Nenhum usuário encontrado.</p>";
            return;
        }

        foreach ($users as $user) {
        ?>
            <tr>
                <td>
                    <img width="30px" src="assets/images/<?= $_SESSION['user']['profile_picture'] ?? 'profile_picture.png'; ?>" alt="Foto de perfil do usuário">
                    <span><?= $user['name'] ?></span>
                </td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['role'] ?></td>
                <td><?= date('d/m/Y \à\s H:i', strtotime($user['created_at'])) ?></td>
                <td><?= date('d/m/Y \à\s H:i', strtotime($user['updated_at'])) ?></td>
                <td>
                    <a href="/usuarios/<?= $user['id'] ?>">Editar</a> |
                    <form action="/usuarios/<?= $user['id'] ?>/delete" method="POST">
                        <input type="submit" value="Deletar" />
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<style>
    td:first-child {
        display: flex;
        align-items: center;
    }

    img {
        border-radius: 50%;
        margin-right: 10px;
    }
</style>