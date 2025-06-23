<?php
session_start();

require_once 'controller/index.php';

$routes = [
  'GET' => [
    '/' => [
      "view" => "home.view.php",
      "title" => "Home",
      "public" => false,
    ],
    '/login' => [
      "view" => "login.view.php",
      "title" => "Login",
      "public" => true,
    ],
    '/signup' => [
      "view" => "signup.view.php",
      "title" => "Cadastre-se",
      "public" => true,
    ],
    '/equipes' => [
      "view" => "teams.view.php",
      "title" => "Equipes",
      "public" => false,
    ],
    '/usuarios' => [
      "view" => "users.view.php",
      "title" => "Usuários",
      "public" => false,
    ],
    '/ambiente' => [
      "view" => "environment.view.php",
      "title" => "Ambiente",
      "public" => false,
    ],
    '/treinos' => [
      "view" => "workouts.view.php",
      "title" => "Treinos",
      "public" => false,
    ],
  ],
  'POST' => [
    '/login' => [
      "perform" => function () {
        return SessionController::login();
      },
      "title" => "Login",
      "public" => true,
    ],
    '/signup' => [
      "perform" => function () {
        return UserController::signup();
      },
      "title" => "Login",
      "public" => true,
    ],
    '/logout' => [
      "perform" => function () {
        return SessionController::logout();
      },
      "title" => "Logout",
      "public" => false,
    ],
  ],
  'NOT_FOUND' => [
    "view" => "not-found.view.php",
    "title" => "Página não encontrada",
    "public" => false,
  ],
];

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$GLOBALS['current_route'] = $routes[$method][$uri] ?? $routes['NOT_FOUND'];

if (!$current_route['public'] && !isset($_SESSION['user'])) {
  header('Location: /login');
  exit;
} else if ($uri == '/login' && isset($_SESSION['user'])) {
  header('Location: /');
  exit;
}

if ($method == 'GET') {
  $current_route['public'] ? include("template/logged-out.template.php") : include("template/logged-in.template.php");
  exit;
} else {
  $current_route['perform']();
  exit;
}
