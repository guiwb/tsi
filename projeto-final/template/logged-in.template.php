<?php
define('BASE_URL', '/');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Natare App - <?= $current_route['title'] ?></title>

  <link rel="stylesheet" href="<?= BASE_URL ?>assets/styles/reset.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/styles/design-system.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <style>
    body {
      width: 100%;
      min-height: 100vh;
      font-family: var(--font-family);
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      position: relative;
      overflow-x: hidden;
    }

    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.2) 0%, transparent 50%);
      pointer-events: none;
      z-index: -1;
    }

    .container {
      width: 95%;
      max-width: 1400px;
      margin: 0 auto;
      padding: var(--space-6) 0;
    }

    .main-content {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: var(--radius-2xl);
      box-shadow: var(--shadow-xl);
      border: 1px solid rgba(255, 255, 255, 0.2);
      overflow: hidden;
      min-height: calc(100vh - 3rem);
    }

    .content-wrapper {
      padding: var(--space-8);
    }

    header {
      display: flex;
      flex-direction: row;
      gap: var(--space-4);
      align-items: center;
      justify-content: space-between;
      margin-bottom: var(--space-8);
      padding: var(--space-6);
      background: linear-gradient(135deg, var(--primary-50) 0%, white 100%);
      border-radius: var(--radius-xl);
      border: 1px solid var(--gray-100);
    }

    .page-title {
      font-size: var(--font-size-3xl);
      font-weight: 700;
      color: var(--gray-800);
      margin: 0;
      background: linear-gradient(135deg, var(--primary-600) 0%, var(--primary-800) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .page-subtitle {
      color: var(--gray-600);
      font-size: var(--font-size-base);
      margin: var(--space-2) 0 0 0;
    }

    @media (max-width: 768px) {
      .container {
        width: 98%;
        padding: var(--space-4) 0;
      }
      
      .content-wrapper {
        padding: var(--space-4);
      }
      
      header {
        flex-direction: column;
        gap: var(--space-4);
        text-align: center;
      }
      
      .page-title {
        font-size: var(--font-size-2xl);
      }
    }

    @media (max-width: 480px) {
      .main-content {
        border-radius: var(--radius-lg);
      }
      
      .content-wrapper {
        padding: var(--space-3);
      }
    }

    html {
      scroll-behavior: smooth;
    }

    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-track {
      background: var(--gray-100);
      border-radius: var(--radius-full);
    }

    ::-webkit-scrollbar-thumb {
      background: linear-gradient(135deg, var(--primary-400) 0%, var(--primary-600) 100%);
      border-radius: var(--radius-full);
    }

    ::-webkit-scrollbar-thumb:hover {
      background: linear-gradient(135deg, var(--primary-500) 0%, var(--primary-700) 100%);
    }
  </style>
</head>

<body>
  <section class="container">
    <?php
    include 'view/components/toast.php';
    ?>
    
    <div class="main-content">
      <?php
      include 'view/components/navbar.php';
      ?>
      
      <div class="content-wrapper">
        <?php
        include 'view/' . $current_route['view'];
        ?>
      </div>
    </div>
  </section>

  <script src="<?= BASE_URL ?>assets/js/date-formatter.js"></script>
  <script src="<?= BASE_URL ?>assets/js/icons.js"></script>
  <script src="<?= BASE_URL ?>assets/js/animations.js"></script>
</body>

</html>