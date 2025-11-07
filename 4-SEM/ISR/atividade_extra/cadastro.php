<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastre-se</title>

  <style>
    :root {
      --bg: #071029;
      --card: #0b1220;
      --muted: #9aa4b2;
      --accent: #7c3aed;
      --glass: rgba(255, 255, 255, 0.03);
    }

    * {
      box-sizing: border-box
    }

    html,
    body {
      height: 100%
    }

    body {
      margin: 0;
      padding: 28px;
      font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, Arial;
      color: #e6eef8;
      background: linear-gradient(180deg, #071029 0%, #0b1220 100%);
    }

    .wrap {
      max-width: 720px;
      margin: 0 auto
    }

    header.appbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 18px
    }

    .brand {
      display: flex;
      gap: 12px;
      align-items: center
    }

    .logo {
      width: 48px;
      height: 48px;
      border-radius: 10px;
      background: linear-gradient(135deg, var(--accent), #06b6d4);
      display: grid;
      place-items: center;
      font-weight: 700;
      color: white
    }

    h1 {
      margin: 0;
      font-size: 18px
    }

    .lead {
      margin: 0;
      color: var(--muted);
      font-size: 13px
    }

    .card {
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
      border: 1px solid rgba(255, 255, 255, 0.04);
      padding: 18px;
      border-radius: 12px;
      box-shadow: 0 12px 30px rgba(2, 6, 23, 0.6)
    }

    form.row {
      display: grid;
      grid-template-columns: 1fr;
      gap: 12px
    }

    label {
      display: block;
      font-size: 13px;
      color: var(--muted);
      margin-bottom: 6px
    }

    input[type="text"],
    input[type="email"],
    button[type="submit"] {
      width: 100%;
      padding: 12px;
      border-radius: 10px;
      border: 1px solid rgba(255, 255, 255, 0.04);
      background: var(--glass);
      color: inherit
    }

    input:focus,
    button:focus {
      outline: none;
      box-shadow: 0 6px 18px rgba(124, 58, 237, 0.12)
    }

    .actions {
      display: flex;
      gap: 10px;
      align-items: center
    }

    .btn {
      background: var(--accent);
      color: white;
      padding: 10px 14px;
      border-radius: 10px;
      border: none;
      font-weight: 600;
      text-decoration: none
    }

    .btn.ghost {
      background: transparent;
      border: 1px solid rgba(255, 255, 255, 0.06);
      color: var(--muted)
    }

    .muted {
      color: var(--muted);
      font-size: 13px
    }

    p.error {
      color: #ff6b6b;
      margin: 0
    }

    @media(max-width:520px) {
      body {
        padding: 18px
      }

      .wrap {
        padding: 0
      }
    }
  </style>
</head>

<body>
  <div class="wrap">
    <header class="appbar">
      <div class="brand">
        <div class="logo">US</div>
        <div>
          <h1>Cadastro de Usuário</h1>
          <p class="lead">Preencha os dados para cadastrar um novo usuário</p>
        </div>
      </div>

      <div>
        <a href="index.php" class="btn btn-ghost">Voltar</a>
      </div>
    </header>

    <main class="card">
      <form class="row" action="processa_cadastro.php" method="POST" id="cadForm" novalidate>
        <div>
          <label for="name">Nome</label>
          <input type="text" id="name" name="name" required maxlength="100" autocomplete="name" />
        </div>

        <div>
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required maxlength="150" autocomplete="email" />
        </div>

        <div class="actions">
          <button type="submit" class="btn">Cadastrar</button>
          <a href="index.php" class="btn ghost">Cancelar</a>
        </div>

        <?php if (isset($_SESSION['error'])): ?>
          <p class="error"><?php echo htmlspecialchars($_SESSION['error']);
                            unset($_SESSION['error']); ?></p>
        <?php endif; ?>
      </form>
    </main>

    <footer style="margin-top:12px;color:var(--muted);font-size:13px">Formulário estilizado localmente — alterações em <strong>cadastro.php</strong></footer>
  </div>

  <script>
    // validação simples no cliente
    (function() {
      const form = document.getElementById('cadForm');
      form.addEventListener('submit', function(e) {
        const name = form.name.value.trim();
        const email = form.email.value.trim();
        let err = '';
        if (name.length < 2) err = 'O nome deve ter ao menos 2 caracteres.';
        else if (!/^\S+@\S+\.\S+$/.test(email)) err = 'Informe um email válido.';
        if (err) {
          e.preventDefault();
          let el = form.querySelector('p.error');
          if (!el) {
            el = document.createElement('p');
            el.className = 'error';
            form.appendChild(el);
          }
          el.textContent = err;
        }
      });
    })();
  </script>
</body>

</html>