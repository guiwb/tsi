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
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    main {
      width: 100%;
      min-height: 100vh;
      display: flex;
    }

    .left {
      width: 50%;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
    }

    .left::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        radial-gradient(circle at 20% 80%, rgba(59, 130, 246, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(30, 64, 175, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 40% 40%, rgba(147, 197, 253, 0.2) 0%, transparent 50%);
      pointer-events: none;
    }

    .right {
      width: 50%;
      min-height: 100vh;
      background: url('<?= BASE_URL ?>assets/images/logged-out-right.png') no-repeat center;
      background-size: cover;
      position: relative;
    }

    .right::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.3) 100%);
    }

    @media (max-width: 1024px) {
      main {
        flex-direction: column;
      }
      
      .left, .right {
        width: 100%;
        min-height: 50vh;
      }
      
      .right {
        background-position: center 20%;
      }
    }

    @media (max-width: 768px) {
      .right {
        display: none;
      }
      
      .left {
        width: 100%;
        min-height: 100vh;
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
  <main>
    <div class="left">
      <?php
      include 'view/components/toast.php';
      include 'view/' . $current_route['view'];
      ?>
    </div>
    <div class="right">
    </div>
  </main>
</body>

</html>