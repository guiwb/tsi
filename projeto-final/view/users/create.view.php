<ul class="breadcrumb">
    <li><a href="/usuarios">Usuários</a></li>
    <li>Criar usuário</li>
</ul>

<form class="form-group" method="POST">
    <div class="input-group">
        <label for="name">Nome completo</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div class="input-group">
        <label for="role">Papel</label>
        <select id="role" name="role" required>
            <option value="admin">Administrador</option>
            <option value="coach">Treinador</option>
            <option value="athlete">Atleta</option>
        </select>
    </div>

    <div class="input-group">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div class="input-group">
        <label for="confirm_password">Confirme a senha</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
    </div>

    <button type="submit">Salvar</button>
</form>