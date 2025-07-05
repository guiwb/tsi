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
      "view" => "users/index.view.php",
      "title" => "Usuários",
      "public" => false,
    ],
    '/usuarios/novo' => [
      "view" => "users/create.view.php",
      "title" => "Criar usuário",
      "public" => false,
    ],
    '/usuarios/:id' => [
      "view" => "users/edit.view.php",
      "title" => "Editar usuário",
      "public" => false,
    ],
    '/equipes' => [
      "view" => "teams/index.view.php",
      "title" => "Equipes",
      "public" => false,
    ],
    '/equipes/novo' => [
      "view" => "teams/create.view.php",
      "title" => "Criar equipe",
      "public" => false,
    ],
    '/equipes/:id' => [
      "view" => "teams/edit.view.php",
      "title" => "Editar equipe",
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
    '/usuarios/:id' => [
      "perform" => function ($id) {
        return UserController::update($id);
      },
      "title" => "Editar usuário",
      "public" => false,
    ],
    '/usuarios/novo' => [
      "perform" => function () {
        return UserController::create();
      },
      "title" => "Criar usuário",
      "public" => false,
    ],
    '/usuarios/:id/delete' => [
      "perform" => function ($id) {
        return UserController::delete($id);
      },
      "title" => "Deletar usuário",
      "public" => false,
    ],
    '/equipes/:id' => [
      "perform" => function ($id) {
        return TeamController::update($id);
      },
      "title" => "Editar time",
      "public" => false,
    ],
    '/equipes/novo' => [
      "perform" => function () {
        return TeamController::create();
      },
      "title" => "Criar time",
      "public" => false,
    ],
    '/equipes/:id/delete' => [
      "perform" => function ($id) {
        return TeamController::delete($id);
      },
      "title" => "Deletar time",
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
$uuid_pattern = '/[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[1-5][0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}/';
$uri = preg_replace($uuid_pattern, ':id', $_SERVER['REQUEST_URI']);
$param_id = preg_match($uuid_pattern, $_SERVER['REQUEST_URI'], $matches) ? $matches[0] : null;

$GLOBALS['current_route'] = $routes[$method][$uri] ?? $routes['NOT_FOUND'];
$GLOBALS['current_route']['params'] = ["id" => $param_id];


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
  $param_id ? $current_route['perform']($param_id) : $current_route['perform']();
  exit;
}
