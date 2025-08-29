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
    '/usuarios/:param' => [
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
    '/equipes/:param' => [
      "view" => "teams/edit.view.php",
      "title" => "Editar equipe",
      "public" => false,
    ],
    '/treinos' => [
      "view" => "workouts/index.view.php",
      "title" => "Treinos",
      "public" => false,
    ],
    '/treinos/novo' => [
      "view" => "workouts/create.view.php",
      "title" => "Criar treino",
      "public" => false,
    ],
    '/treinos/:param' => [
      "view" => "workouts/edit.view.php",
      "title" => "Editar treino",
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
    '/usuarios/:param' => [
      "perform" => function ($params) {
        return UserController::update($params[0]);
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
    '/usuarios/:param/delete' => [
      "perform" => function ($params) {
        return UserController::delete($params[0]);
      },
      "title" => "Deletar usuário",
      "public" => false,
    ],
    '/equipes/:param' => [
      "perform" => function ($params) {
        return TeamController::update($params[0]);
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
    '/equipes/:param/delete' => [
      "perform" => function ($params) {
        return TeamController::delete($params[0]);
      },
      "title" => "Deletar time",
      "public" => false,
    ],
    '/equipes/:param/atleta/:param/adicionar' => [
      "perform" => function ($params) {
        return TeamController::addAthlete($params[0], $params[1]);
      },
      "title" => "Adicionar atleta à equipe",
      "public" => false,
    ],
    '/equipes/:param/atleta/:param/remover' => [
      "perform" => function ($params) {
        return TeamController::removeAthlete($params[0], $params[1]);
      },
      "title" => "Remover atleta da equipe",
      "public" => false,
    ],
    '/treinos/:param' => [
      "perform" => function ($params) {
        return WorkoutController::update($params[0]);
      },
      "title" => "Editar treino",
      "public" => false,
    ],
    '/treinos/novo' => [
      "perform" => function () {
        return WorkoutController::create();
      },
      "title" => "Criar treino",
      "public" => false,
    ],
    '/treinos/:param/delete' => [
      "perform" => function ($params) {
        return WorkoutController::delete($params[0]);
      },
      "title" => "Deletar treino",
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

$uri = preg_replace($uuid_pattern, ':param', $_SERVER['REQUEST_URI']);
$params = preg_match_all($uuid_pattern, $_SERVER['REQUEST_URI'], $matches) ? $matches[0] : null;

if ($uri && strpos($uri, '?') !== false) {
  $uri = strstr($uri, '?', true);
}

$GLOBALS['current_route'] = $routes[$method][$uri] ?? $routes['NOT_FOUND'];
$GLOBALS['current_route']['params'] = $params;


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
  $params ? $current_route['perform']($params) : $current_route['perform']();
  exit;
}
