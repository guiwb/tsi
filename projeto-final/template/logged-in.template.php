<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Natare App - <?= $current_route['title'] ?></title>

  <link rel="stylesheet" href="./style/reset.css">
</head>

<body>
  <nav>Bem-vindo, <?= $_SESSION['user']['name'] ?></nav>
  <form action="/logout" method="POST">
    <button type="submit">Sair</button>
  </form>

  <?php
  include 'view/' . $current_route['view'];
  ?>
</body>

</html>