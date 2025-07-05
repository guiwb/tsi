<header>
    <ul class="breadcrumb">
        <li>Usuários</li>
    </ul>

    <a href="/usuarios/novo" class="button small with-icon"><span class="material-symbols-outlined">add_circle</span> Novo usuário</a>
</header>

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
                    <div class="action-buttons">
                        <a href="/usuarios/<?= $user['id'] ?>" class="button action edit" title="Editar usuário">
                            <span class="material-symbols-outlined">edit</span>
                        </a>
                        <form action="/usuarios/<?= $user['id'] ?>/delete" method="POST" class="delete-form" onsubmit="return confirm('Tem certeza que deseja deletar este usuário?')">
                            <button type="submit" class="button action delete" title="Deletar usuário">
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