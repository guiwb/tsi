<section class="login-container">
  <h1>LOGIN</h1>

  <p>Faça o login para utilizar a plataforma!</p>

  <form method="POST" action="/login">
    <div class="input-group">
      <span class="material-symbols-outlined">alternate_email</span>
      <input class="with-icon" type="email" id="email" placeholder="E-mail" name="email" required>
    </div>

    <div class="input-group">
      <span class="material-symbols-outlined">password</span>
      <input class="with-icon" type="password" id="password" placeholder="Senha" name="password" required>
    </div>

    <div class="button-group">
      <a class="button-link" href="/signup">Cadastre-se</a>
      <button type="submit">Entrar</button>
    </div>
  </form>
</section>

<style>
  .login-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
  }

  .login-container h1 {
    font-size: 30px;
    margin-bottom: 10px;
  }

  .login-container p {
    font-size: 16px;
    margin-bottom: 24px;
    color: #525252;
  }

  .login-container form {
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
</style>