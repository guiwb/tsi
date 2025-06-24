<section class="signup-container">
    <h1>CADASTRE-SE</h1>

    <p>Faça o seu cadastro para utilizar a plataforma!</p>

    <form method="POST" action="/signup">
        <div class="input-group">
            <span class="material-symbols-outlined">person</span>
            <input class="with-icon" type="text" id="name" placeholder="Nome completo" name="name" required>
        </div>

        <div class="input-group">
            <span class="material-symbols-outlined">alternate_email</span>
            <input class="with-icon" type="email" id="email" placeholder="E-mail" name="email" required>
        </div>

        <div class="input-group">
            <span class="material-symbols-outlined">password</span>
            <input class="with-icon" type="password" id="password" placeholder="Senha" name="password" required>
        </div>

        <div class="input-group">
            <span class="material-symbols-outlined">password</span>
            <input class="with-icon" type="password" id="confirm_password" placeholder="Confirme a senha" name="confirm_password" required>
        </div>

        <div class="button-group">
            <a class="button-link" href="/login">Voltar para o login</a>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</section>

<style>
    .signup-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .signup-container h1 {
        font-size: 30px;
        margin-bottom: 10px;
    }

    .signup-container p {
        font-size: 16px;
        margin-bottom: 24px;
        color: #525252;
    }

    .signup-container form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .button-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    @keyframes slide-up {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>