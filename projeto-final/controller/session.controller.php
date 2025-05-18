<?php
include_once 'model/user.model.php';

class SessionController
{
  static function login()
  {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    $user = UserModel::findByEmail($email);

    if (!$user || !password_verify($password, $user['password'])) {
      $_SESSION['login_error'] = 'E-mail ou senha inválidos!';
      header('Location: /login');
      exit;
    }

    unset($user['password']);

    $_SESSION['user'] = $user;
    header('Location: /');
    exit;
  }

  static function logout()
  {
    session_destroy();
    header('Location: /login');
    exit;
  }
}
