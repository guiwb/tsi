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
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/styles/ui/logged-in-form.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/styles/ui/button.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/styles/ui/breadcrumb.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/styles/ui/table.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <style>
    body {
      width: 100%;
      height: 100vh;
      font-family: "Poppins", sans-serif;
      background-color: #f9f9f9;
    }

    .container {
      width: 90%;
      margin: 0 auto;
    }

    @media (min-width: 640px) {
      .container {
        max-width: 640px;
      }
    }

    @media (min-width: 768px) {
      .container {
        max-width: 768px;
      }
    }

    @media (min-width: 1024px) {
      .container {
        max-width: 1024px;
      }
    }

    @media (min-width: 1280px) {
      .container {
        max-width: 1280px;
      }
    }
  </style>
</head>

<body>
  <section class="container">
    <?php
    include 'view/components/toast.php';
    include 'view/components/navbar.php';
    include 'view/' . $current_route['view'];
    ?>
  </section>
</body>

</html>