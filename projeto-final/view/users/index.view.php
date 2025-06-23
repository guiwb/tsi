<h1>Usuários</h1>

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
                <td>botao</td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<style>
    h1 {
        margin: 20px 0;
        font-size: 24px;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
    }

    th {
        border-radius: 12px 12px 0 0;
        background-color: #f4f4f4;
    }

    tr {
        transition: background-color 0.3s ease;
        border-bottom: 1px solid #ddd;
    }

    tr:last-child {
        border-bottom: none;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    img {
        border-radius: 50%;
        margin-right: 10px;
    }
</style>