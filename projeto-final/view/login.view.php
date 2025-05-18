<?php
$error = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : null;
unset($_SESSION['login_error']);
?>

<section>
  <div class="container">
    <h2>Login</h2>

    <form method="POST" action="/login">
      <div class="input-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="input-group">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password" required>
      </div>

      <button type="submit">Entrar</button>

      <a href="/register">Cadastre-se</a>

      <?php if (isset($error)): ?>
        <div class="alert" role="alert">
          <?= $error ?>
        </div>
      <?php endif; ?>
    </form>
  </div>
</section>

<style>
  /* section {
    width: 100vw;
    height: 100vh;
    background-color: black;
    display: flex;
    justify-content: center;
    align-items: center;
  } */
</style>