<?php
$routes = [
  '/' => [
    "view" => "home.view.php",
    "title" => "Home",
  ],
  '/login' => [
    "view" => "login.view.php",
    "title" => "Login",
  ],
  null => [
    "view" => "not-found.view.php",
    "title" => "Página não encontrada",
  ],
];

$uri = $_SERVER['REQUEST_URI'];
$current_route = $routes[$uri] ?? $routes[null];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Natare App - <?= $current_route['title'] ?></title>
</head>

<body>
  <?php include 'view/' . $current_route['view']; ?>
</body>

</html>