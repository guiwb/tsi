<?php
include 'conecta.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>

  <style>
    :root {
      --bg: #0f1724;
      --card: #0b1220;
      --muted: #9aa4b2;
      --accent: #7c3aed;
      --glass: rgba(255, 255, 255, 0.04);
    }

    * {
      box-sizing: border-box
    }

    html,
    body {
      height: 100%;
    }

    body {
      font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
      margin: 0;
      padding: 32px;
      background: linear-gradient(180deg, #071029 0%, #0b1220 100%);
      color: #e6eef8;
      -webkit-font-smoothing: antialiased;
    }

    .wrap {
      max-width: 980px;
      margin: 0 auto
    }

    header.appbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 20px;
    }

    .brand {
      display: flex;
      gap: 12px;
      align-items: center
    }

    .logo {
      width: 52px;
      height: 52px;
      border-radius: 12px;
      background: linear-gradient(135deg, var(--accent), #06b6d4);
      display: grid;
      place-items: center;
      font-weight: 700;
      color: white;
      font-size: 18px;
      box-shadow: 0 6px 18px rgba(10, 10, 30, 0.6);
    }

    h1 {
      font-size: 20px;
      margin: 0
    }

    p.lead {
      margin: 0;
      color: var(--muted);
      font-size: 13px
    }

    .top-actions {
      display: flex;
      gap: 12px;
      align-items: center
    }

    .btn {
      background: var(--accent);
      color: white;
      padding: 10px 14px;
      border-radius: 8px;
      text-decoration: none;
      display: inline-block;
      font-weight: 600;
      box-shadow: 0 6px 18px rgba(124, 58, 237, 0.18);
    }

    .card {
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
      border: 1px solid rgba(255, 255, 255, 0.04);
      padding: 18px;
      border-radius: 12px;
      box-shadow: 0 8px 30px rgba(2, 6, 23, 0.6);
    }

    .controls {
      display: flex;
      gap: 12px;
      margin-bottom: 12px;
      align-items: center
    }

    .search {
      flex: 1
    }

    .search input {
      width: 100%;
      padding: 10px 12px;
      border-radius: 10px;
      border: 1px solid rgba(255, 255, 255, 0.04);
      background: var(--glass);
      color: inherit
    }

    .table-wrap {
      overflow: auto;
      border-radius: 10px
    }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 560px
    }

    thead th {
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: 0.6px;
      padding: 12px 14px;
      background: rgba(255, 255, 255, 0.02);
      color: var(--muted);
      border-bottom: 1px solid rgba(255, 255, 255, 0.03)
    }

    tbody td {
      padding: 12px 14px;
      border-bottom: 1px dashed rgba(255, 255, 255, 0.03);
      vertical-align: middle
    }

    tbody tr:hover {
      background: rgba(255, 255, 255, 0.01)
    }

    .avatar {
      width: 40px;
      height: 40px;
      border-radius: 999px;
      display: inline-grid;
      place-items: center;
      font-weight: 700;
      color: #061226;
      background: linear-gradient(135deg, #60a5fa, #7c3aed);
    }

    .muted {
      color: var(--muted);
      font-size: 13px
    }

    @media (max-width:640px) {
      body {
        padding: 18px
      }

      .brand h1 {
        font-size: 16px
      }

      .controls {
        flex-direction: column;
        align-items: stretch
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
          <h1>Painel de Usuários</h1>
          <p class="lead">Visualize e pesquise os usuários cadastrados</p>
        </div>
      </div>

      <div class="top-actions">
        <a class="btn" href="cadastro.php">+ Cadastrar usuário</a>
      </div>
    </header>

    <main class="card">
      <div class="controls">
        <div class="search">
          <input id="q" placeholder="Pesquisar por nome ou email..." aria-label="Pesquisar" />
        </div>
        <div class="muted">Total de registros: <span id="total">--</span></div>
      </div>

      <section>
        <h2 class="muted" style="margin-top:0;margin-bottom:12px">Lista de usuários</h2>

        <div class="table-wrap">
          <table id="users-table">
            <thead>
              <tr>
                <th></th>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $stmt = $conn->prepare("SELECT id, name, email FROM users");
              $stmt->execute();
              $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

              if (!$users) {
                echo "<tr><td colspan='4' class='muted'>Nenhum usuário cadastrado.</td></tr>";
              }

              foreach ($users as $user) {
                // criar iniciais para avatar
                $initials = '';
                $parts = preg_split('/\s+/', trim($user['name']));
                if (count($parts) >= 1) {
                  $initials .= mb_substr($parts[0], 0, 1);
                }
                if (count($parts) >= 2) {
                  $initials .= mb_substr(end($parts), 0, 1);
                }
              ?>
                <tr>
                  <td>
                    <div class="avatar"><?php echo strtoupper($initials); ?></div>
                  </td>
                  <td><?= htmlspecialchars($user['id']); ?></td>
                  <td><?= htmlspecialchars($user['name']); ?></td>
                  <td><?= htmlspecialchars($user['email']); ?></td>
                  <td>
                    <a href="processa_delecao.php?id=<?= urlencode($user['id']); ?>" onclick="return confirm('Tem certeza que deseja deletar este usuário?');">Deletar</a>
                    <a href="edicao.php?id=<?= urlencode($user['id']); ?>">Editar</a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </main>

    <footer style="margin-top:14px;color:var(--muted);font-size:13px">Página estilizada localmente — Pesquise pelo campo acima. (Mudanças em <strong>index.php</strong>)</footer>
  </div>

  <script>
    // busca simples no cliente
    (function() {
      const q = document.getElementById('q');
      const tbody = document.querySelector('#users-table tbody');
      const rows = Array.from(tbody.querySelectorAll('tr'));
      const totalEl = document.getElementById('total');

      function updateTotal() {
        const visible = rows.filter(r => r.style.display !== 'none').length;
        totalEl.textContent = visible;
      }

      q && q.addEventListener('input', function(e) {
        const term = (e.target.value || '').toLowerCase().trim();
        rows.forEach(r => {
          const text = r.innerText.toLowerCase();
          r.style.display = term === '' || text.indexOf(term) !== -1 ? '' : 'none';
        });
        updateTotal();
      });

      // set initial total
      updateTotal();
    })();
  </script>
</body>

</html>