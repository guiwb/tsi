<?php
define('BASE_URL', '/');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Natare App - <?= $current_route['title'] ?></title>

  <link rel="stylesheet" href="<?= BASE_URL ?>assets/styles/reset.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/styles/ui/logged-out-form.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/styles/ui/button.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


  <style>
    body {
      width: 100%;
      height: 100vh;
      font-family: "Poppins", sans-serif;
    }

    main {
      background-color: white;
      display: flex;
      flex-direction: row;
    }

    .left {
      width: 50%;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .right {
      width: 50%;
      height: 100vh;
      background: url('../assets/images/logged-out-right.png') no-repeat center;
      background-size: cover;
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