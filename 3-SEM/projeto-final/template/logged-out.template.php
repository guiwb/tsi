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
    * {
      box-sizing: border-box;
    }

    body {
      width: 100%;
      min-height: 100vh;
      font-family: var(--font-family);
      margin: 0;
      padding: 0;
      overflow-x: hidden;
      background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
      position: relative;
    }

    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        radial-gradient(circle at 10% 20%, rgba(59, 130, 246, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 90% 80%, rgba(30, 64, 175, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 50% 50%, rgba(147, 197, 253, 0.03) 0%, transparent 50%);
      pointer-events: none;
      z-index: -1;
    }

    .auth-container {
      width: 100%;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: var(--space-6);
    }

    .auth-card {
      width: 100%;
      max-width: 480px;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: var(--radius-2xl);
      box-shadow: 
        0 25px 50px -12px rgba(0, 0, 0, 0.1),
        0 0 0 1px rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      overflow: hidden;
      position: relative;
    }

    .auth-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--primary-500) 0%, var(--primary-600) 50%, var(--primary-700) 100%);
    }

    .auth-header {
      padding: var(--space-8) var(--space-6) var(--space-6);
      text-align: center;
      background: linear-gradient(135deg, var(--primary-50) 0%, transparent 100%);
    }

    .logo-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: var(--space-4);
    }

    .logo-icon {
      font-size: 4rem;
      filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
      animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
    }

    .auth-title {
      font-size: var(--font-size-4xl);
      font-weight: 700;
      margin: 0;
      background: linear-gradient(135deg, var(--primary-600) 0%, var(--primary-800) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .auth-subtitle {
      font-size: var(--font-size-base);
      color: var(--gray-600);
      margin: 0;
      font-weight: 500;
    }

    .auth-body {
      padding: var(--space-6);
    }

    .welcome-title {
      font-size: var(--font-size-2xl);
      font-weight: 600;
      color: var(--gray-800);
      margin: 0 0 var(--space-2) 0;
      text-align: center;
    }

    .welcome-text {
      font-size: var(--font-size-base);
      color: var(--gray-600);
      margin: 0 0 var(--space-6) 0;
      text-align: center;
    }

    .auth-form {
      display: flex;
      flex-direction: column;
      gap: var(--space-6);
      margin-bottom: var(--space-8);
    }

    .input-group {
      position: relative;
      margin-bottom: 0;
    }

    .input-group input {
      width: 100%;
      padding: var(--space-5) var(--space-4) var(--space-5) var(--space-12);
      border: 2px solid var(--gray-200);
      border-radius: var(--radius-xl);
      font-size: var(--font-size-base);
      background: white;
      transition: all var(--transition-fast);
      font-family: var(--font-family);
      box-shadow: var(--shadow-sm);
    }

    .input-group input:focus {
      outline: none;
      border-color: var(--primary-400);
      box-shadow: 0 0 0 4px var(--primary-100), var(--shadow-md);
      transform: translateY(-2px);
    }

    .input-group .icon {
      position: absolute;
      left: var(--space-4);
      top: 50%;
      transform: translateY(-50%);
      color: var(--gray-400);
      transition: color var(--transition-fast);
      font-size: var(--font-size-xl);
    }

    .input-group input:focus + .icon {
      color: var(--primary-500);
    }

    .form-actions {
      margin-top: var(--space-6);
    }

    .auth-btn {
      width: 100%;
      justify-content: center;
      padding: var(--space-5) var(--space-6);
      font-size: var(--font-size-lg);
      font-weight: 600;
      position: relative;
      overflow: hidden;
      border-radius: var(--radius-xl);
      box-shadow: var(--shadow-md);
    }

    .auth-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left var(--transition-slow);
    }

    .auth-btn:hover::before {
      left: 100%;
    }

    .auth-btn:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }

    .divider {
      display: flex;
      align-items: center;
      margin: var(--space-8) 0;
      color: var(--gray-500);
      font-size: var(--font-size-sm);
      font-weight: 500;
    }

    .divider::before,
    .divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--gray-200);
    }

    .divider span {
      padding: 0 var(--space-6);
      background: white;
    }

    .auth-section {
      text-align: center;
    }

    .auth-text {
      font-size: var(--font-size-sm);
      color: var(--gray-600);
      margin: 0 0 var(--space-4) 0;
    }

    .auth-section .btn.btn-secondary {
      width: 100%;
      justify-content: center;
      padding: var(--space-3) var(--space-6);
      font-size: var(--font-size-sm);
      font-weight: 600;
      background: var(--gray-100) !important;
      color: var(--gray-700) !important;
      border: 2px solid var(--gray-200) !important;
      transition: all var(--transition-fast);
    }

    .auth-section .btn.btn-secondary:hover {
      background: var(--gray-200) !important;
      color: var(--gray-800) !important;
      border-color: var(--gray-300) !important;
      transform: translateY(-1px);
      box-shadow: var(--shadow-md);
    }

    @media (max-width: 480px) {
      .auth-container {
        padding: var(--space-4);
      }
      
      .auth-card {
        max-width: 100%;
      }
      
      .auth-header {
        padding: var(--space-6) var(--space-4) var(--space-4);
      }
      
      .auth-body {
        padding: var(--space-4);
      }
      
      .logo-icon {
        font-size: 3rem;
      }
      
      .auth-title {
        font-size: var(--font-size-3xl);
      }
    }

    .auth-btn.loading {
      pointer-events: none;
      opacity: 0.8;
    }

    .auth-btn.loading::after {
      content: '';
      position: absolute;
      width: 20px;
      height: 20px;
      border: 2px solid transparent;
      border-top: 2px solid white;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
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
  <div class="auth-container">
    <?php
    include 'view/components/toast.php';
    include 'view/' . $current_route['view'];
    ?>
  </div>
</body>

</html>